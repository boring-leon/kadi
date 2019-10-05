import Model from '../lib/Model';

export default{
    updateExchanger(exchanger){
        return Model.patch({
            path: `account/exchanger`,
            beforeRequest: (r) => r.exchanger = exchanger
        });
    },

    deleteAccount(){
        return Model.delete({
            path: `account/delete/${baseState.user.id}/${baseState.user.api_token}`
        });
    }

}