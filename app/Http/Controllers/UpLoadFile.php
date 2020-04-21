<?php

namespace App\Http\Controllers;

use FFMpeg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use mysql_xdevapi\Exception;
use PhpOption\None;
use PHPUnit\Framework\Constraint\IsFalse;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UpLoadFile extends Controller {

    public function answer(Request $request)
    {



        function convert_mp4($fileName, $water_mark)
        {
            if ($water_mark) {
                FFMpeg::fromDisk('public')
                    ->open($fileName)
                    ->addFilter('-an')
                    ->export()
                    ->toDisk('public')
                    ->inFormat(new \FFMpeg\Format\Video\X264)
                    ->save($fileName . ".mp4");
            } else {
                $path = Storage::disk('public')->getAdapter()->getPathPrefix();

                exec("ffmpeg -i $path/$fileName -i " . LOGO . " -filter_complex \"overlay=W-w-5:5\" -codec:a copy $path/$fileName.mp4");
            }

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

        function anonimize($fileName, $water_mark)
        {
            $path = Storage::disk('public')->getAdapter()->getPathPrefix();
            if ($water_mark) {


                exec("ffmpeg -i " .
                    PATH . $fileName .
                    " -filter:v 'crop=in_w:in_h/1.15:0.55' -c:a copy " .
                    PATH . $fileName . ".mp4"
                );
            } else {

                exec("ffmpeg -i " .
                    PATH . $fileName .
                    " -filter:v 'crop=in_w:in_h/1.15:0.55' -c:a copy " .
                    PATH . "$fileName.avi"
                );
                exec("ffmpeg -i " .
                    PATH . "$fileName.avi " .
                    "-i " . LOGO .
                    ' -filter_complex "overlay=W-w-5:5"' .
                    " -c:a copy " .
                    PATH . $fileName . ".mp4"
                );
            }

        }

        $hasFile = $request->hasFile('images');


        if (!$hasFile) { //Arquivos nao submetidos
            echo "Submeta um arquivo valido!";
        } else {
            $files = $request->file('images');

            //Define constantes e variaveis

            define("LOGO", asset('images/logo_waves.png'));//Storage::disk('img')->path("logo_waves.png"));
            define("PATH", Storage::disk('public')->path(""));

            $water_mark = $request->input("water_mark");
            $videos_list_fileName = /*"storage/" .*/ date("Ymdhis"); //coloca a data como um chave primaria para nome de arquivo
            $videos_list = fopen("storage/$videos_list_fileName", "w") or die("Unable to open file!");
            $video_output = "$videos_list_fileName.mp4";

            if ($request->input("concatenate")) { //if concatenar


                if (!$request->input("anonimize")) {//Nao-anonimize
                    try {
                        foreach ($files as $file) {
                            $fileName = $file->getFilename();
                            Storage::disk('public')->putFileAs('', $file, $fileName);
                            convert_mp4($fileName, $water_mark);
                            fwrite($videos_list, "file '" . $fileName . ".mp4'\n");
                        }

                        fclose($videos_list);


                        exec("ffmpeg -f concat -safe 0 -i $videos_list_fileName -c copy $video_output");
                        ($request->input("thumbnail") ? create_thumbnail("$fileName") : ""); //Cria um thumbnail com o ultimo video

                    } catch (FFMpeg\Exception\RuntimeException $e) {
                        echo "Submeta um arquivo valido!";
                    }


                    return view('download', [
                        'videos_url' => asset($video_output),
                        'thumbnail_url' => ($request->input("thumbnail") ? asset("/storage/$fileName.jpg") : null)
                    ]);
                } // fim nao-anonimize

                else { // anonimize
                    try {
                        foreach ($files as $file) {
                            $fileName = $file->getFilename();
                            Storage::disk('public')->putFileAs('', $file, $fileName);
                            anonimize($fileName, $water_mark);
                            fwrite($videos_list, "file '" . $fileName . ".mp4'\n");
                        }

                        fclose($videos_list);


                        exec("ffmpeg -f concat -safe 0 -i $videos_list_fileName -c copy $video_output");
                        ($request->input("thumbnail") ? create_thumbnail("$fileName") : ""); //Cria um thumbnail com o ultimo video

                        return view('download', [
                            'videos_url' => asset($video_output),
                            'thumbnail_url' => ($request->input("thumbnail") ? asset("/storage/$fileName.jpg") : null)
                        ]);
                    } catch (/*FFMpeg\Exception\RuntimeException*/ Exception $e) {
                        echo "Submeta um arquivo valido!";
                    }


                } //fim anonimize
            } //fim do if concatenar

            else {  //inicio nao concatenar
                $videos_url_array = array();
                $thumbnails_url_array = array();

                if (!$request->input('anonimize')) { //Nao-anonimizar

                    try {
                        foreach ($files as $file) {
                            $fileName = $file->getFilename();
                            Storage::disk('public')->putFileAs('', $file, $fileName);
                            convert_mp4($fileName, $water_mark);
                            $videos_url_array[] = asset("storage/$fileName.mp4");

                            if ($request->input("thumbnail")) {
                                create_thumbnail($fileName);
                                $thumbnails_url_array[] = asset("storage/$fileName.jpg");
                            }
                        }


                        return view('download', [
                            'video_url_array' => $videos_url_array,
                            'thumbnails_url_array' => ($request->input("thumbnail") ? $thumbnails_url_array : null),
                        ]);

                    } catch (FFMpeg\Exception\RuntimeException $e) {
                        echo "Submeta um arquivo valido!";
                    }


                } //fim do nao-anonimizar
                else { //Inicio anonimizar
                    try {
                        foreach ($files as $file) {
                            $fileName = $file->getFilename();
                            Storage::disk('public')->putFileAs('', $file, $fileName);
                            anonimize($fileName, $water_mark);
                            $videos_url_array[] = asset("storage/$fileName.mp4");
                            if ($request->input("thumbnail")) {
                                create_thumbnail($fileName);
                                $thumbnails_url_array[] = asset("storage/$fileName.jpg");
                            }

                        }

                        return view('download', [
                            'video_url_array' => $videos_url_array,
                            'thumbnails_url_array' => ($request->input("thumbnail") ? $thumbnails_url_array : null),
                        ]);

                    } catch (FFMpeg\Exception\RuntimeException $e) {
                        echo "Submeta um arquivo valido!";
                    }

                } //fim anonimizar
            } //fim nao concatenar

        }


    }
}
