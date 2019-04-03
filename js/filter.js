const filter = new Vue({
    el: "#filter",
    data: {
      filters: [],
	totalPrice: 0

    },
    methods: {
		init() {
			var formData = new FormData();
			var mid = (menuId)?menuId:0;
			var cid = (categoryId)?categoryId:0;
			
			 formData.append('mid',mid);
			formData.append('cid',cid);
			 fetch('./php/fetch_filter_options.php',
			 {
				 method:'POST',
				 body: formData
			 })
			.then(response => response.json())
			.catch(error => console.error('Error:', error))
			.then((data) => {
				//console.log(data);
				this.filters = data;
				
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
	<div id="filter" class="catFilters">
		<div class="pcFilters">
			<div class="filterGroup filterResetAll"><div class="filterGroupLabel">Reset All</div></div>
			<div class="filterGroup sort" data-attribute="SORT"><div class="filterGroupLabel">Sort By</div><div class="filterContent"><ul class="filterList"><li class="filterItem sortItem" data-attribute="SORT" data-option="SPL">Price (Lowest)</li><li class="filterItem sortItem" data-attribute="SORT" data-option="SPH">Price (Highest)</li><li class="filterItem sortItem" data-attribute="SORT" data-option="SN">Product Name</li></ul></div></div>
			<div :class="'filterGroup '+index" :data-attribute="index" v-for="(item,index) in filters">
				<div class="filterGroupLabel">{{index}}</div>
				<div class="filterContent">
					<ul class="filterList">
						<li :data-attribute="index" class="resetButton">Reset</li>
						<li class="filterItem" :data-attribute="index" :data-option="thing.id" v-for="thing in item">
							{{thing.name}}
						</li>
					</ul>
				</div>
			</div>
		</div>				
	</div>
    `,
});