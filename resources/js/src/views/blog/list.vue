<template>
    <div class="vx-row">
        <div class="vx-col w-full mb-3">
    <div id="all-blog-page">
        <vx-card title="Blogs">
            <vs-table :data="blogs" pagination max-items="10" search>

                <template slot="thead">
                    <vs-th>Sno.</vs-th>
                    <vs-th>Image</vs-th>
                    <vs-th>Title</vs-th>
                    <vs-th>Content</vs-th>
                    <vs-th>Status</vs-th>
                    <vs-th>Actions</vs-th>
                </template>

                <template slot-scope="{data}">
                    <vs-tr :key="indextr" v-for="(tr, indextr) in data">

                        <vs-td>
                            {{indextr + 1}}
                        </vs-td>
                        <vs-td :data="tr.image">
                            <img class="blog_list_img" :src="'/blog/'+tr.id+'/image/'+tr.image" style="width: 100px" />
                        </vs-td>
                        <vs-td :data="tr.title">
                            {{ tr.title }}
                        </vs-td>
                        <vs-td :data="tr.content | strippedContent">
                            {{tr.content | strippedContent}}
                        </vs-td>
                        <vs-td :data="tr.stat[0].color">
                            <vs-chip :color="tr.stat[0].color" class="product-order-status">{{ tr.stat[0].name}}</vs-chip>
                            <template slot="edit">
                                <vs-select v-model="updateselected = tr.stat[0].id" @input="updateStatus(updateselected,tr.id)" class="select-large">
                                    <vs-select-item :key="index" v-bind:value="status.id" :text="status.name" v-for="(status,index) in status" class="w-full" />
                                </vs-select>
                            </template>
                        </vs-td>
                        <vs-td class="whitespace-no-wrap">
                            <feather-icon icon="EditIcon" svgClasses="w-5 h-5 hover:text-primary stroke-current" @click.stop="editData(tr.id)" />
                            <feather-icon icon="AwardIcon" svgClasses="w-5 h-5 hover:text-warning stroke-current" class="ml-2" @click.stop="seoEdit(tr.id)" />
                            <feather-icon icon="TrashIcon" svgClasses="w-5 h-5 hover:text-warning stroke-current" class="ml-2" @click.stop="openAlert(tr.id)" />
                        </vs-td>
                    </vs-tr>
                </template>
            </vs-table>
        </vx-card>
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
                activePrompt: false,
                isAddBlog: false,
                originalImage: null,
                selectedCatg: [],
                blogs: [],
                image: null,
                selectedBlogId: null
            }
        },
        computed: {},
        methods: {
            openAlert(val){
                this.selectedBlogId = val
                this.activePrompt = true
            },
            editData(prop){
                this.$vs.loading();
                this.$router.push("/blog/update/"+prop).catch(() => {})
            },
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
                axios.post('/api/blog/all')
                    .then((res) => {
                        this.blogs = res.data;
                        this.$vs.loading.close()
                    }).catch((err) => {
                    this.$vs.loading.close()
                    console.log(err)
                })
            },
            deleteBlog(){
                this.$vs.loading()
                axios.post('/api/blog/delete',{
                    id: this.selectedBlogId
                })
                    .then((res) => {
                        this.alert('Blog Deleted','Blog Deleted Successfully','green')
                        this.getBlog()
                        this.$vs.loading.close()
                    }).catch((err) => {
                    this.$vs.loading.close()
                    console.log(err)
                })
            },
            addBlog(){
                if(this.title == ""){
                    this.alert('Please Enter Title','Title Field is Required','red','bottom-right');
                }else if(this.content == ""){
                    this.alert('Please Enter Content','Content is Required','red','bottom-right');
                }else if(this.selectedCatg == [] || this.selectedCatg == ""){
                    this.alert('Select Category','Select at least 1 Option in Category','red','bottom-right');
                }else {
                    const bodyFormData = new FormData();
                    bodyFormData.append('user', localStorage.getItem('userId'))
                    bodyFormData.append('title', this.title)
                    bodyFormData.append('text', this.content)
                    bodyFormData.append('catg', this.selectedCatg)
                    if(this.originalImage != null) {
                        bodyFormData.append('image', this.originalImage)
                    }
                    axios.post('/api/blog/add', bodyFormData)
                        .then((res) => {
                            if (res.data == 1) {
                                this.$vs.loading.close()
                                this.alert('Blog Added Successfully!', 'Redirecting to All Blog Page...', 'success', 'bottom-right')
                                this.title = "";
                                this.content = "";
                                this.selectedCatg = [];
                                this.isAddBlog = false;
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
                            $("h4").click()
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

<style scoped>

</style>
