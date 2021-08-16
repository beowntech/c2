<template>
    <div class="vx-row">

        <div class="vx-col w-full mb-base">
            <vx-card title="Boys Hostel">
                <div class="vx-row mb-6">
                    <div class="vx-col sm:w-1/3 w-full">
                        <vs-input class="w-full" v-model="boyFees" placeholder="Fees in Rupees" />
                    </div>
                </div>
               <div class="vx-row md-6">
                   <div class="vx-col w-full">
                       <quill-editor v-model="boyContent"></quill-editor>
                   </div>
               </div>
                <div class="vx-row mt-2">
                    <div class="vx-col w-full ml-auto">
                        <vs-button class="mr-3 mb-2 float-right" @click="addHostelBoy">Submit</vs-button>
                    </div>
                </div>
            </vx-card>
        </div>
        <div class="vx-col w-full mb-base">
            <vx-card title="Girls Hostel">
                <div class="vx-row mb-6">
                    <div class="vx-col sm:w-1/3 w-full">
                        <vs-input class="w-full" v-model="girlFees" placeholder="Fees in Rupees" />
                    </div>
                </div>
                <div class="vx-row md-6">
                    <div class="vx-col w-full">
                        <quill-editor v-model="girlContent"></quill-editor>
                    </div>
                </div>
                <div class="vx-row mt-2">
                    <div class="vx-col w-full ml-auto">
                        <vs-button class="mr-3 mb-2 float-right" @click="addHostelGirl">Submit</vs-button>
                    </div>
                </div>
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
                boyFees: "",
                boyContent: "",
                girlFees: "",
                girlContent: "",
            }
        },
        methods: {
            addHostelBoy(){
                let fd = new FormData();
                fd.append("boyF", this.boyFees);
                fd.append("boyC", this.boyContent);
                fd.append("type", 0);
                fd.append("prop", localStorage.getItem('globalIns'));
                axios.post('/api/hostel/add',fd)
                    .then((res) => {
                        this.alert('Hostels Content Updated Successfully','','green');
                    })
                    .catch((err) => {
                        this.alert('Hostels Not Updated','There is Some Problem Updating Hostel','red');
                        // this.$vs.loading.close();
                        console.log(err)
                    })
            },
            addHostelGirl(){
                let fd = new FormData();
                fd.append("girlF", this.girlFees);
                fd.append("girlC", this.girlContent);
                fd.append("type", 1);
                fd.append("prop", localStorage.getItem('globalIns'));
                axios.post('/api/hostel/add',fd)
                    .then((res) => {
                        this.alert('Hostels Content Updated Successfully','','green');
                    })
                    .catch((err) => {
                        // this.$vs.loading.close();
                        console.log(err)
                    })
            },
            getHostel(){
                this.$vs.loading();
                axios.get('/api/hostel/get?id='+localStorage.getItem('globalIns'))
                    .then((res) => {
                        console.log(res);
                        for (var i=0; i < res.data.length; i++) {
                            if (res.data[i]['male_female'] == 0) {
                                this.boyContent = res.data[i]['html'];
                                this.boyFees = res.data[i]['price'];
                            } else {
                                this.girlContent = res.data[i]['html'];
                                this.girlFees = res.data[i]['price'];
                            }
                        }
                        this.$vs.loading.close();
                    })
                    .catch((err) => {
                        // this.$vs.loading.close();
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
        components:{
            quillEditor,
        },
        beforeMount() {
            this.getHostel();
        }
    }
</script>

<style scoped>

</style>
