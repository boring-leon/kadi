import uuid from 'uuid';

const prepareIngredients = (ingredients) => {
    return ingredients.map(i => {
        i.portion.name = i.portion.name || "1 porcja";
        i.portion.weight = i.portion.weight ||  100;
        i.templateKey = uuid.v4();
        return i;
    });
}

const getIngredientForCommit = (ingredient) => {
    return {
        ...ingredient,
        portion: {
            name: ingredient.portion_name,
            weight: ingredient.portion_weight
        }
    }
};

export {
    prepareIngredients, getIngredientForCommit
};