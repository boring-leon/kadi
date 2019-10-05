import ActivityTimeCalculator from '../../app/services/ActivityTimeCalculator';

test('calculating minutes with a whole result', () => {
    const calculator = new ActivityTimeCalculator({mealKcal: 600, activityMinuteKcal: 60});
    expect(calculator.getActivityMinutes()).toEqual(10);
});

test('calculating minutes and rounding result to an int', () => {
    const calculator = new ActivityTimeCalculator({mealKcal: 600, activityMinuteKcal: 1.52});
    expect(calculator.getActivityMinutes()).toEqual(395);
});

test('calculating hours with a whole result', () => {
    const calculator = new ActivityTimeCalculator({mealKcal: 1200, activityMinuteKcal: 1 });
    expect(calculator.getActivityHours()).toEqual(20);
});

test('calculating hours and truncing result', () => {
    const calculator = new ActivityTimeCalculator({mealKcal: 1200, activityMinuteKcal: 0.7 });
    expect(calculator.getActivityHours()).toEqual(28);
});

test('getting minutes back', () => {
    const calculator = new ActivityTimeCalculator({mealKcal: 1, activityMinuteKcal: 1});
    calculator.hours = 2;
    calculator.minutes = 125;
    expect(calculator.getMinutesLeft()).toEqual(5);
});

test('getting time a time string with minutes left', () => {
    const calculator = new ActivityTimeCalculator({mealKcal: 1, activityMinuteKcal: 1});
    calculator.hours = 2;
    calculator.minutes = 125;
    expect(calculator.timeString).toEqual("2h 5min");
});