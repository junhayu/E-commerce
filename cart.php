<link rel="stylesheet" href="style/cart.css">
	<!-- Modal -->
	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			  <div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Cart</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  <span aria-hidden="true">&times;</span>
				</button>
			  </div>
			  <div class="modal-body" id="cartVue">	
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary checkout">Checkout</button>
			  </div>
			</div>
		</div>
	</div>
<script>
$(document).ready(function() {
	$('.addToCart').on("click", function() {
		var product = $(this).data('product');
		//console.log(product);
		var qt = $('input.qt').val();
		 $.ajax({
				type: "POST",
			   data: {"product":product,"qt":qt},
			   url: "./php/add_cart_product.php",
			   success: function(msg){
				   cart.init();
				   cartText.init();
				   $('#exampleModalCenter').modal('toggle');
				   
			   },
			   error: function (xhr, ajaxOptions, thrownError) {
					alert(xhr.status);
					alert(thrownError);
				}
			}); 
	});
	$('.showCart').on("click", function() {
		cart.init();
		$('#exampleModalCenter').modal('toggle');
	});
	
	$('.checkout').on("click", function() {
		alert("Checkout $"+cart.totalPrice);
	});
});

</script>