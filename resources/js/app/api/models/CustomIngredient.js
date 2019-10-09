import Model from '../lib/Model';

export default{
    create(ingredient){
        return Model.post({
            path: `ingredients/${baseState.user.id}`,
            clone:{
                data: ingredient
            },
            transform:{
                take: ['name', 'type', 'exchanger', 'kcal', 'portion_name', 'portion_weight', 'glycemic_index']
            }
        });
    },

    update(ingredient){
        return Model.patch({
            path: `ingredients/${ingredient.id}`,
            clone:{
                data: ingredient
            },
            transform:{
                take: ['name', 'type', 'exchanger', 'kcal', 'portion_name', 'portion_weight', 'glycemic_index']
            }
        });
    },

    delete(ingredient){
        return Model.delete({
            path: `ingredients/${ingredient.id}/${baseState.user.id}/${baseState.user.api_token}`
        });
    }
}