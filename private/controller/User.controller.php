<?php
    include("../model/User.model.php");

    // Configuração do "Header" para transmitir em JSON para o View
    header("Content-Type: Application/json");

    $fxUser = $_POST["fxUser"];

    $User = new User();

    switch($fxUser) {
        case "fxLogin":
            $userEmail    = $_POST["userEmail"];
            $userPassword = $_POST["userPassword"];
            $User->setUserEmail($userEmail);
            $User->setUserPassword($userPassword);     
            
            $result = $User->validatedLogin($fxUser);
        break;

        case "fxUserRegistration":
            $userName     = $_POST["userName"];
            $userEmail    = $_POST["userEmail"];
            $userPassword = $_POST["userPassword"];
            $userConfPassword = $_POST["userConfPassword"];

            if ($userPassword === $userConfPassword) {
                $User->setUserName($userName);
                $User->setUserEmail($userEmail);
                $User->setUserPassword($userPassword);
    
                $result = $User->validatedRegister($fxUser);
            } else {
                $result = [
                    "status" => false,
                    "msg"    => "<p>As senhas são diferentes!</p>"
                ];
            }
        break;

        case "fxUserRecoveryPassword":
            $userEmail = $_POST["userEmail"];

            $User->setUserEmail($userEmail);

            $result = $User->validatedEmail($fxUser);
        break;

        case "fxInsertNewPassword":
            $userEmail = $_POST["userEmail"];
            $userNewPassword = $_POST["userNewPassword"];
            $userConfNewPassword = $_POST["userConfNewPassword"];
            $idRec = $_POST["idRec"];
            
            if ($userNewPassword === $userConfNewPassword) {
                $User->setUserEmail($userEmail);
                $User->setUserNewPassword($userNewPassword);
                $User->setIdRec($idRec);
                $hash = $User->validateHash($userEmail);
        
                if ($hash === $idRec) {
                    $result = $User->updateNewPassword($userEmail, $userNewPassword);
                } else {
                    $result = [
                        "status" => false,
                        "msg"    => "<p>Hash inválido</p>",
                        "DBCOMP" => [
                            "Comprimento do hash do banco de dados" => strlen($hash),
                            "Comprimento do ID recebido"           => strlen($idRec),
                            "Hash do banco de dados"                => $hash,
                            "ID recebido"                           => $idRec
                        ]
                    ]; 
                    
                }
            } else {
                $result = [
                    "status" => false,
                    "msg"    => "<p>As senhas são diferentes!</p>"
                ];
            }
            break;
        
        
        

        default:
            $result = [
                "status" => false,
                "msg"    => "<p>Sistema indisponível :(<br>Tente mais tarde...</p>"
            ];
        break;
    }

    // Retorno em JSON para a View
    echo json_encode($result);

/*
    echo "<pre>";
    var_dump($User);
    echo "</pre>";
    echo "<pre>";
    var_dump($result);
    echo "</pre>";
*/
?>