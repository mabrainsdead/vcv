<?php

namespace App\Http\Controllers;

use FFMpeg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpLoadFile extends Controller
{
    public function answer(Request $request){
        $hasFile = $request->hasFile('image');
        if ($hasFile) {
            $file = $request->file('image');
            dump($file);

            dump(Storage::putFileAs('public', $file, $file->getFilename()));

            FFMpeg::fromDisk('public')
                ->open($file->getFilename())
                ->addFilter('-an')
                ->export()
                ->toDisk('public')
                ->inFormat(new \FFMpeg\Format\Video\X264)
                ->save($file->getFilename() . ".mp4");

            return "Ok";

        }



    }


}
