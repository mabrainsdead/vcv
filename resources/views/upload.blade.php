@extends('layout')

@section('content')

<form method="POST" action="{{route('answer')}}" enctype="multipart/form-data">
    <p>@csrf
        <label> image</label>
        <input type="file" name="image"/>
    </p>
    <button type="submit">Upload</button>

</form>

    @endsection('content')

