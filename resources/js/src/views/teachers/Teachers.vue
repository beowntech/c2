<template>
    <div>
        <data-view-sidebar :isSidebarActive="propSidebar" @isUpdated="updateT" @closeSidebar="toggleDataSidebar" :data="propSideData" />
        <vx-card title="Teachers">
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
                    <vs-th sort-key="name">Name</vs-th>
                    <vs-th sort-key="qual">Qualification</vs-th>
                    <vs-th sort-key="design">Designation</vs-th>
                    <vs-th sort-key="depart">Department</vs-th>
                    <vs-th sort-key="action">Action</vs-th>
                </template>

                <template slot-scope="{data}">
                    <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data">

                        <vs-td :data="data[indextr].name">
                            {{ data[indextr].name }}
                        </vs-td>
                        <vs-td :data="data[indextr].qualification">
                            <vs-chip color="primary" style="overflow: hidden;white-space: nowrap;">
                                {{data[indextr].qualification}}
                            </vs-chip>
                        </vs-td>

                        <vs-td :data="data[indextr].designation">
                            <vs-chip color="success" style="overflow: hidden;white-space: nowrap;">
                                {{ data[indextr].designation }}
                            </vs-chip>
                        </vs-td>

                        <vs-td :data="data[indextr].department">
                            <vs-chip color="warning" style="overflow: hidden;white-space: nowrap;">
                                {{ data[indextr].department }}
                            </vs-chip>
                        </vs-td>
                        <vs-td class="whitespace-no-wrap">
                            <feather-icon icon="EditIcon" svgClasses="w-5 h-5 hover:text-primary stroke-current" @click.stop="editData(tr)" />
<!--                            <feather-icon icon="AwardIcon" svgClasses="w-5 h-5 hover:text-warning stroke-current" class="ml-2" @click.stop="seoEdit(tr.id)" />-->
                            <feather-icon icon="TrashIcon" svgClasses="w-5 h-5 hover:text-warning stroke-current" class="ml-2" @click.stop="activePrompt2 = true,teacherName = tr.name,teacherId=tr.id" />
                        </vs-td>
                    </vs-tr>
                </template>
            </vs-table>
        </div>
    </vx-card>
        <vs-prompt
            @cancel="teacherName='',teacherId=null"
            @close="teacherName='',teacherId=null"
            @accept="deleteTeacher"
            title="Are you Sure you want to Delete?"
            :active.sync="activePrompt2">
            <div class="con-exemple-prompt">
               <p v-text="'Are you sure you want to delete '+this.teacherName"></p>
            </div>
        </vs-prompt>
    </div>
</template>

<script>
    import axios from "axios";
    import DataViewSidebar from './DataViewSidebar.vue';

    export default {
        data() {
            return {
                selected: [],
                propSideData: {},
                fileName: "",
                teacherId: null,
                teacherName: "",
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
                updateTeacher: false,
                activePrompt: false,
                activePrompt2: false,
                propSidebar: false,
                status:[],
            }
        },
        methods:{
            getEnquiry(){
                axios.post('/api/teachers/list',{
                    'id': localStorage.getItem('globalIns')
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
            deleteTeacher(){
                axios.post('/api/teacher/delete',{
                    teacherId: this.teacherId
                })
                    .then((res) => {
                        this.getEnquiry();
                        console.log(res.data);
                        this.alert('Teacher Deleted Successfully','','green');
                    }).catch((err) => {
                    // this.$vs.loading.close();
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
            },
            toggleDataSidebar(val=false) {
                this.propSidebar = val
            },
            updateT(val=true){
                    this.getEnquiry()
                    // this.updateT(false)
            },
            editData(data) {
                // this.sidebarData = JSON.parse(JSON.stringify(this.blankData))
                this.propSideData = data
                this.toggleDataSidebar(true)
            },
        },
        components: {
            DataViewSidebar,
        },
        beforeMount() {
            this.getEnquiry()
            this.getStatus()
        }
    }
</script>
