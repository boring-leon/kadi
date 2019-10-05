import RequestCloner from '../../app/api/lib/support/request/RequestCloner';

const person = { name: "Jack", age: 23, department: "sales", uuid: "klok321zd21321" };
const getCloner = (transform) =>  {
    const config = Object.assign({data:person }, transform);
    return new RequestCloner(config);
};

test('transformed request key names with rename option', () => {
    const cloner = getCloner({rename: { 
        name: "person_name", age: "person_age"  
    }});

    expect(cloner.getRequest()).toMatchObject({
        person_name: "Jack", person_age: 23, department: "sales", uuid: "klok321zd21321"
    });
});

test('skipped request values with skip option', () => {
    const cloner = getCloner({skip: ['uuid'] });
    expect(cloner.getRequest()).not.toHaveProperty('uuid');
});

test('keeping only certain request values with take option ', () => {
    const cloner = getCloner({ take: ['age'] });
    expect(cloner.getRequest()).toMatchObject({age: 23});
});

test('transformated request in a correct order', () => {
    const cloner = getCloner({
        rename: { name: "person_name"},
        take: ['person_name']
    });

    expect(cloner.getRequest()).toMatchObject({person_name: "Jack"});
});