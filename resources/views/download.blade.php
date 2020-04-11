@extends('layout')

@section('content')
   @if (isset($video_url_array))

    @foreach($video_url_array as $video_url)
     <a href="{{$video_url}}" download>Baixar Video  </a><BR>
     <video width="400" controls>
         <source src="{{$video_url}}"><BR>
     </video>
     <img src="{{$thumbnails_url_array[$loop->index]}}" width="400"><BR>

        @endforeach

   @else (isset($videos_url))

       <a href="{{$videos_url}}" download>Baixar Video  </a><BR>
       <video width="400" controls>
           <source src="{{$videos_url}}"><BR>
       </video>
       <img src="{{$thumbnail_url}}" width="400"><BR>
       <a href="{{$thumbnail_url}}" download>Baixar Thumbnail</a>
   @endif







@endsection('content')
