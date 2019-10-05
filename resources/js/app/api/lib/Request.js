import  { axios } from './support/axiosSetup';
import ErrorMsgBuilder from './support/ErrorMessageBuilder';

export default class Request {

    static send(method, path, body, fetchSpecific) {
        return axios[method](path, body)
        .then(res => this.callback(res, fetchSpecific))
        .catch(err => this.handleError(err));
    }

    static callback(res, fetchSpecific) {
        return fetchSpecific ? res.data[fetchSpecific] : res.data;
    }

    static handleError(err){
        const error = new ErrorMsgBuilder(err.response.status).getErrorElement();
        error.addEventListener('click', (e) => $(e.target).fadeOut('slow')); 
        $('.app-dynamic-errors').append(error);
    }
}
