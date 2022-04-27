<template>

	<div>
    <Editor v-model="content" api-key="c5s81bt8y988gchu4ygccy453qbnbinpw2jz3qb2k25zo23w" style="min-height:300px;" />
	</div>

</template>

<script>

	import Editor from '@tinymce/tinymce-vue';

	export default {
		components: {
			Editor
		},
		data() {
			return {
				content: ""
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
			this.content = this.value
		},
		watch: {
	    content: {
	      handler(newValue) {
	        $('#'+this.input_id).val(newValue);
	      },
	      immediate: true
	    }
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
