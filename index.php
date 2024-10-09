<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.png">
    <title>Plataforma Tekoá - Conectando Tradições, Preservando Culturas.</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Righteous" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="assets/css/mediumish.css" rel="stylesheet">
</head>
<body>

<!-- Begin Nav
================================================== -->
<nav class="navbar navbar-toggleable-md navbar-light bg-white fixed-top mediumnavigation">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
        <!-- Begin Logo -->
        <a class="navbar-brand" style="width:50%;" href="index.php">
            <img src="assets/img/logomarca.png" style="width:159px; height:72px; max-height:42px;" alt="logo">
        </a>
        <!-- End Logo -->
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <!-- Begin Menu -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Início</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
            <!-- End Menu -->
            <!-- Begin Search -->
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search">
                <span class="search-icon"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M20.067 18.933l-4.157-4.157a6 6 0 1 0-.884.884l4.157 4.157a.624.624 0 1 0 .884-.884zM6.5 11c0-2.62 2.13-4.75 4.75-4.75S16 8.38 16 11s-2.13 4.75-4.75 4.75S6.5 13.62 6.5 11z"></path></svg></span>
            </form>
            <!-- End Search -->
        </div>
    </div>
</nav>
<!-- End Nav
================================================== -->

<!-- Begin Site Title
================================================== -->
<div class="container">
    <div class="mainheading">
        <h1 class="sitetitle">Plataforma Tekoá</h1>
        <p class="lead">
            Conectando Tradições, Preservando Culturas
        </p>
    </div>
<!-- End Site Title
================================================== -->

    <!-- Begin Featured
    ================================================== -->
    <section class="featured-posts">
        <div class="section-title">
            <h2><span>Saiba Mais</span></h2>
        </div>
        <div class="card-columns listfeaturedtag">

            <?php
            include('db.php');

            // Buscar conteúdos no banco
            $query = $pdo->query("SELECT * FROM conteudos ORDER BY data_publicacao DESC");
            $conteudos = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($conteudos as $conteudo):
            ?>
                <!-- begin post -->
                <div class="card">
                    <div class="row">
                        <div class="col-md-5 wrapthumbnail">
                            <a href="post.php?id=<?= $conteudo['id']; ?>">
                                <?php if ($conteudo['imagem']): ?>
                                    <div class="thumbnail" style="background-image:url(<?php echo $conteudo['imagem']; ?>);"></div>
                                <?php else: ?>
                                    <div class="thumbnail" style="background-image:url(assets/img/demopic/default.jpg);"></div> <!-- Imagem padrão caso não haja -->
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="col-md-7">
                            <div class="card-block">
                                <h2 class="card-title"><a href="post.php?id=<?= $conteudo['id']; ?>"><?php echo $conteudo['titulo']; ?></a></h2>
                                <h4 class="card-text"><?php echo nl2br($conteudo['resumo']); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end post -->
            <?php endforeach; ?>

        </div>
    </section>
    <!-- End Featured
    ================================================== -->

</div> <!-- .container -->
<!-- Footer -->
<footer class="footer">
    <div class="container">
        <p class="pull-left">
			 Copyright &copy; 2021 - 2024 Plataforma Tekoá - Plataforma Sem Fins Lucrativos
		</p>
		<p class="pull-right">	 
            Maintained By <a target="_blank" href="#">Dominium Connect - Sistemas de Informação</a>
		</p>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

