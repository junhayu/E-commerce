const menuDropdown = new Vue({
    el: "#menuDropdown",
    data: {
      menus: [],

    },
    methods: {
		init() {
			fetch("./php/fetch_menus.php")
			.then(response => response.json())
			.catch(error => console.error('Error:', error))
			.then((data) => {
			 this.menus = data;
			 //console.log(data);
		 });
		}
    },
    mounted() {
      this.init();
    },
    template: `
		<select name="menu" id="menu" onchange="updateCategory()">
			<option value="" selected disabled>Choose...</option>
			<option v-for="menu, i in menus" :value="menu.id">
			{{menu.name}}
			</option>
		</select>
    `,
});