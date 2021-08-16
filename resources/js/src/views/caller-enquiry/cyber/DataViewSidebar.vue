<!-- =========================================================================================
  File Name: AddNewDataSidebar.vue
  Description: Add New Data - Sidebar component
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
    <vs-sidebar click-not-close position-right parent="body" default-index="1" color="primary"
                class="add-new-data-sidebar items-no-padding" spacer v-model="isSidebarActiveLocal">
        <div class="mt-6 flex items-center justify-between px-6">
            <h4 v-text="dataHeading">Enquiry Status</h4>
            <feather-icon icon="XIcon" @click.stop="isSidebarActiveLocal = false" class="cursor-pointer"></feather-icon>
        </div>
        <vs-divider class="mb-0"></vs-divider>

        <VuePerfectScrollbar class="scroll-area--data-list-add-new" :settings="settings" :key="$vs.rtl">
                    <div class="pl-6 pr-6">

                        <!-- STATUS -->
                        <vs-select v-model="status_value" @change="changeStatus" label="Status" class="mt-5 w-full">
                            <vs-select-item :key="item.value" :value="item.value" :text="item.text"
                                            v-for="item in order_status_choices"/>
                        </vs-select>

                        <!-- NAME -->
                        <vs-textarea label="Reason" v-model="dataName" class="mt-5 w-full" name="item-name"/>

                        <div class="flex flex-wrap items-center pl-6 pr-6" slot="footer">
                            <vs-button class="mr-6" @click="submitData" :disabled="!isFormValid">Submit</vs-button>
                            <vs-button type="border" color="danger" @click="isSidebarActiveLocal = false">Close
                            </vs-button>
                        </div>
                    </div>
                    <div class="pl-6 pr-6">
                        <vs-table pagination max-items="4" search :data="statuses">

                            <template slot="thead">
                                <vs-th sort-key="status">Progress Chat</vs-th>
                            </template>

                            <template slot-scope="{data}">
                                <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data">

                                    <vs-td :data="data[indextr].date">
                                        <small>{{ data[indextr].date }}</small>
                                        <p>{{ data[indextr].reason }}</p>
                                    </vs-td>


                                </vs-tr>
                            </template>
                        </vs-table>
                    </div>
        </VuePerfectScrollbar>

    </vs-sidebar>
</template>

<script>
    import VuePerfectScrollbar from 'vue-perfect-scrollbar';
    import axios from "axios";

    export default {
        props: {
            isSidebarActive: {
                type: Boolean,
                required: true
            },
            data: {
                type: Object,
                default: () => {
                },
            }
        },
        watch: {
            isSidebarActive(val) {
                if (!val) return
                if (Object.entries(this.data).length === 0) {
                    this.initValues()
                    this.$validator.reset()
                } else {
                    let {id, status, heading} = JSON.parse(JSON.stringify(this.data))
                    this.dataId = id
                    this.status_value = status
                    this.dataHeading = heading
                    this.getData()
                    this.initValues()
                }
                // Object.entries(this.data).length === 0 ? this.initValues() : { this.dataId, this.dataName, this.dataCategory, this.dataOrder_status, this.dataPrice } = JSON.parse(JSON.stringify(this.data))
            }
        },
        data() {
            return {

                dataId: null,
                dataName: "",
                status_value: null,
                dataCategory: null,
                statuses: [],
                dataHeading: "",
                category_choices: [
                    {text: 'Audio', value: 'audio'},
                    {text: 'Computers', value: 'computers'},
                    {text: 'Fitness', value: 'fitness'},
                    {text: 'Appliance', value: 'appliance'}
                ],

                order_status_choices: [
                    {text: 'Fresh', value: 0},
                    {text: 'Process', value: 2},
                    {text: 'Success', value: 1},
                    {text: 'Closed', value: 3},
                    // {text:'Delivered',value:'delivered'},
                    // {text:'On Hold',value:'on_hold'}
                ],
                settings: { // perfectscrollbar settings
                    maxScrollbarLength: 60,
                    wheelSpeed: .60,
                },
            }
        },
        computed: {
            isSidebarActiveLocal: {
                get() {
                    return this.isSidebarActive
                },
                set(val) {
                    if (!val) {
                        this.$emit('closeSidebar')
                        // this.$validator.reset()
                        this.initValues()
                    }
                }
            },
            isFormValid() {
                return !this.errors.any()
            }
        },
        methods: {
            initValues() {
                if (this.data.id) return
                this.dataId = null
                this.dataHeading = ""
                this.status_value = null
            },
            changeStatus() {
                axios.post('/api/cyber/status/update', {
                    status: this.status_value,
                    id: this.data.id
                })
                    .then((res) => {
                        this.$emit('fetchData')
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            submitData() {
                if (this.dataName === "") {
                    alert('Add Reason')
                } else {
                    axios.post('/api/cyber/reason', {
                        reason: this.dataName,
                        id: this.data.id,
                        user_id: localStorage.getItem('userId')
                    }).then((res) => {
                        console.log(res)
                        this.dataName = ""
                        this.getData()
                    })
                        .catch((err) => {
                            console.log(err)
                        })
                }

            },
            getData() {
                axios.get('/api/cyber/detail?enq=' + this.data.id)
                    .then((res) => {
                        console.log(res)
                        this.statuses = res.data.reverse();
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            }
        },
        beforeMount() {
            this.getData()
        },
        components: {
            VuePerfectScrollbar,
        }
    }
</script>

<style lang="scss" scoped>
    .vx-card .vx-card__collapsible-content.vs-con-loading__container {
         overflow: hidden;
    }
    .vx-card .vx-card__collapsible-content .vx-card__body {
        padding: 0rem !important;
    }

    .add-new-data-sidebar {
        ::v-deep .vs-sidebar--background {
            z-index: 52010;
        }

        ::v-deep .vs-sidebar {
            z-index: 52010;
            width: 525px;
            max-width: 90vw;

            .img-upload {
                margin-top: 2rem;

                .con-img-upload {
                    padding: 0;
                }

                .con-input-upload {
                    width: 100%;
                    margin: 0;
                }
            }
        }
    }

    .scroll-area--data-list-add-new {
        // height: calc(var(--vh, 1vh) * 100 - 4.3rem);
        height: calc(var(--vh, 1vh) * 100 - 16px - 45px - 82px);
    }
</style>
