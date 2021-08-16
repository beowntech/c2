<template>

    <div class="vx-col w-full mb-base" v-if="isSeoActiveLocal">
        <vx-card title="SEO Settings">
            <div class="vx-row">
                <div class="vx-col sm:w-1/2 w-full mb-2">
                    <vs-input class="w-full" label-placeholder="Title" v-model="title"/>
                </div>
                <div class="vx-col sm:w-1/2 w-full mb-2">
                    <vs-input class="w-full" label-placeholder="Slug" v-model="slug"/>
                </div>
            </div>
            <div class="vx-row">
                <div class="vx-col sm:w-1/2 w-full mb-2">
                    <vs-input class="w-full" label-placeholder="Canonical" v-model="canonical"/>
                </div>
                <div class="vx-col sm:w-1/2 w-full mb-2">
                    <vs-input class="w-full" label-placeholder="Primary Focus Keyword" v-model="focusK"/>
                </div>
            </div>
            <div class="vx-row">
                <div class="vx-col sm:w-1/2 w-full mb-6">
                    <vs-input class="w-full" label-placeholder="Reading Time" v-model="readingTime"/>
                </div>
            </div>
            <div class="vx-row">
                <div class="vx-col  w-full mb-6">
                    <vs-textarea label="Description" v-model="description"/>
                </div>
            </div>
            <div class="vx-row">
                <div class="vx-col  w-full mb-6">
                    <vs-textarea label="JSON Schema" v-model="scheme" />
                </div>
            </div>
            <div class="vx-row">
                <div class="vx-col w-full">
                    <vs-button class="mr-3 mb-2" @click="updateData">Submit</vs-button>
                </div>
            </div>
        </vx-card>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "seo",
        props: {
            isSEOActive: {
                type: Boolean,
                required: true
            },
            seoId: null
        },
        computed: {
            isSeoActiveLocal: {
                get() {
                    return this.isSEOActive
                },
                set(val) {
                    if (!val) {
                        // this.$emit('closeSEO')
                        this.title = ""
                        this.slug = ""
                        this.author = ""
                        this.canonical = ""
                        this.focusK = ""
                        this.description = ""
                        this.scheme = ""
                    }
                }
            }
        },
        watch: {
            isSEOActive(val) {
                if (!val) return
                if (this.seoId == null) {
                    this.initValues()
                    this.$validator.reset()
                } else {
                    this.seoID = this.seoId;
                    this.getData()
                    this.initValues()
                }
                // Object.entries(this.data).length === 0 ? this.initValues() : { this.dataId, this.dataName, this.dataCategory, this.dataOrder_status, this.dataPrice } = JSON.parse(JSON.stringify(this.data))
            }
        },
        data: function () {
            return {
                seoID: null,
                title: "",
                slug: "",
                author: "",
                canonical: "",
                focusK: "",
                description: "",
                seo_id: null,
                readingTime: "",
                scheme: ""
            }
        },
        methods: {
            getData() {
                axios.post('/api/pages/getSEO',
                    {
                        page_id: this.seoId
                    })
                    .then((res) => {
                        this.title = res.data[0].title;
                        this.slug = res.data[0].permalink;
                        this.canonical = res.data[0].canonical;
                        this.author = res.data[0].author_name;
                        this.description = res.data[0].description;
                        this.focusK = res.data[0].primary_focus_keyword;
                        this.readingTime = res.data[0].estimated_reading_time_minutes;
                        this.scheme = res.data.seo[0].json_schema;
                        this.$vs.loading.close()
                    })
                    .catch((err) => {
                        this.$vs.loading.close()
                        console.log(err)
                    })
            },
            updateData() {
                axios.post('/api/pages/updateSEO',
                    {
                        title: this.title,
                        slug: this.slug,
                        canonical: this.canonical,
                        author: this.author,
                        description: this.description,
                        focus: this.focusK,
                        page_id: this.seoId,
                        schema: this.scheme
                    }).then((res) => {
                    this.alert('SEO Details Updated', 'SEO Details Update Successfully', 'green');
                    console.log(res)
                }).catch((err) => {
                    console.log(err)
                })
            },
            alert(title, text, color) {
                this.$vs.notify({
                    color: color,
                    title: title,
                    text: text,
                    position: 'bottom-right'
                });
            },
        },
    }
</script>

<style scoped>

</style>
