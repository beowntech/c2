<template>
    <div id="data-list-thumb-view" class="data-list-container">

        <caller-view-sidebar :isSidebarActive="addNewDataSidebar" @closeSidebar="toggleDataSidebar" :data="sidebarData" />

        <prop-view-sidebar :isSidebarActive="propSidebar" @closeSidebar="togglePropDataSidebar" :data="propSideData" />

        <vs-table ref="table" multiple v-model="selected" pagination :max-items="itemsPerPage" search :data="managers">

            <div slot="header" class="flex flex-wrap-reverse items-center flex-grow justify-between">

                <div class="flex flex-wrap-reverse items-center">

                    <!-- ACTION - DROPDOWN -->
                    <vs-dropdown vs-trigger-click class="cursor-pointer mr-4 mb-4">

                        <div class="p-4 shadow-drop rounded-lg d-theme-dark-bg cursor-pointer flex items-center justify-center text-lg font-medium w-32">
                            <span class="mr-2">Actions</span>
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
                  <span>Another Action</span>
                </span>
                            </vs-dropdown-item>

                        </vs-dropdown-menu>
                    </vs-dropdown>

                    <!-- ADD NEW -->
                    <div class="p-3 mb-4 mr-4 rounded-lg cursor-pointer flex items-center justify-between text-lg font-medium text-base text-primary border border-solid border-primary" @click="addNewData">
                        <feather-icon icon="PlusIcon" svgClasses="h-4 w-4" />
                        <span class="ml-2 text-base text-primary">Add New</span>
                    </div>
                </div>


                <!-- ITEMS PER PAGE -->
                <vs-dropdown vs-trigger-click class="cursor-pointer mb-4 mr-4">
                    <div class="p-4 border border-solid d-theme-border-grey-light rounded-full d-theme-dark-bg cursor-pointer flex items-center justify-between font-medium">
                        <span class="mr-2">{{ currentPage * itemsPerPage - (itemsPerPage - 1) }} - {{ products.length - currentPage * itemsPerPage > 0 ? currentPage * itemsPerPage : products.length }} of {{ queriedItems }}</span>
                        <feather-icon icon="ChevronDownIcon" svgClasses="h-4 w-4" />
                    </div>
                    <!-- <vs-button class="btn-drop" type="line" color="primary" icon-pack="feather" icon="icon-chevron-down"></vs-button> -->
                    <vs-dropdown-menu>

                        <vs-dropdown-item @click="itemsPerPage=4">
                            <span>4</span>
                        </vs-dropdown-item>
                        <vs-dropdown-item @click="itemsPerPage=10">
                            <span>10</span>
                        </vs-dropdown-item>
                        <vs-dropdown-item @click="itemsPerPage=15">
                            <span>15</span>
                        </vs-dropdown-item>
                        <vs-dropdown-item @click="itemsPerPage=20">
                            <span>20</span>
                        </vs-dropdown-item>
                    </vs-dropdown-menu>
                </vs-dropdown>
            </div>

            <template slot="thead">
                <vs-th sort-key="name">Name</vs-th>
                <vs-th sort-key="email">Email</vs-th>
                <vs-th sort-key="contact">Contact</vs-th>
                <vs-th sort-key="property">Alt Contact</vs-th>
                <vs-th sort-key="status">Status</vs-th>
                <vs-th>Action</vs-th>
            </template>
            <template slot-scope="{data}">
                <tbody>
                <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data">

                    <vs-td>
                        <p class="product-name font-medium truncate">{{ tr.name }}</p>
                    </vs-td>

                    <vs-td>
                        <p class="product-category">{{ tr.email }}</p>
                    </vs-td>

                    <vs-td>
                        <p class="contact">{{ tr.contact }}</p>
                    </vs-td>

                    <vs-td>
                        <p class="product-name">{{ tr.alt_contact }}</p>
                    </vs-td>

                    <vs-td>
                        <vs-chip :color="tr.statuss[0].color" class="product-order-status">{{ tr.statuss[0].name}}</vs-chip>
                    </vs-td>

                    <vs-td class="whitespace-no-wrap">
<!--                        <feather-icon icon="EyeIcon" svgClasses="w-5 h-5 hover:text-primary stroke-current" @click.stop="showProp(tr)" />-->
                        <feather-icon icon="EditIcon" svgClasses="w-5 h-5 hover:text-primary stroke-current" class="ml-2" @click.stop="editData(tr)" />
                        <feather-icon icon="TrashIcon" svgClasses="w-5 h-5 hover:text-danger stroke-current" class="ml-2" @click="openAlert('danger','Are you Sure?','Are you sure you want to Delete: '+tr.name+'',tr.id,indextr)" />
                    </vs-td>

                </vs-tr>
                </tbody>
            </template>
        </vs-table>
    </div>
</template>

<script>
    import CallerViewSidebar from './EditorViewSidebar.vue'
    import PropViewSidebar from './PropViewSidebar.vue'
    import moduleDataList from "@/store/data-list/moduleDataList.js"
    import axios from "axios";
    import moment from 'moment';

    export default {
        components: {
            CallerViewSidebar,
            PropViewSidebar
        },
        data() {
            return {
                selected: [],
                // products: [],
                itemsPerPage: 4,
                isMounted: false,
                addNewDataSidebar: false,
                addNewPropSidebar: true,
                sidebarData: {},
                propSideData:{},
                propSidebar: false,
                managers:[]
            }
        },
        computed: {
            filterDate(value){
                // Vue.filter('formatDate', function(value) {
                //     if (value) {
                return moment(String(value)).format('MM/DD/YYYY hh:mm')
                // }
                // })
            },
            currentPage() {
                if(this.isMounted) {
                    return this.$refs.table.currentx
                }
                return 0
            },
            products() {
                return this.$store.state.dataList.products
            },
            queriedItems() {
                return this.$refs.table ? this.$refs.table.queriedResults.length : this.products.length
            },
        },
        methods: {
            addNewData() {
                this.sidebarData = {}
                this.toggleDataSidebar(true)
            },
            openAlert(color,title,text,id,index){
                this.colorAlert = color
                this.$vs.dialog({
                    color: this.colorAlert,
                    title: title,
                    text: text,
                    accept: this.deleteData(id,index)
                })
            },
            deleteData(id,index) {
                axios.post('/api/users/delete',{id:id,type:1})
                    .then((res) => {
                        if(res.data == 1){
                            this.acceptAlert()
                            this.$delete(this.managers,index)
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            acceptAlert(){
                this.$vs.notify({
                    color:this.colorAlert,
                    title:'Editor Deleted',
                    text:'Editor Deleted Successfully!'
                })
            },
            editData(data) {
                // this.sidebarData = JSON.parse(JSON.stringify(this.blankData))
                this.sidebarData = data
                this.toggleDataSidebar(true)
            },
            showProp(data) {
                // this.sidebarData = JSON.parse(JSON.stringify(this.blankData))
                // this.sidebarData = data
                this.propSideData = data;
                this.togglePropDataSidebar(true)
            },
            getOrderStatusColor(status) {
                if(status == 'on_hold') return "warning"
                if(status == 'delivered') return "success"
                if(status == 'canceled') return "danger"
                return "primary"
            },
            getPopularityColor(num) {
                if(num > 90) return "success"
                if(num >70) return "primary"
                if(num >= 50) return "warning"
                if(num < 50) return "danger"
                return "primary"
            },
            getManagers(){
                axios.post('/api/users/editors')
                    .then((res) => {
                        console.log(res)
                        this.managers = res.data;

                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            toggleDataSidebar(val=false) {
                this.addNewDataSidebar = val
            },
            togglePropDataSidebar(val=false) {
                this.propSidebar = val
            }
        },
        created() {
            if(!moduleDataList.isRegistered) {
                this.$store.registerModule('dataList', moduleDataList)
                moduleDataList.isRegistered = true
            }
            this.$store.dispatch("dataList/fetchDataListItems")
        },
        beforeMount() {
            this.getManagers()
        },
        mounted() {
            this.isMounted = true;
        }
    }
</script>

<style lang="scss">
    #data-list-thumb-view {
        .vs-con-table {

            .product-name {
                max-width: 23rem;
            }

            .vs-table--header {
                display: flex;
                flex-wrap: wrap-reverse;
                margin-left: 1.5rem;
                margin-right: 1.5rem;
                > span {
                    display: flex;
                    flex-grow: 1;
                }

                .vs-table--search{
                    padding-top: 0;

                    .vs-table--search-input {
                        padding: 0.9rem 2.5rem;
                        font-size: 1rem;

                        &+i {
                            left: 1rem;
                        }

                        &:focus+i {
                            left: 1rem;
                        }
                    }
                }
            }

            .vs-table {
                border-collapse: separate;
                border-spacing: 0 1.3rem;
                padding: 0 1rem;


                tr{
                    box-shadow: 0 4px 20px 0 rgba(0,0,0,.05);
                    td{
                        padding: 10px;
                        &:first-child{
                            border-top-left-radius: .5rem;
                            border-bottom-left-radius: .5rem;
                        }
                        &:last-child{
                            border-top-right-radius: .5rem;
                            border-bottom-right-radius: .5rem;
                        }
                        &.img-container {
                            // width: 1rem;
                            // background: #fff;

                            span {
                                display: flex;
                                justify-content: flex-start;
                            }

                            .product-img {
                                height: 110px;
                            }
                        }
                    }
                    td.td-check{
                        padding: 20px !important;
                    }
                }
            }

            .vs-table--thead{
                th {
                    padding-top: 0;
                    padding-bottom: 0;

                    .vs-table-text{
                        text-transform: uppercase;
                        font-weight: 600;
                    }
                }
                th.td-check{
                    padding: 0 15px !important;
                }
                tr{
                    background: none;
                    box-shadow: none;
                }
            }

            .vs-table--pagination {
                justify-content: center;
            }
        }
    }
</style>
