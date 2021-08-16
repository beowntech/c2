<template>

    <div class="vx-col w-full mb-base">
        <vx-card title="SEO Settings">
            <div class="vx-row">
                <div class="vx-col sm:w-1/2 w-full mb-2">
                    <vs-input class="w-full" label-placeholder="Title" v-model="title" />
                </div>
                <div class="vx-col sm:w-1/2 w-full mb-2">
                    <vs-input class="w-full" label-placeholder="Slug" v-model="slug" />
                </div>
            </div>
            <div class="vx-row">
                <div class="vx-col sm:w-1/2 w-full mb-2">
                    <vs-input class="w-full" label-placeholder="Canonical" v-model="canonical" />
                </div>
                <div class="vx-col sm:w-1/2 w-full mb-2">
                    <vs-input class="w-full" label-placeholder="Primary Focus Keyword" v-model="focusK" />
                </div>
            </div>
            <div class="vx-row">
                <div class="vx-col sm:w-1/2 w-full mb-6">
                    <vs-input class="w-full" label-placeholder="Reading Time" v-model="readingTime" />
                </div>
            </div>
            <div class="vx-row">
                <div class="vx-col  w-full mb-6">
                    <vs-textarea counter="160" label="Description" v-model="description" />
                </div>
            </div>
            <div class="vx-row">
                <div class="vx-col  w-full mb-6">
                    <vs-textarea label="JSON Schema" v-model="scheme" />
                </div>
            </div>
<!--            <div class="vx-row">-->
<!--                <div class="vx-col sm:w-1/2 w-full mb-3">-->
<!--                    <h3 style="margin-bottom: 10px"><strong>Twitter</strong></h3>-->
<!--                    <hr>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="vx-row">-->
<!--                <div class="vx-col sm:w-1/2 w-full mb-2">-->
<!--                    <vs-input class="w-full" label-placeholder="Twitter Title" v-model="Ttitle" />-->
<!--                </div>-->
<!--                <div class="vx-col sm:w-1/2 w-full mb-6">-->
<!--                    <vs-input class="w-full" label-placeholder="Twitter Image" v-model="Timage" />-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="vx-row">-->
<!--                <div class="vx-col w-full mb-6">-->
<!--                    <vs-textarea label="Twitter Description" v-model="Tdescription" />-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="vx-row">-->
<!--                <div class="vx-col sm:w-1/2 w-full mb-3">-->
<!--                    <h3 style="margin-bottom: 10px"><strong>Open Graph</strong></h3>-->
<!--                    <hr>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="vx-row">-->
<!--                <div class="vx-col sm:w-1/2 w-full mb-2">-->
<!--                    <vs-input class="w-full" label-placeholder="Title" v-model="Otitle" />-->
<!--                </div>-->
<!--                <div class="vx-col sm:w-1/2 w-full mb-6">-->
<!--                    <vs-input class="w-full" label-placeholder="Image" v-model="Oimage" />-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="vx-row">-->
<!--                <div class="vx-col w-full mb-2">-->
<!--                    <vs-textarea label="Description" v-model="Odescription" />-->
<!--                </div>-->
<!--            </div>-->
            <div class="vx-row">
                <div class="vx-col w-full">
                    <vs-button class="mr-3 mb-2" @click="updateData">Submit</vs-button>
<!--                    <vs-button color="warning" type="border" class="mb-2" @click="input25 = input26 = input27 = input28 = input29 = input30 = ''; check7 = false;">Reset</vs-button>-->
                </div>
            </div>
        </vx-card>
    </div>
</template>

<script>
    import axios from "axios";

    export default {
        name: "seo",
        data: function() {
            return {
                title: "",
                slug: "",
                author: "",
                canonical: "",
                focusK: "",
                description: "",
                Ttitle: "",
                Timage: "",
                Tdescription: "",
                Otitle: "",
                Oimage: "",
                Odescription: "",
                seo_id: null,
                readingTime: "",
                scheme: ""
            }
        },
        methods: {
          getData(){
              axios.post('/api/properties/getSEO',
                  {
                      prop_id: this.$route.params.PropId
                  })
                  .then((res) => {
                      console.log(res)
                      this.seo_id = res.data[0].id;
                      this.title = res.data[0].title;
                      this.slug = res.data[0].permalink;
                      this.canonical = res.data[0].canonical;
                      this.scheme = res.data[0].json_schema
                      this.author = res.data[0].author_name;
                      this.focusK = res.data[0].primary_focus_keyword;
                      this.description = res.data[0].description;
                      this.readingTime = res.data[0].estimated_reading_time_minutes;
                  })
                  .catch((err) => {
                      console.log(err)
                  })
          },
            updateData(){
                axios.post('/api/properties/updateSEO',
                    {
                        title: this.title,
                        slug: this.slug,
                        canonical: this.canonical,
                        author: this.author,
                        schema: this.scheme,
                        description: this.description,
                        focus: this.focusK,
                        seo_id: this.seo_id
                    }).then((res) => {
                        this.alert('SEO Details Updated','SEO Details Update Successfully','green');
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
                    position: 'top-right'
                });
            },
        },
        beforeMount() {
            this.$vs.loading.close()
            this.getData()
        }
    }
</script>

<style scoped>

</style>
