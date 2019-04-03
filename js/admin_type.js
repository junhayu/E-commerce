$(function() {
	fetchTypes(); //fetch products from db
	
});
function deleteTypes(id) {
	$.ajax({
		type: "POST",
		data : {'id':id},
		url: "./php/delete_type.php",
		success: function(data) {
			alert(data);
			fetchTypes();
		},
		error: function(jqXHR, textStatus, errorThrown) {
			alert("get session failed " + errorThrown);
		}
	});
}

function fetchTypes() {
	$.ajax({
		type: "POST",
		
		url: "./php/show_type.php",
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
		deleteTypes(id);
		
	}
});

//Add type
function addType(name) {                      
    $.ajax({
			type: "POST",
            url: './php/add_type.php',
			data : {'name':name},
            success: function (msg) {
				$('#addTypeModal').modal('hide');
				fetchTypes();
				alert(msg);
            }
      });
}
 $('#addTypeForm').on('submit', function(event) {
	var validated = false;
	var name = "";
	name = $('#typeName').val();
	if(name)
	{
		validated = true;
		console.log(name);
	}

	if(validated)
	{
		event.preventDefault();
		addType(name);
	}
	else
	{
		event.preventDefault();
		event.stopPropagation();
		alert("Form is not complete");
	} 
});
