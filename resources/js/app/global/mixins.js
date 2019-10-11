import Vue from 'vue';
import PositionUpdater from '../services/PositionUpdater';

Vue.mixin({
    methods: {
        syncAbsoluteBottom(extraTop, pageMargin = 0) {
            this.$nextTick(() => new PositionUpdater(extraTop, pageMargin).updatePosition());
        },
        makeError(message, route = null) {
            this.createMessage(message, "error", route);
        },

        makeInfo(message, route = null) {
            this.createMessage(message, "info", route);
        },

        createMessage(message, name, route) {
            this.$store.commit(`Messages/create_${name}`, message);
            if (route) {
                this.$router.push(route);
            }
            this.syncAbsoluteBottom();
        },

        displayModal(id) {
            $("#" + id).modal("toggle");
        },

        invokeOn(callback, condition) {
            if(condition) callback();
        }
    },
    computed: {
        appUser: () => baseState.user
    }
});