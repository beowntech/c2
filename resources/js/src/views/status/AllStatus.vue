
<template>
    <vx-card title="All Status">

        <p class="mb-4">Click to <strong>Edit</strong></p>

        <vs-table :data="status">

        <template slot="thead">
            <vs-th>Name</vs-th>
            <vs-th>Message</vs-th>
            <vs-th>Color Code</vs-th>
        </template>

        <template slot-scope="{data}">
            <vs-tr :key="indextr" v-for="(tr, indextr) in data">

                <vs-td :data="tr.name">
                    {{ tr.name }}
                    <template slot="edit">
                        <vs-input v-model="tr.name" class="inputx" placeholder="Email" />
                        <vs-button @click="updateName(tr.name,tr.id)">Update</vs-button>
                    </template>
                </vs-td>

                <vs-td :data="tr.message">
                    {{ tr.message }}
                    <template slot="edit">
                            <vs-input v-model="tr.message" />
                        <vs-button @click="updateMsg(tr.message,tr.id)">Update</vs-button>
                    </template>
                </vs-td>

                <vs-td :data="tr.color">
                    <vs-chip v-bind:color="tr.color">{{ tr.color }}</vs-chip>
                    <template slot="edit">
                        <vs-input  type="color" v-model="tr.color" />
                        <vs-button @click="updateColor(tr.color,tr.id)">Update</vs-button>
                    </template>
                </vs-td>
            </vs-tr>
        </template>
    </vs-table>
    </vx-card>
</template>

<script>
    import axios from "axios";

    export default {
        data() {
            return {
                status: []
        }
        },
        methods:{
            getStatus() {
                axios.get('/api/status/all')
                    .then((res) => {
                        console.log(res)
                       this.status = res.data;
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            updateName(name,id) {
                axios.post('/api/status/update',{
                    type: "name",
                    name: name,
                    id: id
                })
                    .then((res) => {
                        alert(res.data);
                        window.location.reload();
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            updateMsg(msg,id) {
                axios.post('/api/status/update',{
                    type: "message",
                    msg: msg,
                    id: id
                })
                    .then((res) => {
                        alert(res.data);
                        window.location.reload();
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },
            updateColor(color,id) {
                axios.post('/api/status/update',{
                    type: "color",
                    color: color,
                    id: id
                })
                    .then((res) => {
                        alert(res.data);
                        window.location.reload();
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            }
        },
        beforeMount() {
            this.getStatus();
        }
    }
</script>
