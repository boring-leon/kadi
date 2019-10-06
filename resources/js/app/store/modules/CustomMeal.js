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
        createMeal({ commit }, { meal, name }) {
            CustomMeal.create(getMealForRequest(meal, name)).then(meal =>
                commit('addMeal', prepareMeal(meal))
            );
        },
        updateMeal({ commit, getters }, { meal, name, id }) {
            CustomMeal.update(getMealForRequest(meal, name), id).then(newMeal => {
                commit('setProps', { data: prepareMeal(newMeal), meal: getters['find'](id) });
            });
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