const addProduct = new Vue({
    el: "#addProduct",
    data: {
      modalData: []

    },
    methods: {
		init() {
			 fetch('./php/fetch_add_product_modal.php',)
			.then(response => response.json())
			.catch(error => console.error('Error:', error))
			.then((data) => {
				//console.log(data);
				this.modalData = data;
				
			});  
		},
		test() {
			console.log("testes");
		}
    },
    mounted() {
      this.init();
    },
    template: `
	<div id="addProduct" class="addProduct">
								
								<div class="input-group mb-3">
									<input type="text" class="form-control" placeholder="Product name" id="productName" aria-label="Product name" aria-describedby="basic-addon1" name="name" required/><br />
									<div class="invalid-feedback">
										Choose a name
									 </div>
								</div>
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">$</span>
									</div>
									<input type="number" class="form-control" placeholder="Product price" id="productNumber" aria-label="product price" step="0.01" name="price" required/>
								</div>
								<br />
								<div class="input-group mb-3">
								  <div class="input-group-prepend">
									<label class="input-group-text" for="menu">Menu</label>
								  </div>
								  <div id="menuDropdown">
									<select name="menu" id="menu" onchange="updateCategory()">
										<option value="" selected disabled>Choose...</option>
										<option v-for="menu in modalData['menu']" :value="menu.id">{{menu.name}}</option>
									</select>
									</div>
								</div>
								<br />
								<div id="categoryInput">
									<div class="input-group mb-3">
										  <div class="input-group-prepend">
											<label class="input-group-text" for="category">Category</label>
										  </div>
										<select name="category" id="category">
										  <option value="0">Choose menu first</option>
										</select>
									</div>
								</div>
								<br />
								<div class="input-group mb-3">
									  <div class="input-group-prepend">
										<label class="input-group-text" for="color">Color</label>
									  </div>
									<select name="color">
										<option value="">Choose...</option>
									  <option v-for="color in modalData['color']" :value="color.id">{{color.name}}</option>
									</select>
								</div>
								<br />
								<div class="input-group mb-3">
									  <div class="input-group-prepend">
										<label class="input-group-text" for="type">Type</label>
									  </div>
									<select name="type">
										<option value="">Choose...</option>
									  <option v-for="type in modalData['type']" :value="type.id">{{type.name}}</option>
									</select>
								</div>
								<br />
								<div class="form-group">
									<label for="productImage">Product Image</label>
									<input type="file" class="form-control-file" id="productImage" name="productImage">
								</div>
								<div class="form-group">
									<label for="imagePreview">Image Preview</label>
									<img height="200" width="300" class="img-fluid" id="imagePreview" src="#" alt="Responsive image" />
								</div>

							</div>
    `,
});