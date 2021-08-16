<template>
    <div>
        <vx-card title="Information Form Data">
            <vs-table pagination max-items="10" search :data="enquiries">

                <template slot="thead">
                    <vs-th sort-key="sno">Sno.</vs-th>
                    <vs-th sort-key="calls">Name</vs-th>
                    <vs-th sort-key="time">Email</vs-th>
                    <vs-th sort-key="time">Location</vs-th>
                    <vs-th sort-key="time">Contact</vs-th>
                    <vs-th sort-key="whatsapps">Course</vs-th>
                    <vs-th sort-key="date">Program</vs-th>
                    <vs-th sort-key="url">URL</vs-th>
                </template>

                <template slot-scope="{data}">
                    <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data">

                        <vs-td :data="count">
                            {{ count + 1 }}
                        </vs-td>

                        <vs-td :data="tr.name">
                            {{ tr.name }}
                        </vs-td>

                        <vs-td :data="tr.email">
                            {{ tr.email }}
                        </vs-td>

                        <vs-td :data="tr.contact">
                            {{ tr.contact }}
                        </vs-td>

                        <vs-td :data="tr.location">
                            {{ tr.location }}
                        </vs-td>

                        <vs-td :data="tr.course">
                            {{ tr.course }}
                        </vs-td>

                        <vs-td :data="tr.program_type">
                            {{ tr.program_type }}
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
                axios.get('/api/information-form/all')
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
