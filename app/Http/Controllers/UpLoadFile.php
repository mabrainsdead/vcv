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
                ->open($fileName)
                ->getFrameFromSeconds(1)
                ->export()
                ->toDisk('public')
                ->inFormat(new \FFMpeg\Format\Video\X264)
                ->save($fileName . ".png");
        }

        $hasFile = $request->hasFile('image');
        if ($hasFile)
        {



            $file = $request->file('image');
            $fileName = $file->getFilename();


            Storage::disk('public')->putFileAs('', $file, $fileName);

            convert_mp4($fileName);
            create_thumbnail($fileName);


            return view('link', [
                'video' => asset('storage/' . $fileName . ".mp4"),
                'thumbnail' => asset('storage/' . $fileName . ".png")
            ]);

        }

    }





}
