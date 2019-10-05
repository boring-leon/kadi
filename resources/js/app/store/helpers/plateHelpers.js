import { cloneDeep } from 'lodash';
import uuid from 'uuid';

const getPlateForRequest = (plate, name) =>  {
    const clone = cloneDeep(plate);       
    clone.ingredients.forEach(m => {
        m.is_custom = m.hasOwnProperty('isCustom') ? m.is_custom = m.isCustom : false;
        return m;
    });

    return {
        ...clone,
        name : name
    }
}

const preparePlate = (plate) => {
    plate.templateKey = uuid.v4();
    plate.ingredients = plate.ingredients.map(i => {   
        return {
            ...getBaseStateIngredient(i),
            weight: i.weight,
            templateKey: uuid.v4()
        };
    });
    return plate;
}

const getBaseStateIngredient = (plateIngredient) => {
    const ingredientStateIndex = plateIngredient.is_custom ? "custom_meals" : "meals";
    const storeIngredient = baseState[ingredientStateIndex].find(m => m.id == plateIngredient.id);
    return cloneDeep(storeIngredient);
}

export {
    getPlateForRequest, preparePlate
};