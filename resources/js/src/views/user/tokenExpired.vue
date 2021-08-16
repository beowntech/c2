<template>
    <div v-if="showModal">
        <div id="modal">
            <p>Hello i am a modal
            </p>
            <button @click="hide">Close</button>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                showModal: false
            }
        },
        methods: {
            show() {
                this.showModal = true
            },
            hide(){
                this.showModal = false
            }
        }
    }
</script>
