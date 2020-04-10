<?php

namespace App\Http\Controllers;

use FFMpeg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UpLoadFile extends Controller {

    public function answer(Request $request) {

        function convert_mp4($fileName)
        {
            FFMpeg::fromDisk('public')
                ->open($fileName)
                ->addFilter('-an')
                ->export()
                ->toDisk('public')
                ->inFormat(new \FFMpeg\Format\Video\X264)
                ->save($fileName . ".mp4");
        }

        function create_thumbnail($fileName)
        {
            FFMpeg::fromDisk('public')
                ->open($fileName . ".mp4")
                ->getFrameFromSeconds(1)
                ->export()
                ->toDisk('public')
                ->inFormat(new \FFMpeg\Format\Video\X264)
                ->save($fileName . ".jpg");
        }

        function anonimize($fileName)
        {
            $path = Storage::disk('public')->getAdapter()->getPathPrefix();

            exec("ffmpeg -i " .
                $path . $fileName .
                " -filter:v 'crop=in_w:in_h/1.15:0.55' -c:a copy " .
                $path . $fileName . ".mp4"
                );
        }

        $hasFile = $request->hasFile('images');




        if (!$hasFile){ //Arquivos nao submetidos
            echo "Submeta um arquivo valido!";
        }

        else {
            if ($request->input("concatenate")) { //if concatenar


                if (!$request->input("anonimize")) {//anonimize
                    $files = $request->file('images');
                    $videos_list_fileName = "storage/" . date("Ymdhis"); //coloca a data como um chave primaria para nome de arquivo

                    $videos_list = fopen($videos_list_fileName, "w") or die("Unable to open file!");
                    $video_output = "$videos_list_fileName.mp4";


                    foreach ($files as $file) {

                        $fileName = $file->getFilename();
                        Storage::disk('public')->putFileAs('', $file, $fileName);
                        convert_mp4($fileName);
                        fwrite($videos_list, "file '" . $fileName . ".mp4'\n");

                    }

                    fclose($videos_list);
                    try {
                        exec("ffmpeg -f concat -safe 0 -i $videos_list_fileName -c copy $video_output");
                    } catch (Exception $e) {
                        echo $e;
                    }


                    return view('download', ['videos_url' => asset($video_output)]);
                } // fim anonimeze
                else { // nao anonimize
                    $files = $request->file('images');
                    $videos_list_fileName = "storage/" . date("Ymdhis"); //coloca a data como um chave primaria para nome de arquivo

                    $videos_list = fopen($videos_list_fileName, "w") or die("Unable to open file!");
                    $video_output = "$videos_list_fileName.mp4";


                    foreach ($files as $file) {

                        $fileName = $file->getFilename();
                        Storage::disk('public')->putFileAs('', $file, $fileName);
                        anonimize($fileName);
                        fwrite($videos_list, "file '" . $fileName . ".mp4'\n");

                    }

                    fclose($videos_list);
                    try {
                        exec("ffmpeg -f concat -safe 0 -i $videos_list_fileName -c copy $video_output");
                    } catch (Exception $e) {
                        echo $e;
                    }


                    return view('download', ['videos_url' => asset($video_output)]);

                } //fim nao anonimize
            } //fim do if concatenar

            /*if (!$request->input('anonimize')){
                try {
                    convert_mp4($fileName);
                    create_thumbnail($fileName);
                    return view('download', [
                        'video' => asset('storage/' . $fileName . ".mp4"),
                        'thumbnail' => asset('storage/' . $fileName . ".jpg")
                    ]);
                }   catch (FFMpeg\Exception\RuntimeException $e) {
                        echo "Submeta um arquivo valido!";
                    }


            }
            else {
                try {

                    anonimize($fileName);
                    create_thumbnail($fileName);
                    return view('download', [
                        'video' => asset('storage/' . $fileName . ".mp4"),
                        'thumbnail' => asset('storage/' . $fileName . ".jpg")
                    ]);
                } catch (FFMpeg\Exception\RuntimeException $e) {
                    echo "Submeta um arquivo valido!";
                    }

            }*/

        }

    }
}
