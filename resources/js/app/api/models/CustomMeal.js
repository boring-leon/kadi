import Model from '../lib/Model';

export default{
    create(meal){
        return Model.post({
            path: `meals/${baseState.user.id}`,
            clone:{
                data: meal,
            },
            transform: {
                rename: { meals: 'ingredients' },
                take: ['name', 'ingredients']
            }
        });
    },

    update(meal, id){
        return Model.patch({
            path: `meals/${id}`,
            clone:{
                data: meal
            },
            transform: {
                rename: { meals: 'ingredients' },
                take: ['name', 'ingredients']
            },
        });
    },

    delete(meal){
        return Model.delete({
            path: `meals/${meal.id}/${baseState.user.id}/${baseState.user.api_token}`
        });
    }
}