@extends('layout')

@section('content')

 <a href="{{$video}}" download>Baixar Video</a><BR>
 <a href="{{$thumbnail}}" download>Baixar Thumbnail</a>
@endsection('content')
