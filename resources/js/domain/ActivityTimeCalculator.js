export default class ActivityTimeCalculator
{
    constructor({ mealKcal, activityMinuteKcal }){
        this.activityKcal = activityMinuteKcal;
        this.plateKcal = mealKcal;
        this.setInitialCalculations();
    }

    setInitialCalculations(){
        this.minutes = this.getActivityMinutes();
        this.hours = this.getActivityHours();
    }
    
    get timeString() {     
        return this.minutes > 60 ?  `${this.hours}h ${this.getMinutesLeft()}min` : this.minutes + "min";
    }

    getActivityMinutes(){
        return Math.round(this.plateKcal / this.activityKcal);
    }

    getActivityHours(){
        return Math.trunc(this.minutes / 60);
    }

    getMinutesLeft(){
        return this.minutes - (this. hours * 60);
    }
}