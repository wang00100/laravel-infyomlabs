<template>

	<div>
    <!-- <img ref="cropper_source" src="http://zqyd.kt985.com/cover.jpg" width="400"/> -->
		<el-input placeholder="上传内容/或填写地址" v-model="imageUrl">
	    <!-- <template slot="append">
				<el-upload
				 class="avatar-uploader"
				 action="/upload"
				 :headers="{'X-CSRF-TOKEN':csrfToken}"
				 accept=".jpg,.jpeg,.png,.gif"
				 :show-file-list="false"
				 :on-success="handleAvatarSuccess"
				 :before-upload="beforeAvatarUpload">
				 <el-button size="small" type="primary">文件上传</el-button>

				</el-upload>
			</template> -->
	  </el-input>
		<div style="height:20px;" />
		<el-upload
		 action="/upload"
		 :headers="{'X-CSRF-TOKEN':csrfToken}"
		 accept=".mp4,.mp3"
		 drag
		 :show-file-list="false"
		 :on-success="handleAvatarSuccess"
		 :before-upload="beforeAvatarUpload">
		 	<i class="el-icon-upload"></i>
		  <div class="el-upload__text">将文件拖到此处，或<em>点击上传</em></div>
		  <div class="el-upload__tip" slot="tip">仅支持mp3/mp4文件，且不超过200MB.</div>
		</el-upload>

	</div>

</template>

<script>

	// import 'cropperjs/dist/cropper.css';
	// import Cropper from 'cropperjs';
	// import VueCropper from 'vue-cropperjs'
	// import 'cropperjs/dist/cropper.css'
	// window.VueCropper = VueCropper;
  // import VueCropper from 'vue-cropperjs';
  import Cropper from 'cropperjs';

	export default {
		components: {

		},
		data() {
			return {
				// inputValue:'',
				imageUrl: '',
				csrfToken: $('meta[name="csrf-token"]').attr('content')
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
			this.imageUrl = this.value;
			// this.inputValue = this.value;
      // const cropper = new Cropper(this.$refs.cropper_source, {
      //   aspectRatio: 16 / 9,
      //   crop(event) {
      //     console.log(event.detail.x);
      //     console.log(event.detail.y);
      //     console.log(event.detail.width);
      //     console.log(event.detail.height);
      //     console.log(event.detail.rotate);
      //     console.log(event.detail.scaleX);
      //     console.log(event.detail.scaleY);
      //   },
      // });
		},

		methods: {
			handleAvatarSuccess(res, file) {
				if (res.success){
					// this.imageUrl = URL.createObjectURL(file.raw)
					this.imageUrl = res.data;
					$('#'+this.input_id).val(res.data);
				}
			},
			beforeAvatarUpload(file) {
				// const isJPG = file.type === 'image/jpeg'
				const isLt2M = file.size / 1024 / 1024 < 200

				// if (!isJPG) {
				// 	this.$message.error('上传头像图片只能是 JPG 格式!')
				// }
				if (!isLt2M) {
					this.$message.error('上传头像图片大小不能超过 200MB!')
				}
				// return isJPG && isLt2M
				return isLt2M
			}
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
