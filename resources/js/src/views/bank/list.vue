<template>
    <div class="vx-row">
        <div class="vx-col w-full">
            <vs-button v-bind:color="addNew ? 'danger':'success'" @click="addNewData" type="gradient" class="mb-3 float-right" v-text="addNew ? 'Close':'Add New'"></vs-button>
        </div>
        <div class="vx-col w-full">
            <transition name="fade" mode="out-in">
                <add-data v-if="addNew"/>
                <vx-card v-else title="Banks List">
                    <vs-table :data="props" pagination max-items="5" search>

                        <template slot="thead">
                            <vs-th>Name</vs-th>
                            <vs-th>Short Name</vs-th>
                            <vs-th>Added On</vs-th>
                        </template>

                        <template slot-scope="{data}">
                            <vs-tr :key="indextr" v-for="(tr, indextr) in data">

                                <vs-td :data="tr.name">
                                    {{ tr.name }}
                                </vs-td>

                                <vs-td :data="tr.short_name">
                                    {{ tr.short_name }}
                                </vs-td>

                                <vs-td :data="tr.created_at">
                                    {{ tr.created_at }}
                                </vs-td>

                                <!--                    <vs-td class="whitespace-no-wrap">-->
                                <!--&lt;!&ndash;                        <feather-icon icon="EditIcon" svgClasses="w-5 h-5 hover:text-primary stroke-current" @click.stop="editData(tr.id)" />&ndash;&gt;-->
                                <!--&lt;!&ndash;                        <feather-icon icon="AwardIcon" svgClasses="w-5 h-5 hover:text-warning stroke-current" class="ml-2" @click.stop="seoEdit(tr.id)" />&ndash;&gt;-->
                                <!--                    </vs-td>-->
                            </vs-tr>
                        </template>
                    </vs-table>
                </vx-card>
            </transition>
        </div>
    </div>
</template>

<script>
    import AddData from "./add";
    import axios from "axios";
    import $ from 'jquery';

    export default {
        data() {
            return {
                props: [],
                updateselected: [],
                addNew: false,
                status: [],
                changeStatus: [
                    {color: null, name: null}
                ],
                user: localStorage.getItem('userId')
            }
        },
        methods: {
            addNewData() {
                this.addNew = !this.addNew;
            },
            getBank() {
                axios.get('/api/bank/list')
                    .then((res) => {
                        console.log(res)
                        this.props = res.data;
                        this.props.reverse();
                    })
                    .catch((err) => {
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
            editData(prop) {
                this.$vs.loading();
                this.$router.push("/property/update/" + prop).catch(() => {
                })
            },
        },
        components: {
            AddData
        },
        beforeMount() {
            this.getBank()
            this.getStatus()
        }
    }
</script>
