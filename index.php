<?php
//$root =  $_SERVER["DOCUMENT_ROOT"];
$root = dirname(__FILE__); 

require $root.'/php/database.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-commerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Raleway:400,300,500,700,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" type="text/css">
	<link rel="stylesheet" href="style/style.css">
	<link rel="stylesheet" href="style/responsive.css">
</head>
<body>
	<?php include './header.php';?>	
	<div class="navigation">
        <nav class="navbar navbar-theme">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>
			<div id="nav"></div>
		</div><!-- /.container-fluid -->
      </nav>
	</div>
	<div class="slider">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-8">
                    <div class="slider big-slider">
                        <div id="featured" class="carousel slide" data-ride="carousel">
                          <!-- Wrapper for slides -->
                          <div class="carousel-inner" role="listbox">
                            <div class="item active" style="background-image:url('img/index_banner1.jpg')">
                               <div class="carousel-caption">
                                    <h4></h4>
                                    <h2 class="raleway"></h2>
                                    <a href="" class="btn btn-theme">Shop Now</a>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="slider small-slider">
                        <div id="small-featured" class="carousel slide" data-ride="carousel">
                          <!-- Wrapper for slides -->
                          <div class="carousel-inner" role="listbox">
                            <div class="item active" style="background-image:url('img/banner3.jpg')">
                               <div class="carousel-caption">
                                    <h3></h3>
                                    <p></p>
                                    <a href="" class="btn btn-theme">Shop Now</a>
                                </div>
                            </div>
                          </div>
                        </div>
                    </div>
                </div> <!--End of col-md-4-->
            </div> <!--End of row-->
        </div> <!--End of container-->
    </div> <!--End of slider-->
<div class="about">
	<h2>Website Features</h2>
		<li>1. Admin console that allows the user to create and populate every data: product, categories, sub-categories, color, and type</li>
		<li>2. Category pages with filter functionality</li>
		<li>3. Pop-up cart for managing checkout items by customer</li>
	<br />
	<h4>Built Using:</h4>
	<p>Vue.js, PHP, Javascript, jQuery, MySQL.</p>
	<p>(* Vue.js was used primarily for the cart feature, and partly for the filter and the Admin console)</p>
	<br />
	<h4>Please note that the following are not implemented:</h4>
		<li>1. Full check-out functionality</li>
		<li>2. User management</li>
	<br />
	<p>Source available on <a href="https://github.com/junhayu/E-commerce">github.com/junhayu/E-commerce</a></p>
</div>
	
<?php include './footer.php';?>		
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>	
	<script src="./js/vue.js"></script>
	<script src="./js/nav.js"></script>
	<?php require './cart.php';?>
	<script src="./js/cartIconText.js"></script>
	<script src="./js/cart.js"></script>
</body>
</html>