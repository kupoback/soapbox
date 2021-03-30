<template>
    <div class="list-group-handle">
        <div class="list-group-handle-icons">
            <div :class="`list-group-handle-icons__icon ${dragClass}`">
                <svg viewBox="0 0 122 220" width="15px" height="20px">
                    <rect stroke="#9a98ae" fill="#9a98ae" stroke-width="1" x="73.5" y="24.5" width="24" height="24"></rect>
                    <rect stroke="#9a98ae" fill="#9a98ae" stroke-width="1" x="24.5" y="73.5" width="24" height="24"></rect>
                    <rect stroke="#9a98ae" fill="#9a98ae" stroke-width="1" x="24.5" y="24.5" width="24" height="24"></rect>
                    <rect stroke="#9a98ae" fill="#9a98ae" stroke-width="1" x="73.5" y="73.5" width="24" height="24"></rect>
                    <rect stroke="#9a98ae" fill="#9a98ae" stroke-width="1" x="73.5" y="122.5" width="24" height="24"></rect>
                    <rect stroke="#9a98ae" fill="#9a98ae" stroke-width="1" x="24.5" y="171.5" width="24" height="24"></rect>
                    <rect stroke="#9a98ae" fill="#9a98ae" stroke-width="1" x="24.5" y="122.5" width="24" height="24"></rect>
                    <rect stroke="#9a98ae" fill="#9a98ae" stroke-width="1" x="73.5" y="171.5" width="24" height="24"></rect>
                </svg>
            </div>
        </div>
    </div>
</template>

<script type="application/javascript">
    export default {
        props: {
          dragClass: String
        },
        name: "Drag-Handle"
    };
</script>

<style scoped>

</style>
