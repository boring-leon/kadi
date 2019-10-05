export default {
    props:{
        id:{
            required: true
        }
    },

    methods: {
        closeModal(){
            this.beforeModalClose();
            $('#' + this.id).modal('hide');
        },

        beforeModalClose(){
            //
        }
    },
}