<?php

namespace App\Http\Controllers;

use FFMpeg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpLoadFile extends Controller
{
    public function answer(Request $request){

        FFMpeg::fromDisk('local')
            ->open('public/public/teste.mv')
            ->getFrameFromSeconds(10)
            ->export()
            ->toDisk('local')
            ->save('FrameAt10Sec.png');


       // $hasFile = $request->hasFile('image');
       // if ($hasFile) {
       //     $file = $request->file('image');
       //     dump($file);
       //     dump($file -> getClientMimeType());
       //     dump($file -> getClientOriginalExtension());
            //dump($file->storeAs('image', $file->getClientOriginalName()));
            //dump(Storage::putFileAs('public', $file, $file->getClientOriginalName()));


       //     return $file -> path() . "." . $file->clientExtension();
       // }
       // else {
       //     return "There is no file uploaded\n" ;
      //  }
    }


}
