<template>
    <div class="vx-row">

        <!-- HORIZONTAL LAYOUT -->
        <div class="vx-col md:w-1/2 w-full mb-base">
            <vx-card title="Add Amenities">
                <div class="vx-row mb-6">
                    <div class="vx-col sm:w-1/3 w-full">
                        <span>Name</span>
                    </div>
                    <div class="vx-col sm:w-2/3 w-full">
                        <vs-input class="w-full" v-model="name" />
                    </div>
                </div>
                <div class="vx-row">
                    <div class="vx-col sm:w-2/3 w-full ml-auto">
                        <vs-button class="mr-3 mb-2" @click="addAmen">Submit</vs-button>
                        <vs-button color="warning" type="border" class="mb-2" @click="name = desc = color = ''; check1 = false;">Reset</vs-button>
                    </div>
                </div>
            </vx-card>
        </div>
        <div class="vx-col md:w-1/2 w-full mb-base">
            <vx-card title="Add Sub Amenities">
                <div class="vx-row mb-6">
                    <div class="vx-col sm:w-1/3 w-full">
                        <span>Parent</span>
                    </div>
                    <div class="vx-col sm:w-2/3 w-full">
                        <vs-select v-model="selected" class="w-full select-large">
                            <vs-select-item :key="index" :value="parent.id" :text="parent.name" v-for="(parent,index) in parent" class="w-full" />
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
                <div class="vx-row">
                    <div class="vx-col sm:w-2/3 w-full ml-auto">
                        <vs-button class="mr-3 mb-2" @click="addSubAmen">Submit</vs-button>
                        <vs-button color="warning" type="border" class="mb-2" @click="name = desc = color = ''; check1 = false;">Reset</vs-button>
                    </div>
                </div>
            </vx-card>
        </div>
        <div class="vx-col md:w-1/2 w-full mb-base">
            <vx-card title="Amenities">
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
                                    <vs-button @click="updateAmen(data[indextr].name,data[indextr].id)">Update</vs-button>
                                </template>
                            </vs-td>
                        </vs-tr>
                    </template>
                </vs-table>
            </vx-card>
        </div>
        <div class="vx-col md:w-1/2 w-full mb-base">
            <vx-card title="Sub Amenities">
                <vs-table search :data="subParent" pagination max-items="5">

                    <template slot="thead">
                        <vs-th sort-key="sno">Sno</vs-th>
                        <vs-th sort-key="name">Name</vs-th>
                        <vs-th sort-key="parent">Parent</vs-th>
                    </template>

                    <template slot-scope="{data}">
                        <vs-tr :key="indextr" v-for="(subParent, indextr) in data">

                            <vs-td :data="data[indextr].id">
                                {{ data[indextr].id }}
                            </vs-td>

                            <vs-td :data="data[indextr].name">
                                {{ data[indextr].name }}
                                <template slot="edit">
                                    <vs-input v-model="data[indextr].name" />
                                    <vs-button @click="updateSubAmen(data[indextr].name,data[indextr].id)">Update</vs-button>
                                </template>
                            </vs-td>

                            <vs-td :data="data[indextr].parent[0]['name']">
                                {{ data[indextr].parent[0]['name'] }}
                                <template slot="edit">
                                    <vs-select v-model="updateselected" @input="setSelected" class="select-large">
                                        <vs-select-item :key="index" v-bind:value="{parent: parent.id,id: data[indextr].id}" :text="parent.name" v-for="(parent,index) in parent" class="w-full" />
                                    </vs-select>
<!--                                    <vs-button @click="updateSubAmen(updateselected,data[indextr].id)">Update</vs-button>-->
                                </template>
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

    export default{
        data() {
            return {
                check1: '',
                name: '',
                subname: '',
                updateId:'',
                desc: '',
                color: '',
                selected: '',
                updateselected:'',
                parent: [],
                subParent: []
            }
        },
        methods:{
            addAmen() {
                axios.post('/api/amenities/add',
                    {
                        name: this.name,
                    })
                    .then((res) => {
                        if(res.data === 1) {
                            alert("Added");
                            this.getAmen();
                            this.name="";
                        }else if(res.data === 2){
                            alert("Already Exist");
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            addSubAmen() {
                axios.post('/api/amenities/sub-add',
                    {
                        name: this.subname,
                        parent: this.selected
                    })
                    .then((res) => {
                        if(res.data === 1) {
                            alert("Added");
                        }else if(res.data === 2){
                            alert("Already Exist");
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            getAmen() {
                axios.post('/api/amenities/parent')
                    .then((res) => {
                        this.parent = res.data;
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            getSubAmen() {
                axios.post('/api/amenities/subamen')
                    .then((res) => {
                        console.log(res.data)
                        this.subParent = res.data;
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            setSelected(value) {
                axios.post('/api/amenities/update',
                    {
                        id: value.id,
                        parent: value.parent,
                        type: 1
                    })
                    .then((res) => {
                        console.log(res)
                        this.alert('Updated Successfully!','Parent Updated Successfully!','success')
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            updateAmen(name, id) {
                axios.post('/api/amenities/update',
                    {
                        id: id,
                        name: name,
                        type: 2
                    })
                    .then((res) => {
                        console.log(res)
                        this.alert('Updated Successfully!','Name Updated Successfully!','success')
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            updateSubAmen(name, id) {
                axios.post('/api/amenities/update',
                    {
                        id: id,
                        name: name,
                        type: 3
                    })
                    .then((res) => {
                        console.log(res)
                        this.alert('Updated Successfully!','Sub Amenity Name Updated Successfully!','success')
                    })
                    .catch((err) => {
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
        },
        beforeMount() {
            this.getAmen();
            this.getSubAmen()
        }
    }
</script>
