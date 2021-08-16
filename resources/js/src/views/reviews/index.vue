<template>
    <vx-card title="Reviews">
        <vs-prompt title="Export To Excel" class="export-options" @cancle="clearFields" @accept="exportToExcel" accept-text="Export" @close="clearFields" :active.sync="activePrompt">
            <vs-input v-model="fileName" placeholder="Enter File Name.." class="w-full" />
            <v-select v-model="selectedFormat" :options="formats" class="my-4" />
            <div class="flex">
                <span class="mr-4">Cell Auto Width:</span>
                <vs-switch v-model="cellAutoWidth">Cell Auto Width</vs-switch>
            </div>
        </vs-prompt>
        <div class="export-table">
            <vs-table multiple v-model="selected" pagination max-items="10" search :data="enquiry">

                <template slot="header">
                    <vs-button @click="activePrompt=true">Export</vs-button>
                </template>

                <template slot="thead">
                    <vs-th sort-key="user">User</vs-th>
                    <vs-th sort-key="stars">Stars</vs-th>
                    <vs-th sort-key="message">Message</vs-th>
                    <vs-th sort-key="status">Status</vs-th>
                </template>

                <template slot-scope="{data}">
                    <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data">

                        <vs-td :data="data[indextr].user[0].name">
                            {{ data[indextr].user[0].name }}
                        </vs-td>

                        <vs-td :data="data[indextr].stars">
                            {{ data[indextr].stars }}
                        </vs-td>

                        <vs-td :data="data[indextr].message">
                            {{ data[indextr].message }}
                        </vs-td>

                        <vs-td>
                            <vs-chip :color="tr.stat[0].color" class="product-order-status">{{ tr.stat[0].name}}</vs-chip>
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
                activePrompt: false,
            }
        },
        methods:{
            getEnquiry(){
                axios.post('/api/reviews/list',{
                    'prop': localStorage.getItem('globalIns')
                })
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
            clearFields() {
                this.filename = "",
                    this.cellAutoWidth = true,
                    this.selectedFormat = "xlsx"
            }
        },
        beforeMount() {
            this.getEnquiry()
        }
    }
</script>
