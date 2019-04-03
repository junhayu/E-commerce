<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-commerce</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
   <link rel="stylesheet" href="./style/admin.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" type="text/css">
</head>
<body>
<div class="col-md-3 col-sm-4">
     <div class="logo">
         <a href="./index.php">
             <img src="img/logo.png" alt="Orani E-shop">
         </a>
      </div>
</div>
<main class="content category">
	<div class="pageCategory">
		<div class="catWrap">
			<div class="catTop j-sticky">
				<div class="topnav">
				  <a href="./admin_product.php">Product</a>
				  <a class="active" href="#Add">Category</a>
				  <a href="./admin_color.php">Color</a>
				  <a href="./admin_type.php">Type</a>
				  <a class="" href="./index.php">Home</a>
				</div>
			</div><!--/.catTop-->

			<div class="s-smallWidth">
				<div class="catList">
					<h4>Click on row to delete an category or sub-category</h4>
					<div class="test">
					</div>
					Add New <input type="text" id="newMenuName" placeholder="Parent category name"/>
					<button type="button" id="addNewMenu">Submit</button>
				</div><!--/.catList-->
			</div>
		</div><!--/.catWrap-->
	</div>
</main>				
<!-- Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="AddCategory" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Add a Category</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="addCategoryForm" data-menu="0" class="needs-validation" novalidate>
				<div class="modal-body">
					<div class="addProduct">
						<div class="input-group mb-3">
							<input type="text" class="form-control" placeholder="Category name" aria-label="Category name" aria-describedby="" name="name" required/><br />
							<input type="number" value="0" name="menu" readonly hidden /><br />
							<div class="invalid-feedback">
								Choose a name
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button class="btn btn-primary" type="submit" id="button-addon1">Submit</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>  <!-- End of Modal -->	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	<script src="./js/admin_category.js"></script>
</body>
</html>