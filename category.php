<?php //require './database.php';
session_start();
$menu = isset($_GET['menu'])? $_GET['menu'] : 0;
$category = isset($_GET['category'])? $_GET['category'] : 0;
$name = isset($_GET['name'])? $_GET['name'] : '';
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
    <link rel="stylesheet" href="./style/filter.css">
	
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
<main class="content category">
	<div class="pageCategory">
		<div class="pageBanner pageBannerHalves u-relative">
			<div class="pageBannerInner s-smallWidth">
				<div class="textWrap">
					<h1><?php echo $name;?></h1>
						<div class="dtTab">
							<p>Create a space you love with furniture from our range of lounge suites, recliners, beds, bedroom furniture, dining and living room pieces; all in options to suit your taste and home décor.</p>
						</div>
				</div>
				<div class="u-imgWrap">	
				</div>
			</div>
		</div><!--/.pageBanner-->
		<div class="catWrap">
			<div class="catTop j-sticky">
				<div class="s-smallWidth">
					<div class="breadcrumbs">
						<p><?php echo $name;?> <span class="itemsFound">(<em id="itemcount" class="j-itemcount">0</em> items found)</span></p>
					</div> <!-- breadcrumbs -->
					<div class="catTopRight">
						<div id="filter" class="catFilters">			
						</div>
					</div><!--/.catTopRight-->
				</div>
			</div><!--/.catTop-->
			<div class="s-smallWidth">
				<div class="catList">

					<div class="pcItems">
						<div id="productList" class="pcItems">
						</div>
					</div><!--/.pcItems-->
				</div><!--/.catList-->
			</div>
		</div><!--/.catWrap-->
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<script src="./js/vue.js"></script>
	<script src="./js/nav.js"></script>
		<script>
	var menuId = 0;
	<?php echo 'menuId = '.$menu.';';?>
	var categoryId = 0;
	<?php echo 'categoryId = '.$category.';';?>
$(function() {
	fetchProducts(menuId,categoryId,null);
});
//fetch products by filter options
function fetchProducts(menuId,categoryId,queryParams) {
	$.ajax({
		type: "POST",
		url: "./php/fetch_category_products.php",
		dataType: 'html',
		data : {'queryParams':queryParams,'menuId':menuId,'categoryId':categoryId},
		success: function(data) {
			//console.log(data);
			$('#productList').html(data);
			var itemsFound = $('#itemsFound').val();
			$('#itemcount').html(itemsFound);
			},
		error: function(jqXHR, textStatus, errorThrown) {
			 alert("get session failed " + errorThrown);
			}
		});
}
//check which filter options are clicked and store info in an array
function gatherQueryParams() {
	var queryParams = {};
	$('.filterItemClicked').each(function(index) {
		var column = $(this).data("attribute");
		var value = $(this).data("option");
		//console.log(index+" : "+column+" - " + value);
		if(!queryParams[column])
		{
			queryParams[column] = {};
		}
		queryParams[column][value] = value;
	});
	return queryParams;
}
//filter button is clicked
$(document).on('click', '.filterGroupLabel', function () {
	$('.sortSelect').hide();
	var filterContent = $(this).siblings(".filterContent");
	$('.filterContent').not(filterContent).hide();
	(filterContent.css("display")=="none") ? filterContent.show() : filterContent.hide();
});
//sort option is clicked
$(document).on('click', '.sortTrigger', function () {
	$('.filterContent').hide();
	var filterContent = $(this).siblings(".sortSelect");
	(filterContent.css("display")=="none") ? filterContent.show() : filterContent.hide();
});
//filter option is clicked
$(document).on('click', '.filterItem', function () {
	($(this).hasClass("filterItemClicked")) ? $(this).removeClass("filterItemClicked") : $(this).addClass("filterItemClicked");
	if($(this).hasClass("sortItem")) $(this).siblings().removeClass("filterItemClicked");
	var queryParams = gatherQueryParams();
	//console.log(queryParams);
	fetchProducts(menuId,categoryId,queryParams);
});
//reset option is clicked
$(document).on('click', '.resetButton', function () {
	var column = $(this).data("attribute");
	//console.log(column + " reset");
	$(this).siblings('.filterItemClicked').removeClass("filterItemClicked");
	var queryParams = gatherQueryParams();
	fetchProducts(menuId,categoryId,queryParams);
});
//reset all button is clicked
$(document).on('click', '.filterResetAll', function () {
	$(this).siblings('.filterGroup').find('.filterItemClicked').removeClass("filterItemClicked");
	//console.log("reset all");
	fetchProducts(menuId,categoryId,null);
});
//close filter menu when clicked on outside
$(document).on('click', function (event) {
	if(!$(event.target).closest('.filterGroup').length) {
        if($('.filterContent').is(":visible")) {
            $('.filterContent').hide();
        }
    } 
});
	</script>
	<?php require './cart.php';?>
	<script src="./js/filter.js"></script>
	<script src="./js/cartIconText.js"></script>
	<script src="./js/cart.js"></script>
</main>					
</body>
</html>