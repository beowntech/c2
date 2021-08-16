<!-- =========================================================================================
  File Name: AddNewDataSidebar.vue
  Description: Add New Data - Sidebar component
  ----------------------------------------------------------------------------------------
  Item Name: Vuexy - Vuejs, HTML & Laravel Admin Dashboard Template
  Author: Pixinvent
  Author URL: http://www.themeforest.net/user/pixinvent
========================================================================================== -->


<template>
    <vs-sidebar click-not-close position-right parent="body" default-index="1" color="primary" class="add-new-data-sidebar items-no-padding" spacer v-model="isSidebarActiveLocal">
        <div class="mt-6 flex items-center justify-between px-6">
            <h4>{{ Object.entries(this.data).length === 0 ? "ADD NEW" : "UPDATE" }} Editor</h4>
            <feather-icon icon="XIcon" @click.stop="isSidebarActiveLocal = false" class="cursor-pointer"></feather-icon>
        </div>
        <vs-divider class="mb-0"></vs-divider>

        <VuePerfectScrollbar class="scroll-area--data-list-add-new" :settings="settings" :key="$vs.rtl">

            <div class="p-6">
                <!-- NAME -->
                <vs-input label="Name" v-model="dataName" placeholder="Eg: John Dave" class="mt-5 w-full" name="name" v-validate="'required'" />
                <span class="text-danger text-sm" v-show="errors.has('name')">{{ errors.first('name') }}</span>

                <!-- Email -->
                <vs-input label="Email" v-model="dataEmail" placeholder="Eg: email@email.com" class="mt-5 w-full" name="email" v-validate="'required'" />
                <span class="text-danger text-sm" v-show="errors.has('email')">{{ errors.first('email') }}</span>

                <!-- Password -->
                <vs-input label="Password" v-model="dataPassword" placeholder="Enter Password" class="mt-5 w-full" name="password" v-validate="'required'" />
                <span class="text-danger text-sm" v-show="errors.has('password')">{{ errors.first('password') }}</span>

                <!-- Contact -->
                <vs-input label="Contact" v-model="dataContact" placeholder="Eg: 9876543210" class="mt-5 w-full" name="contact" v-validate="'numeric|digits:10'" />
                <span class="text-danger text-sm" v-show="errors.has('contact')">{{ errors.first('contact') }}</span>
            </div>
        </VuePerfectScrollbar>

        <div class="flex flex-wrap items-center p-6" slot="footer">
            <vs-button class="mr-6" @click="submitData" :disabled="!isFormValid">Submit</vs-button>
            <vs-button type="border" color="danger" @click="isSidebarActiveLocal = false">Cancel</vs-button>
        </div>
    </vs-sidebar>
</template>

<script>
    import VuePerfectScrollbar from 'vue-perfect-scrollbar'
    import axios from "axios";
    import $ from 'jquery';

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
                    let { email, name, status,contact, price } = JSON.parse(JSON.stringify(this.data))
                    // this.dataId = id
                    this.dataEmail = email
                    this.dataPassword = ""
                    this.dataName = name
                    this.dataContact = contact
                    this.initValues()
                }
                // Object.entries(this.data).length === 0 ? this.initValues() : { this.dataId, this.dataName, this.dataCategory, this.dataOrder_status, this.dataPrice } = JSON.parse(JSON.stringify(this.data))
            }
        },
        data() {
            return {

                dataId: null,
                dataName: "",
                dataEmail: null,
                dataPassword: null,
                dataContact: null,
                dataOrder_status: "pending",
                dataPrice: 0,

                category_choices: [
                    {text:'Audio',value:'audio'},
                    {text:'Computers',value:'computers'},
                    {text:'Fitness',value:'fitness'},
                    {text:'Appliance',value:'appliance'}
                ],

                order_status_choices: [
                    {text:'Active',value:'1'},
                    {text:'Terminated',value:'2'},
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
                    if(!val) {
                        this.$emit('closeSidebar')
                        // this.$validator.reset()
                        // this.initValues()
                    }
                }
            },
            isFormValid() {
                return !this.errors.any() && this.dataName && this.dataEmail && this.dataPassword
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
                            email: this.dataEmail,
                            contact: this.dataContact,
                        }
                        axios.post('/api/users/editors/add-update',obj)
                            .then((res) => {
                                console.log(res);
                                if(res.data == 1){
                                    this.$emit('closeSidebar')
                                    // this.initValues()
                                }
                            })
                            .catch((err) => {
                                this.$vs.loading.close()
                                console.log(err)
                            })

                    }
                })
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
</style>
