$(function() {
	
	$.when(fetchCategories(0)).done(function() {
		registerEvents();
	});
});

function deleteCategory(id,menu) {
	$.ajax({
		type: "POST",
		data : {'id':id},
		url: "./php/delete_category.php",
		success: function(data) {
			fetchCategories(menu);
			alert(data);
		},
		error: function(jqXHR, textStatus, errorThrown) {
			 alert("get session failed " + errorThrown);
		}
	});
}

	
function deleteMenu(id) {
	$.ajax({
		type: "POST",
		data : {'id':id},
		url: "./php/delete_menu.php",
		dataType: 'html',
		success: function(data) {
			fetchCategories(0);
			alert(data);
			
		},
		error: function(jqXHR, textStatus, errorThrown) {
			 alert("get session failed " + errorThrown);
		}
	});
}
	
function fetchCategories(menuId) {
	
	$.ajax({
		type: "POST",
		data : {'menu':menuId},
		url: "./php/show_category.php",
		dataType: 'html',
		success: function(data) {
			if(menuId)
			{
				
				$('.menuTable').each(function() {
					if($(this).data('menu')==menuId)
					{
						$(this).html(data);
					}
				});
			}
			else
			{
				$('.test').html(data);
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {
			 alert("get session failed " + errorThrown);
		}
	});
}
function addCategory(menu) {
	event.preventDefault();
          $.ajax({
            type: 'post',
            url: './php/add_category.php',
            data: $('#addCategoryForm').serialize(),
            success: function (msg) {
				$('#addCategoryModal').modal('hide');
				fetchCategories(menu);
              alert(msg);
            }
          });

}
function addMenu(menu) {
          $.ajax({
            type: 'post',
            url: './php/add_menu.php',
            data: {'name':menu},
            success: function (msg) {
				fetchCategories(0);
              alert(msg);
            }
          });
}
function registerEvents() {
	//nav click event
	$(document).on('click', '.topnav a', function () {
		$(this).siblings().removeClass("active");
		$(this).addClass("active");
	});
	
	//child category click event
	$(document).on('click', 'table.prodList tbody tr', function () {
		var id = $(this).data('id');
		var menu = $(this).data('menu');
		var r = confirm("Delete this item (It will delete all the child products!)");
		if(r == true)
		{
			deleteCategory(id,menu);
		}
	});
	
	//parent category click event
	$(document).on('click', 'table.prodList thead tr', function () {
		var id = $(this).data('id');
		var r = confirm("Delete this item (It will delete all the sub-categories and child products!)");
		if(r == true)
		{
			deleteMenu(id);
		}
	});
	
	//Add new parent category button click event
	$(document).on('click', '#addNewMenu', function () {
		var name = $('#newMenuName').val();
		console.log(name);
		if(name)
		{
			addMenu(name);
		}
		else
		{
			alert("Invalid Input");
		}
	});

	//onclick add child category button
	$(document).on('click', '.addChildCategory', function () {
		var menuId = $(this).data('menu');
		$('#addCategoryForm').data('menu',menuId);
		$('#addCategoryForm input[name=menu]').val(menuId);
		//console.log('mi '+$('#addCategoryForm').data('menu') +' val'+$('#addCategoryForm input[name=menu]').val());
	});
	
	//onsubmit event
	$('.needs-validation').each(function() {
		
		 $(this).on('submit', function(event) {
			event.preventDefault();
			var menu = $(this).data('menu');
			addCategory(menu);
		}); 
	});
	

}