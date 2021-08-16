<template>
    <div class="vx-row">
        <div class="vx-col w-full mb-base">
            <vs-button v-if="addSelected" color="danger" style="float: right" @click="addScholarChange(0)" type="gradient" icon-pack="feather" icon="icon-x"> Close</vs-button>
        <vs-button color="success" v-else style="float: right" @click="addScholarChange(1)" type="gradient" icon-pack="feather" icon="icon-plus"> Add Scholarship</vs-button>
        </div>
        <div class="vx-col w-full mb-base" v-if="addSelected">
            <vx-card title="Add Scholarship">
                <div class="vx-row md-6">
                    <div class="vx-col w-full">
                        <quill-editor v-model="content"></quill-editor>
                    </div>
                </div>
                <div class="vx-row mt-2">
                    <div class="vx-col w-full ml-auto">
                        <vs-button class="mr-3 mb-2 float-right" @click="addScholar">Submit</vs-button>
                    </div>
                </div>
            </vx-card>
        </div>
        <div class="vx-col w-full mb-base" v-else>
        <vx-card title="ScholarShip List" >
            <vs-table :data="scholar" pagination max-items="5" search>

                <template slot="thead">
                    <vs-th>Id</vs-th>
                    <vs-th>Content</vs-th>
                    <vs-th>Status</vs-th>
                    <vs-th>Actions</vs-th>
                </template>

                <template slot-scope="{data}">
                    <vs-tr :key="indextr" v-for="(tr, indextr) in data">

                        <vs-td :data="indextr + 1">
                            {{ indextr + 1 }}
                        </vs-td>

                        <vs-td :data="tr.content" >
                            {{tr.content | strippedContent}}
                        </vs-td>

                        <vs-td :data="tr.statuse[0].name">
                            {{ tr.statuse[0].name }}
                        </vs-td>
                        <vs-td class="whitespace-no-wrap">
                            <feather-icon icon="EditIcon" svgClasses="w-5 h-5 hover:text-primary stroke-current" @click.stop="editData(tr.id)" />
<!--                            <feather-icon icon="AwardIcon" svgClasses="w-5 h-5 hover:text-warning stroke-current" class="ml-2" @click.stop="seoEdit(tr.id)" />-->
                        </vs-td>
                    </vs-tr>
                </template>
            </vs-table>
        </vx-card>
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    import 'quill/dist/quill.core.css'
    import 'quill/dist/quill.snow.css'
    import 'quill/dist/quill.bubble.css'

    import { quillEditor } from 'vue-quill-editor'

    export default {
        name: "AddTeachers.vue",
        data() {
            return {
                image: null,
               content: "",
                addSelected: false,
                scholar: []
            }
        },
        methods: {
            addScholarChange(val){
                if(val == 1) {
                    this.addSelected = true;
                }else{
                    this.addSelected = false;
                }
            },
            addScholar(){
                this.$vs.loading()
                let fd = new FormData();
                fd.append("text", this.content);
                fd.append("prop", localStorage.getItem('globalIns'));
                axios.post('/api/scholarship/add',fd)
                    .then((res) => {
                        this.alert('Scholarship Added Successfully','','green');
                        this.$vs.loading.close();
                        this.getScholars();
                    })
                    .catch((err) => {
                        this.$vs.loading.close();
                        this.alert('Error Adding Scholarship','There is Some Problem While Adding Scholarship','red');
                        console.log(err)
                    })
            },
            getScholars(){
                this.$vs.loading()
                axios.get('/api/scholarship/get?prop='+localStorage.getItem('globalIns'))
                    .then((res) => {
                       this.scholar = res.data;
                        this.$vs.loading.close();
                    })
                    .catch((err) => {
                        this.$vs.loading.close();
                        this.alert('Error Adding Scholarship','There is Some Problem While Adding Scholarship','red');
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
        },
        filters: {
            strippedContent: function (string) {
                return string.replace(/<\/?[^>]+>/ig, " ").substring(0,20);
            }
        },
        components:{
            quillEditor,
        },
        beforeMount() {
            this.getScholars();
        }
    }
</script>

<style scoped>

</style>
