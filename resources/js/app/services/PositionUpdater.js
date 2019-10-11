export default class PositionUpdater
{
    constructor(extraTop, innerPageMargin){
        this.extraTop = extraTop;
        this.innerPageMargin = innerPageMargin;
    }

    updatePosition(){
        if(this.shouldUpdatePosition()){
            this.el().css({position: 'static', 'marginTop': this.extraTop});
        }
        else{
            this.el().css({position: 'absolute'});
        }
    }

    shouldUpdatePosition(){
        return $('body').height() - $('nav').height() 
        - this.el().height() - this.innerPageMargin <= $('.container').height();
    }

    el(){
        return $('.absolute-bottom');
    }
}