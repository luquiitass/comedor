<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Edit Anuncio</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Edit Anuncio</h1>
            <form method = 'get' action = 'http://localhost:8000/anuncio'>
                <button class = 'btn btn-danger'>Anuncio Index</button>
            </form>
            <br>
            <form method = 'POST' action = 'http://localhost:8000/anuncio/{{$anuncio->id}}/update'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="form-group">
                    <label for="titulo">titulo</label>
                    <input id="titulo" name = "titulo" type="text" class="form-control" value="{{$anuncio->titulo}}">
                </div>
                
                <div class="form-group">
                    <label for="cuerpo">cuerpo</label>
                    <input id="cuerpo" name = "cuerpo" type="text" class="form-control" value="{{$anuncio->cuerpo}}">
                </div>
                
                <div class="form-group">
                    <label for="hasta">hasta</label>
                    <input id="hasta" name = "hasta" type="text" class="form-control" value="{{$anuncio->hasta}}">
                </div>
                
                
                <button class = 'btn btn-primary' type ='submit'>Update</button>
            </form>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
