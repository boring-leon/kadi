import { cloneDeep } from 'lodash';

export default class RequestCloner{
    
    constructor(config){
        this.config = config;
        this.request = cloneDeep(this.config.data);
    }

    getRequest(){
        if(this.config.hasOwnProperty('rename')){
            this.filterByRename();
        }
        if(this.config.hasOwnProperty('skip')){
            this.filterBySkip();
        }
        if(this.config.hasOwnProperty('take')){
            this.filterByTake();
        }

        return this.request;
    }

    filterByRename(){
        for(let key in this.config.rename){
            if (this.request.hasOwnProperty(key)) {
                this.request[ this.config.rename[key] ] = this.request[key];
                delete this.request[key];
            }
        }
    }

    filterBySkip(){
        this.config.skip.forEach(item => delete this.request[item]);
    }

    filterByTake(){
        for(let key in this.request){
            if(!this.config.take.includes(key)){
                delete this.request[key];
            }
        }
    }
}