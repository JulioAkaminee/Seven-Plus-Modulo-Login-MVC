<?php
    $pageName = "Cadastro de usuário";
    include("inc/head.inc.php");
?>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <style>

    body {
        font-family: Arial, sans-serif;
        line-height: 1.6;
        margin: 0;
        padding: 0;
        background-image: url('../public_html/assets/backgrounds/fundo.png'); 
        background-size: cover;
        background-position: center; 
        background-repeat: no-repeat;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh; 
    }


        main {
            max-width: 600px;
            width: 100%;
            margin: 20px;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        #alertMsg {
            display: block;
            margin-bottom: 20px;
            color: #d9534f;
            text-align: center;
        }

        #form-user-registration {
            margin-bottom: 20px;
        }

        #form-user-registration label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        #form-user-registration [type="password"]{
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        

        #form-user-registration [type="text"]{
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        #form-user-registration button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        #form-user-registration button:hover {
            background-color: #0056b3;
        }

        p a {
            color: #007bff;
            text-decoration: none;
        }

        p a:hover {
            text-decoration: underline;
        }

        hr {
            border: 0;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }

    </style>
</head>
<main>
    <h1>Seven Plus - <?=$pageName?></h1>
    <span id="alertMsg"></span>
    <div id="form-user-registration">
        <label>Nome:</label>
        <input type="text" name="user-name" id="user-name"  placeholder="Digite seu nome:"><br>
        <label>Email:</label>
        <input type="text" name="user-email" id="user-email"  placeholder="Digite seu email:"><br>
        <label>Senha:</label>
        <input type="password" name="user-password" id="user-password"  placeholder="Digite sua senha:"><br>
        <label>Confirmação de senha:</label>
        <input type="password" name="user-conf-password" id="user-conf-password"  placeholder="Confirme sua senha:"><br>

        <input type="hidden" name="fxUser" id="fxUser" value="fxUserRegistration">
        <button type="button" onclick="userRegistration()">Cadastrar</button>
    </div>
    <hr>
    <p>
        <a href="index.php">Login</a> | <a href="user-recovery-password.php">Recuperar senha</a>
    </p>
</main>

<script>
    function userRegistration() {
        let userName = $("#user-name").val();
        let userEmail = $("#user-email").val();
        let userPassword = $("#user-password").val();
        let userConfPassword = $("#user-conf-password").val();
        let fxUser = $("#fxUser").val();

        if (!userEmail || !userPassword || !userConfPassword) {
            Swal.fire({
                icon: 'warning',
                title: 'Atenção',
                text: 'Por favor, preencha todos os campos!',
            });
            return;
        }

        if (userPassword !== userConfPassword) {
            Swal.fire({
                icon: 'warning',
                title: 'Atenção',
                text: 'As senhas são diferentes!',
            });
            return;
        }

        $.ajax({
            url: "<?=$urlPrivate?>/controller/User.controller.php",
            method: "POST",
            async: true,
            data: {
                fxUser: fxUser,
                userName: userName,
                userEmail: userEmail,
                userPassword: userPassword,
                userConfPassword: userConfPassword
            }
        })
        .done(function (result) {
            if (result["status"]) {
                Swal.fire({
                    icon: 'success',
                    title: 'Sucesso',
                    text: result.msg,
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro',
                    text: result.msg,
                });
            }
        });
    }
</script>


<?php
    include("inc/footer.inc.php");
?>