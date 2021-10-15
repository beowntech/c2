<template>
    <draggable class="dragArea" tag="ul" :list="submenu" :group="{ name: 'g1' }">
        <li v-for="(el,i) in submenu" :key="i">
            <div>
                <div class="flex vx-row px-6">
                    <div class="flex-1" style="place-self: center;">{{ el.name }}</div>
                    <div class="vx-col w-full md:w-1/4">
                        <div class="vx-row float-right">
<!--                            <div class="vx-col-2">-->
<!--                                <vs-avatar icon-pack="feather" icon="icon-edit" />-->
<!--                            </div>-->
                            <div class="vx-col-2">
                                <vs-avatar @click="removeMenu(i)" style="background: rgb(229 9 9);" icon-pack="feather" icon="icon-trash" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nested-draggable v-if="el.submenu"  :submenu="el.submenu"/>
        </li>
    </draggable>
</template>
<script>
    import draggable from 'vuedraggable'

    export default {
        props: {
            submenu: {
                required: true,
                type: Array
            }
        },
        methods:{
            removeMenu(index){
                this.submenu.splice(index, 1);
            },
        },
        components: {
            draggable
        },
        name: "nested-draggable"
    };
</script>
<style scoped>
    .dragArea {
        margin-left: 30px;
        margin-top: 10px;
    }
    .dragArea li > div {
        cursor: move;
        background: whitesmoke;
        border-radius: 7px;
        border: 1px solid #b5b8bd;
        margin-bottom: 5px;
        box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;
    }
</style>
