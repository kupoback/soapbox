<template>
    <div class="sidebar-toggle position-sticky bottom-0">
        <button type="button"
                class="btn btn-light btn-circle"
                :id="id"
                data-target="#sidebar"
                aria-controls="sidebar"
                aria-expanded="false"
                aria-label="Toggle Sidebar"
                @click="toggleSidebar">
            <p class="visually-hidden-focusable">Toggle Sidebar</p>
            <i class="bi bi-caret-left"></i>
        </button>
    </div>
</template>

<script type="application/javascript">
    import mixins from "../../util/mixins.js";
    
    export default {
        props: {
            id: String,
        },
        mixins: [mixins],
        name: "SidebarToggler"
    };
</script>

<style scoped>

</style>
