import Vue from 'vue';

export default {
    namespaced: true,
    
    state: {
        ingredients: []
    },
    mutations: {
        addIngredient: (state, ingredient) => state.ingredients.push( _.cloneDeep(ingredient) ),
        removeIngredient: (state, ingredient) => state.ingredients.splice(state.ingredients.indexOf(ingredient), 1),
        removeAll: (state) => Vue.set(state, 'ingredients', []),
        setProps(state, {ingredient, data }) {
            const item = state.ingredients.find(i => i.templateKey == ingredient.templateKey);
            for (let key in data) Vue.set(item, key, data[key]);
        }
    },
    getters: {
        find: (state) => (templateKey) => {
            return state.ingredients.find(m => m.templateKey === templateKey);
        },
        findById: (state) => (id) => {
            return state.ingredients.find(m => m.id == id);
        }
    }
}