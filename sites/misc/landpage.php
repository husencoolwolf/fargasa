<!DOCTYPE html>
<html>
<head>
	<title>FARGASA MOBILINDO</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="css/style.css"/> -->
    <link rel="icon" type="image/png" href="/assets/Fargasa Logo Circle.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/dist/css/bootstrap.css">
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-light bg-light">
        <a class="navbar-brand" id="brandMobile" href="/">
          <img class="" src="/assets/Fargasa Logo Circle.png" alt="Dashboard" style="width: 80px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav mx-auto">
            <li class="nav-item">
              <a class="nav-link" href="/">CATALOG</a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link" href="#">PROMO</a>
            </li>
          </ul>
          <ul class="navbar-nav mx-auto">
            <li class="nav-item px-3" id="brandPC">
              <a class="navbar-brand" href="/">
			          <img class="" src="/assets/Fargasa Logo Circle.png" alt="Dashboard" style="width: 80px">
			        </a>
            </li>
          </ul>
          <ul class="navbar-nav mx-auto">
            <li class="nav-item px-3 dropdown">
              <a class="nav-link" href="#">PROFIL</a>
            </li>
            <li class="nav-item px-3">
              <a class="nav-link" href="#">Hubungi Kami</a>
            </li>
          </ul>
          
            
        </div>
      </nav>


  	<script src="/dist/js/jquery-3.5.1.js"></script>
    <script src="/dist/js/bootstrap.js"></script>
</body>
<script>
	if ($(window).width() < 768) {
   		$('#brandMobile').show();
		$('#brandPC').hide();
	}
	else {
	   	$('#brandPC').show();
		$('#brandMobile').hide();
	}
</script>
</html>

<a href="/?action=login">Login</a>