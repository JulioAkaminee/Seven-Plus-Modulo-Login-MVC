<?php
    $pageName = "Entre e Curta";
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

    #form-user-login {
        margin-bottom: 20px;
    }

    #form-user-login label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }
    #form-user-login input[type="text"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    #form-user-login input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
    }

    #form-user-login button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        width: 100%;
    }

    #form-user-login button:hover {
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
    <div id="form-user-login">
        <label>Login/Email:</label>
        <input type="text" name="user-email" id="user-email" placeholder="Digite seu email:">
        <label>Senha:</label>
        <input type="password" name="user-password" id="user-password"  placeholder="Digite sua senha:" >
        
     

        <input type="hidden" name="fxUser" id="fxUser" value="fxLogin">
        <button type="button" onclick="userLogin()">Entre e Curta</button>
    </div>
    <hr>
    <p>
        <a href="user-recovery-password.php">Recuperar senha</a> | <a href="user-registration.php">Cadastro de usuário</a>
    </p>
    
</main>

<script>
    function userLogin() {
        let userEmail = $("#user-email").val();
        let userPassword = $("#user-password").val();
        let fxUser = $("#fxUser").val();

        if (!userEmail || !userPassword) {
            $("#alertMsg").text("Por favor, preencha todos os campos!");
            return;
        }

        // Ajax
        $.ajax({
            url: "<?=$urlPrivate?>/controller/User.controller.php",
            method: "POST",
            async: true,
            data: {
                fxUser: fxUser,
                userEmail: userEmail,
                userPassword: userPassword
            }
        })

        .done(function (result) {
            if (result["status"]) {
                // document.getElementById("alertMsg").innerHTML = result.msg;
                $("#alertMsg").html(result.msg);
            } else {
                $("#alertMsg").html(result.msg);
            }
        })
    }
</script>

<?php
    include("inc/footer.inc.php");
?>