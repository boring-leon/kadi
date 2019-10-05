require('bootstrap/dist/js/bootstrap');
window.Popper = require('popper.js').default;
window.$ = window.jQuery = require('jquery');

window.initialBodyHeight = $(window).height();

Number.prototype.round = function(places = 2) {
    return +( Math.round(this + "e+" + places) + "e-" + places );
}