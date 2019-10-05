export default {
    namespaced: true,

    state: {
        active_error: {
            content: '',
            display: false
        },
        active_info: {
            content: '',
            display: false
        }
    },

    mutations: {
        create_error(state, content) {
            state.active_error.content = content;
            state.active_error.display = true;
        },
        create_info(state, content){
            state.active_info.content = content;
            state.active_info.display = true;
        },
        hide_error: (state) => ( state.active_error.display = false ),
        hide_info: (state) => ( state.active_info.display = false )
    }
}