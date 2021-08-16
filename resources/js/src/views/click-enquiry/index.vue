<template>
    <div>
        <vx-card title="Click Enquiries Data">
        <vs-table pagination max-items="10" search :data="enquiries">

            <template slot="thead">
                <vs-th sort-key="sno">Sno.</vs-th>
                <vs-th sort-key="calls">Calls</vs-th>
                <vs-th sort-key="whatsapps">Whatsapp</vs-th>
                <vs-th sort-key="date">Date</vs-th>
                <vs-th sort-key="time">Time</vs-th>
                <vs-th sort-key="url">URL</vs-th>
            </template>

            <template slot-scope="{data}">
                <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data">

                    <vs-td :data="count">
                        {{ count + 1 }}
                    </vs-td>

                    <vs-td :data="tr.calls">
                        {{ tr.calls }}
                    </vs-td>

                    <vs-td :data="tr.whatsapp">
                        {{ tr.whatsapp }}
                    </vs-td>

                    <vs-td :data="tr.created">
                        {{ tr.created }}
                    </vs-td>

                    <vs-td :data="tr.time">
                        {{ tr.time }}
                    </vs-td>

                    <vs-td :data="tr.url">
                        <a :href="''+tr.url.split('https://admissionjockey.com').join('/')" target="_blank">{{tr.url.split('https://admissionjockey.com').join('/')}}</a>
                    </vs-td>
                </vs-tr>
            </template>
        </vs-table>
    </vx-card>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                selected: [],
                enquiries: [],
                count: 0,
            }
        },
        methods: {
            toggleDataSidebar(val=false){
                this.addNewDataSidebar = val
            },
            getData() {
                axios.get('/api/click-enquiry/all')
                    .then((res) => {
                        console.log(res)
                        this.enquiries = res.data
                    }).catch((err) => {
                    console.log(err)
                })
            },
        },
        beforeMount() {
            this.getData()
        }
    }
</script>
