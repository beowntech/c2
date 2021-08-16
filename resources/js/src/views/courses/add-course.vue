<style scoped>
    .con-input-upload{
        width: 120px !important;
        height: 120px !important;
    }
    .img-upload{
        width: 120px !important;
        height: 120px !important;
    }
</style>
<template>
    <div>
        <vx-card :title="$route.params.courseId ? 'Update Course': 'Add Course'">
            <div class="vx-row">
                <div class="vx-col sm:w-1/3 w-full mb-2">
                    <h6 class="mb-1">College Category</h6>
                    <v-select v-model="selectedCatg" @input="getStream" :options="categories" :dir="$vs.rtl ? 'rtl' : 'ltr'" placeholder="Select & Type" />
                </div>
                <div class="vx-col sm:w-1/3 w-full mb-2" style="display:none;" id="stream">
                    <h6 class="mb-1">Stream</h6>
                    <v-select v-model="selectedStream" :options="streams" @input="getSubStream" :dir="$vs.rtl ? 'rtl' : 'ltr'" placeholder="Select & Type" />
                </div>
                <div class="vx-col sm:w-1/3 w-full mb-2" style="display:none;" id="substream">
                    <h6 class="mb-1">Substream</h6>
                    <v-select v-model="selctedSubstream" :options="substreams" :dir="$vs.rtl ? 'rtl' : 'ltr'" placeholder="Select & Type" />
                </div>
            </div>
            <div class="vx-row mt-3">
                <div class="vx-col sm:w-1/3 w-full mb-2">
                    <h6 class="mb-1">Course Duration/Years</h6>
                    <vs-input type="number" style="width: 100%;" v-model="years" placeholder="Eg: 2" />
                </div>
                <div class="vx-col sm:w-1/3 w-full mb-2">
                    <h6 class="mb-1">Course Type</h6>
                    <vs-input style="width: 100%;" v-model="Ctype" placeholder="Eg: Degree, Diploma"/>
                </div>
                <div class="vx-col sm:w-1/3 w-full mb-2">
                    <h6 class="mb-1">Fees (For 1st Year)</h6>
                    <vs-input type="number" style="width: 100%;" v-model="fees" />
                </div>
            </div>
            <div class="vx-row mt-3">
                <div class="vx-col sm:w-1/3 w-full mb-2">
                    <h6 class="mb-1">Program Type </h6>
                    <v-select v-model="time_type" :options="timeType" :dir="$vs.rtl ? 'rtl' : 'ltr'" placeholder="Select & Type" />
                </div>
                <div class="vx-col sm:w-1/3 w-full mb-2">
                    <h6 class="mb-1">Eligibility</h6>
                    <vs-input style="width: 100%;" v-model="eligibility" />
                </div>
                <div class="vx-col sm:w-1/3 w-full mb-2" v-if="!$route.params.courseId">
                    <h6 class="mb-1">Upload Brochure</h6>
                    <input type="file" name="" v-on:change="onFileChange">
                </div>
            </div>
            <div class="vx-row mt-4">
                <div class="vx-col w-full mb-2">
            <vs-button v-if="$route.params.courseId" @click="updateCourse" style="float: right;width: 15%;" >Update</vs-button>
                    <vs-button v-else @click="addRoom" style="float: right;width: 15%;" >Submit</vs-button>
                </div>
            </div>
        </vx-card>
    </div>
</template>
<script>
    import axios from "axios";
    import Input from "../forms/form-elements/input/Input";
    import flatPickr from 'vue-flatpickr-component';
    import 'flatpickr/dist/flatpickr.css';
    import vSelect from 'vue-select'
    import $ from 'jquery';

    export default {
        name: "add-room.vue",
        components: {Input, flatPickr,'v-select': vSelect,},
        data() {
            return {
                count:1,
                categories: [],
                selectedCatg: {},
                selectedStream: {},
                streams: [],
                substreams: [],
                selctedSubstream: [],
                eligibility: "",
                time_type: [],
                fees: null,
                Ctype: "",
                years: "",
                file: null,
                timeType: [
                    {
                    label: 'Part Time',
                    value: 0
                },
                    {
                        label: 'Full Time',
                        value: 1
                    }],
            }
        },
        methods:{
            addRoom(){
                this.$vs.loading();
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                let fd = new FormData();
                fd.append("prop_id", localStorage.getItem('globalIns'));
                fd.append("catg", this.selectedCatg.id);
                fd.append("stream", this.selectedStream.id);
                if (this.selctedSubstream.length != 0) {
                    fd.append("substream", this.selctedSubstream.id);
                }
                fd.append("years", this.years);
                fd.append("type", this.Ctype);
                fd.append("price", this.fees);
                fd.append("progType", this.time_type.value);
                fd.append("eligibility", this.eligibility);
                fd.append("file", this.file);
                // for (var pair of fd.entries()) {
                //     console.log(pair[0]+ ', ' + pair[1]);
                // }
                axios.post('/api/course/add',fd,config)
                    .then((res) => {
                        this.selectedCatg = [];
                        this.selectedStream = [];
                        this.selctedSubstream = [];
                        this.years = "";
                        this.Ctype = "";
                        this.time_type = [];
                        this.eligibility = "";
                        this.file = null;
                        // this.textarea = res.data;
                        this.$vs.loading.close();
                        this.alert('Course Added Successfully','','green');
                        console.log(res.data);
                    })
                    .catch((err) => {
                        this.$vs.loading.close();
                        this.alert('Error Adding Course','There is A Problem while Adding Course','red');
                        console.log(err)
                    })
            },
            updateCourse(){
                console.log(this.time_type)
                this.$vs.loading();
                const config = {
                    headers: { 'content-type': 'multipart/form-data' }
                }
                let fd = new FormData();
                fd.append("course_id", this.$route.params.courseId);
                fd.append("catg", this.selectedCatg.id);
                fd.append("stream", this.selectedStream.id);
                if(this.selctedSubstream.length != 0) {
                    fd.append("substream", this.selctedSubstream.id);
                }
                fd.append("years", this.years);
                fd.append("type", this.Ctype);
                fd.append("price", this.fees);
                fd.append("progType", this.time_type.length > 0 ?  this.time_type[0].value : this.time_type.value);
                fd.append("eligibility", this.eligibility);
                axios.post('/api/course/update',fd,config)
                    .then((res) => {
                        console.log(res)
                        // this.textarea = res.data;
                        this.$vs.loading.close();
                        this.alert('Course Updated Successfully','','green');
                        console.log(res.data);
                    })
                    .catch((err) => {
                        this.$vs.loading.close();
                        this.alert('Error Updated Course','There is A Problem while Updated Course','red');
                        console.log(err)
                    })
            },
            alert(title,text,color){
                this.$vs.notify({
                    color: color,
                    title: title,
                    text: text,
                    position:'top-right'
                });
            },
            onFileChange(e){
                // console.log(e.target.files[0]);
                this.file = e.target.files[0];
            },
            successUpload(e){
                this.originalImage = e.target.files[0];
            },
            getCourseData(){
                axios.post('/api/course/data',{
                    id: this.$route.params.courseId
                })
                    .then((res) => {
                        console.log(res.data)
                        this.selectedCatg = {'id':res.data[0].catg[0].id,'label':res.data[0].catg[0].name}
                        this.fees = res.data[0].price
                        this.years = res.data[0].year
                        this.eligibility = res.data[0].eligibility
                        this.Ctype = res.data[0].type
                        if(res.data[0].streams.length != 0) {
                            $("#stream").show();
                            this.selectedStream = {
                                'id': res.data[0].streams[0].id,
                                'label': res.data[0].streams[0].name
                            }
                        }
                        this.time_type.push({'label':res.data[0].program_type == 0 ? 'Part Time' : 'Full Time','value': res.data[0].program_type});
                    })
                    .catch((err) => {
                        // this.$vs.loading.close();
                        console.log(err)
                    })
            },
            getCategories(){
                axios.post('/api/categories/course-catg')
                    .then((res) => {
                        console.log(res.data)
                        this.categories = res.data;
                        // this.getStream()
                    })
                    .catch((err) => {
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
                            $("#stream").show();
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
            getSubStream(){
                axios.post('/api/categories/course-sub-stream',{
                    'id': this.selectedStream.id,
                })
                    .then((res) => {
                        if(res.data != 0) {
                            $("#substream").show();
                            this.substreams = res.data;
                        }else{
                            $("#substream").hide();
                        }
                    })
                    .catch((err) => {
                        // this.$vs.loading.close();
                        console.log(err)
                    })
            },
        },
        mounted() {
            this.$vs.loading.close()
            if(this.$route.params.courseId){
                this.getCourseData()
            }
            this.getCategories();
        }
    }
</script>
<style>
    .vs__actions{
        display: none !important;
    }
</style>
