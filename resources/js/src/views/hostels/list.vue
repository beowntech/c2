<template>
    <vx-card title="Hostels List">
        <vs-table :data="props" pagination max-items="10" search>

            <template slot="thead">
                <vs-th>Name</vs-th>
                <vs-th>NearBy</vs-th>
                <vs-th>Facility</vs-th>
                <vs-th>Amenity</vs-th>
                <!--            <vs-th>Rooms</vs-th>-->
                <!-- <vs-th>Status</vs-th> -->
                <vs-th>Actions</vs-th>
            </template>

            <template slot-scope="{data}">
                <vs-tr :key="indextr" v-for="(tr, indextr) in data">

                    <vs-td :data="tr.name">
                        {{ tr.name }}
                    </vs-td>
                    <vs-td :data="tr.nearby_properties != null ? tr.nearby_properties: ''">
                        {{ tr.nearby_properties != null ? JSON.parse(tr.nearby_properties)[0].property:'----' }}
                    </vs-td>
                    <vs-td :data="tr.facilities_nearby != null ? tr.facilities_nearby: ''">
                        {{ tr.facilities_nearby != null ? JSON.parse(tr.facilities_nearby)[0].name: '----' }}
                    </vs-td>
                    <vs-td :data="tr.amenities != null ? tr.amenities: ''">
                        {{ tr.amenities != null ? JSON.parse(tr.amenities)[0].name: '----' }}
                    </vs-td>
                    <!-- <vs-td :data="tr.stat[0].color">
                        <vs-chip :color="tr.stat[0].color" class="product-order-status">{{ tr.stat[0].name}}</vs-chip>
                        <template slot="edit">
                            <vs-select v-model="updateselected = tr.stat[0].id" @input="updateStatus(updateselected,tr.id)" class="select-large">
                                <vs-select-item :key="index" v-bind:value="status.id" :text="status.name" v-for="(status,index) in status" class="w-full" />
                            </vs-select>
                        </template>
                    </vs-td> -->
                    <vs-td class="whitespace-no-wrap">
                        <feather-icon icon="EditIcon" svgClasses="w-5 h-5 hover:text-primary stroke-current" v-if="$acl.check('editor')" @click.stop="editData(tr.id)" />
                        <!-- <feather-  icon icon="AwardIcon" svgClasses="w-5 h-5 hover:text-warning stroke-current" class="ml-2" v-if="$acl.check('editor')" @click.stop="seoEdit(tr.id)" /> -->
                        <feather-icon icon="TrashIcon" svgClasses="w-5 h-5 hover:text-warning stroke-current" class="ml-2" @click.stop="openAlert(tr.name,tr.id)" />
                    </vs-td>
                </vs-tr>
            </template>
        </vs-table>
        <vs-prompt
            @cancel="val=[]"
            @accept="this.propDelete"
            @close="close"
            :active.sync="activePrompt">
            <div class="con-exemple-prompt">
                <span v-text="val.length != 0 ? 'Are You Sure You Want To Delete '+val[0].name+'?' : ''" ></span>
            </div>
        </vs-prompt>
    </vx-card>

</template>
<script>
    import axios from "axios";
    import $ from 'jquery';

    export default {
        data() {
            return {
                activePrompt:false,
                val: [],
                props: [],
                updateselected:[],
                status:[],
                changeStatus: [
                    {color: null, name: null}
                ],
                user: localStorage.getItem('userId')
            }
        },
        methods:{
            acceptAlert(){
                this.$vs.notify({
                    color:'success',
                    title:'Accept Selected',
                    text:'Lorem ipsum dolor sit amet, consectetur'
                })
            },
            openAlert(name,id){
                this.val.push({'name':name,'id':id});
                this.activePrompt = true;
            },
            close(){
                this.activePrompt = false;
                this.$vs.notify({
                    color:'danger',
                    title:'Closed',
                    text:'Property Delete Cancelled!'
                })
            },
            getHostel(){
                axios.post('/api/hostels/list')
                    .then((res) => {
                        console.log(res)
                        this.props = res.data;
                        this.props.reverse();
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            propDelete(){
                axios.post('/api/hostels/delete',{
                    hostel: this.val[0].id
                })
                    .then((res) => {
                        if(res.data == 1) {
                            this.getHostel();
                            this.activePrompt = false;
                            this.alert('Deleted Successfully', '', 'green');
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            getStatus() {
                axios.get('/api/status/property/get')
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
                    position:'top-right'
                });
            },
            editData(prop){

                this.$router.push("/hostel/update/"+prop).catch(() => {})
            },
            seoEdit(prop){
                this.$vs.loading();
                this.$router.push("/property/seo/"+prop).catch(() => {})
            }
        },
        beforeMount() {
            this.getHostel()
            this.getStatus()
        }
    }
</script>
