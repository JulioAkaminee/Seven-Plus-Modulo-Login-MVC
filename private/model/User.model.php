<?php
    // Criando a Classe de Obj "User"
    class User {
        private $userName;
        private $userEmail;
        private $userPassword;
        private $userNewPassword;
        private $idRec;

        // Envio
        public function setUserName(String $userName) {
            $this->userName = $userName;
        }
        // Retorno
        public function getUserName() {
            return $this->userName;
        }


         // Envio
         public function setIdrec(String $idRec) {
            $this->idRec = $idRec;
        }
        // Retorno
        public function getIdRec() {
            return $this->idRec;
        }




        public function setUserEmail(String $userEmail) {
            $this->userEmail = $userEmail;
        }
        public function getUserEmail() {
            return $this->userEmail;
        }

        public function setUserPassword(String $userPassword) {
            $this->userPassword = $userPassword;
        }
        public function getUserPassword() {
            return $this->userPassword;
        }

        public function setUserNewPassword(String $userNewPassword) {
            $this->userNewPassword = $userNewPassword;
        }
        public function getUserNewPassword() {
            return $this->userNewPassword;
        }

        public function validatedLogin (String $fxUser) {
            require "../config/db/conn.php";
        
            $sql = "SELECT * FROM tbuser WHERE email = :userEmail";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":userEmail", $this->userEmail);
            $stmt->execute();
        
            $userEmailDB = "";
            $userPasswordDB = "";
           
        
            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $userEmailDB = $row["email"];
                $userPasswordDB = $row["password"];
                $idStatus = isset($row["idstatus"]) ? $row["idstatus"] : null;
            }
        
            include_once("Crypt.model.php");
            $Encryption = new Encrypt;
        
            $Cpass = $this->userPassword;
            $Cemail = $this->userEmail;
        
            $passCP = $Encryption->cryptPass($Cpass, $Cemail);
        
            if (
                ($userEmailDB == $this->userEmail) &&
                ($passCP === $userPasswordDB) &&
                ($idStatus == 2)
            ) {
                $result = [
                    "status"       => true,
                    "msg"          => "Usuário válido!",
                    "userEmail"    => $this->userEmail,
                    "userPassword" => $this->userPassword,
                    "senha gerada" => $passCP,
                    "senha banco"  => $userPasswordDB
                ];
            } else {
                $result = [
                    "status"       => false,
                    "msg"          => "Usuário email ou senha não válida!",
                    "userEmail"    => $this->userEmail,
                    "userPassword" => $this->userPassword
                ];
            }
        
            return $result;
        }
        
      

        public function validatedRegister (String $fxUser) {
            require("../config/db/conn.php");

           
            $sql = "SELECT * FROM tbuser WHERE email = :userEmail";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":userEmail", $this->userEmail);
            $stmt->execute();

            $userEmailDB = "";

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $userEmailDB = $row["email"];
            }

            if ($userEmailDB === $this->userEmail) {
                $result = [
                    "status"       => true,
                    "msg"          => "Usuário já cadastrado!",
                    "userName"     => $this->userName,
                    "userEmail"    => $this->userEmail,
                    "userPassword" => $this->userPassword
                ];
            } else {
                include_once("Crypt.model.php");
                $Encryption = new Encrypt;
                
                $Cpass = $this->userPassword;
                $Cemail = $this->userEmail;

                $passCP = $Encryption->cryptPass($Cpass, $Cemail);
                $hashCP = $Encryption->cryptHash($Cpass, $Cemail);

                $idStatus = 2;
                $idProfile = 1;

                $sql = ("INSERT INTO tbuser (email, password, hash, idStatus, idProfile)
                            VALUES (:email, :password, :hash, :idStatus, :idProfile)
                ");

                $stmt = $conn->prepare($sql);

                $stmt->bindParam(":email", $Cemail);
                $stmt->bindParam(":password", $passCP);
                $stmt->bindParam(":hash", $hashCP);
                $stmt->bindParam(":idStatus", $idStatus);
                $stmt->bindParam(":idProfile", $idProfile);

                $stmt->execute();

                $idUser = $conn->lastInsertId();

                $result = [
                    "status"       => true,
                    "msg"          => "Usuário cadastrado!",
                    "userName"     => $this->userName,
                    "userEmail"    => $this->userEmail,
                    "userPassword" => $this->userPassword,
                    "senha gerada" => $passCP,
                    "idStatus"     => $idStatus,
                    "idProfile"    => $idProfile,
                    "hash"         => $hashCP
                ];
            }

            return $result;
        }

        public function validatedEmail (String $fxUser) {
            require("../config/db/conn.php");

            $sql = "SELECT email, hash FROM tbuser WHERE email = :userEmail";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":userEmail", $this->userEmail);
            $stmt->execute();

            $userEmailDB = "";
            $hash = "";

            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $userEmailDB = $row["email"];
                $hash = $row["hash"];
            }

            if ($userEmailDB === $this->userEmail) {
                $url = "http://localhost/projeto-sevenplus-tii07/public_html/insert-new-password.php?idRec=$hash";
                $result = [
                    "status" => true,
                    "msg"    => "
                        <div style='font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;'>
                            <div style='max-width: 600px; margin: 0 auto; background-color: #fff; padding: 20px; border: 1px solid #ddd; border-radius: 5px;'>
                                <h2 style='color: #333;'>Recuperação de Senha</h2>
                                <p>Solicitação de alteração de senha para o e-mail: <strong>$this->userEmail</strong></p>
                                <p>Para alterar sua senha, clique no link abaixo:</p>
                                <p style='text-align: center;'>
                                    <a href='$url' style='background-color: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>Alterar Senha</a>
                                </p>
                                <p>Ou copie e cole este link no seu navegador:</p>
                                <p style='word-wrap: break-word;'>
                                    <a href='$url'>$url</a>
                                </p>
                                <p style='color: #888;'>Se você não solicitou esta alteração, ignore este e-mail.</p>
                            </div>
                        </div>
                    "
                ];
            } else {
                $result = [
                    "status"    => false,
                    "msg"       => "Email não encontrado!",
                    "userEmail" => $this->userEmail
                ];
            }
            

         
            return $result;
        }
        public function updateNewPassword(String $fxUser) {
            
            require("../config/db/conn.php");
        
            
            $sql = "SELECT idUser, email, hash FROM tbuser WHERE email = :userEmail AND hash = :idRec";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(":userEmail", $this->userEmail);
            $stmt->bindParam(":idRec", $this->idRec);
            $stmt->execute();
        
            
            $result = [
                "status" => false,
                "msg" => "<p>ERRO ao alterar senha!</p>",
                "userEmail" => $this->userEmail,
                "idRec" => $this->idRec
            ];
        
            if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $idUserDB = $row["idUser"];
                $userEmailDB = $row["email"];
                $hashDB = $row["hash"];
        
                if ($userEmailDB === $this->userEmail && $hashDB === $this->idRec) {
        
                    include_once("Crypt.model.php");
                    $Encryption = new Encrypt;
                    
                    $Cpass = $this->userNewPassword;
                    $Cemail = $this->userEmail;

                    $passCP = $Encryption->cryptPass($Cpass, $Cemail);
                    $hashCP = $Encryption->cryptHash($Cpass, $Cemail);

                    $sql = "UPDATE tbuser SET password = :newPassword, hash = :newHash WHERE idUser = :idUser";
                    $stmt = $conn->prepare($sql);
                    
                    
                   
        
      
                    $stmt->bindParam(":newPassword", $passCP);
                    $stmt->bindParam(":newHash", $this->idRec); 
                    $stmt->bindParam(":idUser", $idUserDB);
                    $stmt->execute();
        
                    
                    $result = [
                        "status" => true,
                        "msg" => "Senha alterada com sucesso!",
                        "userEmail" => $this->userEmail,
                        "idRec" => $this->idRec
                    ];
                } else {
               
                    $result = [
                        "status" => false,
                        "msg" => "Erro ao alterar senha!",
                        "userEmail" => $this->userEmail,
                        "idRec" => $this->idRec
                    ];
                }
            }
        
            return $result;
        }
        

  
        
        public function validateHash(string $email) {
      
            require("../config/db/conn.php");
            
          
            if (!$conn) {
                die("Conexão com o banco de dados falhou.");
            }
            
          
            $sql = "SELECT hash FROM tbuser WHERE email = :email";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            
           
            $stmt->execute();
            
        
            $hash = $stmt->fetchColumn();
            
           
            
            return $hash;
        }

    }
    
?>