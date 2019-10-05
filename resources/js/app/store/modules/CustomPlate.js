import Vue from 'vue';
import CustomPlate from '../../api/models/CustomPlate';
import { getPlateForRequest, preparePlate } from '../helpers/plateHelpers';

export default {
    namespaced: true,

    state: {
        plates: baseState.custom_plates.map(p => preparePlate(p))
    },
    mutations: {
        addPlate :(state, plate) => state.plates.push(plate),
        removePlate: (state, plate) => state.plates.splice(state.plates.indexOf(plate), 1),
        setProps(state, { plate, data }) {
            const item = state.plates.find(p => p.id == plate.id);
            for (let key in data) if(key != "id") Vue.set(item, key, data[key]);
        },

        removeIngredientFromAll(state, ingredient){
            state.plates.forEach(p => {
                Vue.set(p, 'ingredients', p.ingredients.filter(i => i.id != ingredient.id));
            });
        }
    },

    actions: {
        createPlate({ commit }, { plate, name }) {
            CustomPlate.create(getPlateForRequest(plate, name)).then(plate =>
                commit('addPlate', preparePlate(plate))
            );
        },
        updatePlate({ commit, getters }, { plate, name, id }) {
            CustomPlate.update(getPlateForRequest(plate, name), id).then(newPlate => {
                commit('setProps', { data: preparePlate(newPlate), plate: getters['find'](id) });
            });
        },
        removePlate({commit}, {plate}){
            CustomPlate.delete(plate);
            commit('removePlate', plate);
        }
    },

    getters: {
        find: (state) => (id) => {
            return state.plates.find(p => p.id == id);
        }
    }
}