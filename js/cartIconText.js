 var cartText = new Vue({
		el: '#cart-text',
		data: {
			totalPrice: 0,
			numOfProducts: 0
		},
		methods: {
			init() {
				 fetch('./php/update_cart_text.php')
				.then(response => response.json())
				.catch(error => console.error('Error:', error))
				.then((data) => {
					this.totalPrice = data['totalPrice'];
					this.numOfProducts = data['numOfProducts'];
				}); 
				
			}
		},
		mounted() {
		this.init();
		}
	}); 