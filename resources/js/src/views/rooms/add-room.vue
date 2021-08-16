<style scoped>
    .con-input-upload{
        width: 120px !important;
        height: 120px !important;
    }
    .img-upload{
        width: 120px !important;
        height: 120px !important;
    }
</style>
<template>
    <div>
        <vx-card title="Add Room" v-for="room in rooms" :key="room.value" style="margin-top: 10px">
            <div class="vx-row">
                <a v-bind:href="images.value" target="_blank" v-if="images.value !== ''" v-for="images in (room.image)" :key="images.value">
            <img class="pb-3" :src="images.value" style="width: 110px;height: 100px;margin-right: 5px;">
                </a>
            </div>
           <input type="file" accept="images/*" @change="showImage(room.value)" name="photo[]" multiple>
                        <div class="vx-row">
        <div class="vx-col sm:w-1/2 w-full mb-2">
            <vs-input class="w-full" label-placeholder="Name" v-model="room.name" />
        </div>
        <div class="vx-col sm:w-1/2 w-full mb-2">
            <vs-select v-model="room.type" class="w-full select-large" label="Type">
                <vs-select-item :key="index" :value="item.value" :text="item.text" v-for="(item,index) in typeOptions" class="w-full" />
            </vs-select>
        </div>
    </div>
    <div class="vx-row">
        <div class="vx-col sm:w-1/2 w-full mb-2">
            <vs-input class="w-full" label-placeholder="Guest" v-model="room.guest" />
        </div>
        <div class="vx-col sm:w-1/2 w-full mb-2" style="align-self: center;">
            <div class="vx-row">
                <div class="vx-col sm:w-1/2 w-full mb-2">
            <vs-checkbox class="w-full mt-4" v-model="room.bathroom">AttachBathroom</vs-checkbox>
                </div>
                <div class="vx-col sm:w-1/2 w-full mb-2">
                <vs-checkbox class="w-full mt-4" v-model="room.bed">Extra Bed?</vs-checkbox>
                </div>
            </div>
        </div>
    </div>
    <div class="vx-row">
        <div class="vx-col  w-full mb-6 mt-2">
            <vs-textarea label="Description" class="w-full" v-model="room.textarea" />
        </div>
    </div>
    <div class="vx-row">
        <div class="vx-col sm:w-1/2 w-full">
<!--            <vs-button color="warning" type="border" class="mb-2" @click="input25 = input26 = input27 = input28 = input29 = input30 = ''; check7 = false;">Reset</vs-button>-->
        </div>
        <div class="vx-col sm:w-1/2 w-full">
            <vs-button v-if="room.remove === 1" class="float-right ml-2" color="danger" @click="removeInput">Remove</vs-button>
            <vs-button class="float-right" color="warning" @click="addInput">+ Copy</vs-button>
<!--            <vs-button class="float-right mr-2" color="primary">+ Copy with Data</vs-button>-->
        </div>
    </div>
    </vx-card>
        <vs-button class="mr-3 mb-2" style="position: fixed;
    float: right;
    bottom: 0;
    right: 0;
    z-index: 9999;
    width: 15%;
    padding: 20px;" @click="addRoom">Submit</vs-button>
    </div>
</template>
<script>
    import axios from "axios";
    import Input from "../forms/form-elements/input/Input";

    export default {
        name: "add-room.vue",
        components: {Input},
        data() {
            return {
                count:1,
                image: [{value: ''}],
                typeOptions: [
                    {text: 'Deluxe',value:'1'},
                    {text:'Jhakas',value:'2'}],
                rooms: [{
                    value: 1,
                    remove: '',
                    name:'',
                    type:'',
                    bed:'',
                    guest:'',
                    bathroom:'',
                    image: [{value: ''}],
                    textarea:'',
                }],
            }
        },
        methods:{
            addInput(){
                console.log(this.count++);
                this.rooms.push({
                    value: this.count++,
                    remove: 1,
                    name:'',
                    type:'',
                    bed:'',
                    guest:'',
                    bathroom:'',
                    image: [{value: ''}],
                    textarea:'',
                });
            },
            removeInput(){
                this.rooms.splice((this.rooms.length - this.rooms.length) + 1,1)
            },
            addRoom(){
                let fd = new FormData();
                fd.append("prop_id", "1");
                this.rooms.forEach((item)=>{
                    fd.append("name[]", item.name);
                    fd.append("type[]", item.type);
                    fd.append("bed[]", item.bed);
                    fd.append("guest[]", item.guest);
                    fd.append("bath[]", item.bathroom);
                    fd.append("desc[]", item.textarea);
                });
                axios.post('/api/room/add',fd)
                    .then((res) => {
                        this.textarea = res.data;
                        console.log(res.data);
                    })
                    .catch((err) => {
                        // this.$vs.loading.close();
                        console.log(err)
                    })
            },
            showImage(value) {
               var index =  this.rooms.findIndex(x => x.value === value);
                this.rooms[index].image = [{value:''}];
                for(var i=0; i < event.target.files.length; i++) {
                    const file = event.target.files[i];
                    console.log(index);
                    if (this.rooms[index].value === value) {
                        this.rooms[index].image.push({value: URL.createObjectURL(file)});
                    }
                    // this.image.push({value: URL.createObjectURL(file)});
                }
                // this.image = URL.createObjectURL(file);
            },
            successUpload(e){
                this.originalImage = e.target.files[0];
            }
        }
    }
</script>
