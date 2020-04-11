@extends('layout')

@section('content')



{{--<form method="POST" name="my_form" action="{{route('answer')}}" enctype="multipart/form-data">
    <p>@csrf</p>
        <label> image</label>
        <input type="file" name="images[0]"/>
        <input type="file" name="images[]"/>

        <input type="checkbox" name="anonimize" value="yes">Excluir header de identificacao


    <button type="submit" class="btn btn-primary">Upload</button>

</form>--}}

<div class="container">

    <h3 class="jumbotron">WavesMed Video Converter</h3>
    <form method="POST" name="my_form" action="{{route('answer')}}" enctype="multipart/form-data">
        <p>@csrf</p>
        <div> <input type="checkbox" name="anonimize" value="yes"/>Excluir header de identificacao </div>
        <div> <input type="checkbox" name="concatenate" value="yes"/>Concatenar Videos </div>
        <div> <input type="checkbox" name="thumbnail" value="yes"/>Thumbnails </div>
        <div class="input-group control-group increment" >
            <input type="file" name="images[]" class="form-control">
            <div class="input-group-btn">
                <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
            </div>
        </div>
        <div class="clone hide">
            <div class="control-group input-group" style="margin-top:10px">
                <input type="file" name="images[]" class="form-control">
                <div class="input-group-btn">
                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top:10px">Upload</button>

    </form>
</div>



@endsection('content)


@section('script_session')
    <script>

        $(document).ready(function() {

            $(".btn-success").click(function(){
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click",".btn-danger",function(){
                $(this).parents(".control-group").remove();
            });

        });

    </script>

    @endsection('script_session')



