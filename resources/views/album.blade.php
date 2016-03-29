<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $album->name }}</title>
    <!-- Latest compiled and minified CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
    <style>
        body {
            padding-top: 50px;
        }
        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Shekiná Galeria</a>
        <div class="nav-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('create_album_form')}}">Criar Novo Album</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>
<div class="container">

    <div class="starter-template">
        <div class="media">
            <img class="media-object pull-left" alt="{{ $album->name }}" src="/albums/{{ $album->cover_image }}" width="350px">
            <div class="media-body">
                <h2 class="media-heading" style="font-size: 26px;">Nome:</h2>
                <p>{{$album->name}}</p>
                <div class="media">
                    <h2 class="media-heading" style="font-size: 26px;">Descrição:</h2>
                    <p>{{$album->description}}<p>
                        <a href="{{ route('add_image', ['id'=>$album->id])}}"><button type="button" class="btn btn-primary btn-large">Adicionar Fotos ao Album</button></a>
                        <a href="{{ route('delete_album', ['id'=>$album->id])}}" onclick="return confirm('Tem certeza?')"><button type="button" class="btn btn-danger btn-large">Deletar Album</button></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($album->Photos as $photo)
            <div class="col-lg-3">
                <div class="thumbnail" style="max-height: 350px;min-height: 350px;">
                    <img alt="{{ $album->name }}" src="/albums/{{ $photo->image }}">
                    <div class="caption">
                        <p>{{ $photo->description }}</p>
                        <p>Criação:  {{ date("d/m/Y",strtotime($photo->created_at)) }} às {{ date("g:ha", strtotime( $photo->created_at )) }}</p>
                        <a href="{{ route('delete_image',array('id'=>$photo->id))}}" onclick="return confirm('Tem certeza?')"><button type="button" class="btn btn-danger btn-small">Excluir Foto</button></a>
                        <br><br>
                        <p>Mover Foto para outro Album :</p>
                        <form name="movephoto" method="POST" action="{{ route('move_image')}}">
                            {!! Form::hidden('_token', csrf_token()) !!}
                            <select name="new_album">
                                @foreach($albums as $others)
                                    <option value="{{ $others->id }}">{{ $others->name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" name="photo" value="{{ $photo->id }}" />
                            <button type="submit" class="btn btn-smallbtn-info" onclick="return confirm('Tem certeza?')">Mover Foto</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

</body>
</html>