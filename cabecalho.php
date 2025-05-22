<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verifica se está na pasta admin ou na raiz
$path = (strpos($_SERVER['PHP_SELF'], '/admin/') !== false) ? "../" : "";
?>

<meta charset="UTF-8">
<link rel="stylesheet" href="<?php echo $path; ?>css/estilo.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="<?php echo $path; ?>index.php">
      <img src="<?php echo $path; ?>imagens/logo.png" alt="Zezinho Kids" width="50" class="me-2">
      <span class="fw-bold fs-4">Zezinho <span style="color:#00BFFF;">Kids</span></span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="<?php echo $path; ?>index.php">Início</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $path; ?>produtos.php">Produtos</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $path; ?>carrinho.php">Carrinho</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $path; ?>pedido.php">Pedidos</a></li>
        <?php if (isset($_SESSION['usuario'])) { ?>
          <?php if ($_SESSION['usuario']['tipo'] == 'admin') { ?>
            <li class="nav-item"><a class="nav-link" href="<?php echo $path; ?>admin/crud-produtos.php">Admin</a></li>
          <?php } ?>
          <li class="nav-item"><a class="nav-link" href="<?php echo $path; ?>logout.php">Sair</a></li>
        <?php } else { ?>
          <li class="nav-item"><a class="nav-link" href="<?php echo $path; ?>login.php">Login</a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>