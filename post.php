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
<link href="https://fonts.googleapis.com/css?family=Righteous%7CMerriweather:300,300i,400,400i,700,700i" rel="stylesheet">
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
	<a class="navbar-brand" href="index.php">
	<img src="assets/img/logomarca.png" style="width:159px; height:72px; max-height:42px;" alt="logo">
	</a>
	<!-- End Logo -->
	<div class="collapse navbar-collapse" id="navbarsExampleDefault">
		<!-- Begin Menu -->
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
			<a class="nav-link" href="index.php">Início <span class="sr-only">(current)</span></a>
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


<?php
	include('db.php');

	if(isset($_GET['id'])){
		$id = $_GET['id'];
	}else{
		header('Location: index.php');
	}

	// Buscar conteúdos no banco
	$query = $pdo->query("SELECT * FROM conteudos WHERE id='$id'");
	$conteudos = $query->fetchAll(PDO::FETCH_ASSOC);

	foreach ($conteudos as $conteudo):
		$titulo = $conteudo['titulo'];
		$descricao = $conteudo['descricao'];
		$imagem = $conteudo['imagem'];
	endforeach;
?>

<!-- Begin Article
================================================== -->
<div class="container">
	<div class="row">
		<!-- Begin Post -->
		<div class="col-md-8 col-md-offset-2 col-xs-12">
			<div class="mainheading">

				<h1 class="posttitle"><?= $titulo; ?></h1>

			</div>

			<!-- Begin Featured Image -->
			<img class="featured-image img-fluid" src="<?= $imagem; ?>" alt="">
			<!-- End Featured Image -->

			<!-- Begin Post Content -->
			<div class="article-post">
				<!-- <p>
					Holy grail funding non-disclosure agreement advisor ramen bootstrapping ecosystem. Beta crowdfunding iteration assets business plan paradigm shift stealth mass market seed money rockstar niche market marketing buzz market.
				</p>
				<p>
					Burn rate release facebook termsheet equity technology. Interaction design rockstar network effects handshake creative startup direct mailing. Technology influencer direct mailing deployment return on investment seed round.
				</p>
				<p>
					 Termsheet business model canvas user experience churn rate low hanging fruit backing iteration buyer seed money. Virality release launch party channels validation learning curve paradigm shift hypotheses conversion. Stealth leverage freemium venture startup business-to-business accelerator market.
				</p>
				<blockquote>
					Gen-z strategy long tail churn rate seed money channels user experience incubator startup partner network low hanging fruit direct mailing. Client backing success startup assets responsive web design burn rate A/B testing metrics first mover advantage conversion.
				</blockquote>
				<p>
					Freemium non-disclosure agreement lean startup bootstrapping holy grail ramen MVP iteration accelerator. Strategy market ramen leverage paradigm shift seed round entrepreneur crowdfunding social proof angel investor partner network virality.
				</p> -->
				<?= $descricao; ?>
			</div>
			<!-- End Post Content -->

			<!-- Begin Tags -->
			<!-- <div class="after-post-tags">
				<ul class="tags">
					<li><a href="#">Design</a></li>
					<li><a href="#">Growth Mindset</a></li>
					<li><a href="#">Productivity</a></li>
					<li><a href="#">Personal Growth</a></li>
				</ul>
			</div> -->
			<!-- End Tags -->

		</div>
		<!-- End Post -->

	</div>
</div>
<!-- End Article
================================================== -->

<div class="hideshare"></div>

<!-- Begin Related
================================================== -->
<div class="graybg">
	<div class="container">
		<div class="row listrecent listrelated">

			<?php
				// Buscar conteúdos no banco
				$query = $pdo->query("SELECT * FROM conteudos ORDER BY data_publicacao DESC LIMIT 3");
				$conteudos = $query->fetchAll(PDO::FETCH_ASSOC);

				foreach ($conteudos as $conteudo):
					$titulo = $conteudo['titulo'];
					$imagem = $conteudo['imagem'];
			?>

			<!-- begin post -->
			<div class="col-md-4">
				<div class="card">
					<a href="post.php?id=<?= $conteudo['id']; ?>">
					<img class="img-fluid img-thumb" src="<?= $imagem; ?>" alt="">
					</a>
					<div class="card-block">
						<h2 class="card-title"><a href="post.php?id=<?= $conteudo['id']; ?>"><?= $titulo; ?></a></h2>
					</div>
				</div>
			</div>
			<!-- end post -->
			
			<?php endforeach; ?>


		</div>
	</div>
</div>
<!-- End Related Posts
================================================== -->

<!-- Begin AlertBar
================================================== -->
<!-- <div class="alertbar">
	<div class="container text-center">
		<img src="assets/img/logo.png" alt=""> &nbsp; Never miss a <b>story</b> from us, get weekly updates in your inbox. <a href="#" class="btn subscribe">Get Updates</a>
	</div>
</div> -->
<!-- End AlertBar
================================================== -->

<!-- Begin Footer
================================================== -->
<div class="container">
	<div class="footer">
		<p class="pull-left">
			 Copyright &copy; 2021 - 2024 Plataforma Tekoá - Plataforma Sem Fins Lucrativos
		</p>
		<p class="pull-right">
			Maintained By <a target="_blank" href="#">Dominium Connect - Sistemas de Informação</a>
		</p>
		<div class="clearfix">
		</div>
	</div>
</div>
<!-- End Footer
================================================== -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="assets/js/mediumish.js"></script>
</body>
</html>
