import Vue from 'vue';

const createInstance = (config) => {
    if($(config.el).length > 0){
        return new Vue(config);
    }
};

export default createInstance;