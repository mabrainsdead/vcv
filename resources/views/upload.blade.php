@extends('layout')

@section('content')


<div class="container">
    <br />
    <br />

    <div class="form-group">
        <form method="POST" name="my_form" id="my_form" action="{{route('answer')}}" enctype="multipart/form-data">@csrf

            <div id="divMsg" style="display: none;">
                <img class="animated-gif" src="{{ asset('images/spinner.gif') }}" alt="Please wait.." />
            </div>

            <ul class="nav justify-content-lg-center" id="settings">
                <li class="nav-item">
                    <span> <input type="checkbox" name="anonimize" value="yes">Excluir identificacao</span>
                </li>
                <li class="nav-item">
                    <span> <input type="checkbox" name="concatenate" value="yes"/>Concatenar Videos</span>
                </li>
                <li class="nav-item">
                    <span> <input type="checkbox" name="thumbnail" value="yes"/>Thumbnails</span>
                </li>
            </ul>





            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field">
                    <tr>
                        <td><input type="file" name="images[]"  class="form-control name_list" /></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>

            </div>
            <div>
                <div id="inputButton">
                    <input type="submit" name="submit" id="btnSubmit" class="btn btn-primary btn-lg"  value="Upload" />

                </div>

            </div>
            <div >
                <input type="checkbox" />
                <input type="checkbox" name="water_mark" value="yes"/>
                <input type="checkbox" />
            </div>

        </form>
    </div>



</div>



@endsection('content)

@section('script_session')

    <script src="{{ asset('js/myJs.js') }}"></script>

  @endsection('script_session')



