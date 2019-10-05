import { auth } from "../../../config";
import RequestCloner from './RequestCloner';

export default class RequestBodyBuilder {
    
    constructor(config){
        this.config = config;
    }

    get getRequestBody(){
        return { 
            params: {
                ...auth, 
                ... new RequestCloner(this.config).getRequest() 
            }
        };
    }

    get anyRequestBody(){
        return {
            ...auth, 
            ...new RequestCloner(this.config).getRequest() 
        };
    }

}