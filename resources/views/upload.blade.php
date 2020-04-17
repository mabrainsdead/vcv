@extends('layout')

@section('content')
    <nav id="navBar" class="navbar navbar-light">
        <i class="fas fa-bars"></i>
        <a class="nav-item my-1 ml-auto" id="navItem" href="https://www.wavesmed.cmo.br/login/index.php">Acessar</a>
    </nav>

    <div class="container">


        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="https://www.wavesmed.com.br/login/index.php">
                <img  id="logo" src="http://vcv/images/educacao_saude_logo_site.png" class="d-inline-block align-top">
            </a>
        </nav>

        <div class="jumbotron jumbotron-fluid">
            <h1 class="display-5">Conversor de vídeo</h1>
            <hr class="my-4">
            <p class="lead" id="descricao"> Converta seus vídeos e reúna-os em um só arquivo mp4.</p>
        </div>

    </div>


<div class="container">
    <br />
    <br />

    <div class="form-group">
        <form method="POST" name="my_form" id="my_form" action="{{route('answer')}}" enctype="multipart/form-data">@csrf
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

        <div id="divMsg" style="display: none;">
            <img src="{{ asset('images/spinner.gif') }}" alt="Please wait.." />
        </div>


</div>



@endsection('content)

@section('script_session')

    <script src="{{ asset('js/myJs.js') }}"></script>

  @endsection('script_session')



