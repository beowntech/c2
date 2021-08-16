<!-- =========================================================================================
  File Name: UserList.vue
  Description: User List page
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->

<template>
<div @contextmenu="handler($event)">
    <div id="page-user-list">
        <data-view-sidebar :isSidebarActive="addNewDataSidebar" @closeSidebar="toggleDataSidebar" @fetchData="getDataAgain" :data="sidebarData" />
        <vx-card ref="filterCard" title="Filters" class="user-list-filters mb-8" @refresh="resetColFilters" @remove="resetColFilters">
            <div class="vx-row">
                <div class="vx-col md:w-1/4 sm:w-1/2 w-full">
                    <label class="text-sm opacity-75">Status</label>
                    <v-select :options="statusOptions" :clearable="false" :dir="$vs.rtl ? 'rtl' : 'ltr'" v-model="statusFilter" class="mb-4 md:mb-0" />
                </div>
            </div>
        </vx-card>

        <div class="vx-card p-6">

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
                :rowData="usersData"
                rowSelection="multiple"
                colResizeDefault="shift"
                :animateRows="true"
                :floatingFilter="true"
                :pagination="true"
                @gridReady="onGridReady"
                @rowClicked="onRowSelected"
                :paginationPageSize="paginationPageSize"
                :suppressPaginationPanel="true"
                @mousedown.prevent=""
                :enableRtl="$vs.rtl">
            </ag-grid-vue>

            <vs-pagination
                :total="totalPages"
                :max="7"
                v-model="currentPage" />

        </div>
    </div>
</div>
</template>

<script>
    import { AgGridVue } from "ag-grid-vue"
    import '@sass/vuexy/extraComponents/agGridStyleOverride.scss'
    import vSelect from 'vue-select'
    import ImportExcel from "@/components/excel/ImportExcel.vue"
    // Store Module
    import moduleUserManagement from '@/store/user-management/moduleUserManagement.js'

    // Cell Renderer
    import CellRendererStatus from "./CellRendererStatus.vue"
    import CellRendererActions from "./CellRendererActions.vue"
    import CellRendererVerified from "./CellRendererVerified.vue"
    import CellRendererType from "./CellRendererType.vue"
    import CellRendererAssigned from "./CellRendererAssigned.vue"
    import CellRendererName from "./CellRendererName.vue"
    import axios from "axios"
    import DataViewSidebar from "./DataViewSidebar.vue"


    export default {
        components: {
            AgGridVue,
            vSelect,
            DataViewSidebar,
            // Cell Renderer
            CellRendererStatus,
            CellRendererName,
            CellRendererVerified,
            CellRendererActions,
            CellRendererAssigned,
            CellRendererType,
            ImportExcel
        },
        data() {
            return {

                // Filter Options
                roleFilter: { label: 'All', value: 'all' },
                addNewDataSidebar: false,
                roleOptions: [
                    { label: 'All', value: 'all' },
                    { label: 'Admin', value: 'admin' },
                    { label: 'User', value: 'user' },
                    { label: 'Staff', value: 'staff' },
                ],

                statusFilter: { label: 'All', value: 'all' },
                statusOptions: [
                    { label: 'All', value: null },
                    { label: 'Fresh', value: 0 },
                    { label: 'Success', value: 1 },
                    { label: 'Processing', value: 2 },
                    { label: 'Closed', value: 3 },
                ],

                isVerifiedFilter: { label: 'All', value: 'all' },
                isVerifiedOptions: [
                    { label: 'All', value: 'all' },
                    { label: 'Yes', value: 'yes' },
                    { label: 'No', value: 'no' },
                ],

                departmentFilter: { label: 'All', value: 'all' },
                departmentOptions: [
                    { label: 'All', value: 'all' },
                    { label: 'Sales', value: 'sales' },
                    { label: 'Development', value: 'development' },
                    { label: 'Management', value: 'management' },
                ],

                searchQuery: "",

                // AgGrid
                gridApi: null,
                usersData:[],
                gridOptions: {},
                defaultColDef: {
                    sortable: true,
                    resizable: true,
                    suppressMenu: true
                },
                columnDefs: [
                    // {
                    //     headerName: '',
                    //     width: 50,
                    //     checkboxSelection: true,
                    //     pinned: 'left'
                    // },
                    {
                        headerName: '',
                        field: 'status',
                        width: 65,
                        cellRendererFramework: 'CellRendererStatus',
                        pinned: 'left'
                    },
                    {
                        headerName: 'Name',
                        field: 'user_name',
                        cellRendererFramework: 'CellRendererName',
                        width: 200,
                        filter: true,
                    },
                    // {
                    //     headerName: 'Email',
                    //     field: 'user_email',
                    //     filter: true,
                    //     width: 250,
                    // },
                    {
                        headerName: 'Contact',
                        field: 'user_contact',
                        filter: true,
                        width: 185,
                    },
                    {
                        headerName: 'City',
                        field: 'user_city',
                        filter: true,
                        width: 150,
                    },
                    // {
                    //     headerName: 'Course',
                    //     field: 'interest_course',
                    //     filter: true,
                    //     width: 300,
                    // },
                    {
                        headerName: 'Courses',
                        field: 'interest_course',
                        filter: true,
                        cellRendererFramework: 'CellRendererVerified',
                        width: 150,
                    },
                    {
                        headerName: 'Date',
                        field: 'formatDate',
                        filter: true,
                        width: 300,
                    },
                    {
                        headerName: 'Enquiry Type',
                        field: 'form_name',
                        filter: true,
                        width: 120,
                        cellRendererFramework: 'CellRendererType',
                        pinned: 'right'
                    },
                    {
                        headerName: 'Assigned To',
                        field: 'assigned',
                        width: 140,
                        hide: true,
                        cellRendererFramework: 'CellRendererAssigned',
                        pinned: 'right'
                    },
                ],
                sidebarData: {},
                userId: localStorage.getItem('userRole') === "sadmin" ? null : localStorage.getItem('userId'),

                // Cell Renderer Components
                components: {
                    CellRendererStatus,
                    CellRendererActions,
                    CellRendererAssigned,
                    CellRendererName
                }
            }
        },
        watch: {
            statusFilter(obj) {
                this.setColumnFilter("status", obj.value)
            },
        },
        computed: {
            // usersData() {
            //     return this.$store.state.userManagement.users
            // },
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
            handler: function(e) {
                //do stuff
                e.preventDefault();
            },
            onRowSelected(event){
                console.log(event)
                if(event.node.data.form_name === "contact") {
                    this.openSidebar(event.node.data.enq_id, event.node.data.status,"Contact")
                }else if(event.node.data.form_name === "front"){
                    this.openSidebar(event.node.data.enq_id, event.node.data.status, "Front")
                }else if(event.node.data.form_name === "property") {
                    this.openSidebar(event.node.data.enq_id, event.node.data.status, event.node.data.prop[0]['name'])
                }
            },
            toggleDataSidebar(val=false) {
                if(!val){
                    this.sidebarData = {}
                }
                this.addNewDataSidebar = val
            },
            openSidebar(id,status,name){
              this.sidebarData = {id:id,status:status,heading:name}
                this.addNewDataSidebar = true
            },
            onGridReady(params){
                this.gridApi = params.api;
                if(this.userId == null){
                    this.gridOptions.columnApi.setColumnVisible('assigned',true);
                }
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
            resetColFilters() {
                // Reset Grid Filter
                this.gridApi.setFilterModel(null)
                this.gridApi.onFilterChanged()

                // Reset Filter Options
                this.roleFilter = this.statusFilter = this.isVerifiedFilter = this.departmentFilter = { label: 'All', value: 'all' }

                this.$refs.filterCard.removeRefreshAnimation()
            },
            getDataAgain(){
                this.$vs.loading({
                    type: 'corners'
                });
                axios.post('/api/enquiry/caller',{
                    user: this.userId
                })
                    .then((res) => {
                        this.usersData = res.data.reverse();
                        this.$vs.loading.close();
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            updateSearchQuery(val) {
                this.gridApi.setQuickFilter(val)
            }
        },
        beforeMount(){
            this.$vs.loading({
                type: 'corners'
            });
            axios.post('/api/enquiry/caller',{
                user: this.userId
            })
                .then((res) => {
                    this.usersData = res.data.reverse();
                    this.$vs.loading.close();
                })
                .catch((err) => {
                    console.log(err)
                })
        },
        mounted() {
            Echo.channel('enquiry').listen('.enquiry', (e) => {
                if(e.data == this.userId) {
                    this.getDataAgain()
                    this.$vs.notify({
                        color: 'green',
                        title: 'New Enquiry Added',
                        text: 'New Enquiry is Added. Check Now',
                        position: 'top-right'
                    });
                }
            });
            // this.gridApi = this.gridOptions.api

            /* =================================================================
              NOTE:
              Header is not aligned properly in RTL version of agGrid table.
              However, we given fix to this issue. If you want more robust solution please contact them at gitHub
            ================================================================= */
            if(this.$vs.rtl) {
                const header = this.$refs.agGridTable.$el.querySelector(".ag-header-container")
                header.style.left = "-" + String(Number(header.style.transform.slice(11,-3)) + 9) + "px"
            }
        },
        created() {
            // if(!moduleUserManagement.isRegistered) {
            //     this.$store.registerModule('userManagement', moduleUserManagement)
            //     moduleUserManagement.isRegistered = true
            // }
            // this.$store.dispatch("userManagement/fetchUsers").catch(err => { console.error(err) })
        }
    }

</script>

<style lang="scss">
    #page-user-list {
        .user-list-filters {
            .vs__actions {
                position: absolute;
                right: 0;
                top: 50%;
                transform: translateY(-58%);
            }
        }
    }
</style>
