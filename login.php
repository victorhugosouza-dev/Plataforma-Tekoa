<?php
session_start();
include('db.php'); // Inclui conexão com o banco

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
    $query->bindParam(':email', $email);
    $query->execute();
    $usuario = $query->fetch(PDO::FETCH_ASSOC);

    if ($usuario && password_verify($senha, $usuario['senha'])) {
        $_SESSION['usuario_id'] = $usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['usuario_tipo'] = $usuario['tipo'];
        header('Location: admin/index.php');
    } else {
        echo "Login inválido!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Plataforma Tekoá | Login</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="./admin/assets/vendors/feather/feather.css">
    <link rel="stylesheet" href="./admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./admin/assets/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="./admin/assets/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="./admin/assets/vendors/typicons/typicons.css">
    <link rel="stylesheet" href="./admin/assets/vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="./admin/assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="./admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="./admin/assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="./admin/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo">
                  <img src="./admin/assets/images/logo.png" alt="logo">
                </div>
                <h4>Olá Redator(a)</h4>
                <h6 class="fw-light">Estamos felizes com sua contribuição.</h6>
                <form class="pt-3" method="post">
                  <div class="form-group">
                    <input type="email" class="form-control form-control-lg" id="" name="email" placeholder="E-mail Redator">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="" name="senha" placeholder="Senha Redator">
                  </div>
                  <div class="mt-3 d-grid gap-2">
                    <input type="submit" class="btn btn-block btn-primary btn-lg fw-medium auth-form-btn" value="ENTRAR">
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
                  </div>
                  <div class="text-center mt-4 fw-light"> Como faço para contribuir com o trabalho ? <a href="register.php" class="text-primary">Seja um redator</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="./admin/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="./admin/assets/js/off-canvas.js"></script>
    <script src="./admin/assets/js/template.js"></script>
    <script src="./admin/assets/js/settings.js"></script>
    <script src="./admin/assets/js/hoverable-collapse.js"></script>
    <script src="./admin/assets/js/todolist.js"></script>
    <!-- endinject -->
  </body>
</html>