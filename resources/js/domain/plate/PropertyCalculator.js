export default class PropertyCalculator {
    constructor(plateIngredient, store = null){
        this.plateIngredient = plateIngredient;
        this.storeIngredient = store.getters['find'](plateIngredient.templateKey);
    }
    
    get portionsAmount(){
        return this.plateIngredient.weight / this.storeIngredient.portion.weight;
    }

    get kcal(){
        return this.storeIngredient.kcal * this.portionsAmount;
    }

    get exchanger(){
        return this.storeIngredient.exchanger * this.portionsAmount;
    }
}