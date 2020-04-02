@extends('layout')

@section('content')

<form method="POST" action="{{route('answer')}}" enctype="multipart/form-data">
    <p>@csrf
        <label> image</label>
        <input type="file" name="image"/>
        <input type="checkbox" name="anonimize" value="yes">Excluir header de identificacao
    </p>
    <button type="submit">Upload</button>

</form>

    @endsection('content')

