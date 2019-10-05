window.$ = window.jQuery = require('jquery');

require('./lib/jquery.tabSlideOut');

if($(window).width() > 800){
    $('#desktop-fb-tab').show().tabSlideOut({offset: '200px', 'tabLocation':'right'});
}