@extends('layout')

@section('content')
   {{-- @if(sizeof($videos_url)>1)
        @foreach($videos_url as $video)
     <a href="{{$video}}" download>Baixar Video  </a><BR>
     <video width="400" controls>
         <source src="{{$video}}"><BR>
     </video>
        @endforeach
    @else--}}
        <a href="{{$videos_url}}" download>Baixar Video  </a><BR>
        <video width="400" controls>
            <source src="{{$videos_url}}"><BR>
        </video>
       {{-- @endif--}}


 {{--<img src="{{$thumbnail}}" width="400"><BR>
 <a href="{{$thumbnail}}" download>Baixar Thumbnail</a>--}}






@endsection('content')
