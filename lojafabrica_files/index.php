<?php
session_start();
  $headerLess = ['enviaPedido'];
  $unlogged = ['','home.php', 'admProdutos'];
  $fileImport = 'pages/home.php';
  $url = (isset($_GET['url'])) ? $_GET['url']:'home.php';
  $url = (explode('/',$url));
  if ($url[0] != 'home.php') {
      $file = 'pages/' . $url[0] . '.php';
      if(is_file($file)){
        $fileImport = $file;
      }else{
        $fileImport = 'errors/404.php';
      }
  }
  if (in_array($url[0], $headerLess)){
    include $fileImport;
    exit;
  }
  
  if (!in_array($url[0], $unlogged)){
    
    if (!isset($_SESSION['lojafabrica_administrador']) ){
      header("location: ./admProdutos");
      exit;
    }
    
  }
?>

<html lang="pt-br">
    <head>
        <?php
            include('functions.php');
        ?>
        <title>Fabrica 4.0</title>
        <meta charset="UTF-8">
        <!-- CSS only -->
        <link href="<?php echo SITE_ROOT ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- JavaScript Bundle with Popper -->
        <script src="<?php echo SITE_ROOT ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo SITE_ROOT ?>assets/jQuery/jquery-3.2.1.slim.min.js"></script>
        <!-- Custom CSS -->
        <link href="<?php echo SITE_ROOT ?>assets/style.css" rel="stylesheet">
        <style>
          .image-header {
            width: 100%;
            height: 300px;
            background-image: url('<?php echo SITE_ROOT ?>img/banner.png');
            background-size: cover;
            background-position: center center;
          }
        </style>
    </head>
    <body>

    <div class="backdrop row" id="onlyBackdrop">
      <div class="col-12 m-auto">
        <div class="text-center">
          <div class="spinner-border text-light" role="status" style="height: 100px; width: 100px">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
      </div>
    </div>

    <script>
      $( document ).ready(function() {
        var element = document.getElementById("onlyBackdrop");
        element.classList.add("fade-out");
        setTimeout(function() {
          element.classList.add("hide");
        }, 1000);
      });

    </script>


      <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo SITE_ROOT ?>">Fábrica 4.0</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="<?php echo SITE_ROOT ?>">Início</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo SITE_ROOT ?>produtos">Produtos</a>
              </li>
            </ul>
            <div class="d-flex" role="search">
                <?php
                  if (isset($_SESSION['lojafabrica_administrador']['n_administrador_administrador'])){
                    ?>
                      <i class='m-auto' style='margin-right: 10px !important'>Bem vindo <?php echo $_SESSION['lojafabrica_administrador']['s_nome_administrador'] ?> (<a href="<?php echo SITE_ROOT ?>admProdutos/logout">Logout</a>)</i>
                    <?php
                  }
                ?>
                <a class="btn btn-secondary" href="<?php echo SITE_ROOT ?>admProdutos">Administração dos produtos</a>
            </div>
          </div>
        </div>
      </nav>

          <?php include $fileImport ?>

        <footer class="footer text-light mt-3 pt-4 pb-2 rounded-top">
          <div class="container">
            <div class="row">
              <div class="col-md-3 col-12 row text-center">
                <img class="img-fluid logo-centro m-auto" src="<?php echo SITE_ROOT ?>img/logo_centro_transparente.png"/>
              </div>
              <div class="col-md-9 col-12 row text-center text-md-start">
                <div class="col-12 mt-auto mb-auto">
                  <h1 class="text-white">
                    Centro de treinamento e desenvolvimento da Indústria 4.0
                  </h1>
                  <p class="m-1 text-light">
                    Rua Doutor Jose Americo Cançado Bahia, 75
                  </p>
                  <p class="m-1">
                    Cidade Industrial
                  </p>
                  <p class="m-1">
                    Contagem/MG
                  </p>
                </div>
              </div>
            </div>
          </div>
        </footer>
        

    </body>
</html>