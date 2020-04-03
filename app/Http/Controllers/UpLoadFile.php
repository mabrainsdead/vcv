<?php

namespace App\Http\Controllers;

use FFMpeg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpLoadFile extends Controller
{

    public function answer(Request $request)
    {

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

        $hasFile = $request->hasFile('image');

        if (!$hasFile)
        {
            echo "Submeta um arquivo valido!";
        }

        else
        {
            $file = $request->file('image');
            $fileName = $file->getFilename();
            Storage::disk('public')->putFileAs('', $file, $fileName);


            if (!$request->input('anonimize'))
                {
                    convert_mp4($fileName);
                    create_thumbnail($fileName);
                    return view('download', [
                        'video' => asset('storage/' . $fileName . ".mp4"),
                        'thumbnail' => asset('storage/' . $fileName . ".jpg")
                    ]);

                }
            else
                {
                    anonimize($fileName);
                    create_thumbnail($fileName);
                    return view('download', [
                        'video' => asset('storage/' . $fileName . ".mp4"),
                        'thumbnail' => asset('storage/' . $fileName . ".jpg")
                    ]);

                }



        }

    }





}
