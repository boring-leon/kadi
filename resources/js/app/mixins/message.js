export default {
    mounted() {
        const vm = this;
        setTimeout(vm.fadeOut, 4500);
    },

    methods: {
        fadeOut(time = 3000) {
            let vm = this;
            $(`#vue-dynamic-${vm.namespace}`).fadeOut(750, () => {
                vm.$store.commit(`Messages/hide_${vm.namespace}`);
            });
        }
    },

    computed: {
        message() {
            const namespace = 'active_' + this.namespace;
            return this.$store.state.Messages[namespace].content;
        }
    }
}