<template>
    <div class="vx-row">
        <div class="vx-col w-full mb-base">
            <vs-button v-if="addSelected" color="danger" style="float: right" @click="addScholarChange(0)"
                       type="gradient" icon-pack="feather" icon="icon-x"> Close
            </vs-button>
            <vs-button color="success" v-else style="float: right" @click="addScholarChange(1)" type="gradient"
                       icon-pack="feather" icon="icon-plus"> Add Exam
            </vs-button>
        </div>
        <div class="vx-col w-full mb-base" v-if="addSelected">
            <div class="vx-row">
                <div class="vx-col md:w-3/5 w-full" style="width: 65% !important;">
                    <vx-card title="Add Exam">
                <div class="vx-row md-6">
                    <div class="vx-col md:w-1/3 w-full mb-2">
                        <h6 class="mb-1">Exam Name</h6>
                        <vs-input style="width: 100%;" v-model="name" placeholder="Exam Name"/>
                    </div>
                    <div class="vx-col w-full sm:w-1/3 w-full">
                            <h6 class="mb-1">Category</h6>
                            <v-select v-model="selectedCatg" @input="getStream" :options="categories" :dir="$vs.rtl ? 'rtl' : 'ltr'" placeholder="Select & Type" />
                    </div>
                    <div class="vx-col sm:w-1/3 w-full mb-2" style="display:block;" id="stream">
                        <h6 class="mb-1">Course</h6>
                        <v-select v-model="selectedStream" :options="streams" :dir="$vs.rtl ? 'rtl' : 'ltr'" placeholder="Select & Type" />
                    </div>
                    <div class="vx-col sm:w-1/3 w-full my-3">
                        <h6>is Online Exam?</h6>
                        <vs-switch v-model="isOnline" class="mt-2">
                            <span slot="on">Yes</span>
                            <span slot="off">No</span>
                        </vs-switch>
                    </div>
                    <div class="vx-col sm:w-1/3 w-full mt-5 my-3">
                        <vs-button color="dark" type="flat" icon-pack="feather" @click="examPopActive=true" style="padding: 5px !important;" icon="icon-edit" icon-after>Exam Timing</vs-button>
                        <p style="font-size: 12px;" v-if="examFDate && examTDate" v-text="examFDate+' to '+examTDate"></p>
                    </div>
                    <div class="vx-col sm:w-1/3 w-full mt-5 my-3">
                        <vs-button color="dark" type="flat" style="padding: 5px !important;" @click="appPopActive=true" icon-pack="feather" icon="icon-edit" icon-after>Application Time</vs-button>
                        <p style="font-size: 12px;" v-if="appDate" v-text="appDate"></p>
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
                <div class="vx-col md:w-1/3 w-full">
                    <vx-card title="Other Details">
                        <div class="vx-row md-6">
                            <div class="vx-col w-full mb-2">
                                <h6>National/State Wise?</h6>
                                <ul class="centerx mt-2">
                                    <li>
                                        <vs-radio v-model="type" vs-value=1>National Wise</vs-radio>
                                    </li>
                                    <li>
                                        <vs-radio v-model="type" vs-value=0>State Wise</vs-radio>
                                    </li>
                                </ul>
                            </div>
                            <div class="vx-col  w-full mt-3">
                                <h6>Upload Exam Logo</h6>
                                <vs-upload automatic action="/api/exam/image_upload" limit="1" v-bind:data="{'id':examEnterId}" fileName='photo' @on-delete="deleteUpload" @on-success="successUpload" text="Upload Logo" />
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
                        <vs-th>Image</vs-th>
                        <vs-th>Name</vs-th>
                        <vs-th>Category</vs-th>
                        <vs-th>Course</vs-th>
                        <vs-th>Exam Type</vs-th>
                        <vs-th>Exam Mode</vs-th>
                        <vs-th>Exam Dates</vs-th>
<!--                        <vs-th>Actions</vs-th>-->
                    </template>

                    <template slot-scope="{data}">
                        <vs-tr :key="indextr" v-for="(tr, indextr) in data">

                            <vs-td :data="tr.exam_image">
                                <img :src="'/exams/'+tr.exam_image" width="50px">
                            </vs-td>

                            <vs-td :data="tr.exam_name">
                                {{ tr.exam_name != null ? tr.exam_name : "--" }}
                            </vs-td>

                            <vs-td :data="tr.exam_category">
                                {{ tr.exam_category != null ? tr.exam_category : "--" }}
                            </vs-td>

                            <vs-td :data="tr.exam_course">
                                {{ tr.exam_course != null ? tr.exam_course : "--"}}
                            </vs-td>

                            <vs-td :data="tr.exam_type">
                                {{ tr.exam_type != null ? tr.exam_type ==1 ? 'National Wise': 'State Wise' : "--"}}
                            </vs-td>

                            <vs-td :data="tr.exam_mode">
                                {{ tr.exam_mode != null ? tr.exam_mode == 1 ? 'Online': 'Offline' : "--"}}
                            </vs-td>

                            <vs-td :data="tr.exam_from_to">
                                {{ tr.exam_from_to != null ? tr.exam_from_to : "--"}}
                            </vs-td>
<!--                            <vs-td data="w">-->
<!--                                &lt;!&ndash;                        <vs-button v-bind:href="'/property/'+tr.prop_id+'/brochure/'+tr.brochure" >Download Brochure</vs-button>&ndash;&gt;-->
<!--                            </vs-td>-->

                            <!--                    <vs-td class="whitespace-no-wrap">-->
                            <!--&lt;!&ndash;                        <feather-icon icon="EditIcon" svgClasses="w-5 h-5 hover:text-primary stroke-current" @click.stop="editData(tr.id)" />&ndash;&gt;-->
                            <!--&lt;!&ndash;                        <feather-icon icon="AwardIcon" svgClasses="w-5 h-5 hover:text-warning stroke-current" class="ml-2" @click.stop="seoEdit(tr.id)" />&ndash;&gt;-->
                            <!--                    </vs-td>-->
                        </vs-tr>
                    </template>
                </vs-table>
            </vx-card>
        </div>
        <vs-prompt
            :active.sync="examPopActive"
        title="Exam Timing">
            <div class="con-exemple-prompt">
                <div class="vx-row">
                    <div class="vx-col" style="width: 50%!important;">
                        <flat-pickr v-model="examFDate" dateFormat="DD/MM/YYYY" />
                    </div>
                    <div class="vx-col" style="width: 50%!important;">
                        <flat-pickr v-model="examTDate" dateFormat="DD/MM/YYYY" />
                    </div>
                </div>
            </div>
        </vs-prompt>
        <vs-prompt
            title="Application Timing"
            :active.sync="appPopActive">
            <div class="con-exemple-prompt">
                <div class="vx-row">
                    <div class="vx-col" style="width: 50%!important;">
                        <flat-pickr v-model="appDate" dateFormat="DD/MM/YYYY" />
                    </div>
                </div>
            </div>
        </vs-prompt>
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
                selectedCatg: {},
                selectedStream: {},
                streams: [],
                examFDate: "",
                examTDate: "",
                examEnterId: null,
                isOnline: false,
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
            addScholarChange(val){
                this.addSelected = val === 1;
            },
            getCategories(){
                axios.post('/api/categories/course-catg')
                    .then((res) => {
                        this.selectedStream = {};
                        this.categories = res.data;
                        // this.getStream()
                    })
                    .catch((err) => {
                        // this.$vs.loading.close();
                        console.log(err)
                    })
            },
            successUpload(v){
                console.log(v);
                this.examEnterId = v.currentTarget.response;
                this.alert('Logo Uploaded Successfully','Exam Logo Uploaded Successfully!','green');
            },
            deleteUpload(v){
                axios.post('/api/exam/delete_image',{
                    'id': this.examEnterId,
                }).then((res) => {
                    console.log(res)
                        if(res.data == 1) {
                            this.alert('Logo Removed Successfully','Exam Logo Removed Successfully!','green');
                        }
                    }).catch((err) => {
                        // this.$vs.loading.close();
                        console.log(err)
                    })
            },
            getStream(){
                axios.post('/api/categories/course-stream',{
                    'id': this.selectedCatg.id,
                })
                    .then((res) => {
                        if(res.data != 0) {
                            this.streams = res.data;
                        }else{
                            $("#stream").hide();
                        }
                    })
                    .catch((err) => {
                        // this.$vs.loading.close();
                        console.log(err)
                    })
            },
            getProps() {
                axios.get('/api/exam/all')
                    .then((res) => {
                        console.log(res)
                        this.props = res.data;
                        this.props.reverse();
                    })
                    .catch((err) => {
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
                axios.post('/api/exam/add',
                    {
                        name: this.name,
                        catg: this.selectedCatg.id,
                        online: this.isOnline,
                        type: this.type,
                        course: this.selectedStream.id,
                        examFrom: this.examFDate,
                        examTo: this.examTDate,
                        app: this.appDate,
                        description: this.content,
                        examId: this.examEnterId
                    }).then((res) => {
                        if (res.data['success'] == 1) {
                            this.getProps();
                            this.examEnterId = res.data['data'];
                            this.alert('Exam Added Successfully!', 'Exam Added or Updated Successfully!', 'success')
                        } else if(res.data['success'] == 0) {
                            this.alert('Failed to Add Exam', 'Check if Any Important Field Left!', 'danger')
                        }
                    }).catch((err) => {
                        console.log(err)
                    })
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
                    position: 'top-right'
                });
            },
            editData(prop) {
                this.$vs.loading();
                this.$router.push("/property/update/" + prop).catch(() => {
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
</style>
