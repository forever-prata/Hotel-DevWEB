<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex justify-content-center">
        <h1 class="display-5">Login</h1>
    </div>
    <br>

    <div class="d-flex justify-content-center">
        <form action="acaologin.php" method="POST" enctype="multipart/form-data">
            <div class="form-floating mb-3">
                <input type="text" name="user" id="user" class="form-control">
                <label for="user">Usuario:</label>
            </div>                

            <div class="form-floating mb-3">
                <input type="password" name="senha" id="senha" class="form-control">
                <label for="senha">Senha:</label>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-dark">Enviar</button>
            </div>
            

        </form>
    </div>
</body>
</html>