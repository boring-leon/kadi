import PlateExchangerCalculator from '../../app/services/PlateExchangerCalculator';

const getInputValue = (inputName, defaultValue) => {
    const val = document.querySelector(`input[name=${inputName}]`).value;
    const isValueOk = val || Number.isNaN(val) == false;
    return (isValueOk && val > 0) ? Number(val) : defaultValue;
}

const setExchangeInputValue = () => {
    const calculator = new PlateExchangerCalculator({
        portion: getInputValue('portion_weight', 100),
        exchanger: getInputValue('custom_exchanger')
    });
    document.querySelector('input[name=exchanger]').value = calculator.getPortionExchanger();
}
document.querySelector('input[name=custom_exchanger]').addEventListener('keyup', setExchangeInputValue);
document.querySelector('input[name=portion_weight]').addEventListener('keyup', setExchangeInputValue);