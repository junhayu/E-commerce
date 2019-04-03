<?php
session_start();

$name = isset($_GET['name']) ? $_GET['name'] : ''; 
$pid = isset($_GET['pid']) ? $_GET['pid'] : ''; 
$menuName = (isset($_GET['menuName']))? $_GET['menuName']: '';
$categoryName = (isset($_GET['categoryName']))? $_GET['categoryName'] : '';
$path =  (isset($_GET['path'])) ? $_GET['path'] : '';
$price = isset($_GET['price']) ? (float)$_GET['price'] : 0;
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
	<link rel="stylesheet" href="style/product.css">
</head>

<body>
<?php include './header.php';?>	
	<div class="navigation">
        <nav class="navbar navbar-theme">
          <div class="container">
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
 <div class="breadcumbs">
        <div class="container">
            <div class="row">
                <span>Home > </span>
                <span><?php echo $menuName;?> > </span>
                <span><?php echo $categoryName;?> > </span>
                <span><?php echo $name;?></span>
            </div>
        </div>
    </div>  
    <div class="short-description">

        <div class="container">

            <div class="row">

                <div class="col-md-6">

                    <div class="product-thumbnail">

                        <div class="col-md-2 col-sm-2 col-xs-2">

                            <ul class="thumb-image">

                                <li class="active"><a href="<?php echo $path;?>"><img src="<?php echo $path;?>" alt=""></a></li>

                                <li><a href="<?php echo $path;?>"><img src="<?php echo $path;?>" alt=""></a></li>

                                <li><a href="<?php echo $path;?>"><img src="<?php echo $path;?>" alt=""></a></li>

                                <li><a href="<?php echo $path;?>"><img src="<?php echo $path;?>" alt=""></a></li>

                                <li><a href="<?php echo $path;?>"><img src="<?php echo $path;?>" alt=""></a></li>

                            </ul>

                        </div>

                        <div class="col-md-10 col-sm-10 col-xs-10">

                            <div class="thumb-main-image"><a href=""><img src="<?php echo $path;?>" alt=""></a></div>

                        </div>

                    </div>

                    <div class="clearfix"></div>

                </div>

                <div class="col-md-6">

                    <h1 class="product-title"><?php echo $name; ?></h1>

                    <div class="ratings">

                        <i class="fa fa-star"></i>

                        <i class="fa fa-star"></i>

                        <i class="fa fa-star"></i>

                        <i class="fa fa-star"></i>

                        <i class="fa fa-star"></i>

                        <span class="vote-count">0 vote</span>

                    </div>

                    <div class="product-info">

                        <span class="product-id"><span class="strong-text">Product ID:</span> RST <?php echo $pid; ?></span>

                        

                        <span class="product-avilability"><span class="strong-text">Availability:</span> In Stock</span>

                    </div>

                    <p class="short-info">Lorem ipsum dolor sit amet, feugiat delicata liberavisse id cum, no quo maiorum intellegebat, liber regione eu sit. Mea cu case ludus integre, vide viderer eleifend ex mea. His at soluta regione diceret, cum et atqui placerat petentium. Lorem ipsum dolor sit amet, feugiat delicata liberavisse id cum, no quo maiorum intellegebat, lie diceret, cum et atqui placerat petentium.</p>

                    <div class="price">

                        <span>$<?php echo $price;?></span>

                    </div>

                    <form action="#" class="purchase-form">

                       <div id="qt" class="qt-area">

                           <i class="fa fa-minus" v-on:click="quantity -=1"></i>

                           <input :value="quantity" class="qt" min="0" type="number" readOnly />

                           <i class="fa fa-plus" v-on:click="quantity +=1"></i>

                       </div>

                        

                        <button class="btn btn-theme addToCart" type="button" data-toggle="modal" data-product='{"id":"<?php echo $pid;?>","name":"<?php echo $name;?>","price":"<?php echo $price;?>","path":"<?php echo $path;?>"}' ata-target="#exampleModalCenter">Add to cart</button>
					

                    </form>

                    <p><span class="strong-text">Category:</span> <?php echo $categoryName;?></p>

                                       

                    <ul class="product-info-btn">

                        <li><a href="#"><i class="fa fa-heart-o"></i> Wishlist</a></li>

                        <li><a href="#"><i class="fa fa-arrows-h"></i> Compare</a></li>

                        <li><a href="#"><i class="fa fa-envelope-o"></i> Email</a></li>

                        <li><a href="#"><i class="fa fa-print"></i> Print</a></li>

                    </ul>

                    <p><i class="fa fa-check"></i> Let’s start with the most essential part of any written content. At the early </p>

                </div>

            </div>

        </div>

    </div> <!-- End of short-description -->

    <div class="container">

        <div class="row">

            <div class="single-product-tabs">

                <ul class="nav nav-tabs nav-single-product-tabs">

                    <li class="active"><a href="#description" data-toggle="tab">Description</a></li>

                    <li><a href="#reviews" data-toggle="tab">Reviews</a></li>

                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="description">

                        <div class="product-desc">

                            <h2>Product Description</h2>

                            <p>Ultricies et consectetur rhoncus lorem mattis, ligula interdum nibh dolor ipsum, venenatis ultrices sem nisl senectus phasellus lectus facilisis gravida curabitur interdum pretium et pellentesque nullam auctor vestibulum aenean ipsum placerat erat volutpat lectus mi est lacinia sociosqu, pretium habitasse aenean eros tristique augue a vivamus ac, sapien blandit nullam et neque curabitur varius nostra dui dictum cras orci congue.  Ultricies et consectetur rhoncus lorem mattis, ligula interdum nibh dolor ipsum, venenatis ultrices sem nisl senectus phasellus lectus facilisis gravida curabitur interdum pretium et pellentesque nullam auctor vestibulum aenean ipsum placerat</p>

                        </div>

                    </div>

                    <div class="tab-pane" id="reviews">

                    </div>

                </div>

            </div>

        </div>

    </div> <!-- End of container -->

    <div class="container">

        <div class="row">

            <div class="related-items">

                <ul class="nav nav-tabs nav-single-product-tabs">

                    <li class="active"><a href="#related" data-toggle="tab">Related Products</a></li>

                </ul>

                <div class="tab-content">

                    <div class="tab-pane active" id="related">

                        <div class="col-md-3 col-sm-4">

                            <div class="single-product">

                                <div class="product-block">

                                    <img src="" alt="" class="thumbnail">

                                    <div class="product-description text-center">

                                        <p class="title">Date Tiffany Torchiere</p>

                                        <p class="price">$ 55.00</p>

                                    </div>

                                    <div class="product-hover">

                                        <ul>

                                            <li><a href=""><i class="fa fa-cart-arrow-down"></i></a></li>

                                            <li><a href=""><i class="fa fa-arrows-h"></i></a></li>

                                            <li><a href=""><i class="fa fa-heart-o"></i></a></li>

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-3 col-sm-4">

                            <div class="single-product">

                                <div class="product-block">

                                    <img src="" alt="" class="thumbnail">

                                    <div class="product-description text-center">

                                        <p class="title">Date Tiffany Torchiere</p>

                                        <p class="price">$ 55.00</p>

                                    </div>

                                    <div class="product-hover">

                                        <ul>

                                            <li><a href=""><i class="fa fa-cart-arrow-down"></i></a></li>

                                            <li><a href=""><i class="fa fa-arrows-h"></i></a></li>

                                            <li><a href=""><i class="fa fa-heart-o"></i></a></li>

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-3 col-sm-4">

                            <div class="single-product">

                                <div class="product-block">

                                    <img src="" alt="" class="thumbnail">

                                    <div class="product-description text-center">

                                        <p class="title">Date Tiffany Torchiere</p>

                                        <p class="price">$ 55.00</p>

                                    </div>

                                    <div class="product-hover">

                                        <ul>

                                            <li><a href=""><i class="fa fa-cart-arrow-down"></i></a></li>

                                            <li><a href=""><i class="fa fa-arrows-h"></i></a></li>

                                            <li><a href=""><i class="fa fa-heart-o"></i></a></li>

                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-3 col-sm-4">

                            <div class="single-product">

                                <div class="product-block">

                                    <img src="" alt="" class="thumbnail">

                                    <div class="product-description text-center">

                                        <p class="title">Date Tiffany Torchiere</p>

                                        <p class="price">$ 55.00</p>

                                    </div>

                                    <div class="product-hover">

                                        <ul>

                                            <li><a href=""><i class="fa fa-cart-arrow-down"></i></a></li>

                                            <li><a href=""><i class="fa fa-arrows-h"></i></a></li>

                                            <li><a href=""><i class="fa fa-heart-o"></i></a></li>
 
                                        </ul>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>  <!-- End of container -->
			
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<script src="./js/vue.js"></script>
	<script src="./js/nav.js"></script>
	<?php require './cart.php';?>
	<script>
	//Changes a product quantity input
	var quantity = new Vue({
		el: '#qt',
		data: {
			quantity: 1
		},
		methods: {

		}
	});
	</script>
	<script src="./js/cartIconText.js"></script>
	<script src="./js/cart.js"></script>
		
</body>
</html>