<?php	
	session_start();

if (!isset($_COOKIE['idUsuario'])) {
      echo "<script>alert('Acesso negado!'); location.href='login.php';</script>"; 
      exit();   
  }
include_once "c/gatocontrole.php";
?>
<?php	


  // Cookie
  //$exp = time () + 3600;
  //setcookie ("dadosUsuario", "lucas", $exp);

  //echo "xxxxxxxxxxxxx";
  //echo $_COOKIE["dadosUsuario"];

?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">PWII</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="usuarioTabela.php">Usuários</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="gatoTabela.php">Gatos</a>
        </li>
      </ul>
    </div>
    <div class="form-inline my-2 my-lg-0">
      <label class="form-control mr-sm-2" readonly>
        <!-- Lendo os valores diretamente do $_COOKIE -->
        <img style="width: 35px; height: 35px; border-radius: 5px;" name='fotoUsuario' src='<?= (!empty($_COOKIE['foto'])) ? $_COOKIE['foto'] : "imagens/padrao.png" ?>'>
        <?= (!empty($_COOKIE['usuario'])) ? $_COOKIE['usuario'] : "visitante" ?>
      </label>
      <a class="btn btn-outline-danger my-2 my-sm-0" href="finalizarSessao.php">Sair</a>
    </div>
  </div>
</nav>

  