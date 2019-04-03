const nav = new Vue({
    el: "#nav",
    data: {
      editFriend: null,
      menus: [],
    },
    methods: {
    },
    mounted() {
		//fetch categories and sub-categories from db in an array
		fetch("./php/show_nav.php")
         .then(response => response.json())
         .then((data) => {
           this.menus = data;
		  //console.log(data);
         })
    },
    template: `
    <div class="collapse navbar-collapse" id="navbar">
	<ul class="nav navbar-nav navbar-left">
		<li ><a href="./index.php">Home</a></li>
		<li class="shop-category dropdown" v-for="menu, i in menus">
			<a class="" :href="'./menu.php?menu='+menu.id+'&name='+menu.name">
				{{menu.name}}
			</a>
			<div v-if="menu.categories.length > 0" class="dropdown-content" >
				<ul class="menu">
					<li v-for="category, j in menu.categories">
						<a :href="'./category.php?category='+category.id+'&menu='+menu.id+'&name='+category.name">
							{{category.name}}
						</a>
					</li>
				</ul>
			</div>
		</li>
		<li ><a href="./admin_product.php">Admin</a></li>
	 </ul>
    </div>
    `,
});