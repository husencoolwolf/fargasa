<?php
$dir = "/assets/imk/cars/";
$gambar = array("[4]2 april.png","[3] 24 jun.jpg","[02] 5 agustus.jpeg","[01] 11 nov.jpg");

?>
<!DOCTYPE html>
<html>
<head>
	<title>	</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="icon" type="image/png" href="/assets/logo eresha.jpg" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/dist/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="imk-style.css">
    <link rel="stylesheet" href="/dist/font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #5b4a9b;">
	  <div class="container">
	  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
		    <a class="navbar-brand" href="#">
		    	<img src="/assets/logo eresha.jpg" style="width:40px;display: inline;">
		    	<p style="display: inline;">STMIK ERESHA</p>
		    </a>
		    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
		      <li class="nav-item active">
		        <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Berita Terbaru
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		          <a class="dropdown-item" href="#">Action</a>
		          <a class="dropdown-item" href="#">Another action</a>
		          <a class="dropdown-item" href="#">Something else here</a>
		        </div>
		      </li>
		      <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Arsip
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
		          <a class="dropdown-item" href="#">Action</a>
		          <a class="dropdown-item" href="#">Another action</a>
		          <a class="dropdown-item" href="#">Something else here</a>
		        </div>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Download</a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">DLL</a>
		      </li>
		    </ul>
		    <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
		    </form>
		  </div>
		</div>
	</nav>

	<div class="my-5"></div>
	<div class="bg-light p-5">
	<div class="container">
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
	  <ol class="carousel-indicators">
	    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
	    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
	  </ol>
	  <div class="carousel-inner">
	    <div class="carousel-item active">
	      <img class="d-block w-100" src="<?php echo ($dir.$gambar[0]);?>" alt="First slide" style="height: 80%;">
	      <div class="carousel-caption d-none d-md-block">
		    <h5>PMB Eresha</h5>
		    <p>02 April 2020</p>
		  </div>
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="<?php echo ($dir.$gambar[1]);?>" alt="Second slide">
	      <div class="carousel-caption d-none d-md-block">
		    <h5>Program Studi</h5>
		    <p>24 Juni 2020</p>
		  </div>
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="<?php echo ($dir.$gambar[2]);?>" alt="Third slide">
	      <div class="carousel-caption d-none d-md-block">
		    <h5>...</h5>
		    <p>...</p>
		  </div>
	    </div>
	    <div class="carousel-item">
	      <img class="d-block w-100" src="<?php echo ($dir.$gambar[3]);?>" alt="Third slide">
	      <div class="carousel-caption d-none d-md-block">
		    <h5></h5>
		    <p></p>
		  </div>
	    </div>
	  </div>
	  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	</div>
	</div>
	</div>



	<div class="my-5"></div>
	<div class="bg-secondary p-4" style="height: 100%;">
	
		<div class="jumbotron" style="width: 80%;">
		  <h1 class="display-4">Hello, world!</h1>
		  <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
		  <hr class="my-4">
		  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		  proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>
		  <p class="lead">
		    <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
		  </p>
		</div>
	</div>

	<footer style="background-color: #5b4a9b;" class="p-4 mt-4">
		<h6 class="text-white">Hubungi Kami :</h6>
		<button class="btn btn-link collapsed border rounded-circle">
			<i class="fa fa-facebook" aria-hidden="true"></i>
		</button>
		<button class="btn btn-link collapsed border rounded-circle">
			<i class="fa fa-twitter" aria-hidden="true"></i>
		</button>
		<div class="text-center text-white"><p>Production By Sasmita Jaya Group</p></div>
	</footer>

	
	


</body>
	<script src="/dist/js/jquery-3.5.1.js"></script>
    <script src="/dist/js/bootstrap.js"></script>
</html>





    