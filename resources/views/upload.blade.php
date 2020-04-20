@extends('layout')

@section('content')


<div class="container">
    <br />
    <br />

    <div class="form-group">
        <form method="POST" action="{{route('answer')}}" name="my_form" id="my_form" class="form"  enctype="multipart/form-data" >@csrf

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
                        <td><input type="file" name="images[]"  id="inFile" class="form-control name_list" /></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
                    </tr>
                </table>

            </div>
            <div>
                <div id="inputButton">
                    <input type="submit" name="submit" id="submit" class="btn btn-primary btn-lg"  value="Upload" />

                </div>

            </div>
            <div >
                <input type="checkbox" />
                <input type="checkbox" name="water_mark" value="yes"/>
                <input type="checkbox" />
            </div>

        </form>

        <div class="progress-bar" id="progressBar">
            <div class="progress-bar-fill">
                <span class="progress-bar-text">0%</span>

            </div>
        </div>

        <script>
            const uploadForm = document.getElementById("my_form");
            const inFile = document.getElementById("inFile");
            const progressBarFill = document.querySelector("#progressBar > .progress-bar-fill");
            const progressBarText = progressBarFill.querySelector(".progress-bar-text");
            token = document.querySelector('meta[name="csrf-token"]').content;

            uploadForm.addEventListener("submit", uploadFile);

            function uploadFile(e) {
                /*e.preventDefault();*/
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "{{ url('/answer')}}");
                xhr.setRequestHeader('X-CSRF-TOKEN', token);
                xhr.upload.addEventListener("progress", e=> {
                    const percent = e.lengthComputable ? (e.loaded / e.total) * 100 : 0;
                    progressBarFill.style.width = percent.toFixed(2) + "%";
                    progressBarText.textContent = percent.toFixed(2) + "%";
                })


                xhr.send(new FormData(uploadForm));

            }
        </script>
    </div>



</div>



@endsection('content)

@section('script_session')

    {{--<script src="{{ asset('js/myJs.js') }}"></script>--}}

  @endsection('script_session')



