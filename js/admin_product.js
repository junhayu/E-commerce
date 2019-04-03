$(function() {
	fetchProducts(); //fetch products from db
	
});
function deleteProducts(id) {
	$.ajax({
		type: "POST",
		data : {'id':id},
		url: "./php/delete_product.php",
		success: function(data) {
			alert(data);
			fetchProducts();
		},
		error: function(jqXHR, textStatus, errorThrown) {
			alert("get session failed " + errorThrown);
		}
	});
}

function fetchProducts() {
	$.ajax({
		type: "POST",
		
		url: "./php/show_product.php",
		dataType: 'html',
		success: function(data) {
			$('.showProduct').html(data);
		},
		error: function(jqXHR, textStatus, errorThrown) {
			 alert("get session failed " + errorThrown);
		}
	});
}
//Make the nav bar active
$(document).on('click', '.topnav a', function () {
	$(this).siblings().removeClass("active");
	$(this).addClass("active");

});
//Confirm delete product
$(document).on('click', 'table.prodList tbody tr', function () {
	var id = $(this).data('id');
	var path = $(this).data('path');
	var r = confirm("Delete this item");
	if(r == true)
	{
		//console.log(id);
		deleteProducts(id);
		
	}
});

//Dynamically updates the sub-category dropdown menu in the add_product form
function updateCategory() {
	var menu = document.getElementById("menu");
	var selected = menu.options[menu.selectedIndex].value;
	console.log(selected);
	if(selected!=0)
	{
		$.ajax({
			type: "POST",
			
			url: "./php/update_category.php",
			dataType: 'html',
			//contentType: "application/json; charset=utf-8",
			data : {'menuId':selected},
			success: function(data) {
				//console.log(data);
				$('#category').html(data);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				 alert("get session failed " + errorThrown);
			}
		});
	}
}
//Add product
function addProductCall(form) {
	var form_data = new FormData(form);                       
    $.ajax({
			type: 'post',
            url: './php/add_product.php',
			cache: false,
			contentType: false,
			processData: false,
            data: form_data ,
            success: function (msg) {
				$('#exampleModal').modal('hide');
				fetchProducts();
              alert(msg);
            }
      });
}
//Validates the add_product form
$('#addProductForm').on('submit', function(event) {
	var validated = true;
	$(this).find('select').each(function() {
		//console.log('s' + $(this).prop('selectedIndex'));	
		if($(this).prop('selectedIndex')==0)
		{
			console.log("selectedIndex");
			validated = false;
		}
	});
	if(!$('#productName').val())
	{
		console.log("productName");
		validated = false;
	}
	if(!$('#productNumber').val())
	{	
		validated = false;
		console.log("productNumber" + validated);
	}
	if(validated)
	{
		event.preventDefault();
		addProductCall(this);
	}
	else
	{
		event.preventDefault();
		event.stopPropagation();
		alert("Form is not complete");
	}	
}); 
//upload a preview image
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      document.getElementById('imagePreview').src=e.target.result;
    }

    reader.readAsDataURL(input.files[0]);
  }
}
//when user uploads an image
$(document).on("change", "#productImage", function() {
  readURL(this);
});