import RequestBodyBuilder from './support/request/RequestBodyBuilder';
import Request from './Request';

export default{
    
    get({path , fetchSpecific = false, beforeRequest = (request) => { }, clone = {}, transform = {} }){ 
        const body = this.getRequest({clone, transform, isGet: true});
        beforeRequest(body.params);
        return Request.send('get', path, body, fetchSpecific);
    },

    post({ path , fetchSpecific, beforeRequest = (request) => { }, clone = {}, transform = {} }){
        const body = this.getRequest({clone, transform});
        beforeRequest(body);
        return Request.send('post', path, body, fetchSpecific)
    },

    patch({ path , fetchSpecific = false, beforeRequest = (request) => { }, clone = {},  transform = {} }){
        const body = this.getRequest({clone, transform});
        beforeRequest(body);
        return Request.send('patch', path, body, fetchSpecific);
    },

    delete({path, fetchSpecific = false}){
        return Request.send('delete', path, null, fetchSpecific);
    },

    getRequest({clone, transform, isGet = false}){
        const config = Object.assign(clone, transform);
        const requestGetter = isGet ? 'getRequestBody' : 'anyRequestBody';
        return new RequestBodyBuilder(config)[requestGetter];
    }
}