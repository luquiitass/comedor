<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Show Anuncio</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Show Anuncio</h1>
            <br>
            <form method = 'get' action = 'http://localhost:8000/anuncio'>
                <button class = 'btn btn-primary'>Anuncio Index</button>
            </form>
            <br>
            <table class = 'table table-bordered'>
                <thead>
                    <th>Key</th>
                    <th>Value</th>
                </thead>
                <tbody>

                    
                    <tr>
                        <td>
                            <b><i>titulo : </i></b>
                        </td>
                        <td>{{$anuncio->titulo}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>cuerpo : </i></b>
                        </td>
                        <td>{{$anuncio->cuerpo}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>hasta : </i></b>
                        </td>
                        <td>{{$anuncio->hasta}}</td>
                    </tr>
                    

                        
                </tbody>
            </table>
        </div>
    </body>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
