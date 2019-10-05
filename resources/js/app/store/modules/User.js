import AccountModel from '../../api/models/Account';

export default {
    namespaced: true,
    
    state: {
      exchanger: baseState.user.exchanger
    },
    mutations: {
      setExchanger: (state, v) => state.exchanger = v
    },

    actions:{
      setExchanger({commit}, {exchanger}){
        commit('setExchanger', exchanger);
        AccountModel.updateExchanger(exchanger);
      }
    }

}