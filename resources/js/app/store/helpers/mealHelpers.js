import { cloneDeep } from 'lodash';
import uuid from 'uuid';

const getMealForRequest = (meal, name) =>  {
    const clone = cloneDeep(meal);       
    clone.ingredients.forEach(i => {
        i.is_custom = i.hasOwnProperty('isCustom') ? i.is_custom = i.isCustom : false;
        return i;
    });

    return {
        ...clone,
        name : name
    }
}

const prepareMeal = (meal) => {
    meal.templateKey = uuid.v4();
    meal.ingredients = meal.ingredients.map(i => {   
        return {
            ...getBaseStateIngredient(i),
            weight: i.weight,
            templateKey: uuid.v4()
        };
    });
    return meal;
}

const getBaseStateIngredient = (mealIngredient) => {
    const ingredientStateIndex = mealIngredient.is_custom ? "custom_ingredients" : "ingredients";
    const storeIngredient = baseState[ingredientStateIndex].find(i => i.id == mealIngredient.id);
    return cloneDeep(storeIngredient);
}

export {
    getMealForRequest, prepareMeal
};