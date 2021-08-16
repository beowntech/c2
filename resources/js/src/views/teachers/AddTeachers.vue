 <template>
     <div class="vx-row">

     <div class="vx-col md:w-1/2 w-full mb-base">
         <vx-card title="Add Teachers">
        <div class="vx-row mb-6">
            <div class="vx-col sm:w-1/3 w-full">
                <span>Name</span>
            </div>
            <div class="vx-col sm:w-2/3 w-full">
                <vs-input class="w-full" v-model="name" />
            </div>
        </div>
        <div class="vx-row mb-6">
            <div class="vx-col sm:w-1/3 w-full">
                <span>Qualification</span>
            </div>
            <div class="vx-col sm:w-2/3 w-full">
                <vs-input class="w-full" type="text" v-model="qual" />
            </div>
        </div>
             <div class="vx-row mb-6">
                 <div class="vx-col sm:w-1/3 w-full">
                     <span>Designation</span>
                 </div>
                 <div class="vx-col sm:w-2/3 w-full">
                     <vs-input class="w-full" type="text" v-model="design" />
                 </div>
             </div>
             <div class="vx-row mb-6">
                 <div class="vx-col sm:w-1/3 w-full">
                     <span>Department</span>
                 </div>
                 <div class="vx-col sm:w-2/3 w-full">
                     <vs-input class="w-full" type="text" v-model="depart" />
                 </div>
             </div>
        <div class="vx-row">
            <div class="vx-col sm:w-2/3 w-full ml-auto">
                <vs-button class="mr-3 mb-2" @click="addTeacher">Submit</vs-button>
            </div>
        </div>
     </vx-card>
     </div>
     </div>
    </template>

<script>
    import axios from "axios";

    export default {
        name: "AddTeachers.vue",
        data() {
            return {
                image: null,
                name: '',
                email: '',
                mobile: '',
                qual: '',
                design: '',
                depart: "",
                special: '',
                originalImage: null,
                teacherId: 0,
            }
        },
        mounted() {
            this.teacherId = this.$router.params.teacherId
        },
        methods: {
            showImage(e) {
                const file = e.target.files[0];
                this.originalImage = file;
                this.image = URL.createObjectURL(file);
            },
            addTeacher(){
                let fd = new FormData();
                fd.append("image", this.originalImage);
                fd.append("name", this.name);
                fd.append("qual", this.qual);
                fd.append("design", this.design);
                fd.append("depart", this.depart);
                fd.append("prop", localStorage.getItem('globalIns'));
                axios.post('/api/teacher/add',fd)
                    .then((res) => {
                        console.log(res.data);
                        this.alert('Teacher Added Successfully','','green');
                        // if(res.data == 1) {
                        //     // this.$store.dispatch('updateUserRole', {aclChangeRole: this.$acl.change, userRole: ""})
                        //     localStorage.setItem('usertoken', res.data.token)
                        //     this.email = ''
                        //     this.password = ''
                        //     this.$router.push({name: 'page-login'})
                        //     this.$vs.loading.close();
                        // }else{
                        //     this.$vs.loading.close();
                        // }

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
    }
</script>

<style scoped>

</style>
