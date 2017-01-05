<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 1/5/17
 * Time: 12:53 PM
 */
?>
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
                <!--<li class="fb-login-button"-->
                <!--data-max-rows="1"-->
                <!--data-size="large"-->
                <!--data-show-faces="false"-->
                <!--data-auto-logout-link="true">-->
                <!--</li>-->
                <li><a href="google_login/g_login.php">Feature Recipe</a></li>
                <li class="signIn"><a id="my-signin2" data-onsuccess="onSignIn"></a></li>
                <!--<li class="signOut"><a href="#" onclick="signOut();">Sign out</a></li>-->
                <script src="https://apis.google.com/js/platform.js" defer></script>
                <script src="g_login_root.js" defer></script>
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
                <input type="text" class="form-control ingredientInput"  size="30" placeholder="Enter your ingredients">
                <!--                <input type="text" class="form-control" placeholder="Enter your ingredients" size="30">-->
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

                        </div>
                    </div>
                </div>
                <!--
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <i class="fa fa-cutlery"></i>&nbsp; &nbsp;<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">My Recipes</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse in">
                         <div class="panel-body">
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit,
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
                       <div class="panel-body">
                           Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. git Ut enim ad
                            minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                            commodo consequat.
                        </div>
                    </div>
                </div>-->
            </div>
            <ul class="nav nav-pills nav-stacked" >
                <li><a href="index.html">Home</a></li>
                <li><a href="about/about.html">About Us</a></li>
                <li><a href=" http://devjournal.fridge2plate.com/" target="_blank">Our Blog</a></li>

            </ul>
        </div>
        <div class="container-fluid" id="main-container">
            <div class="row-container">
                <div class="col-sm-12">
                    <div class="jumbotron text-center ">
                        <img src="images/fridge2plate-jumbo.png" width="40%">
                        <p id="tagline">Making meals with ingredients you have</p>
                        <form class="form-inline">
                            <input type="text" class="form-control ingredientInput"  size="50" placeholder="What's in your fridge?">
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
                    <div class="  addthis_inline_share_toolbox_co79"></div>
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
