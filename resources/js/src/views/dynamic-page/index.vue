<template>
    <div class="vx-row">

        <div class="vx-col w-full mb-base">
            <vs-button v-if="addSelected" color="danger" style="float: right" @click="addScholarChange(0)"
                       type="gradient" icon-pack="feather" icon="icon-x"> Close
            </vs-button>
            <vs-button color="success" v-else style="float: right" @click="addScholarChange(1)" type="gradient"
                       icon-pack="feather" icon="icon-plus"> Add Page
            </vs-button>
        </div>

        <div class="vx-col w-full mb-base" v-if="addSelected">
            <div class="vx-row">
                <div :class="cardClass" :style="contentSubmitted ? 'width: 65% !important;':''">
                    <vx-card title="Add Page">
                        <div class="vx-row md-6">
                            <div class="vx-col md:w-1/2 w-full mb-2">
                                <h6 class="mb-1">Name</h6>
                                <vs-input style="width: 100%;" v-model="name" placeholder="Name"/>
                            </div>
                            <div class="vx-col ml-1 mr-1 mt-3">
                                <div class="vx-col w-full">
                                    <quill-editor v-model="content"></quill-editor>
                                </div>
                            </div>
                        </div>
                        <div class="vx-row mt-2">
                            <div class="vx-col w-full ml-auto">
                                <vs-button class="mr-3 mb-2 float-right" @click="addExam">Submit</vs-button>
                            </div>
                        </div>
                    </vx-card>
                </div>
                <div class="vx-col md:w-1/3 w-full" v-if="contentSubmitted">
                    <vx-card title="Logo/Featured Image">
                        <div class="vx-row md-6">
                            <div class="vx-col  w-full mt-3">
                                <h6>Logo</h6>
                                <vs-upload automatic action="/api/d_page/image_upload" limit="1" v-bind:data="{'id':examEnterId}" fileName='logo' @on-delete="deleteUpload" @on-success="successUpload" text="Upload Logo" />
                            </div>
                            <div class="vx-col  w-full mt-3">
                                <h6>Featured Image</h6>
                                <vs-upload automatic action="/api/d_page/image_upload" limit="1" v-bind:data="{'id':examEnterId}" fileName='featured' @on-delete="deleteUploadF" @on-success="successUpload" text="Upload Featured" />
                            </div>
                        </div>
                    </vx-card>
                </div>
            </div>
        </div>
        <div class="vx-col w-full mb-base" v-else>
            <vx-card title="Exams List">
                <vs-table :data="props" pagination max-items="5" search>

                    <template slot="thead">
                        <vs-th>Logo</vs-th>
                        <vs-th>Name</vs-th>
                        <vs-th>Calls</vs-th>
                        <vs-th>WhatsApp</vs-th>
                        <vs-th>Views</vs-th>
                        <vs-th>Action</vs-th>
                    </template>

                    <template slot-scope="{data}">
                        <vs-tr :key="indextr" v-for="(tr, indextr) in data">

                            <vs-td :data="tr.logo">
                                <img :src="'/dynamic/'+tr.id+'/logo/'+tr.logo" width="50px">
                            </vs-td>

                            <vs-td :data="tr.name">
                                {{ tr.name != null ? tr.name : "--" }}
                            </vs-td>

                            <vs-td :data="tr.calls">
                                {{ tr.calls }}
                            </vs-td>

                            <vs-td :data="tr.whatsapp">
                                {{ tr.whatsapp }}
                            </vs-td>

                            <vs-td :data="tr.views">
                                {{ tr.views}}
                            </vs-td>

                            <vs-td class="whitespace-no-wrap">
                                <feather-icon icon="EditIcon" svgClasses="w-5 h-5 hover:text-primary stroke-current" @click.stop="editData(tr.id)" />
                                <feather-icon icon="TrashIcon" svgClasses="w-5 h-5 hover:text-warning stroke-current" class="ml-2" @click.stop="activePrompt2=true,courseId=tr.id,courseName=tr.streams[0].name" />
                            </vs-td>
                        </vs-tr>
                    </template>
                </vs-table>
            </vx-card>
        </div>

    </div>
</template>

<script>
    import axios from "axios";
    import $ from 'jquery';
    import vSelect from 'vue-select'
    import 'quill/dist/quill.core.css'
    import 'quill/dist/quill.snow.css'
    import 'quill/dist/quill.bubble.css'
    import flatPickr from 'vue-flatpickr-component';
    import 'flatpickr/dist/flatpickr.css';

    import { quillEditor } from 'vue-quill-editor'

    export default {
        data() {
            return {
                props: [],
                format: "d MMMM yyyy",
                updateselected: [],
                status: [],
                addSelected: false,
                appDate: "",
                content: "",
                type: 0,
                name: "",
                categories: [],
                sidebarData: {},
                selectedCatg: {},
                selectedStream: {},
                contentSubmitted: false,
                streams: [],
                examFDate: "",
                examTDate: "",
                examEnterId: "",
                isOnline: false,
                cardClass: 'vx-col w-full',
                changeStatus: [
                    {color: null, name: null}
                ],
                examPopActive: false,
                appPopActive: false,
                user: localStorage.getItem('userId')
            }
        },
        components: {'v-select': vSelect,quillEditor,flatPickr},
        methods: {
            toggleDataSidebar(val=false){
                this.addNewDataSidebar = val
            },
            addScholarChange(val){
                this.cardClass = 'vx-col w-full'
                this.examEnterId = ""
                this.name = ""
                this.content = ""
                this.contentSubmitted = false
                this.addSelected = val === 1;
            },
            successUpload(v){
                console.log(v);
                this.examEnterId = v.currentTarget.response;
                this.alert('Logo Uploaded Successfully','Logo Uploaded Successfully!','green');
            },
            deleteUpload(v){
                axios.post('/api/d_page/delete_image',{
                    'id': this.examEnterId,
                    'type': 'logo'
                }).then((res) => {
                    console.log(res)
                    if(res.data == 1) {
                        this.alert('Logo Removed Successfully','Logo Removed Successfully!','green');
                    }
                }).catch((err) => {
                    // this.$vs.loading.close();
                    console.log(err)
                })
            },
            deleteUploadF(v){
                axios.post('/api/d_page/delete_image',{
                    'id': this.examEnterId,
                    'type': 'featured'
                }).then((res) => {
                    console.log(res)
                    if(res.data == 1) {
                        this.alert('Featured Removed Successfully','Featured Removed Successfully!','green');
                    }
                }).catch((err) => {
                    // this.$vs.loading.close();
                    console.log(err)
                })
            },
            getProps() {
                axios.get('/api/d_page/all')
                    .then((res) => {
                        console.log(res)
                        this.props = res.data;
                        this.props.reverse();
                    }).catch((err) => {
                        console.log(err)
                    })
            },
            getStatus() {
                axios.post('/api/status/all')
                    .then((res) => {
                        console.log(res)
                        this.status = res.data;
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            addExam(){
                if(this.name === ""){
                    this.alert('Please Enter Name','Please Enter Name of the Page','red')
                }else if(this.content === ""){
                    this.alert('Please Enter Content','Please Enter Content of the Page','red')
                }else {
                    axios.post('/api/d_page/add',
                        {
                            pageId: this.examEnterId,
                            name: this.name,
                            description: this.content,
                        }).then((res) => {
                        if (res.data['success'] == 1) {
                            this.getProps();
                            this.examEnterId = res.data['data'];
                            this.cardClass = 'vx-col md:w-1/3 w-full'
                            this.contentSubmitted = true;
                            this.alert('Exam Added Successfully!', 'Exam Added or Updated Successfully!', 'success')
                        } else if (res.data['success'] == 0) {
                            this.alert('Failed to Add Exam', 'Check if Any Important Field Left!', 'danger')
                        }
                    }).catch((err) => {
                        console.log(err)
                    })
                }
            },
            updateStatus(data, id) {
                axios.post('/api/properties/updateStatus',
                    {
                        status: data.id,
                        id: id
                    })
                    .then((res) => {
                        if (res.data['status'] == 1) {
                            this.alert('Status Updated Successfully!', 'Property Status Updated Successfully!', 'success')
                            // window.location.reload()
                            $("h4").click()
                        } else {
                            this.alert('Error Occured!', 'There is some Error changing Status!', 'danger')
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            alert(title, text, color) {
                this.$vs.notify({
                    color: color,
                    title: title,
                    text: text,
                    position: 'bottom-right'
                });
            },
            editData(prop) {
                this.$vs.loading();
                this.cardClass = 'vx-col w-full'
                this.examEnterId = prop
                this.addSelected = true
                this.getPage(prop)
            },
            getPage(id){
                axios.post('/api/d_page/getPage',{
                        id: id
                    }).then((res) => {
                        this.contentSubmitted = true;
                        this.cardClass = 'vx-col md:w-1/3 w-full'
                        this.name = res.data[0].name
                        this.content = res.data[0].content
                    this.$vs.loading.close()
                    }).catch((err) => {
                        console.log(err)
                    })
            },
            seoEdit(prop) {
                this.$vs.loading();
                this.$router.push("/property/seo/" + prop).catch(() => {
                })
            }
        },
        beforeMount() {
            this.getProps()
            this.getStatus()
            this.getCategories()
        }
    }
</script>
<style>
    .vs-popup--content{
        height: 250px!important;
    }
    .ql-container{
        height: 340px !important;
    }
</style>
