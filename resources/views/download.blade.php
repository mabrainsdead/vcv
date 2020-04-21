@extends('layout')

@section('content')
   @if (isset($video_url_array))

       {{--$video_url_array tem: --}}


    <div id="grid" class="grid-container">


        @foreach($video_url_array as $video_url)

            <div id="video_row" class="grid_item">
                <video controls>
                    <source src="{{$video_url}}" >
                </video>
                <a href="{{$video_url}}" download>Download Vídeo</a>
            </div>

            @if (!empty($thumbnails_url_array))
                <div id="img_row" class="grid_item">
                    <img src="{{$thumbnails_url_array[$loop->index]}}" />
                    <a href="{{$thumbnails_url_array[$loop->index]}}" download>Download thumbnail</a>
                </div>

            @endif
            <script>
                var collumns = {{ @count($video_url_array) }};
                document.getElementById("grid").style.gridTemplateColumns="repeat(" + collumns + ", 150px)";
            </script>

        @endforeach



   @else (isset($videos_url))
   <div id="grid" class="grid-container">
        <div id="video_row" class="grid_item">
            <video >
                <source src="{{$videos_url}}">
            </video>
                <a href="{{$videos_url}}" download>Vídeo</a>
        </div>
       <div id="img_row" class="grid_item">
           <img src="{{$thumbnail_url}}" />
           <a href="{{$thumbnail_url}}" download>Thumbnail</a>
       </div>


   @endif
   </div>
@endsection('content')

