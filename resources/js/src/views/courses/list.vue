<template>
<div>
    <vx-card title="Course List">
        <vs-table :data="props" pagination max-items="5" search>

            <template slot="thead">
                <vs-th>Category</vs-th>
                <vs-th>Stream</vs-th>
                <vs-th>Sub Stream</vs-th>
                <vs-th>Course Type</vs-th>
                <vs-th>Program Type</vs-th>
                <vs-th>Price</vs-th>
                <vs-th>Brochure</vs-th>
                <vs-th>Actions</vs-th>
            </template>

            <template slot-scope="{data}">
                <vs-tr :key="indextr" v-for="(tr, indextr) in data">

                    <vs-td :data="tr.catg.length != 0 ? tr.catg[0].name : 'No Category'">
                        {{ tr.catg.length != 0 ? tr.catg[0].name : 'No Category' }}
                    </vs-td>

                    <vs-td :data="tr.streams[0].name">
                        {{ tr.streams[0].name }}
                    </vs-td>

                    <vs-td :data="tr.substream.length != 0 ?tr.substream[0].name : 'No Sub-Stream'">
                        {{ tr.substream.length != 0 ?tr.substream[0].name : 'No Sub-Stream' }}
                    </vs-td>
                    <vs-td :data="tr.type">
                        {{ tr.type }}
                    </vs-td>
                    <vs-td :data="tr.program_type">
                    {{ tr.program_type == 1 ? "Full Time" : "Part Time" }}
                    </vs-td>
                    <vs-td :data="tr.price">
                        {{ tr.price }}
                    </vs-td>
                    <vs-td :data="tr.brochure">
                        <vs-button v-if="tr.brochure != null" v-bind:href="'/property/'+tr.prop_id+'/brochure/'+tr.brochure" >Download Brochure</vs-button>
                        <p v-else>--</p>
                    </vs-td>

                    <vs-td class="whitespace-no-wrap">
                        <feather-icon icon="EditIcon" svgClasses="w-5 h-5 hover:text-primary stroke-current" @click.stop="editData(tr.id)" />
                        <feather-icon icon="TrashIcon" svgClasses="w-5 h-5 hover:text-warning stroke-current" class="ml-2" @click.stop="activePrompt2=true,courseId=tr.id,courseName=tr.streams[0].name" />
                    </vs-td>
                </vs-tr>
            </template>
        </vs-table>
    </vx-card>
    <vs-prompt
        @cancel="courseId=null,courseName=''"
        @close="courseId=null,courseName=''"
        @accept="deleteCourse"
        title="Are you Sure you want to Delete?"
        :active.sync="activePrompt2">
        <div class="con-exemple-prompt">
            <p v-text="'Are you sure you want to Delete '+courseName"></p>
        </div>
    </vs-prompt>
</div>
</template>

<script>
    import axios from "axios";
    import $ from 'jquery';

    export default {
        data() {
            return {
                props: [],
                updateselected:[],
                status:[],
                courseName: "",
                courseId: null,
                activePrompt2 : false,
                changeStatus: [
                    {color: null, name: null}
                ],
                user: localStorage.getItem('userId')
            }
        },
        methods:{
            getProps(){
                axios.get('/api/course/get-all?prop_id='+localStorage.getItem('globalIns'))
                    .then((res) => {
                        console.log(res)
                        this.props = res.data;
                        this.props.reverse();
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            getStatus() {
                axios.post('/api/status/all')
                    .then((res) => {
                        console.log(res)
                        this.status = res.data;
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            updateStatus(data,id){
                axios.post('/api/properties/updateStatus',
                    {
                        status: data.id,
                        id: id
                    })
                    .then((res) => {
                        if(res.data['status'] == 1) {
                            this.alert('Status Updated Successfully!', 'Property Status Updated Successfully!', 'success')
                            // window.location.reload()
                            $("h4").click()
                        }else{
                            this.alert('Error Occured!', 'There is some Error changing Status!', 'danger')
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            alert(title,text,color){
                this.$vs.notify({
                    color: color,
                    title: title,
                    text: text,
                    position:'bottom-right'
                });
            },
            editData(prop){
                this.$vs.loading();
                this.$router.push("/course/update/"+prop).catch(() => {})
            },
            deleteCourse(){
                this.$vs.loading()
                axios.post('/api/course/delete',
                    {
                        id: this.courseId
                    })
                    .then((res) => {
                        this.getProps()
                        if(res.data['status'] == 1) {
                            this.$vs.loading.close()
                            this.alert('Course Deleted Successfully!', 'Course/Stream Deleted Successfully!', 'success')
                        }else{
                            this.$vs.loading.close()
                            this.alert('Error Occured!', 'There is some Error!', 'danger')
                        }
                    })
                    .catch((err) => {
                        this.$vs.loading.close()
                        console.log(err)
                    })
            }
        },
        beforeMount() {
            this.getProps()
            this.getStatus()
        }
    }
</script>
