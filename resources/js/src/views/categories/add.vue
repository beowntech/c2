<template>
    <div class="vx-row">

        <!-- HORIZONTAL LAYOUT -->
        <div class="vx-col md:w-1/2 w-full mb-base">
            <vx-card title="Add Categories">
<!--                <vx-card class="mb-4" style="text-align: center">-->
<!--                <div id="preview" style="text-align: -webkit-center;">-->
<!--                    <img v-if="url" :src="url" style="width: 40%"/>-->
<!--                </div>-->
<!--                <input type="file" @change="onFileChange" />-->
<!--                </vx-card>-->
                <div class="vx-row mb-6">
                    <div class="vx-col sm:w-1/3 w-full mb-4">
                        <span>Image</span>
                    </div>
                    <div class="vx-col sm:w-2/3 w-full mb-4">
                    <div id="subpreview" class="w-full">
                        <img v-if="suburl" :src="suburl" style="width: 40%"/>
                    </div>
                        <input type="file" @change="onSubFileChange" />
                    </div>
                    <div class="vx-col sm:w-1/3 w-full">
                        <span>Name</span>
                    </div>
                    <div class="vx-col sm:w-2/3 w-full">
                        <vs-input class="w-full" v-model="name" />
                    </div>
                </div>
                <div class="vx-row mb-6">
                    <div class="vx-col sm:w-1/3 w-full">
                        <span>Description</span>
                    </div>
                    <div class="vx-col sm:w-2/3 w-full">
                        <vs-textarea class="w-full" v-model="description" />
                    </div>
                </div>
                <div class="vx-row">
                    <div class="vx-col sm:w-2/3 w-full ml-auto">
                        <vs-button class="mr-3 mb-2" @click="addCat">Submit</vs-button>
                        <vs-button color="warning" type="border" class="mb-2" @click="name = desc = color = ''; check1 = false;">Reset</vs-button>
                    </div>
                </div>
            </vx-card>
        </div>
        <div class="vx-col md:w-1/2 w-full mb-base">
            <vx-card title="Add Streams">
                <div class="vx-row mb-6">
                    <div class="vx-col sm:w-1/3 w-full">
                        <span>Parent</span>
                    </div>
                    <div class="vx-col sm:w-2/3 w-full">
                        <vs-select v-model="selected" class="w-full select-large" >
                                <vs-select-item :key="index" :value="par.id" :text="par.name" v-for="(par,index) in parent" class="w-full" />
                        </vs-select>
                    </div>
                </div>
                <div class="vx-row mb-6">
                    <div class="vx-col sm:w-1/3 w-full">
                        <span>Name</span>
                    </div>
                    <div class="vx-col sm:w-2/3 w-full">
                        <vs-input class="w-full" v-model="subname" />
                    </div>
                </div>
                <div class="vx-row mb-6">
                    <div class="vx-col sm:w-1/3 w-full">
                        <span>Description</span>
                    </div>
                    <div class="vx-col sm:w-2/3 w-full">
                        <vs-textarea class="w-full" v-model="subdescription" />
                    </div>
                </div>
                <div class="vx-row">
                    <div class="vx-col sm:w-2/3 w-full ml-auto">
                        <vs-button class="mr-3 mb-2" @click="addSubCat">Submit</vs-button>
                        <vs-button color="warning" type="border" class="mb-2" @click="subname = ''; check1 = false;">Reset</vs-button>
                    </div>
                </div>
            </vx-card>
        </div>
        <div class="vx-col md:w-1/2 w-full mb-base">
            <vx-card title="Categories">
            <vs-table search :data="parent" pagination max-items="5">

                <template slot="thead">
                    <vs-th sort-key="sno">Sno</vs-th>
                    <vs-th sort-key="name">Name</vs-th>
                </template>

                <template slot-scope="{data}">
                    <vs-tr :key="indextr" v-for="(parent, indextr) in data">

                        <vs-td :data="data[indextr].id">
                            {{ data[indextr].id }}
                        </vs-td>

                        <vs-td :data="data[indextr].name">
                            {{ data[indextr].name }}
                            <template slot="edit">
                                <vs-input v-model="data[indextr].name" />
                                <vs-button @click="updateCat(data[indextr].name,data[indextr].id)">Update</vs-button>
                            </template>
                        </vs-td>
                    </vs-tr>
                </template>
            </vs-table>
            </vx-card>
        </div>
        <div class="vx-col md:w-1/2 w-full mb-base">
            <vx-card title="Streams">
                <vs-table search :data="subParent" pagination max-items="5">

                    <template slot="thead">
                        <vs-th sort-key="sno">Sno</vs-th>
                        <vs-th sort-key="name">Name</vs-th>
                        <vs-th sort-key="parent">Parent</vs-th>
                        <vs-th sort-key="parent">Action</vs-th>
                    </template>

                    <template slot-scope="{data}">
                        <vs-tr :key="indextr" v-for="(subParent, indextr) in data">

                            <vs-td :data="data[indextr].id">
                                {{ data[indextr].id }}
                            </vs-td>

                            <vs-td :data="data[indextr].name">
                                {{ data[indextr].name }}
                            </vs-td>

                            <vs-td :data="data[indextr].parent" color="success">
                                {{ data[indextr].parent }}
                            </vs-td>
                            <vs-td>
                                <feather-icon icon="TrashIcon" svgClasses="w-5 h-5 hover:text-warning stroke-current" class="ml-2" @click.stop="openAlert(data[indextr].name,data[indextr].id)" />
<!--                                <vs-button @click="activePrompt2 = true; updatesubname = data[indextr].name;updatesuburl = 'http://localhost:8000/alotfront/assets/images/site/'+data[indextr].image;updatephotoname=1;updatesubdescription = data[indextr].description;updateselected = data[indextr].parid;updateId=data[indextr].id" color="primary" type="border"><edit-2-icon size="1.1x" class="custom-class" color="dark"></edit-2-icon></vs-button>-->
                            </vs-td>
                        </vs-tr>
                    </template>
                </vs-table>
            </vx-card>
        </div>
        <vs-prompt
            @cancel="clearValMultiple"
            @accept="acceptAlert"
            title="Update Category"
            :active.sync="activePrompt2">
            <div class="con-exemple-prompt">
                <div class="vx-row">

                    <!-- HORIZONTAL LAYOUT -->
                    <div class="vx-col md:w-1/2 w-full mb-base">
                        <vx-card class="mb-4" style="text-align: center">
                            <vs-input v-model="updateId" style="display:none;"></vs-input>
                            <div id="updatesubpreview" style="text-align: -webkit-center;">
                                <img v-if="updatesuburl" :src="updatesuburl" style="width: 35%"/>
                            </div>
                            <vs-input style="display: none" v-model="updatephotoname"></vs-input>
                            <input type="file" @change="updateonSubFileChange" />
                            <vs-button @click="remove">Remove</vs-button>
                        </vx-card>
                    </div>
                    <div class="vx-col md:w-1/2 w-full mb-base">
                        <vx-card title="Update Sub Categories">
                            <div class="vx-row mb-6">
                                <div class="vx-col sm:w-1/3 w-full">
                                    <span>Parent</span>
                                </div>
                                <div class="vx-col sm:w-2/3 w-full">
                                    <vs-select v-model="updateselected" class="w-full select-large" >
                                        <vs-select-item :key="index" :value="par.id" :text="par.name" v-for="(par,index) in parent" class="w-full" />
                                    </vs-select>
                                </div>
                            </div>
                            <div class="vx-row mb-6">
                                <div class="vx-col sm:w-1/3 w-full">
                                    <span>Name</span>
                                </div>
                                <div class="vx-col sm:w-2/3 w-full">
                                    <vs-input class="w-full" v-model="updatesubname" />
                                </div>
                            </div>
                            <div class="vx-row mb-6">
                                <div class="vx-col sm:w-1/3 w-full">
                                    <span>Description</span>
                                </div>
                                <div class="vx-col sm:w-2/3 w-full">
                                    <vs-textarea class="w-full" v-model="updatesubdescription" />
                                </div>
                            </div>
                        </vx-card>
                    </div>
                </div>
            </div>
        </vs-prompt>
        <vs-prompt
            @cancel="val=[]"
            @accept="this.streamDelete"
            @close="val=[]"
            :active.sync="activePrompt">
            <div class="con-exemple-prompt">
                <span v-text="val.length != 0 ? 'Are You Sure You Want To Delete '+val[0].name+'?' : ''" ></span>
            </div>
        </vs-prompt>
    </div>
</template>

<script>
    import axios from "axios";
    import Input from "../forms/form-elements/input/Input";
    import { Edit2Icon } from 'vue-feather-icons'
    export default{
        components: {
            Input,
            Edit2Icon,},
        data() {
            return {
                check1: '',
                name: '',
                subname: '',
                updatesubname: '',
                description: '',
                subdescription: '',
                updatesubdescription: '',
                updatephotoname:'',
                color: '',
                updateId: '',
                photo: null,
                subphoto: null,
                updatesubphoto: null,
                selected: '',
                updateselected: '',
                url: null,
                suburl: null,
                updatesuburl: null,
                valMultipe:{
                    value1:'',
                    value2:''
                },
                activePrompt:false,
                activePrompt2:false,
                val:[],
                parent: [],
                subParent: []
            }
        },
        computed:{
            validName(){
                return (this.valMultipe.value1.length > 0 && this.valMultipe.value2.length > 0)
            }
        },
        methods:{
            openAlert(name,id){
                this.val.push({'name':name,'id':id});
                this.activePrompt = true;
            },
            addCat() {
                const data = new FormData();
                data.append('photo', this.photo);
                data.append('name',this.name);
                data.append('desc',this.description);
                axios.post('/api/categories/add',data)
                    .then((res) => {
                        if(res.data === 1) {
                            this.alert('Category Added!','Category Added Successfully!','success')
                            alert("Added");
                            this.getCat();
                            this.getSubCat()
                            this.name="";
                            this.photo = "";
                            this.description = "";
                        }else if(res.data === 2){
                            alert("Already Exist");
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            addSubCat() {
                const subData = new FormData();
                subData.append('name',this.subname);
                subData.append('desc',this.subdescription);
                subData.append('parent',this.selected);
                axios.post('/api/categories/sub-add',subData)
                    .then((res) => {
                        if(res.data === 1) {
                            this.alert('Stream Added!','Stream Added Successfully!','success')
                            this.getCat()
                            this.getSubCat()
                            this.subname = "";
                            this.selected = "";
                        }else if(res.data === 2){
                            this.alert('Already Exist!','Stream Already Exists!','red')
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            getCat() {
                axios.post('/api/categories/parent')
                    .then((res) => {
                        this.parent = "";
                        this.parent = res.data;
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            streamDelete() {
                axios.post('/api/stream/delete',{
                    id: this.val[0].id
                }).then((res) => {
                        this.alert('Stream Deleted Successfully',this.val[0].name + ' Deleted Successfully','green');
                        this.val = [];
                        this.getSubCat()
                    }).catch((err) => {
                        console.log(err)
                    })
            },
            getSubCat() {
                axios.post('/api/categories/subcat')
                    .then((res) => {
                        this.subParent = ""
                        this.subParent = res.data;
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            updateCat(text,id) {
                axios.post('/api/categories/update',
                    {
                        id: id,
                        name: text
                    })
                    .then((res) => {
                        this.alert('Updated Successfully!','Category Updated Successfully!','success')
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            // updateSubCat(text,id) {
            //     axios.post('/api/categories/sub_update',
            //         {
            //             id: id,
            //             name: text
            //         })
            //         .then((res) => {
            //             this.alert('Updated Successfully!','Sub Category Updated Successfully!','success')
            //         })
            //         .catch((err) => {
            //             console.log(err)
            //         })
            // },
            alert(title,text,color){
                this.$vs.notify({
                    color: color,
                    title: title,
                    text: text,
                    position:'top-right'
                });
            },
            onFileChange(e) {
                const file = e.target.files[0];
                this.photo = e.target.files[0];
                this.url = URL.createObjectURL(file);
            },
            onSubFileChange(e) {
                const file = e.target.files[0];
                this.subphoto = e.target.files[0];
                this.suburl = URL.createObjectURL(file);
            },
            updateonSubFileChange(e) {
                const file = e.target.files[0];
                this.updatesubphoto = e.target.files[0];
                this.updatesuburl = URL.createObjectURL(file);
                this.updatephotoname = 2;
            },
            remove() {
                this.updatesuburl = null;
                this.updatephotoname = 0;
            },
            acceptAlert(){
                const subData = new FormData();
                subData.append('id', this.updateId);
                subData.append('photo', this.updatesubphoto);
                subData.append('name',this.updatesubname);
                subData.append('parent',this.updateselected);
                subData.append('desc',this.updatesubdescription);
                subData.append('check',this.updatephotoname);
                axios.post('/api/categories/sub_update',subData)
                    .then((res) => {
                        console.log(res)
                        if(res.data === 1) {
                            this.alert('Sub Category Updated!','Sub Category Updated Successfully!','success')
                            this.getCat()
                            this.getSubCat()
                            this.updatesubname = "";
                            this.subphoto = "";
                            this.updateselected = "";
                            this.updatesubdescription = "";
                        }else if(res.data === 2){
                            this.alert('Already Exist!','','danger')
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            clearValMultiple() {
                this.valMultipe.value1 = "";
                this.valMultipe.value2 = "";
            }
        },
        beforeMount() {
            this.getCat();
            this.getSubCat();
        }
    }
</script>
<style>
    /*.vs-dialog{*/
    /*    max-width: 90% !important;*/
    /*}*/
</style>
