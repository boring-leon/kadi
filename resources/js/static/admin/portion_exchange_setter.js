import ExchangerCalculator from '../../domain/plate/PortionExchangerCalculator';

const getInputValue = (inputName, defaultValue) => {
    const val = document.querySelector(`input[name=${inputName}]`).value;
    const isValueOk = val || Number.isNaN(val) == false;
    return (isValueOk && val > 0) ? Number(val) : defaultValue;
}

const setExchangeInputValue = () => {
    const calculator = new ExchangerCalculator({
        portionWeight: getInputValue('portion_weight', 100),
        customExchanger: getInputValue('custom_exchanger')
    });
    document.querySelector('input[name=exchanger]').value = calculator.portionExchanger;
}
document.querySelector('input[name=custom_exchanger]').addEventListener('keyup', setExchangeInputValue);
document.querySelector('input[name=portion_weight]').addEventListener('keyup', setExchangeInputValue);