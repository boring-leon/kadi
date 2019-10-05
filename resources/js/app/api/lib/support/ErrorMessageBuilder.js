import { errorMessages } from  '../../config';

export default class ErrorMessageBuilder{
    constructor(statusCode){
        this.statusCode = statusCode;
    }

    getErrorElement(){
        const el = document.createElement('div');
        el.innerHTML = this.getErrorHtml();
        return el;
    }

    getErrorHtml(){
        const content = errorMessages[this.statusCode];
        return this.getTemplate(content);
    }

    getTemplate(msg){
        return `
        <div class="alert alert-danger vue-alert" id="api-error">
            ${msg}
        </div>
        `;
    }

}