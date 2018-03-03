
    <!--need to change the client id-->
    <meta charset="utf-8" name="google-signin-client_id" content="15930611023-cf8p6pqs595l5vs8lqh2eohovm0vggsh.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        if(sessionStorage.getItem('myUserEntity') == null){
            $("#loginText").html("Login");
        }
        else{
            $("#loginText").html("My Page");
        }
    });
    </script>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.html"><img src="img/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.html">Home
              </a>
                    </li>
                    <li class="nav-item active">

                        <a class="nav-link" href="product.php">Product
                <span class="sr-only">(current)</span>
              </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.html" id="loginText">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>