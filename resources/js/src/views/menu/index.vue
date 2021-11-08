<template>
    <div>
        <div class="vx-row">
            <div class="vx-col w-full md:w-1/3">
                <vx-card title="Categories">
                    <div class="mt-5">
                        <p class="category-label">Parent Category</p>
                        <div class="categoryDiv">
                            <ul class="centerx categories">
                                <li v-for="(data, i) in categories" :key="i">
                                    <vs-checkbox v-model="selectedCatg" :vs-value="data">{{data.name}}</vs-checkbox>
                                </li>
                            </ul>
                        </div>
                        <div class="vx-row mt-5">
                            <div class="vx-col w-full md:w-1/2">
<!--                                <vs-checkbox v-model="selectAllMain">Select all</vs-checkbox>-->
                            </div>
                            <div class="vx-col w-full md:w-1/2">
                                <vs-button color="rgb(62, 201, 214)" style="float:right;padding: 8px!important;"
                                           @click="addMainCatgtoMenu">
                                    Add to Menu
                                </vs-button>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <p class="category-label">Course Categories</p>
                        <div class="categoryDiv">
                            <ul class="centerx categories">
                                <li v-for="(data, i) in mainCategories" :key="i">
                                    <vs-checkbox v-model="selectedMainCatg" :vs-value="data">{{data.name}}</vs-checkbox>
                                </li>
                            </ul>
                        </div>
                        <div class="vx-row mt-5">
                            <div class="vx-col w-full md:w-1/2">
                                <vs-checkbox v-model="selectAll">Select all</vs-checkbox>
                            </div>
                            <div class="vx-col w-full md:w-1/2">
                                <vs-button color="rgb(62, 201, 214)" style="float:right;padding: 8px!important;"
                                           @click="addCatgtoMenu">
                                    Add to Menu
                                </vs-button>
                            </div>
                        </div>
                        <div class="mt-6">
                            <vs-collapse type="border" accordion>
                                <vs-collapse-item>
                                    <div slot="header">Custom Link</div>
                                    <div class="vx-row">
                                        <div class="vx-col w-full mb-2">
                                            <vs-input class="w-full" v-model="customName" placeholder="Name"></vs-input>
                                        </div>
                                        <div class="vx-col w-full mb-3">
                                            <vs-input class="w-full" v-model="customLink" placeholder="Link"></vs-input>
                                        </div>
                                        <div class="vx-col w-full mb-3">
                                            <vs-checkbox class="w-full" v-model="customCheck">Comming Soon?</vs-checkbox>
                                        </div>
                                        <div class="vx-col w-full">
                                            <vs-button class="float-right" @click="addlinktoMenu">ADD</vs-button>
                                        </div>
                                    </div>
                                </vs-collapse-item>
                            </vs-collapse>
                        </div>
                    </div>
                </vx-card>
            </div>
            <div class="vx-col w-full md:w-2/3">
                <vx-card title="Blog Menu">
                    <div class="vx-row">
                        <div class="vx-col md:w-3/4 w-full">
<!--                            <p><code>Maximum Menu Allowed<strong> {{this.menuLimit}}</strong></code>.-->
<!--                            </p>-->
                        </div>
                        <div class="vx-col md:w-1/4 w-full">
                            <vs-button color="rgb(62, 201, 214)" class="float-right" style="padding: 8px!important;"
                                       @click="saveMenu">Save Menu
                            </vs-button>
                        </div>
                    </div>

                    <div class="mt-5" v-if="list.length > 0">
                        <vs-collapse type="margin" accordion>
                            <draggable class="dragArea" tag="ul" :list="list" :group="{ name: 'g1' }">
                                <li v-for="(el,i) in list" :key="i">
                                    <div>
                                        <div class="flex vx-row px-6">
                                            <div class="flex-1" style="place-self: center;">{{ el.name }} <span class="badge custom-badge badge-info">Main</span> <span v-if="el.soon" class="badge custom-success badge-success">Comming Soon</span></div>
                                            <div class="vx-col w-full md:w-1/4">
                                                <div class="vx-row float-right">
<!--                                                    <div class="vx-col-2">-->
<!--                                                        <vs-avatar icon-pack="feather" icon="icon-edit" />-->
<!--                                                    </div>-->
                                                    <div class="vx-col-2">
                                                        <vs-avatar @click="removeMenu(i)" style="background: rgb(229 9 9);" icon-pack="feather" icon="icon-trash" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <nested-draggable v-if="el.submenu" :submenu="el.submenu"/>
                                </li>
                            </draggable>
                        </vs-collapse>
                    </div>
                    <div v-else style="padding: 100px;text-align-last: center;">
                        No Menu Items Select to add Menu
                    </div>
                </vx-card>
            </div>
        </div>

        <!--        <vs-popup classContent="popup-example" title="Add Menu" :active.sync="addmenuActive">-->
        <!--            <vs-input class="inputx mb-3" placeholder="Title" v-model="value1"/>-->
        <!--            <vs-input disabled class="inputx mb-3" placeholder="Disabled" v-model="value2"/>-->
        <!--            <vs-button @click="popupActive3=true" color="primary" type="filled">Open Inner Popup</vs-button>-->
        <!--        </vs-popup>-->
    </div>
</template>

<script>
    import draggable from 'vuedraggable'
    import Prism from 'vue-prism-component'
    import nested from "./nested";

    import axios from "axios";
    import NestedDraggable from "./nested";

    export default {
        data() {
            return {
                addmenuActive: false,
                categories: [],
                mainCategories: [],
                selectedCatg: [],
                selectAll: false,
                selectAllMain: false,
                // menuLimit: 7,
                customName: "",
                customLink: "",
                customCheck: false,
                selectedMainCatg: [],
                list: [],
            }
        },
        watch: {
            selectAll: function (val) {
                if (val) {
                    this.selectedCatg = this.categories
                } else {
                    this.selectedCatg = []
                }
            },
            // selectAllMain: function (val) {
            //     if (val) {
            //         for(var i=0; i < this.mainCategories.length; i++) {
            //             this.selectedMainCatg.push(this.mainCategories[i])
            //         }
            //     } else {
            //         this.selectedMainCatg = []
            //     }
            // }
        },
        methods: {
            removeMenu(index){
                this.list.splice(index, 1);
            },
            getCategories() {
                axios.post('/api/categories/parent')
                    .then((res) => {
                        console.log(res)
                        this.categories = res.data
                    }).catch((err) => {
                    console.log(err)
                })
            },
            getMainCategories() {
                axios.post('/api/categories/subcat')
                    .then((res) => {
                        // console.log(res)
                        // for(var i=0; i < res.data.length; i++) {
                            this.mainCategories = res.data
                        // }
                        // console.log(this.mainCategories)
                    }).catch((err) => {
                    console.log(err)
                })
            },
            saveMenu() {
                this.$vs.loading()
                axios.post('/api/menu/create/header', {
                    menu: JSON.stringify(this.list)
                }).then((res) => {
                    this.$vs.loading.close()
                    this.alert('Menu Updated Successfully', 'Blog Menu Updated Successfully', 'success')
                }).catch((err) => {
                    this.alert('There is Some Problem Updating Menu!', '', 'danger')
                    this.$vs.loading.close()
                    console.log(err)
                })
            },
            getMenu() {
                this.$vs.loading()
                axios.post('/api/menu/header/get')
                    .then((res) => {
                        console.log(res)
                        this.list = res.data
                        this.$vs.loading.close()
                    }).catch((err) => {
                    this.$vs.loading.close()
                    console.log(err)
                })
            },
            addCatgtoMenu() {
                if (this.selectedMainCatg.length > 0) {
                    for (var i = 0; i < this.selectedMainCatg.length; i++) {
                        // if (this.list.length < this.menuLimit) {
                            this.list.push({
                                name: this.selectedMainCatg[i].name,
                                category: this.selectedMainCatg[i].id,
                                submenu: []
                            })
                        // } else {
                        //     this.alert('Cannot add more than ' + this.menuLimit + ' Main Menu', 'Currently Menus are limited to ' + this.menuLimit, 'danger')
                        //     break;
                        // }
                    }
                    this.selectedMainCatg = []
                    this.selectAll = false
                }
            },
            addMainCatgtoMenu() {
                if (this.selectedCatg.length > 0) {
                    for (var i = 0; i < this.selectedCatg.length; i++) {
                        // if (this.list.length < this.menuLimit) {
                            this.list.push({
                                name: this.selectedCatg[i].name,
                                link: '#',
                                submenu: []
                            })
                        // } else {
                        //     this.alert('Cannot add more than ' + this.menuLimit + ' Main Menu', 'Currently Menus are limited to ' + this.menuLimit, 'danger')
                        //     break;
                        // }
                    }
                    this.selectedCatg = []
                    this.selectAllMain = false
                }
            },
            addlinktoMenu() {
                // if (this.list.length < this.menuLimit) {
                    if (this.customName != "" && this.customLink != "") {
                        this.list.push({name: this.customName, link: this.customLink,soon:this.customCheck, submenu: []})
                        this.customName = ""
                        this.customLink = ""
                    } else {
                        this.alert('Please Add Both Details to Submit', '', 'danger')
                    }
                // } else {
                //     this.alert('Cannot add more than ' + this.menuLimit + ' Main Menu', 'Currently Menus are limited to ' + this.menuLimit, 'danger')
                // }
            },
            alert(title, text, color) {
                this.$vs.notify({
                    color: color,
                    title: title,
                    text: text,
                    position: 'top-center'
                });
            },
        },
        beforeMount() {
            this.getMenu()
            this.getMainCategories()
            this.getCategories()
        },
        components: {
            NestedDraggable,
            draggable,
            nested,
            Prism
        }
    }
</script>

<style>
    /*.blog_menu .vs-collapse-item--content{*/
    /*    overflow-y: scroll!important;*/
    /*}*/
    .blog_menu.open-item > .vs-collapse-item--content {
        height: 350px !important;
        max-height: 350px !important;
    }

    .list-item {
        transition: all .5s
    }

    .categoryDiv {
        overflow-y: scroll;
        max-height: 150px;
        height: 150px;
        border: 1px solid lightgrey;
        border-radius: 7px;
        padding: 10px !important;
    }

    .categories li {
        margin-bottom: 6px !important;
    }

    .dragArea li > div {
        cursor: move;
        background: whitesmoke;
        border-radius: 7px;
        border: 1px solid #b5b8bd;
        margin-bottom: 5px;
        box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;
    }
    .category-label{
        font-size: 15px;
        font-weight: bolder;
        padding: 7px;
    }
    .custom-badge{
        background: coral;
        margin-left: 7px;
        padding: 3px 6px;
        color: white;
        border-radius: 8px;
    }
     .custom-success{
        background: rgb(6, 84, 158);
        margin-left: 7px;
        padding: 3px 6px;
        color: white;
        border-radius: 8px;
    }
</style>
