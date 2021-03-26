export default {
    methods: {
        toggleSidebar() {
            const sidebarVisibility = this.$store.state.sidebarOpened;
            this.$store.dispatch('toggleSidebarVisibility', {visibility: !sidebarVisibility});
        },
        detectScreenSize(winWidth) {
            if (winWidth < 768) return 'mobile';
            else if (winWidth >= 768 && winWidth <= 1200) return 'tablet';
            
            return 'desktop';
        },
        isObjEmpty(obj) {
            return Object.keys(obj).length === 0;
        },
        objHasKey(obj, key) {
            return obj.hasOwnProperty(key);
        }
    }
}
