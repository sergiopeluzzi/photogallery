<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Shekina Galeria</title>
    <!-- Latest compiled and minified CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">Shekina Galeria</a>
    </div>
</div>
<div class="container" style="text-align: center;">
    <div class="span4" style="display: inline-block;margin-top:100px;">

        @if($errors->has())
            <div class="alert alert-block alert-error fade in" id="error-block">
                <?php
                $messages = $errors->all('<li>:message</li>');
                ?>
                <button type="button" class="close" data-dismiss="alert">×</button>

                <h4>Warning!</h4>
                <ul>
                    @foreach($messages as $message)
                        {{$message}}
                    @endforeach

                </ul>
            </div>
        @endif

        <form name="login" method="POST" action="{{ route('login')}}" enctype="multipart/form-data">
            <fieldset>
                {!! Form::hidden('_token', csrf_token()) !!}
                <legend>Login</legend>
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input name="name" type="text" class="form-control" placeholder="Nome do Album" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input name="password" type="text" class="form-control" placeholder="Senha" value="{{ old('descrption') }}" >
                </div>
                <button type="submit" class="btnbtn-default">Entrar</button>
            </fieldset>
        </form>
    </div>
</div> <!-- /container -->
</body>
</html>