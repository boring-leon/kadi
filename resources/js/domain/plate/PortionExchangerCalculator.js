export default class PortionExchangerCalculator{
    
    constructor({portionWeight, customExchanger}){
        this.portionWeight = portionWeight;
        this.customExchanger = customExchanger;
    }

    get portionExchanger(){
        return this.portionWeight * this.customExchanger / 1000;
    }
}