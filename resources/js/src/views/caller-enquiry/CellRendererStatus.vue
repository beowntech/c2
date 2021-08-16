<template>
    <feather-icon icon="CircleIcon" :svgClasses="['fill-current h-4 w-4', textColor]" />
</template>

<script>
    export default {
        name: 'CellRendererVerified',
        computed: {
            textColor() {
                return this.params.value === 1 ? "text-success" : this.params.value === 2 ? "text-warning" : this.params.value === 3 ? "text-danger" : "text-gray"
            }
        }
    }
</script>
