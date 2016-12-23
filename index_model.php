<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <!--Google Login Meta Tags-->
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="802478348342-ovn07tr2ulnqnqk06j94cga951pufnib.apps.googleusercontent.com">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500" rel="stylesheet">
    <!--jQuery UI-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!--Login Scripts (FB & Google)-->
<!--    <script src="facebook_login/facebook.js"></script>-->
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="google_login/g_login.js"></script>

    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <style>
        .affix {
            top: 212px;
        }
    </style>

</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid nav-menu">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" style="color: white" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar" style="color: white"></span>
                <span class="icon-bar" style="color: white"></span>
                <span class="icon-bar" style="color: white"></span>
            </button>
            <a class="navbar-brand toggle-nav" href="#" style="color: white"><i class="fa fa-bars"></i> Menu</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
<!--                <li class="fb-login-button"-->
<!--                         data-max-rows="1"-->
<!--                         data-size="large"-->
<!--                         data-show-faces="false"-->
<!--                         data-auto-logout-link="true">-->
<!--                </li>-->
                <li><a href="google_login/g_login.php">Feature Recipe</a></li>
                <li class="signIn"><a id="my-signin2" data-onsuccess="onSignIn"></a></li>
<!--                <li class="signOut"><a href="#" onclick="signOut();">Sign out</a></li>-->
            </ul>
        </div>
    </div>
</nav>
<div id="site-wrapper">
    <div id="site-canvas">
        <div id="site-menu" data-spy="affix" data-offset-top="205" >
            <a href="#" class="toggle-nav" style="color: pink; font-size: 20px;"><i class="fa fa-times"></i></a>
            <img src="images/fridge2plate.png" id="logo" width="100%"><br> <br>
            <form class="form-inline">
                <input type="text" class="form-control" placeholder="Enter your ingredients" size="30">
            </form>
            <br>
            <div class="panel-group" id="accordion" >
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="fa fa-shopping-basket"></i>&nbsp;&nbsp; <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"> Common Ingredients</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                        <div class="panel-body" id="ingredientButtons">
                            <button class="btn btn-info topIng" value="87">Eggs</button>
                            <button class="btn btn-info topIng" value="13" >Flour</button>
                            <button class="btn btn-info topIng" value="16" >Milk</button>
                            <button class="btn btn-info topIng" value="90" >Vegetable Oil</button>
                            <button class="btn btn-info topIng" value="183" >Tomatoes</button>
                            <button class="btn btn-info topIng" value="31" >Parmesan Cheese</button>
                            <button class="btn btn-info topIng" value="121" >Sugar</button>
                            <button class="btn btn-info topIng" value="110" >Chicken Broth</button>
                            <button class="btn btn-info topIng" value="61" >Onions</button>
                            <button class="btn btn-info topIng" value="48" >White Vinegar</button>
                        </div>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="fa fa-cutlery"></i>&nbsp; &nbsp;<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">My Recipes</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse in">
                        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat.
                        </div>
                    </div>
                </div>
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="fa fa-filter"></i>&nbsp;&nbsp;&nbsp;<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Dietary Restrictions </a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse in">
                        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. git Ut enim ad
                            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat.
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav nav-pills nav-stacked" >
                <li><a href="index.html">Home</a></li>
                <li><a href="#about">About Us</a></li>
            </ul>
        </div>
        <div class="container-fluid" id="main-container">
            <div class="row-container">
                <div class="col-sm-12">
                    <div class="jumbotron text-center ">
                        <img src="images/fridge2plate-jumbo.png" width="40%">
                        <p id="tagline">Bringing the best recipes to your home</p>
                        <form class="form-inline">
                            <input type="text" class="form-control" id="ingredientInput" size="50" placeholder="What's in your fridge?">
                            <button type="button" class="btn btn-danger">Go</button>
                        </form>
                        <img src="images/loading-food-animation.gif" id="loading">
                    </div>
                    <div class="container-fluid fridge"></div>    <!--fridge container-->
                    <div class="row-container">
                        <div id="stuff"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <!--Note:Modal cannot be placed inside nested divs, so move it outside of the main div-->
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">My Recipe</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                <img class=" .col-sm-4  pull-right showImage img-responsive" src="">
                <div class=".col-sm-5  ingContainer"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid footer-style text-center">
    <p> Website designed by Fridge2Plate. Recipe data provided by Spoonacular.  </p>
</footer>
</body>
</html>