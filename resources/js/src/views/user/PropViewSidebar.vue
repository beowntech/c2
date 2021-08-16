<!-- =========================================================================================
  File Name: AddNewDataSidebar.vue
  Description: Add New Data - Sidebar component
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
    <vs-sidebar click-not-close position-right parent="body" default-index="1" st color="primary" class="add-new-data-sidebar prop-sidebar items-no-padding" spacer v-model="isSidebarActiveLocal">
        <div class="mt-6 flex items-center justify-between px-6">
            <h4>Properties</h4>
            <feather-icon icon="XIcon" @click.stop="isSidebarActiveLocal = false" class="cursor-pointer"></feather-icon>
        </div>
        <vs-divider class="mb-0"></vs-divider>

        <VuePerfectScrollbar class="scroll-area--data-list-add-new" :settings="settings" :key="$vs.rtl">
            <div class="p-6" id="ListView">
                <vs-table ref="table" v-model="selected" :max-items="itemsPerPage" :data="prop">

                    <template slot="thead">
                        <vs-th sort-key="image">Image</vs-th>
                        <vs-th sort-key="name">Name</vs-th>
                        <vs-th sort-key="status">Status</vs-th>
                        <vs-th>Action</vs-th>
                    </template>
                    <template slot-scope="{data}">
                        <tbody>
                        <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data">

                            <div class="img-container w-64 mx-auto flex items-center justify-center">
                                <img :src="'/property/images/' + tr.image[0].featured" width="80%" style="padding: 10px" alt="img" class="responsive">
                            </div>

                            <vs-td>
                                <p class="product-category"><p class="font-medium">{{ tr.name }}</p>{{tr.location[0].name}}</p>
                            </vs-td>

                            <vs-td>
                                <vs-chip :color="tr.statuss[0].color" class="product-order-status">{{ tr.statuss[0].name}}</vs-chip>
                            </vs-td>

                            <vs-td class="whitespace-no-wrap">
<!--                                <feather-icon icon="EyeIcon" svgClasses="w-5 h-5 hover:text-primary stroke-current" @click.stop="showProp(tr)" />-->
                                <feather-icon icon="EditIcon" svgClasses="w-5 h-5 hover:text-primary stroke-current" class="ml-2" @click.stop="editData(tr)" />
<!--                                <feather-icon icon="TrashIcon" svgClasses="w-5 h-5 hover:text-danger stroke-current" class="ml-2" @click.stop="deleteData(tr.id)" />-->
                            </vs-td>

                        </vs-tr>
                        </tbody>
                    </template>
                </vs-table>
            </div>
        </VuePerfectScrollbar>

<!--        <div class="flex flex-wrap items-center p-6" slot="footer">-->
<!--            <vs-button class="mr-6" @click="submitData" :disabled="!isFormValid">Submit</vs-button>-->
<!--            <vs-button type="border" color="danger" @click="isSidebarActiveLocal = false">Cancel</vs-button>-->
<!--        </div>-->
    </vs-sidebar>
</template>

<script>
    import VuePerfectScrollbar from 'vue-perfect-scrollbar'
    import axios from "axios";

    export default {
        props: {
            isSidebarActive: {
                type: Boolean,
                required: true
            },
            data: {
                type: Object,
                default: () => {},
            }
        },
        watch: {
            isSidebarActive(val) {
                if(!val) return
                if(Object.entries(this.data).length === 0) {
                    this.initValues()
                    this.$validator.reset()
                }else {
                    let { id } = JSON.parse(JSON.stringify(this.data))
                    this.dataId = id
                    this.getList()
                    this.initValues()
                }
                // Object.entries(this.data).length === 0 ? this.initValues() : { this.dataId, this.dataName, this.dataCategory, this.dataOrder_status, this.dataPrice } = JSON.parse(JSON.stringify(this.data))
            }
        },
        data() {
            return {

                dataId: null,
                prop: [],
                selected: [],
                // products: [],
                itemsPerPage: 4,
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
                    if(!val) {
                        this.$emit('closeSidebar')
                        // this.$validator.reset()
                        // this.initValues()
                    }
                }
            },
            isFormValid() {
                return !this.errors.any() && this.dataName && this.dataCategory && (this.dataPrice > 0)
            }
        },
        methods: {
            initValues() {
                if(this.data.id) return
                this.dataId = null
                this.dataName = ""
                this.dataCategory = null
                this.dataOrder_status = "pending"
                this.dataPrice = 0
                this.dataImg = null
            },
            submitData() {
                this.$validator.validateAll().then(result => {
                    if (result) {
                        const obj = {
                            id: this.dataId,
                            name: this.dataName,
                            img: this.dataImg,
                            category: this.dataCategory,
                            order_status: this.dataOrder_status,
                            price: this.dataPrice
                        }

                        if(this.dataId !== null && this.dataId >= 0) {
                            this.$store.dispatch("dataList/updateItem", obj).catch(err => { console.error(err) })
                        }else{
                            delete obj.id
                            obj.popularity = 0
                            this.$store.dispatch("dataList/addItem", obj).catch(err => { console.error(err) })
                        }

                        this.$emit('closeSidebar')
                        this.initValues()
                    }
                })
            },
            getList(){
                axios.post('/api/properties/get',
                    {
                        id: this.dataId
                    })
                    .then((res) => {
                        console.log(res.data)
                        this.prop = res.data;

                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            openLoadingInDiv(){
                this.$vs.loading({
                    container: '#div-with-loading',
                    scale: 0.6
                })
                setTimeout( ()=> {
                    this.$vs.loading.close('#div-with-loading > .con-vs-loading')
                }, 3000);
            },
            updateCurrImg(input) {
                if (input.target.files && input.target.files[0]) {
                    var reader = new FileReader()
                    reader.onload = e => {
                        this.dataImg = e.target.result
                    }
                    reader.readAsDataURL(input.target.files[0])
                }
            }
        },
        beforeMount() {
            this.openLoadingInDiv()
        },
        components: {
            VuePerfectScrollbar,
        }
    }
</script>

<style lang="scss" scoped>
    .add-new-data-sidebar {
        ::v-deep .vs-sidebar--background {
            z-index: 52010;
        }

        ::v-deep .vs-sidebar {
            z-index: 52010;
            width: 400px;
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
    .add-new-data-sidebar {
        ::v-deep .vs-sidebar {
            width: 50% !important;
        }
    }
</style>
