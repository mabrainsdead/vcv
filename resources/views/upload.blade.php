@extends('layout')

@section('content')



{{--<div class="container">

    <h3 class="jumbotron">WavesMed Video Converter</h3>
    <form method="POST" name="my_form" action="{{route('answer')}}" enctype="multipart/form-data" >
        <p>@csrf</p>


        --}}{{--Configuracoes--}}{{--
        <div> <input type="checkbox" name="anonimize" value="yes"/>Excluir header de identificacao </div>
        <div> <input type="checkbox" name="concatenate" value="yes"/>Concatenar Videos </div>
        <div> <input type="checkbox" name="thumbnail" value="yes"/>Thumbnails </div>
        <div> <input type="checkbox" name="water_mark" value="yes"/>Marca dagua </div>

        --}}{{--Upload de arquivos --}}{{--
       <div id="form1" class=" input-group control-group increment" >
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
</div>--}}

<div class="container">
    <br />
    <br />
    <h2 align="center">WavesMed Video Conversor</h2>
    <div class="form-group">
        <form method="POST" name="my_form" id="my_form" action="{{route('answer')}}" enctype="multipart/form-data">@csrf
            <div> <input type="checkbox" name="anonimize" value="yes"/>Excluir header de identificacao </div>
            <div> <input type="checkbox" name="concatenate" value="yes"/>Concatenar Videos </div>
            <div> <input type="checkbox" name="thumbnail" value="yes"/>Thumbnails </div>
            <div> <input type="checkbox" name="water_mark" value="yes"/>Marca dagua </div>

            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <td><input type="file" name="images[]"  class="form-control name_list" /></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>
                <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
            </div>
        </form>
    </div>
</div>

@endsection('content)


@section('script_session')
    {{--<script>

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
--}}

    <script>
        $(document).ready(function(){
            var i=1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="file" name="images[]" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            });
            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });

        });
    </script>


@endsection('script_session')



