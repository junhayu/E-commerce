$(function() {
	fetchColors(); //fetch products from db
	
});
function deleteColors(id) {
	$.ajax({
		type: "POST",
		data : {'id':id},
		url: "./php/delete_color.php",
		success: function(data) {
			alert(data);
			fetchColors();
		},
		error: function(jqXHR, textStatus, errorThrown) {
			alert("get session failed " + errorThrown);
		}
	});
}

function fetchColors() {
	$.ajax({
		type: "POST",
		
		url: "./php/show_color.php",
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
	var r = confirm("Delete this item? (It will delete all products that have this value");
	if(r == true)
	{
		//console.log(id);
		deleteColors(id);
		
	}
});

//Add Color
function addColor(name) {                      
    $.ajax({
			type: "POST",
            url: './php/add_color.php',
			data : {'name':name},
            success: function (msg) {
				$('#addColorModal').modal('hide');
				fetchColors();
				alert(msg);
            }
      });
}
 $('#addColorForm').on('submit', function(event) {
	var validated = false;
	var name = "";
	name = $('#colorName').val();
	if(name)
	{
		validated = true;
		console.log(name);
	}

	if(validated)
	{
		event.preventDefault();
		addColor(name);
	}
	else
	{
		event.preventDefault();
		event.stopPropagation();
		alert("Form is not complete");
	} 
});
