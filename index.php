<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script src="./js/bootstrap.js" defer></script>
    <script src="./js/login.js" defer></script>
</head>

<body>
    <div class="card" style="width: 450px; margin-left: 700px; margin-top: 15%">
        <div class="card-header text-center h4">
            Login
        </div>
        <div class="card-body">
            <form id="formLogin">
                <div class="mb-3">
                    <label for="loginEmail" class="form-label">Email</label>
                    <input type="text" class="form-control" id="loginEmail" name="loginEmail">
                </div>
                <div class="mb-3">
                    <label for="loginSenha" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="loginSenha" name="loginSenha">
                </div>
            </form>
            <div class="alert alert-warning" role="alert" id="alert" style="display: none"></div>
            <button type="button" class="btn btn-primary" onclick="login();">Logar</button>
        </div>
    </div>
</body>

</html>