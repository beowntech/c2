<!-- =========================================================================================
    File Name: Search.vue
    Description: Search Page
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
      Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
    <div class="vx-row">
        <div class="vx-col w-full">
                <div id="add-blog-page">
                    <!-- SEARCH RESULTS -->
                    <div class="vx-row mt-4 md:flex-row flex-col-reverse">
                        <div class="vx-col md:w-3/5 lg:w-2/3 w-full mb-4">
                            <h2>Update Blog</h2>
                        </div>
                        <div class="vx-col md:w-3/5 lg:w-2/3 w-full mb-4">
                            <div class="search-page__search-bar flex items-center">
                                <vs-input class="inputx" style="width: 100%;" placeholder="Enter Blog Title" v-model="title"/>
                            </div>
                            <vx-card class=" no-shadow search-page__search-results lg:p-2"
                                     style="margin-top:30px;padding: 0px!important;">
                                <ckeditor :editor="editor" v-model="content" :config="editorConfig"></ckeditor>
<!--                                <quill-editor v-model="content" style="min-height:600px;"></quill-editor>-->
                            </vx-card>
                        </div>

                        <!-- KNOWLEDGE PANEL -->
                        <div class="vx-col md:w-2/5 lg:w-1/3 w-full mb-base">
                            <vx-card card-border class="no-shadow">
                                <div class="vx-row md:flex-row flex-col-reverse">
                                    <div class="vx-col w-full mb-4">
                                        <a href="#!" class="drag-area bg-transparent" @click="$refs.uploadImgInput.click()" v-bind:style="'background-position: center;background-image: url('+image+');background-size: cover;'">
                                            <input type="file" class="hidden" ref="uploadImgInput" name="image"
                                                   @change="showImage" accept="image/*" v-validate="'required'">
                                            <div id="uploadImage" v-if="image == null">
                                                <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                                                <header>Click to Upload Featured Image</header>
                                                <!--                                    <span>OR</span>-->
                                                <!--                                    <button @click="$refs.uploadImgInput.click()">Browse Image</button>-->
                                            </div>
                                            <div id="showImage" v-else>
                                                <!--                                    <img v-if="image" :src="image" style="max-width: 100%">-->
                                            </div>
                                        </a>
                                    </div>
                                    <div class="vx-col w-full">
                                        <vs-button class="float-end" style="padding: 8px 30px;float: right;" @click.stop="addBlog">Update</vs-button>
                                    </div>
                                </div>
                            </vx-card>
                            <vx-card card-border class="no-shadow mt-4" title="Category" style="padding: 1rem !important;">
                                <div class="vx-row md:flex-row flex-col-reverse">
                                    <div class="vx-col w-full mb-4">
                                        <ul class="centerx">
                                            <li v-for="(catg, index) in categories" :key="index" class="mb-2">
                                                <vs-checkbox v-model="selectedCatg" :vs-value="catg.id" >{{ catg.name }}</vs-checkbox>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </vx-card>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</template>
<script>
    import {videoPlayer} from 'vue-video-player'
    import 'video.js/dist/video-js.css'
    import 'quill/dist/quill.core.css'
    import 'quill/dist/quill.snow.css'
    import 'quill/dist/quill.bubble.css'
    import axios from "axios";
    import $ from 'jquery';
    import {quillEditor} from 'vue-quill-editor'
    import CKEditor from 'ckeditor4-vue';

    export default {
        data() {
            return {
                title: '',
                tags: [],
                currentPage: 1,
                content: '',
                categories: [],
                isAddBlog: false,
                originalImage: null,
                selectedCatg: [],
                blogs: [],
                image: null
            }
        },
        computed: {},
        methods: {
            showImage(e) {
                const file = e.target.files[0];
                this.originalImage = file;
                this.image = URL.createObjectURL(file);
            },
            alert(title, text, color,position) {
                this.$vs.notify({
                    color: color,
                    title: title,
                    text: text,
                    position: position
                });
            },
            getBlog(){
                axios.get('/api/blog/get?id='+this.$route.params.BlogId)
                    .then((res) => {
                        console.log(res)
                        this.title = res.data[0].title;
                        this.content = res.data[0].content;
                        this.image = '/blogs/'+res.data[0].id+'/image/'+res.data[0].image;
                        this.selectedCatg = JSON.parse(res.data[0].type);
                        this.$vs.loading.close()
                    }).catch((err) => {
                    this.$vs.loading.close()
                    console.log(err)
                })
            },
            addBlog(){
                console.log(this.selectedCatg)
                if(this.title === ""){
                    this.alert('Please Enter Title','Title Field is Required','red','bottom-right');
                }else if(this.content === ""){
                    this.alert('Please Enter Content','Content is Required','red','bottom-right');
                }else if(this.selectedCatg.length === 0){
                    this.alert('Select Category','Select at least 1 Option in Category','red','bottom-right');
                }else {
                    // console.log(this.selectedCatg)
                    const bodyFormData = new FormData();
                    bodyFormData.append('id', this.$route.params.BlogId)
                    bodyFormData.append('user', localStorage.getItem('userId'))
                    bodyFormData.append('title', this.title)
                    bodyFormData.append('text', this.content)
                    bodyFormData.append('catg', this.selectedCatg)
                    if(this.originalImage != null) {
                        bodyFormData.append('image', this.originalImage)
                    }
                    axios.post('/api/blog/update', bodyFormData)
                        .then((res) => {
                            if (res.data == 1) {
                                this.$vs.loading.close()
                                this.alert('Blog Updated Successfully!', 'Redirecting to All Blog Page...', 'success', 'bottom-right')
                            }
                        }).catch((err) => {
                        this.alert('Error Occurred!', 'Error While Adding Blog!', 'red', 'bottom-right')
                        this.$vs.loading.close()
                        console.log(err)
                    })
                }
            },
            getCatg(){
                axios.post('/api/categories/parent')
                    .then((res) => {
                        this.categories = res.data;
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            getStatus() {
                axios.get('/api/status/property/get')
                    .then((res) => {
                        console.log(res)
                        this.status = res.data;
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            updateStatus(data,id){
                axios.post('/api/blog/updateStatus',
                    {
                        status: data.id,
                        id: id
                    })
                    .then((res) => {
                        if(res.data['status'] == 1) {
                            this.alert('Status Updated Successfully!', 'Blog Status Updated Successfully!', 'success')
                            // window.location.reload()
                            // $("h4").click()
                        }else{
                            this.alert('Error Occured!', 'There is some Error changing Status!', 'danger')
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            seoEdit(prop){
                this.$vs.loading();
                this.$router.push("/blog/seo/"+prop).catch(() => {})
            }
        },
        components: {
            videoPlayer,
            quillEditor,
            CKEditor
        },
        filters: {
            strippedContent: function (string) {
                return string.replace(/<\/?[^>]+>/ig, " ").substring(0,20);
            }
        },
        beforeMount() {
            this.getCatg()
            this.getBlog()
            this.getStatus()
        },
        mounted() {
            // if (document.getElementById('selectize')) return; // was already loaded
            // var scriptTag = document.createElement("script");
            // scriptTag.src = "https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/js/standalone/selectize.min.js";
            // scriptTag.id = "selectize";
            // document.getElementsByTagName('footer')[0].appendChild(scriptTag);
            //
            // $("#input-tags").selectize({
            //     delimiter: ",",
            //     persist: false,
            //     create: function (input) {
            //         return {
            //             value: input,
            //             text: input,
            //         };
            //     },
            // });
        }
    }
</script>

<style lang="scss">
    .ql-container,.ql-editor {
        min-height: inherit;
    }

    @import "@sass/vuexy/pages/search.scss";
    @import url("https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.3/css/selectize.legacy.min.css");
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    .drag-area {
        /*background: #5256ad;*/
        border: 2px dashed #000;
        height: 200px;
        width: 100%;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }

    .drag-area.active {
        border: 2px solid #fff;
    }

    .drag-area .icon {
        font-size: 100px;
        color: #fff;
    }

    .drag-area header {
        padding: 10px;
        text-align: center;
        font-size: 14px;
        font-weight: 500;
        color: #000;
    }

    .drag-area span {
        font-size: 25px;
        font-weight: 500;
        color: #000;
        margin: 10px 0 15px 0;
    }

    .drag-area button {
        padding: 5px 25px;
        font-size: 20px;
        font-weight: 500;
        border: none;
        outline: none;
        background: #f25703;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
    }

    .drag-area img {
        height: 100%;
        width: 100%;
        object-fit: cover;
        border-radius: 5px;
    }

    .vx-card__body {
        padding: 10px !important;
    }
    .blog_list_img{
        height: 65px!important;
        width: 100px!important;
    }
</style>
