<template>
    <div>
        <div class="vx-row">
            <div class="vx-col mb-3" style="float: right;">
                <vs-button color="red" v-if="seoShow" style="float: right;" @click="seoShow = false">Close SEO
                    Settings
                </vs-button>
                <vs-button color="green" v-else style="float: right;" @click="openSEO">SEO Settings</vs-button>
            </div>
        </div>
        <seo-component :isSEOActive="seoShow" class="mt-3 mb-3" :seoId="seoData"></seo-component>

        <vx-card>
            <quill-editor v-model="content"></quill-editor>
            <vs-button @click="updatePrivacy">Submit</vs-button>
        </vx-card>
    </div>
</template>

<script>
    // require styles
    import 'quill/dist/quill.core.css'
    import 'quill/dist/quill.snow.css'
    import 'quill/dist/quill.bubble.css'

    import {quillEditor} from 'vue-quill-editor'
    import axios from "axios";
    import SeoComponent from './seo/SeoComponent.vue';

    export default {
        data() {
            return {
                content: `Write Disclaimer Here`,
                seoShow: false,
                seoData: null,
                pageId: 0,
            }
        },
        components: {
            quillEditor,
            SeoComponent
        },
        methods: {
            openSEO(){
                this.seoData = this.pageId
                this.seoShow = true
                this.$vs.loading()
            },
            updatePrivacy() {
                axios.post('/api/pages/update', {
                    type: "disclaimer",
                    disclaimer: this.content,
                })
                    .then((res) => {
                        alert(res.data);
                        window.location.reload();
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            getContent() {
                axios.get('/api/pages/all?type=disclaimer')
                    .then((res) => {
                        this.content = res.data[0]['content'];
                        this.pageId = res.data[0]['id'];
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
        },
        beforeMount() {
            this.getContent();
        }
    }
</script>
