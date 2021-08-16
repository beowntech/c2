<template>
    <vs-chip class="ag-grid-cell-chip" style="width: 100%;" :color="chipColor(params.value)">
        <span>{{ chipName(params.value) }}</span>
    </vs-chip>
</template>

<script>
    export default {
        name: 'CellRendererType',
        computed: {
            chipColor() {
                return (value) => {
                    if(value === "property") return "dark"
                    else if(value === "contact") return "#24c1a0"
                    else if(value === "front") return "#9106B7"
                    else "primary"
                }
            },
            chipName() {
                return (value) => {
                    if(value === "property") return "Property"
                    else if(value === "contact") return "Contact"
                    else if(value === "front") return "Front"
                    else "primary"
                }
            }
        }
    }
</script>

<style lang="scss" scpoped>
    .ag-grid-cell-chip {
        &.vs-chip-success {
            background: rgba(var(--vs-success),.15);
            color: rgba(var(--vs-success),1) !important;
            font-weight: 500;
        }
        &.vs-chip-warning {
            background: rgba(var(--vs-warning),.15);
            color: rgba(var(--vs-warning),1) !important;
            font-weight: 500;
        }
        &.vs-chip-danger {
            background: rgba(var(--vs-danger),.15);
            color: rgba(var(--vs-danger),1) !important;
            font-weight: 500;
        }
    }
</style>
