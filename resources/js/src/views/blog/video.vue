<template>
    <div>
        <h2>Blog Videos</h2>
        <br>
        <div class="vx-row">
            <div class="vx-col w-full md:w-1/2 mb-3" v-for="(data,i) in videos" :key="i">
                <vx-card class="py-6">
                    <div class="flex flex-wrap">
                        <label>Title</label>
                        <vs-input class="mb-3" style="width: 100%;" v-model="data.title" placeholder="Title"></vs-input>
                        <label>Youtube Video Embed Code<br> (EX: https://www.youtube.com/watch?v=<strong><u>abdefgk</u></strong>)</label>
                        <vs-input style="width: 100%;" v-model="data.video" class="mt-3" placeholder="Video Embed Link"></vs-input>
                    </div>
                </vx-card>
            </div>
            <div class="vx-col md:w-1/2 w-full">
                <vs-button class="mt-4 mr-2 float-right shadow-lg" type="gradient" color="primary"
                           gradient-color-secondary="#CE9FFC" @click="updateVideos">UPDATE
                </vs-button>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    export default {
        name: "video",
        data(){
            return{
                videos: [{
                    title: '',
                    video: '',
                },{
                    title: '',
                    video: '',
                },{
                    title: '',
                    video: '',
                }],
            }
        },
        methods:{
            updateVideos(){
                if(this.videos[0].title == "" && this.videos[1].title == "" &&this.videos[2].title == ""){
                    this.alert('Please Enter All Values','All Values are Necessary','danger','top-center')
                }else if(this.videos[0].video == "" && this.videos[1].video == "" &&this.videos[2].video == ""){
                    this.alert('Please Enter All Values','All Values are Necessary','danger','top-center')
                }else {
                    axios.post('/api/options/blog_video', {
                        blog_video: JSON.stringify(this.videos)
                    }).then((res) => {
                        if (res.data.status == 1) {
                            this.alert('Videos Updated Successfully','','success','top-center')
                        }
                    }).catch()
                }
            },
            getVideo(){
                axios.post('/api/options/blog_video/get',{
                    data: 'blog_video'
                }).then((res) => {
                   this.videos = JSON.parse(res.data[0].option_value);
                }).catch()
            },
            alert(title, text, color,position) {
                this.$vs.notify({
                    color: color,
                    title: title,
                    text: text,
                    position: position
                });
            },
        },
        mounted() {
            this.getVideo()
        }
    }
</script>

<style scoped>

</style>
