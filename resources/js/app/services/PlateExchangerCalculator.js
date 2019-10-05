export default class PlateExchangerCalculator
{
    constructor({portion, exchanger}){
        this.portion = portion;
        this.exchanger = exchanger;
    }

    getPortionExchanger(){
        return this.portion * this.exchanger / 1000;
    }
}