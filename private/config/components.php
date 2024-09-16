<?php
/*
    Devido as restrições administrativas entre Senac e Xampp não será possível algumas configurações por segurança.
        
    $urlPrivate = "http://localhost/projeto-sevenplus-tii07/private/config";
    include_once("$urlPrivate/db/conn.php");
    include_once("$urlPrivate/global.php");

    Terá que liberar o acesso LER/GRAVAR/MODIFICAR - Em suas pastas e arquivos.
*/

    // Acessando o arquivo direto pelo caminho da máquina
    $pathFilePrivate = "C:/xampp/htdocs/projeto-sevenplus-tii07/private/config";
    include_once("$pathFilePrivate/db/conn.php");
    include_once("$pathFilePrivate/global.php");
?>