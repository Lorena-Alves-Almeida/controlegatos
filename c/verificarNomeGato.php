<?php
// 1. Conecte ao seu banco de dados
$conexao = mysqli_connect("localhost", "usuario", "senha", "nome_do_banco");

// 2. Pegue o nome enviado pelo formulário
$nomeGato = $_POST['NmGato'];

// 3. Procure no banco
$sql = "SELECT id FROM gatos WHERE NmGato = '$nomeGato'";
$resultado = mysqli_query($conexao, $sql);

// 4. Se encontrar alguma linha, o nome já existe (retorna false para o jQuery)
if(mysqli_num_rows($resultado) > 0) {
    echo "false";
} else {
    echo "true";
}
?>