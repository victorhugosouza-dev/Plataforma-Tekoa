<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

include('../../../db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $categoria = $_POST['categoria'];
    $autor_id = $_SESSION['usuario_id'];

    // Upload de imagem
    $imagem = '';
    if (isset($_FILES['imagem'])) {
        $imagem_nome = time() . '_' . $_FILES['imagem']['name'];
        move_uploaded_file($_FILES['imagem']['tmp_name'], 'uploads/' . $imagem_nome);
        $imagem = 'uploads/' . $imagem_nome;
    }

    $query = $pdo->prepare("INSERT INTO conteudos (titulo, descricao, categoria, imagem, autor_id, data_publicacao) 
                            VALUES (:titulo, :descricao, :categoria, :imagem, :autor_id, NOW())");
    $query->bindParam(':titulo', $titulo);
    $query->bindParam(':descricao', $descricao);
    $query->bindParam(':categoria', $categoria);
    $query->bindParam(':imagem', $imagem);
    $query->bindParam(':autor_id', $autor_id);
    $query->execute();

    echo "Conteúdo adicionado com sucesso!";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Plataforma Tekoá | Criação de Conteúdo </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../../assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../assets/vendors/select2/select2.min.css">
    <link rel="stylesheet" href="../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
          <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
              <span class="icon-menu"></span>
            </button>
          </div>
          <div>
            <a class="navbar-brand brand-logo" href="../../index.html">
              <img src="../../assets/images/logo.png" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="../../index.html">
              <img src="../../assets/images/logo-mini.svg" alt="logo" />
            </a>
          </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top">
          <ul class="navbar-nav">
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
              <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">John Doe</span></h1>
              <h3 class="welcome-sub-text">Your performance summary this week </h3>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            
            <li class="nav-item dropdown d-none d-lg-block user-dropdown">
              <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="../../assets/images/faces/face8.jpg" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="../../assets/images/faces/face8.jpg" alt="Profile image">
                  <p class="mb-1 mt-3 fw-semibold">Allen Moreno</p>
                </div>
                <!-- <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-message-text-outline text-primary me-2"></i> Messages</a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-calendar-check-outline text-primary me-2"></i> Activity</a>
                <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a> -->
                <a class="dropdown-item" href="../../sair.php"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sair</a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="../../index.php">
                <i class="mdi mdi-grid-large menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item nav-category">Área de Criação</li>
            <li class="nav-item">
              <a class="nav-link" href="criarConteudo.php">
                <i class="menu-icon mdi mdi-file-document"></i>
                <span class="menu-title">Criar Conteúdo</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
              
              <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Criar Conteúdo</h4>
                    <form class="forms-sample" method="post" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="exampleInputName1">Titulo:</label>
                        <input type="text" class="form-control" name="titulo">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Descrição:</label>
                        <textarea class="form-control" name="descricao"  rows="4"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Categoria:</label>
                        <select class="form-select" name="categoria">
                          <option value="historia">História</option>
                          <option value="rituais">Rituais</option>
                          <option value="idiomas">Idiomas</option>
                          <option value="artefatos">Artefatos</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Imagem</label>
                        <input type="file" name="imagem" class="file-upload-default">
                        <div class="input-group col-xs-12">
                          <input type="text" class="form-control file-upload-info" disabled placeholder="">
                          <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Anexar</button>
                          </span>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Salvar</button>
                    </form>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Maintained By <a href="#" target="_blank">Dominium Connect - Sistemas de Informação</a></span>
              <span class="float-none float-sm-end d-block mt-1 mt-sm-0 text-center">Copyright © 2021 - 2024. All rights reserved.</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../../assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
    <script src="../../assets/vendors/select2/select2.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/template.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../assets/js/file-upload.js"></script>
    <script src="../../assets/js/typeahead.js"></script>
    <script src="../../assets/js/select2.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>