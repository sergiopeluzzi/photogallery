<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shekina Galeria</title>
    <!-- Latest compiled and minified CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">
    <!-- FlexSlider -->
    <link href="{{ asset('assets/flexslider/flexslider.css') }}" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
    <style>
        body {
            padding-top: 20px;
        }

        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>

</head>
<body>
<div class="container">
    <h1 class="text-primary" align="center">Galeria de Fotos</h1>
    <div class="row" style="align-items: center;display: flex;flex-direction: row;flex-wrap: wrap;justify-content: center;">
        @foreach($albums as $album)
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="thumbnail" style="min-height: 454px;">
                    <img alt="{{$album->name}}" src="/albums/{{$album->cover_image}}">
                    <div class="caption">
                        <h3 align="center">{{$album->name}}</h3>
                        <p align="center">{{$album->description}}</p>
                        <p align="center">{{count($album->Photos)}} foto(s).</p>
                        <p align="center">{{date('d/m/Y', strtotime($album->created_at))}}</p>
                        <p align="center"><a href="{{ route('photo_gallery', ['id' => $album->id]) }}" class="btn btn-big btn-primary">Entrar</a></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>