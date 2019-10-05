import CustomIngredientModel from '../../api/models/CustomIngredient';
import { getIngredientForCommit } from '../helpers/ingredientHelpers';

export default {
    namespaced: true,

    actions:{
        createIngredient({commit}, {ingredient}){
            CustomIngredientModel.create(ingredient).then(i => {
                i.isCustom = true;
                baseState.custom_meals.push(i);
                commit('addIngredient', i, {root:true});
            });
        },
        updateIngredient({commit, rootGetters}, {ingredient, newIngredient}){
            const commitIngredient = getIngredientForCommit(newIngredient);
            commit('setProps', { ingredient: ingredient, data: commitIngredient}, {root:true}); 
            if(rootGetters['Plate/find'](ingredient.templateKey)){
                commit('Plate/setProps', {ingredient:ingredient, data: commitIngredient}, {root:true});
            }
            CustomIngredientModel.update(newIngredient);
        },
        deleteIngredient({commit}, {ingredient}){
            commit('Plate/removeIngredient', ingredient, {root:true});
            commit('CustomPlate/removeIngredientFromAll', ingredient, {root:true});
            commit('removeIngredient', ingredient, {root:true});
            CustomIngredientModel.delete(ingredient);
        }
    }
}