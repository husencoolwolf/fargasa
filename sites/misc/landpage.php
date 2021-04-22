<!DOCTYPE html>
<html lang="en">

<head>
    <title>FARGASA MOBILINDO</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="/assets/Fargasa Logo Circle.png" />
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </title>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <!--  Show this only on mobile to medium screens  -->
        <a class="navbar-brand d-lg-none" href="#">
            <img class="" src="/assets/Fargasa Logo Circle.png" alt="Dashboard" style="width: 80px">
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggle" aria-controls="navbarToggle" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!--  Use flexbox utility classes to change how the child elements are justified  -->
        <div class="collapse navbar-collapse justify" id="navbarToggle">

            <!--   Show this only lg screens and up   -->
            <a class="navbar-brand d-none d-lg-block" href="#">
                <img class="" src="/assets/Fargasa Logo Circle.png" alt="Dashboard" style="width: 80px">
            </a>
            <ul class="navbar-nav">
                <li class="nav-item px-3 ml-0">
                    <a class="nav-link active" href="#">CATALOG <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item px-3 ml-0">
                    <a class="nav-link" href="#">PROMO</a>
                </li>
                <li class="nav-item px-3 ml0">
                    <a class="nav-link" href="#">PROFIL</a>
                </li>
                <li class="nav-item px-3 ml0">
                    <a class="nav-link" href="#">HUBUNGI KAMI</a>
                </li>

                <button class="btn btn-dark my-2 my-sm-0 rounded-pill" type="button">LOGIN / REGISTER</button>
            </ul>
        </div>
    </nav>

    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="../public/img/aven.jpg" alt="First slide" style="height: 480px">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../public/img/aven.jpg" alt="Second slide" style="height: 480px">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="../public/img/aven.jpg" alt="Third slide" style="height: 480px">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    </div>

    <div class="container-fluid mt-4">
        <h4>Complex Gallery</h4>
        <div class="row d-inline-flex justify-content mx-xl-5">

            <div class="card m-2 " style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card with stretched link</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card with stretched link</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card with stretched link</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card with stretched link</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card with stretched link</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card with stretched link</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card with stretched link</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card with stretched link</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card with stretched link</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card with stretched link</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card with stretched link</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card with stretched link</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                </div>
            </div>
            <div class="card m-2" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Card with stretched link</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary stretched-link">Go somewhere</a>
                </div>
            </div>

        </div>
    </div>

</html>