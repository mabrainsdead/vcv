@extends('layout')

@section('content')

 <a href="{{$video}}" download>Baixar Video  </a><BR>
 <video width="400" controls>
     <source src="{{$video}}"><BR>
 </video>

 <img src="{{$thumbnail}}" width="400"><BR>
 <a href="{{$thumbnail}}" download>Baixar Thumbnail</a>


@endsection('content')
