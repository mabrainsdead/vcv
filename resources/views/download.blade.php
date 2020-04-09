@extends('layout')

@section('content')
    @foreach($videos_url as $video)
 <a href="{{$video}}" download>Baixar Video  </a><BR>
 <video width="400" controls>
     <source src="{{$video}}"><BR>
 </video>
    @endforeach
 {{--<img src="{{$thumbnail}}" width="400"><BR>
 <a href="{{$thumbnail}}" download>Baixar Thumbnail</a>--}}






@endsection('content')
