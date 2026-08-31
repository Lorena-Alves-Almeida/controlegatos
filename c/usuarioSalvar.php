<?php      
include_once "../m/usuarioCRUD.php";
include_once "../m/util.php";

$idUsuario = $_POST['idUsuario'] ?? 0;
$usuario = $_POST['usuario'] ?? '';
$senha = $_POST['senha'] ?? '';
$foto = $_POST['imagemFoto'] ?? 'imagens/padrao.png';

if (isset($_FILES["arquivoFoto"]) && $_FILES["arquivoFoto"]["error"] === UPLOAD_ERR_OK) {
    if (!empty($_FILES["arquivoFoto"]["name"])) {
        $foto = armazenarArquivo($_FILES["arquivoFoto"]);
    }   
}

$sucesso = salvarUsuario($idUsuario, $usuario, $senha, $foto);

if ($sucesso) {
    echo "<script>alert('Cadastro realizado com sucesso!');</script>";
    echo "<script>window.location.replace('../usuarioTabela.php');</script>";
} else {
    echo "<script>alert('Erro ao cadastrar registro');</script>";
    echo "<script>window.location.replace('../usuarioFormulario.php');</script>";     
}
?>