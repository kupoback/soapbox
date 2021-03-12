<template>
    <div class="sidebar-toggle bottom-0 start-0">
        <button type="button"
                class="btn btn-light btn-circle"
                :id="id"
                data-target="#sidebar"
                aria-controls="sidebar"
                aria-expanded="false"
                aria-label="Toggle Sidebar">
            <p class="visually-hidden-focusable">Toggle Sidebar</p>
            <i class="bi bi-caret-left"></i>
        </button>
    </div>
</template>

<script type="application/javascript">
    export default {
        props: {
            id: String,
        },
        name: "SidebarToggler"
    };
</script>

<style scoped>

</style>
