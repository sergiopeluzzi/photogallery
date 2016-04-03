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
    <h1 class="text-primary">{{ $album->name }}</h1>
    <div id="slider" class="flexslider">
        <ul class="slides">
            @foreach($album->Photos as $photo)
                <li>
                    <img src="{{asset('albums') . '/' . $photo->image}}"/>
                </li>
            @endforeach
        </ul>
    </div>
    <div id="carousel" class="flexslider">
        <ul class="slides">
            @foreach($album->Photos as $photo)
                <li>
                    <img src="{{asset('albums') . '/' . $photo->image}}"/>
                </li>
            @endforeach
        </ul>
    </div>
    <div align="center"><a href="{{ route('gallery') }}" class="btn btn-big btn-primary">Voltar</a></div>
</div>

<!-- JQuery -->
<script src="{{ asset('assets/flexslider/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- FlexSlider -->
<script src="{{ asset('assets/flexslider/jquery.flexslider-min.js') }}"></script>
<!-- FlexSlider Initializer -->
<script>
    $(window).load(function() {
        // The slider being synced must be initialized first
        $('#carousel').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            itemWidth: 210,
            itemMargin: 5,
            asNavFor: '#slider'
        });

        $('#slider').flexslider({
            animation: "slide",
            controlNav: false,
            animationLoop: false,
            slideshow: false,
            sync: "#carousel"
        });
    });
</script>
</body>
</html>