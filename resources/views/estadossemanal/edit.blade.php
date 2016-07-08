<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Edit Estadossemanal</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Edit Estadossemanal</h1>
            <form method = 'get' action = 'http://localhost:8000/estadossemanal'>
                <button class = 'btn btn-danger'>Estadossemanal Index</button>
            </form>
            <br>
            <form method = 'POST' action = 'http://localhost:8000/estadossemanal/{{$estadossemanal->id}}/update'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="form-group">
                    <label for="lunes">lunes</label>
                    <input id="lunes" name = "lunes" type="text" class="form-control" value="{{$estadossemanal->lunes}}">
                </div>
                
                <div class="form-group">
                    <label for="martes">martes</label>
                    <input id="martes" name = "martes" type="text" class="form-control" value="{{$estadossemanal->martes}}">
                </div>
                
                <div class="form-group">
                    <label for="miercoles">miercoles</label>
                    <input id="miercoles" name = "miercoles" type="text" class="form-control" value="{{$estadossemanal->miercoles}}">
                </div>
                
                <div class="form-group">
                    <label for="jueves">jueves</label>
                    <input id="jueves" name = "jueves" type="text" class="form-control" value="{{$estadossemanal->jueves}}">
                </div>
                
                <div class="form-group">
                    <label for="viernes">viernes</label>
                    <input id="viernes" name = "viernes" type="text" class="form-control" value="{{$estadossemanal->viernes}}">
                </div>
                
                
                <button class = 'btn btn-primary' type ='submit'>Update</button>
            </form>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
