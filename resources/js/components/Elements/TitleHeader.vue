<template>
    <div :class="`col-12 ${cssClasses}`">
        <slot v-if="hasDateTime"
              name="dateTime"></slot>
        <h1 :class="hClasses"
            v-text="title" />
    </div>
</template>

<script type="application/javascript">
    import {ref} from "vue";
    
    export default {
        props: {
            cssClasses: String,
            hClasses: String,
            title: String,
        },
        setup(props, {slots}) {
            const hasDateTime = ref(false);
            if (slots.dateTime) hasDateTime.value = true;
            
            return {
                hasDateTime,
            };
            
        },
        name: "TitleHeader"
    };
</script>

<style scoped>

</style>
