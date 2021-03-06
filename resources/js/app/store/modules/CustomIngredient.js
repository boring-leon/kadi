import CustomIngredientModel from '../../api/models/CustomIngredient';
import { getIngredientForCommit } from '../helpers/ingredientHelpers';

export default {
    namespaced: true,

    actions:{
        createIngredient({commit}, {ingredient}){
            CustomIngredientModel.create(ingredient).then(i => {
                i.isCustom = true;
                baseState.custom_ingredients.push(i);
                commit('addIngredient', i, {root:true});
            });
        },
        updateIngredient({commit}, {ingredient, newIngredient}){
            const commitIngredient = getIngredientForCommit(newIngredient);
            commit('setProps', { ingredient: ingredient, data: commitIngredient}, {root:true}); 
            CustomIngredientModel.update(newIngredient);
        },
        deleteIngredient({commit}, {ingredient}){
            commit('Plate/removeIngredient', ingredient, {root:true});
            commit('CustomMeal/removeIngredientFromAll', ingredient, {root:true});
            commit('removeIngredient', ingredient, {root:true});
            CustomIngredientModel.delete(ingredient);
        }
    }
}