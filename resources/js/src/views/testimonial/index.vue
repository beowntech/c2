<template>
    <vx-card title="Testimonials">
        <vs-prompt title="Export To Excel" class="export-options" @cancle="clearFields" @accept="exportToExcel" accept-text="Export" @close="clearFields" :active.sync="activePrompt">
            <vs-input v-model="fileName" placeholder="Enter File Name.." class="w-full" />
            <v-select v-model="selectedFormat" :options="formats" class="my-4" />
            <div class="flex">
                <span class="mr-4">Cell Auto Width:</span>
                <vs-switch v-model="cellAutoWidth">Cell Auto Width</vs-switch>
            </div>
        </vs-prompt>
        <div class="export-table">
            <vs-table pagination max-items="10" search :data="enquiry">

<!--                <template slot="header">-->
<!--                    <vs-button @click="activePrompt=true">Export</vs-button>-->
<!--                </template>-->

                <template slot="thead">
                    <vs-th sort-key="User">User</vs-th>
                    <vs-th sort-key="image">Image</vs-th>
                    <vs-th sort-key="content">Content</vs-th>
                    <vs-th sort-key="id">Status</vs-th>
                </template>

                <template slot-scope="{data}">
                    <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data">

                        <vs-td :data="data[indextr].user[0].name">
                            {{ data[indextr].user[0].name }}
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
