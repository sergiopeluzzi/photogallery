<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Shekina | File Uploader</title>
    <!-- Latest compiled and minified CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled and minified JavaScript -->
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0-rc1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" style="text-align: center;">
    <div class="span4" style="display: inline-block; margin-top:100px;">
        @if($errors->has())
            <div class="alert alert-block alert-error fade in" id="error-block">
                <?php
                $messages = $errors->all('<li>:message</li>');
                ?>
                <button type="button" class="close" data-dismiss="alert">×</button>

                <h4>Atenção!</h4>
                <ul>
                    @foreach($messages as $message)
                        {{$message}}
                    @endforeach

                </ul>
            </div>
        @endif
        {!! Form::open(['name' => 'addimagetoalbum', 'method' => 'POST', 'url' => route('add_image_to_album'), 'enctype' => 'multipart/form-data', 'files' => true ]) !!}
            <input type="hidden" name="album_id" value="{{$album->id}}" />
            <fieldset>
                <legend>Adicionar foto à {{$album->name}}</legend>
                <div class="form-group">
                    <label for="description">Descrição</label>
                    <textarea name="description" type="text" class="form-control" placeholder="Descrição das imagens"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Selecione as fotos</label>
                    {{ Form::file('image[]', ['multiple' => true]) }}
                </div>
                <button type="submit" class="btnbtn-default">Aicionar</button>
            </fieldset>
        {!! Form::close() !!}
    </div>
</div> <!-- /container -->
</body>
</html>