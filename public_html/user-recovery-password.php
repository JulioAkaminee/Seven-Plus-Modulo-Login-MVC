<?php
    $pageName = "Recuperar senha";
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

    #form-user-login, #form-user-recovery-password {
        margin-bottom: 20px;
    }

    #form-user-login label, #form-user-recovery-password label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

      #form-user-login input[type="text"], #form-user-recovery-password input[type="text"] {
        width: calc(100% - 22px);
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    #form-user-login input[type="text"], #form-user-recovery-password input[type="text"] {
        width: calc(100% - 22px);
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    #form-user-login button, #form-user-recovery-password button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
    }

    #form-user-login button:hover, #form-user-recovery-password button:hover {
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
    <div id="form-user-recovery-password">
        <label>Email:</label>
        <input type="text" name="user-email" id="user-email"  placeholder="Digite seu email:">

        <input type="hidden" name="fxUser" id="fxUser" value="fxUserRecoveryPassword">
        <button type="button" onclick="userRecoveryPassword()">Enviar</button>
    </div>
    <hr>
    <p>
        <a href="index.php">Login</a> | <a href="user-registration.php">Cadastrar usuário</a>
    </p>
</main>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<script>
    function userRecoveryPassword() {
        let userEmail = $("#user-email").val();
        let fxUser = $("#fxUser").val();

        if (!userEmail) {
            Swal.fire({
                icon: 'warning',
                title: 'Atenção',
                text: 'Por favor, preencha todos os campos!',
            });
            return;
        }

        $.ajax({
            url: "<?=$urlPrivate?>/controller/User.controller.php",
            method: "POST",
            async: true,
            data: {
                userEmail: userEmail,
                fxUser: fxUser
            }
        })
        .done(function (result) {
            if (result["status"]) {
                Swal.fire({
                    html: result.msg
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