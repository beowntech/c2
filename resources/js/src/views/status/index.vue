<template>
    <div class="vx-row">

        <!-- HORIZONTAL LAYOUT -->
        <div class="vx-col md:w-1/2 w-full mb-base">
            <vx-card title="Add Status">
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
                        <span>Description</span>
                    </div>
                    <div class="vx-col sm:w-2/3 w-full">
                        <vs-textarea class="w-full" type="text" v-model="desc" />
                    </div>
                </div>
                <div class="vx-row mb-6">
                    <div class="vx-col sm:w-1/3 w-full">
                        <span>Color</span>
                    </div>
                    <div class="vx-col sm:w-1/3 w-full">
                        <input type="color" style="width: 100%" v-model="color" />
                    </div>
                </div>
                <div class="vx-row mb-6">
                    <div class="vx-col sm:w-1/3 w-full">
                        <span>Status For:</span>
                    </div>
                    <div class="vx-col sm:w-1/3 w-full">
                        <v-select v-model="selectType" :options="typeOptions" :dir="$vs.rtl ? 'rtl' : 'ltr'" />
                    </div>
                </div>
                <div class="vx-row">
                    <div class="vx-col sm:w-2/3 w-full ml-auto">
                        <vs-button class="mr-3 mb-2" @click="addStatus">Submit</vs-button>
                        <vs-button color="warning" type="border" class="mb-2" @click="name = desc = color = ''; check1 = false;">Reset</vs-button>
                    </div>
                </div>
            </vx-card>
        </div>
    </div>
</template>

<script>
    import axios from "axios";
    import vSelect from 'vue-select'

    export default{
        data() {
            return {
                check1: '',
                name: '',
                selectType: [],
                typeOptions: [
                    {
                    'label': 'For Property',
                    'id': 1
                    },
                    {
                        'label': 'For User',
                        'id': 2
                    },
                    {
                        'label': 'For Blogger',
                        'id': 3
                    },
                    {
                        'label': 'For Caller',
                        'id': 4
                    },
                ],
                desc: '',
                color: '',
            }
        },
        methods:{
            addStatus() {
                axios.post('/api/status/add',
                    {
                        name: this.name,
                        message: this.desc,
                        color: this.color,
                        for: this.selectType[0].id,
                    })
                    .then((res) => {
                       if(res['success'] === 1) {
                           alert("Added");
                       }
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            }
        },
        components:{
            'v-select': vSelect,
        }
    }
</script>
