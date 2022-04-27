<template>

	<el-input placeholder="请输入内容" v-model="search_input" class="input-with-select">
		<el-select v-model="select" slot="prepend" placeholder="请选择">
			<el-option label="餐厅名" value="1"></el-option>
			<el-option label="订单号" value="2"></el-option>
			<el-option label="用户电话" value="3"></el-option>
		</el-select>
		<el-button slot="append" icon="el-icon-search"></el-button>
	</el-input>

</template>

<script>

	export default {
		components: {

		},
		data() {
			return {
				search_input:'',
				cat_select:''
			}
		},
		props: {
			input_id:String,
			value: {
				default: '',
				type: String
			}
		},
		mounted() {
			
		},
		watch: {

	  },
		methods: {

		}
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
