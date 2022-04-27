<template>

	<div>
    <!-- <img ref="cropper_source" src="http://zqyd.kt985.com/cover.jpg" width="400"/> -->
		<el-upload
		 class="avatar-uploader"
		 action="/upload"
		 :headers="{'X-CSRF-TOKEN':csrfToken}"
		 accept=".jpg,.jpeg,.png,.gif"
		 :show-file-list="false"
		 :on-success="handleAvatarSuccess"
		 :before-upload="beforeAvatarUpload">
		 <img v-if="imageUrl" :src="imageUrl" style="object-fit:contain; width:178px; height:178px;">
		 <i v-else class="el-icon-plus avatar-uploader-icon"></i>
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
			this.imageUrl = this.value
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
					this.imageUrl = URL.createObjectURL(file.raw)
					$('#'+this.input_id).val(res.data);
				}
			},
			beforeAvatarUpload(file) {
				// const isJPG = file.type === 'image/jpeg'
				const isLt2M = file.size / 1024 / 1024 < 2

				// if (!isJPG) {
				// 	this.$message.error('上传头像图片只能是 JPG 格式!')
				// }
				if (!isLt2M) {
					this.$message.error('上传头像图片大小不能超过 2MB!')
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
