<template>
<div class="vx-row">
    <div class="vx-col w-full">
        <vx-card class="mt-3" >
            <vs-collapse-item>
                <div slot="header">
                    Add more Image
                </div>
            <vs-row>
                <vs-upload multiple automatic text="Upload Images" action="/api/properties/images/upload" v-bind:data="{'id':mainid}" fileName='photos[]' @on-success="successUpload" />
                <!--                <div class="vs-col">-->
<!--                    <div class="con-input-upload" style="float: unset;width: 100% !important;"><input type="file" id="galleryImage" multiple @change="uploadImage"><span class="text-input"> Upload File </span><span class="input-progress" style="width: 0%;"></span><button disabled="disabled" type="button" title="Upload" class="btn-upload-all vs-upload&#45;&#45;button-upload"><i translate="translate" class="material-icons notranslate"> cloud_upload </i></button></div>-->
<!--                </div>-->
<!--                <div v-for="(image, key) in images" :key="key" class="vs-col">-->
<!--                    <div>-->
<!--                        <img class="preview" style="width: 20%" :ref="'image'" />-->
<!--                        {{ image.name }}-->
<!--                    </div>-->
<!--                </div>-->
            </vs-row>
            </vs-collapse-item>
        </vx-card>
        <vx-card title="Gallery Images" class="mt-3" collapse-action >
            <div v-if="imagescurrent == null || imagescurrent == []">
                <img src="/assets/images/placeholder/no-image.jpg" style="width: 15%">
            </div>
            <div v-else>
                <div class="vx-row">
                <div v-for="(image, key) in imagescurrent" :key="key" class="vs-col md:w-1/6 mb-2" style="height: 142px !important;margin-right: 10px;position: relative">
                    <div>
                        <div class="xGallery" @click="openPrompt(image)">X</div>
                        <img v-bind:src="'/property/'+mainid+'/gallery/images/'+image" class="preview" style="width: 100%;height: 142px" :ref="'image'" />
                    </div>
                </div>
                </div>
            </div>
        </vx-card>
        <vs-prompt
            @cancel="val=null"
            @accept="this.deleteImage"
            @close="val=null"
            :active.sync="activePrompt">
            <div class="con-exemple-prompt">
                <span>Are You Sure You Want To Delete Image?</span>
            </div>
        </vs-prompt>
    </div>
</div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "images-gallery",
        data:function () {
            return {
                images: [],
                val:null,
                imagescurrent: null,
                activePrompt: false,
                mainid: localStorage.getItem('globalIns'),
            }
        },
        methods:{
            openPrompt(val){
              this.activePrompt = true;
              this.val = val;
            },
            resetGallery(){
                document.getElementById("galleryImage").value = "";
                this.images = [];
                this.selectedFiles = [];
            },
            uploadImage(e) {
                let vm = this;
                var selectedFiles = e.target.files;
                for (let i = 0; i < selectedFiles.length; i++) {
                    console.log(selectedFiles[i]);
                    this.images.push(selectedFiles[i]);
                }

                for (let i = 0; i < this.images.length; i++) {
                    let reader = new FileReader();
                    reader.onload = (e) => {
                        this.$refs.image[i].src = reader.result;

                        console.log(this.$refs.image[i].src);
                    };

                    reader.readAsDataURL(this.images[i]);
                }
            },
            getImage(){
                var prop_id = localStorage.getItem('globalIns');
                axios.post('/api/properties/images',{
                    'prop_id': prop_id,
                })
                    .then((res) => {
                        console.log(JSON.parse(res.data['images'][0]['images']));
                        if(res.data['success'] == 1){
                           this.imagescurrent = JSON.parse(res.data['images'][0]['images']);
                        }
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            deleteImage(){
                var prop_id = localStorage.getItem('globalIns');
                axios.get('/api/properties/images/delete?id='+prop_id+'&image='+this.val)
                    .then((res) => {
                        if(res.data == 1){
                            this.alert('Image Deleted','Image Deleted Successfully','green')
                            this.getImage()
                        }else{
                            this.alert('Problem Deleting','There is Some Problem Deleting Image','red')
                        }
                    })
                    .catch((err) => {
                        this.alert('Problem Deleting','There is Some Problem Deleting Image','red')
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
            successUpload(e){
                console.log(e);
                this.getImage();
            }
        },
        mounted() {
            this.getImage();
        }
    }
</script>

<style scoped>
.xGallery{
    /*z-index: 99999;*/
    position: absolute;
    right: 0;
    padding: 1px 8px;
    border-bottom-left-radius: 10px;
    background: #ff5722;
    color: white;
    cursor: pointer;
    float: right;
}
</style>
