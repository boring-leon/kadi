import Model from '../lib/Model';

export default{
    create(plate){
        return Model.post({
            path: `meals/${baseState.user.id}`,
            clone:{
                data: plate,
            },
            transform: {
                rename: { meals: 'ingredients' },
                take: ['name', 'ingredients']
            }
        });
    },

    update(plate, id){
        return Model.patch({
            path: `meals/${id}`,
            clone:{
                data: plate
            },
            transform: {
                rename: { meals: 'ingredients' },
                take: ['name', 'ingredients']
            },
        });
    },

    delete(plate){
        return Model.delete({
            path: `meals/${plate.id}/${baseState.user.id}/${baseState.user.api_token}`
        });
    }
}