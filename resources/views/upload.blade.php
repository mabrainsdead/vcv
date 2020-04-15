@extends('layout')

@section('content')

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
                <input type="submit" name="submit" id="btnSubmit" class="btn btn-primary btn-lg"  value="Upload" />
            </div>
        </form>
        <div id="divMsg" style="display: none;">
            <img src="{{ asset('images/spinner.gif') }}" alt="Please wait.." />
        </div>
    </div>
</div>



@endsection('content)

@section('script_session')

    <script src="{{ asset('/js/myJs.js') }}"></script>

  @endsection('script_session')



