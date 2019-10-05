import Vue from 'vue';

Vue.filter('round', function (value, decimals = 2) {
    return value.round(decimals);
});