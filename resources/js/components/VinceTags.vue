<template>

	<div class="tag-group">
			<el-tag
		    v-for="item in tags"
		    :key="item.label"
		    type=""
		    effect="dark">
		    {{ item.label }}
		  </el-tag>
	</div>

</template>

<script>

	// import axios from 'axios'

	export default {
		components: {},
		data() {
			return {
				// options: [],
				tags:[],
				selectd: []
			}
		},
		props: {
			input_id: String,
			data_url: String,
			value: {
				default: '',
				type: String
			},
			disabled:{
				default:false,
				type:Boolean
			}
		},
		async mounted() {
			if (this.value.length > 0){
				let selectd = this.value.split(',');

				for (var i = 0; i < selectd.length; i++) {
					selectd[i] = Number(selectd[i]);
				}

				this.selectd = selectd;
			}


			window.data_url = this.data_url
			let res = await axios.get(this.data_url)
			// debugger
			if (res.data.data) {
				for (var i = 0; i < res.data.data.length; i++) {
					if (this.selectd.indexOf(res.data.data[i].id) >= 0){
						this.tags.push({
							value: res.data.data[i].id,
							label: res.data.data[i].name || res.data.data[i].title
						})
					}
					// this.options.push({
					// 	value: res.data.data[i].id,
					// 	label: res.data.data[i].name || res.data.data[i].title
					// })
				}
			}
			// debugger
			// this.value = this.value
		},
		methods: {}
	}

</script>

<style scoped>

	.el-tag{
		margin-right: 10px;
	}

</style>
