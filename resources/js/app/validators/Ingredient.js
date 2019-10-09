const validate = (data) => 
    data.name.trim().length > 0 &&
    data.kcal > 0 &&
    data.exchanger >= 0 &&
    data.portion_weight >= 0 &&
    (
        data.glycemic_index == null ||
        ( data.glycemic_index >= 0 && data.glycemic_index <= 100 )
    )

export { validate };
