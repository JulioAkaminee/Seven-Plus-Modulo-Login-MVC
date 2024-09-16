<?php
    // Define o fuso horário com o script do PHP.
    date_default_timezone_set('America/Sao_Paulo');

    // Definindo a configuração para a conexão com o banco de dados.
    $DBserver = "127.0.0.1:3306";
    $DBname = "dbsevenplus_tii07";
    $DBuserName = "root";
    $DBpassword = "";

    // Tenta criar uma instância da classe PDO para se conectar com o banco de dados.
    try {
        // O construtor da classe PDO recebe três parâmetros:
        // 1 - String de conexão, que inclui o endereço do servidor e o nome do banco de dados.
        // 2 - O nome de usuário para autenticação.
        // 3 - A senha para autenticação.
        $conn = new PDO(
            "mysql:host=$DBserver;dbname=$DBname",
            $DBuserName, $DBpassword
        );

        // Configura o PDO para lançar exceções (ERROS) quando ocorrer um problema, o que facilita a detecção e o tratamento de erros.
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //echo "Conectado ao banco de dados";

      // Captura exceções, se ocorrer um erro ao tentar conectar-se com o banco de dados.
    } catch (PDOException $e) {
        // Exibe uma mensagem com a descrição do erro.
        // echo "ERRO: " . $e->getMessage();
    }
?>