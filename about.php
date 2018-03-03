<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Google Analytics -->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-114688921-1', 'auto');
        ga('send', 'pageview');
    </script>
    <!-- End Google Analytics -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bloom</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
<!--     <link href="css/heroic-features.css" rel="stylesheet"> -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/carousel.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <?php include 'navigation.php';?>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
        <header class="jumbotron my-4">
            <h1 class="display-4">About</h1>

        </header>

        <!-- Marketing messaging and featurettes
      ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <div class="row featurette">
                <div class="col-md-7">
                    <h2 class="featurette-heading">We are Bloom.<br/> <span class="text-muted">We provide a tea flower subscription box to your house.</span></h2>
                    <p class="lead">Our story began in 2011 in a small factory shop in the middle of Mexico City. With only one desk and next to no free time, our brand was born. Our passion for unique design and collaboration brought our vision, and products to life.
                        <br/>
                        <br/> We started making the products we wanted to see in the world and we did this with an uncompromising approach to sustainability and environmental affects. We promote our products because we believe in them and we stand behind our product.

                        <br/>
                        <br/> Our products bring together the finest materials and stunning design to create something very special. We believe in quality, care, and creating unique products that everyone can enjoy. Colorful, creative, and inspired by what we see everyday, each product represents what we love about the world we live in. We hope they’ll inspire you too.</p>
                </div>
                <div class="col-md-5">
                    <img class="featurette-image img-fluid mx-auto" src="./img/office.jpg" alt="Generic placeholder image">
                </div>
            </div>
           <!--  <hr class="featurette-divider"> -->

            <!-- <h2 class="featurette-heading">Who We Are</h2> -->
            <!-- Three columns of text below the carousel -->
            <!-- <div class="row">

                <div class="col-lg-4">

                    <img class="rounded-circle" src="./img/sehee.png" alt="Generic placeholder image" width="140" height="140">
                    <h2>Sehee Ahn</h2>
                    <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>

                </div> -->
                <!-- /.col-lg-4 -->
                <!-- <div class="col-lg-4">
                    <img class="rounded-circle" src="./img/leo.jpg" alt="Generic placeholder image" width="140" height="140">
                    <h2>Leo Lou</h2>
                    <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>

                </div> -->
                <!-- /.col-lg-4 -->
                <!-- <div class="col-lg-4">
                    <img class="rounded-circle" src="./img/moa.png" alt="Generic placeholder image" width="140" height="140">
                    <h2>Kaylie Son</h2>
                    <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>

                </div> -->
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->

            <hr>

            <div class="row featurette">
                <div class="col-md-7">
                    <div id="map"></div>
                </div>
                <div class="col-md-5">
                    <h2 class="featurette-heading">Our Location</h2>
                    <p class="lead">3700 Willingdon Avenue <br/>Burnaby, BC V5G 3H2
                        <br/>Phone: 604-434-1610<br/>
                        Fax: 604-430-1331<br/>
                        Toll-Free (Canada & U.S.) 1-866-434-1610</p>
                </div>
                <script>
                    function initMap() {
                        var bcit = {
                            lat: 49.250928,
                            lng: -123.0034159
                        };
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 10,
                            center: bcit
                        });
                        var marker = new google.maps.Marker({
                            position: bcit,
                            map: map
                        });
                    }
                </script>
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA62pMoGW2dar_GKz8hwFNIlLhp08r58E8&callback=initMap">
                </script>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-white">Copyright &copy; Bloom 2018</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>