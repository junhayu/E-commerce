const cart = new Vue({
    el: "#cartVue",
    data: {
      products: [],
	totalPrice: 0,
	iconHovered:false,
	numOfProducts:0

    },
    methods: {
		init() {
			fetch("./php/fetch_cart_products.php")
			.then(response => response.json())
			.catch(error => console.error('Error:', error))
			.then((data) => {
			 this.products = data;
			 var total = 0;
			 var numOfProducts = 0;
			  for(product in data)
			 {
				 //var sum = data[product]['quantity']*data[product]['price'];
				 var sum = data[product]['subTotal'];
				 total +=sum;
				 numOfProducts++;
			 } 
			 this.totalPrice = total;
			 this.numOfProducts= numOfProducts;
			 //console.log("lg "+this.numOfProducts);
			 
		 });
		},
		roundToTwoDecimal: function(num) {
			return parseFloat(num*100/100).toFixed(2);
		},
		updateQuantity: function(i) {
			var qt = this.products[i].quantity;
			var id = i;
			var formData = new FormData();
			formData.append('id',id);
			formData.append('qt',qt);
			 fetch('./php/update_cart_product_quantity.php',
			 {
				 method:'POST',
				 body: formData
			 })
			.then(response => response.text())
			.catch(error => console.error('Error:', error))
			.then((msg) => {
				console.log("updateQuantity "+msg);
				this.init();
				cartText.init();
			}); 
	   },
	   changeTrashIcon: function() {
		   this.iconHovered = !(this.iconHovered);
	   },
	   deleteProductFromCart: function(i) {
		   var id = i;
		   var formData = new FormData();
			formData.append('id',id);
		   fetch('./php/delete_cart_product.php',
			 {
				 method:'POST',
				 body: formData
			 })
			.then(response => response.text())
			.catch(error => console.error('Error:', error))
			.then((msg) => {
				console.log("deleteProductFromCart "+msg);
				this.init();
				cartText.init();
			}); 
	   }
    },
    mounted() {
      this.init();
    },
    template: `
	<div class="modal-body">
	<div class="sideCartRows">
		<div class="sideCartRow" v-for="product, i in products">
			<div class="sideCartImage u-imgWrap">
				<img height="100" width="100" class="img-fluid lazyloaded" :src="'./'+product.path" alt="Responsive image" />
			</div>
			<div class="sideCartDesc">
				<div class="title">{{product.name}}
				</div>
				<div class="bottom">
					<div class="sideCartDescLeft">
						<div class="prodQty s-defInput"> 
							<input id="productQuantity" type="number" v-model="product.quantity" v-on:change="updateQuantity(i)"  min="1">
						</div>
					</div>
					<div class="sideCartDescRight">
						<i @mouseover="changeTrashIcon" @mouseleave="changeTrashIcon" :class="[iconHovered ? 'far':'fas', 'fa-trash-alt']" v-on:click="deleteProductFromCart(i)"></i>
						<div class="sideCartPrice">{{'$'+product.subTotal}}
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		
		<div class="sideCartTotalWrap">
					<div class="totalPrice">{{'Total $'+roundToTwoDecimal(totalPrice)}}</div>
		</div>
	</div>
    `,
});