<template>
    <vx-card title="Testimonials">
        <vs-prompt title="Add Testimonial" class="export-options"
                   @cancle="clearFields"
                   @accept="createTestimonial"
                   accept-text="ADD"
                   @close="clearFields"
                   :active.sync="activePrompt">
            <vs-input type="file" @change="showImage" style="width: 100%"></vs-input>
            <br>
            <vs-input v-model="userName" placeholder="Enter User Name.." class="w-full" />
            <br>
            <vs-input v-model="propertyName" placeholder="Enter College Name.." class="w-full" />
            <br>
            <vs-textarea v-model="content" rows="6" placeholder="Enter Testimonial Content" class="w-full" />
        </vs-prompt>
        <div class="export-table">
            <vs-table pagination max-items="10" search :data="enquiry">

                <template slot="header">
                    <vs-button class="float-right" @click="activePrompt=true">Add New</vs-button>
                </template>

                <template slot="thead">
                    <vs-th sort-key="image">Image</vs-th>
                    <vs-th sort-key="User">User</vs-th>
                    <vs-th sort-key="User">Property</vs-th>
                    <vs-th sort-key="content">Content</vs-th>
                    <vs-th sort-key="id">Status</vs-th>
                </template>

                <template slot-scope="{data}">
                    <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data">

                        <vs-td :data="data[indextr].user_name">
                            {{ data[indextr].user_name }}
                        </vs-td>
                        <vs-td :data="data[indextr].property_name">
                            {{ data[indextr].property_name }}
                        </vs-td>
                        <vs-td :data="data[indextr].image">
                            <a v-bind:href="/testimonials/+data[indextr].image" target="_blank">Open Image</a>
                        </vs-td>

                        <vs-td :data="data[indextr].content">
                            {{ data[indextr].content }}
                        </vs-td>

                        <vs-td :data="tr.stat[0].color">
                            <vs-chip :color="tr.stat[0].color" class="product-order-status">{{ tr.stat[0].name}}</vs-chip>
                            <template slot="edit">
                                <vs-select v-model="updateselected = tr.stat[0].id" @input="updateStatus(updateselected,data[indextr].id)" class="select-large">
                                    <vs-select-item :key="index" v-bind:value="status.id" :text="status.name" v-for="(status,index) in status" class="w-full" />
                                </vs-select>
                            </template>
                        </vs-td>

                    </vs-tr>
                </template>
            </vs-table>
        </div>
    </vx-card>
</template>

<script>
import axios from "axios";

export default {
        data() {
            return {
                selected: [],
                fileName: "",
                image: null,
                userName:"",
                propertyName:"",
                content:"",
                formats:["xlsx", "csv", "txt"] ,
                cellAutoWidth: true,
                selectedFormat: "xlsx",
                headerTitle: ["User", "Stars", "Porperty","No. Of Traveller"],
                headerVal: ["name", "email", "contact","no_traveller"],
                'tableList': [
                    'vs-th: Component',
                    'vs-tr: Component',
                    'vs-td: Component',
                    'thread: Slot',
                    'tbody: Slot',
                    'header: Slot'
                ],
                enquiry: [],
                updateselected:[],
                activePrompt: false,
                status:[],
            }
        },
        methods:{
            getEnquiry(){
                axios.post('/api/testimonials/list')
                    .then((res) => {
                        console.log(res)
                        this.enquiry = res.data;

                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            createTestimonial(){
                let formData = new FormData();
                formData.append('image',this.image);
                formData.append('user',this.userName);
                formData.append('property',this.propertyName);
                formData.append('text',this.content);
                axios.post('/api/testimonial/add', formData, {
                    headers: {
                        'Content-Type': 'multipart/form-data;'
                    }
                }).then((res) => {
                    this.getEnquiry()
                   this.alert('Testimonial Added Successfully','','green')

                }).catch((err) => {
                    console.log(err)
                })
            },
            exportToExcel() {
                import('@/vendor/Export2Excel').then(excel => {
                    const list = this.enquiry
                    const data = this.formatJson(this.headerVal, list)
                    excel.export_json_to_excel({
                        header: this.headerTitle,
                        data,
                        filename: this.fileName,
                        autoWidth: this.cellAutoWidth,
                        bookType: this.selectedFormat
                    })
                    this.clearFields()
                })
            },
            formatJson(filterVal, jsonData) {
                return jsonData.map(v => filterVal.map(j => {
                    // Add col name which needs to be translated
                    // if (j === 'timestamp') {
                    //   return parseTime(v[j])
                    // } else {
                    //   return v[j]
                    // }

                    return v[j]
                }))
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
            updateStatus(data,id){
                axios.post('/api/testimonial/update',
                    {
                        status: data.id,
                        id: id
                    })
                    .then((res) => {
                        this.alert('Status Updated Successfully!','Testimonial Status Updated Successfully!','success')
                        window.location.reload()
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
            showImage(e) {
                this.image = e.target.files[0];
            },
            clearFields() {
                this.filename = "",
                    this.cellAutoWidth = true,
                    this.selectedFormat = "xlsx"
            }
        },
        beforeMount() {
            this.getEnquiry()
            this.getStatus()
        }
    }
</script>
