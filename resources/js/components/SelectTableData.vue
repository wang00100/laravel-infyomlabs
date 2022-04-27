<template>

	<div>
			<el-select v-model="selectd" :disabled="disabled"
			           filterable
			           multiple
			           placeholder="请选择"
			           style="width:100%; max-width:900px;">
				<el-option v-for="item in options"
				           :key="item.value"
				           :label="item.label"
				           :value="item.value">
				</el-option>
			</el-select>
	</div>

</template>

<script>

	// import axios from 'axios'

	export default {
		components: {},
		data() {
			return {
				options: [],
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
					this.options.push({
						value: res.data.data[i].id,
						label: res.data.data[i].name || res.data.data[i].title
					})
				}
			}
			// debugger
			// this.value = this.value
		},
		watch: {
			selectd: {
				handler(newValue) {
					$('#' + this.input_id).val(newValue.join(','));
				},
				immediate: true
			}
		},
		methods: {}
	}

</script>

<style>

	.avatar-uploader .el-upload {
		border: 1px dashed #d9d9d9;
		border-radius: 6px;
		cursor: pointer;
		position: relative;
		overflow: hidden;
	}

	.avatar-uploader .el-upload:hover {
		border-color: #409eff;
	}

	.avatar-uploader-icon {
		font-size: 28px;
		color: #8c939d;
		width: 178px;
		height: 178px;
		line-height: 178px;
		text-align: center;
	}

	.avatar {
		width: 178px;
		height: 178px;
		display: block;
	}

</style>
