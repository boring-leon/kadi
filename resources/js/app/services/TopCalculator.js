export default class TopCalculator
{
    constructor(extraTop, innerPageMargin){
        this.extraTop = extraTop;
        this.innerPageMargin = innerPageMargin;
    }

    setTop(){
        if(this.shouldTopChange()){
            $('.absolute-bottom').css({
                position: 'static', 'marginTop': this.extraTop
            });
        }
        else{
            $('.absolute-bottom').css({position: 'absolute'});
        }
    }

    getTop(){
        return $('.container').height() + $('nav').height() + $('.absolute-bottom').height() 
        + this.extraTop;
    }

    shouldTopChange(){
        return $('body').height() - $('nav').height() 
        - $('.absolute-bottom').height() - this.innerPageMargin <= $('.container').height();
    }
}