<!-- =========================================================================================
    File Name: i18n.vue
    Description: I18n demo
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
      Author: Pixinvent
    Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->

<template>
    <div>
        <data-cyber-sidebar :isSidebarActive="addNewDataSidebar" @closeSidebar="toggleDataSidebar" @fetchData="getData" :data="sidebarData" />
        <div class="vx-row">
            <div class="vx-col">
                <vs-button color="green" @click="importExcel = true" v-if=" $acl.check('sadmin') && !importExcel">Import Excel</vs-button>
                <vs-button color="red" @click="importExcel = false" v-else-if="$acl.check('sadmin') && importExcel">Close</vs-button>
            </div>
            <div class="vx-col">
                <vs-button color="green" v-if="$acl.check('sadmin')" @click.prevent="downloadItem('https://admissionjockey.com/sample.xlsx')">
                    Download Sample Excel
                </vs-button>
            </div>
        </div>
        <div class="mb-8 mt-8" v-if="$acl.check('sadmin') && importExcel" >
            <import-excel :onSuccess="loadDataInTable"/>
        </div>
        <div class="vx-card p-6 mt-5">

            <div class="flex flex-wrap items-center">

                <!-- ITEMS PER PAGE -->
                <div class="flex-grow">
                    <vs-dropdown vs-trigger-click class="cursor-pointer">
                        <div class="p-4 border border-solid d-theme-border-grey-light rounded-full d-theme-dark-bg cursor-pointer flex items-center justify-between font-medium">
                            <span class="mr-2">{{ currentPage * paginationPageSize - (paginationPageSize - 1) }} - {{ usersData.length - currentPage * paginationPageSize > 0 ? currentPage * paginationPageSize : usersData.length }} of {{ usersData.length }}</span>
                            <feather-icon icon="ChevronDownIcon" svgClasses="h-4 w-4" />
                        </div>
                        <!-- <vs-button class="btn-drop" type="line" color="primary" icon-pack="feather" icon="icon-chevron-down"></vs-button> -->
                        <vs-dropdown-menu>

                            <vs-dropdown-item @click="gridApi.paginationSetPageSize(10)">
                                <span>10</span>
                            </vs-dropdown-item>
                            <vs-dropdown-item @click="gridApi.paginationSetPageSize(20)">
                                <span>20</span>
                            </vs-dropdown-item>
                            <vs-dropdown-item @click="gridApi.paginationSetPageSize(25)">
                                <span>25</span>
                            </vs-dropdown-item>
                            <vs-dropdown-item @click="gridApi.paginationSetPageSize(30)">
                                <span>30</span>
                            </vs-dropdown-item>
                        </vs-dropdown-menu>
                    </vs-dropdown>
                </div>

<!--                <vs-button color="success" @click="refreshData" class="mr-3" type="flat" icon-pack="feather" icon="icon-refresh-cw">Refresh</vs-button>-->

                <!-- TABLE ACTION COL-2: SEARCH & EXPORT AS CSV -->
                <vs-input class="sm:mr-4 mr-0 sm:w-auto w-full sm:order-normal order-3 sm:mt-0 mt-4" v-model="searchQuery" @input="updateSearchQuery" placeholder="Search..." />
                <!-- <vs-button class="mb-4 md:mb-0" @click="gridApi.exportDataAsCsv()">Export as CSV</vs-button> -->

                <!-- ACTION - DROPDOWN -->
                <vs-dropdown vs-trigger-click class="cursor-pointer">

                    <div class="p-3 shadow-drop rounded-lg d-theme-dark-light-bg cursor-pointer flex items-end justify-center text-lg font-medium w-32">
                        <span class="mr-2 leading-none">Actions</span>
                        <feather-icon icon="ChevronDownIcon" svgClasses="h-4 w-4" />
                    </div>

                    <vs-dropdown-menu>

                        <vs-dropdown-item>
                <span class="flex items-center">
                  <feather-icon icon="TrashIcon" svgClasses="h-4 w-4" class="mr-2" />
                  <span>Delete</span>
                </span>
                        </vs-dropdown-item>

                        <vs-dropdown-item>
                <span class="flex items-center">
                  <feather-icon icon="ArchiveIcon" svgClasses="h-4 w-4" class="mr-2" />
                  <span>Archive</span>
                </span>
                        </vs-dropdown-item>

                        <vs-dropdown-item>
                <span class="flex items-center">
                  <feather-icon icon="FileIcon" svgClasses="h-4 w-4" class="mr-2" />
                  <span>Print</span>
                </span>
                        </vs-dropdown-item>

                        <vs-dropdown-item>
                <span class="flex items-center">
                  <feather-icon icon="SaveIcon" svgClasses="h-4 w-4" class="mr-2" />
                  <span>CSV</span>
                </span>
                        </vs-dropdown-item>

                    </vs-dropdown-menu>
                </vs-dropdown>
            </div>


            <!-- AgGrid Table -->
            <ag-grid-vue
                ref="agGridTable"
                :components="components"
                :gridOptions="gridOptions"
                class="ag-theme-material w-100 my-4 ag-grid-table"
                :columnDefs="columnDefs"
                :defaultColDef="defaultColDef"
                :rowData="tableData"
                rowSelection="multiple"
                colResizeDefault="shift"
                :animateRows="true"
                :floatingFilter="true"
                :pagination="true"
                @gridReady="onGridReady"
                @rowClicked="onRowSelected"
                :paginationPageSize="paginationPageSize"
                :suppressPaginationPanel="true"
                :enableRtl="$vs.rtl">
            </ag-grid-vue>

            <vs-pagination
                :total="totalPages"
                :max="7"
                v-model="currentPage" />

        </div>
    </div>
</template>

<script>
    import ImportExcel from "@/components/excel/ImportExcel.vue"
    import axios from "axios";
    import { AgGridVue } from "ag-grid-vue"
    import '@sass/vuexy/extraComponents/agGridStyleOverride.scss'
    import CellRendererStatus from "./CellRendererStatus";
    import DataCyberSidebar from "./DataCyberSidebar";

    export default {
        components: {
            ImportExcel,
            AgGridVue,
            CellRendererStatus,
            DataCyberSidebar
        },
        data() {
            return {
                tableData: [],
                header: [],
                sheetName: "",
                importExcel: false,
                gridApi: null,
                usersData:[],
                gridOptions: {},
                columnDefs: [
                    {
                        headerName: '',
                        field: 'status',
                        width: 80,
                        cellRendererFramework: 'CellRendererStatus',
                        pinned: 'left'
                    },
                    {
                        headerName: 'Name',
                        field: 'student_name',
                        width: 155,
                        filter: true,
                    },
                    {
                        headerName: 'Contact',
                        field: 'phone',
                        filter: true,
                        // cellRendererFramework: 'CellRendererVerified',
                        width: 150,
                    },
                    {
                        headerName: 'District',
                        field: 'district',
                        filter: true,
                        width: 150,
                    },
                    {
                        headerName: 'State',
                        field: 'state',
                        filter: true,
                        width: 150,
                    },
                    {
                        headerName: 'School Name',
                        field: 'school',
                        filter: true,
                        width: 150,
                    },
                    {
                        headerName: 'Email',
                        field: 'email',
                        filter: true,
                        width: 250,
                    },
                ],
                roleFilter: { label: 'All', value: 'all' },
                addNewDataSidebar: false,
                statusFilter: { label: 'All', value: 'all' },
                statusOptions: [
                    { label: 'All', value: null },
                    { label: 'Fresh', value: 0 },
                    { label: 'Success', value: 1 },
                    { label: 'Processing', value: 2 },
                    { label: 'Closed', value: 3 },
                ],
                defaultColDef: {
                    sortable: true,
                    resizable: true,
                    suppressMenu: true
                },
                sidebarData:{},
                components:{
                    CellRendererStatus,
                },

                departmentFilter: { label: 'All', value: 'all' },
            }
        },
        watch: {
            statusFilter(obj) {
                this.setColumnFilter("status", obj.value)
            },
        },
        computed:{
            paginationPageSize() {
                if(this.gridApi) return this.gridApi.paginationGetPageSize()
                else return 10
            },
            totalPages() {
                if(this.gridApi) return this.gridApi.paginationGetTotalPages()
                else return 0
            },
            currentPage: {
                get() {
                    if(this.gridApi) return this.gridApi.paginationGetCurrentPage() + 1
                    else return 1
                },
                set(val) {
                    this.gridApi.paginationGoToPage(val - 1)
                }
            }
        },
        methods: {
            onRowSelected(event){
                this.openSidebar(event.node.data.id, event.node.data.status, event.node.data.school)
            },
            toggleDataSidebar(val=false) {
                this.addNewDataSidebar = val
            },
            openSidebar(id,status,name,s1,s2,s3,s4,s5,s6){
                this.sidebarData = {
                    id:id,
                    status:status,
                    heading:name,
                    s1: s1,
                    s2: s2,
                    s3: s3,
                    s4: s4,
                    s5: s5,
                    s6: s6
                }
                this.addNewDataSidebar = true
            },
            onGridReady(params){
                this.gridApi = params.api;
            },
            setColumnFilter(column, val) {
                const filter = this.gridApi.getFilterInstance(column)
                let modelObj = null

                if(val !== "all") {
                    modelObj = { type: "equals", filter: val }
                }

                filter.setModel(modelObj)
                this.gridApi.onFilterChanged()
            },
            downloadItem({url, label}) {
                axios.get(`/sample.xlsx`, {
                    responseType: 'blob',
                }).then((response) => {
                    const url = URL.createObjectURL(new Blob([response.data]))
                    const link = document.createElement('a')
                    link.href = url
                    link.setAttribute(
                        'download',
                        `sample.xlsx`
                    )
                    document.body.appendChild(link)
                    link.click()
                })
            },
            getData(){
                axios.post('/api/excel/data')
                    .then((res) => {
                        console.log(res)
                    this.tableData = res.data
                }).catch((err) => {
                    console.log(err)
                })
            },
            loadDataInTable({results, header, meta}) {
                axios.post('/api/excel_upload', {
                    data: JSON.stringify(results)
                }).then((res) => {
                  console.log(res.data)
                    this.getData()
                }).catch((err) => {
                    console.log(err)
                })
                //
                // this.header = header
                // this.tableData = results
                // this.sheetName = meta.sheetName
            }
        },
        mounted() {
            if(this.$vs.rtl) {
                const header = this.$refs.agGridTable.$el.querySelector(".ag-header-container")
                header.style.left = "-" + String(Number(header.style.transform.slice(11,-3)) + 9) + "px"
            }
        },
        beforeMount() {
            this.getData()
        },
    }
</script>
