<template>

	<quill-editor v-model="content"
	              ref="myQuillEditor"
	              :options="editorOption">
	</quill-editor>

</template>

<script>

	// require styles
	import 'quill/dist/quill.core.css'
	import 'quill/dist/quill.snow.css'
	import 'quill/dist/quill.bubble.css'

	import { quillEditor } from 'vue-quill-editor'
	// import dedent from 'dedent'
  import { Quill } from 'vue-quill-editor'
  import { container, ImageExtend, QuillWatch } from 'quill-image-extend-module'
	window.ImageExtend = ImageExtend;
	window.Quill = Quill;
	Quill.register('modules/ImageExtend', ImageExtend)
	export default {
		components: {
			quillEditor
		},
		data() {
			return {
				csrfToken: $('meta[name="csrf-token"]').attr('content'),
				content: '',
				editorOption: {
					modules: {
						toolbar: {
              container: [
								['bold', 'italic', 'underline', 'strike'],        // toggled buttons
	  						['blockquote', 'code-block'],
								['image']
              ],
              handlers: {
                'image': function () {
                  QuillWatch.emit(this.quill.id)
                }
              }
            },
						ImageExtend: {
							loading: true,
							name: 'file',
							action: '/upload',
							headers: function(xhr){
								xhr.setRequestHeader('X-CSRF-TOKEN',$('meta[name="csrf-token"]').attr('content'));
							},
							response: res => {
								return res.data;
							}
						}
					},

				}
			}
		},
		props: {
			input_id: String,
			value: {
				default: '',
				type: String
			}
		},
		mounted() {
			this.content = this.value;
		},
		watch: {
			content: {
				handler(newValue) {
					$('#' + this.input_id).val(newValue)
				},
				immediate: true
			}
		},
		methods: {
			customButtonClick() {
				// alert(`You can custom the button and listen click event to do something...`)
			}
		}
	}

</script>

<style lang="scss">

	.quill-editor {
		max-width: 414px;
		.ql-container {
			.ql-editor {
				min-height: 200px;
				img{ max-width: 414px; width: 100%; display: block; margin: 0 auto;}
			}
		}
	}

</style>
