@extends('layout')

@section('content')

    {{--<div class="container">
        <br />
        <h3 align="center">WavesMed Video Conversor </h3>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">

            </div>
            <div class="panel-body">
                <br />
                <form method="post" action="{{ route('answer') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-3" align="right"><h4>Select Image</h4></div>
                        <div class="col-md-6">
                            <input type="file" name="image" id="file" />
                            <input type="checkbox" name="anonimize" value="yes">Excluir header de identificacao

                        </div>
                        <div class="col-md-3">
                            <input type="submit" name="upload" value="Upload" class="btn btn-success" />
                        </div>
                    </div>
                </form>
                <br />
                <div class="progress">
                    <div class="progress-bar" role="progressbar" aria-valuenow=""
                         aria-valuemin="0" aria-valuemax="100" style="width: 0%">
                        0%
                    </div>
                </div>
                <br />
                <div id="success">

                </div>
                <br />
            </div>
        </div>
    </div>--}}

<form method="POST" action="{{route('answer')}}" enctype="multipart/form-data">
    <p>@csrf
        <label> image</label>
        <input type="file" name="image"/>
        <input type="checkbox" name="anonimize" value="yes">Excluir header de identificacao
    </p>
    <button type="submit">Upload</button>

</form>

    @endsection('content')

