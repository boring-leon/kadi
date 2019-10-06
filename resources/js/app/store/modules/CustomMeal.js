import Vue from 'vue';
import CustomMeal from '../../api/models/CustomMeal';
import { getMealForRequest, prepareMeal } from '../helpers/mealHelpers';

export default {
    namespaced: true,

    state: {
        meals: baseState.custom_meals.map(m => prepareMeal(m))
    },
    mutations: {
        addMeal :(state, meal) => state.meals.push(meal),
        removeMeal: (state, meal) => state.meals.splice(state.meals.indexOf(meal), 1),
        setProps(state, { meal, data }) {
            const item = state.meals.find(p => p.id == meal.id);
            for (let key in data) if(key != "id") Vue.set(item, key, data[key]);
        },

        removeIngredientFromAll(state, ingredient){
            state.meals.forEach(m => {
                Vue.set(m, 'ingredients', m.ingredients.filter(i => i.id != ingredient.id));
            });
        }
    },

    actions: {
        createMeal({ commit, rootState }, {name}) {
            const mealFromPlate = getMealForRequest(rootState.Plate, name);
                   
            CustomMeal.create(mealFromPlate, name).then(meal => 
                commit('addMeal', prepareMeal(meal)) 
            );
        },
        updateMeal({ commit, rootState, getters }, {name, id}) {
            const mealFromPlate = getMealForRequest(rootState.Plate, name);
            
            CustomMeal.update(mealFromPlate, id).then(meal =>
                commit('setProps', { data: prepareMeal(meal), meal: getters['find'](id) })
            );
        },
        removeMeal({commit}, {meal}){
            CustomMeal.delete(meal);
            commit('removeMeal', meal);
        }
    },

    getters: {
        find: (state) => (id) => {
            return state.meals.find(p => p.id == id);
        }
    }
}