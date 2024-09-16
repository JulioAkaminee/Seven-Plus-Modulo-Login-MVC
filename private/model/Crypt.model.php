<?php
    class Encrypt {
        protected $passOut;
        protected $hashOut;

        public function cryptPass(String $Cpass, String $Cemail) {
            // Criptografia da senha para validação do usuário
            $apiKey = "maçã";
            $apiKey = (md5($apiKey));
            $emailC = (md5($Cemail));
            $passC = (md5($Cpass));
            $passCP = (md5($apiKey.$emailC.$passC));
            $valorPass = "09";
            $saltPass = $passCP;
            $passCP = crypt($emailC, "$2b$" . $valorPass . "$" . $saltPass . "$");

            return $passOut = $passCP;
        }

        public function cryptHash(String $Cpass, String $Cemail) {
            // Criptografia de hash
            $apiKey = "maçã";
            $apiKey = (md5($apiKey));
            $emailC = (md5($Cemail));
            $dateTime = new DateTime(NULL, new DateTimeZone("America/Sao_Paulo"));
            $formattedDate = $dateTime->format("Y-m-s H-i-s");
            $passC = $Cpass.$formattedDate;
            $passC = (md5($passC));
            $hashCP = (md5($passC.$apiKey.$emailC));
            $valorPass = "08";
            $saltPass = $hashCP;
            $hashCP = crypt($emailC, "$2b$" . $valorPass . "$" . $saltPass . "$");

            return $hashOut = $hashCP;
        }
    }
?>