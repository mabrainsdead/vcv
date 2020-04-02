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
            $fileName = $file->getFilename();
           Storage::disk('public')->putFileAs('',$file, $fileName);

            FFMpeg::fromDisk('public')
                ->open($fileName)
                ->addFilter('-an')
                ->export()
                ->toDisk('public')
                ->inFormat(new \FFMpeg\Format\Video\X264)
                ->save($fileName . ".mp4");



            return asset('storage/' . $fileName.".mp4");

        }



    }


}
