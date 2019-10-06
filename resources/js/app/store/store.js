import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import Plate from './modules/Plate';
import User from './modules/User';
import CustomIngredient from './modules/CustomIngredient';
import Messages from './modules/Messages';
import CustomMeal from './modules/CustomMeal';
import { prepareIngredients } from './helpers/ingredientHelpers';

export default new Vuex.Store({
    modules: { Plate, User, CustomIngredient, Messages, CustomMeal },
    state: {
        ingredients: prepareIngredients(baseState.ingredients).concat(
            prepareIngredients(baseState.custom_ingredients).map(m => { m.isCustom = true; return m; })
        )
    },
    mutations: {
        addIngredient: (state, ingredient) => state.ingredients.push(ingredient),
        removeIngredient: (state, ingredient) => state.ingredients.splice(state.ingredients.indexOf(ingredient), 1),
        setProps: (state, {ingredient, data}) => {
            const obj = state.ingredients.find(i => i.templateKey == ingredient.templateKey);
            for(let key in data) Vue.set(obj, key, data[key]);
        }
    },
    getters: {
        find: (state) => (templateKey) => {
            return state.ingredients.find(m => m.templateKey === templateKey);
        },
        findById: (state) => (id) => {
            return state.ingredients.find(m => m.id == id);
        },
        getCustom: (state) => state.ingredients.filter(m => m.isCustom == true) 
        
    }
});