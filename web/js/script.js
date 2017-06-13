(function ($) {
    $(function () {

        $('.button-collapse').sideNav();

    }); // end of document ready
})(jQuery); // end of jQuery name space

$(document).ready(function () {
    $('.js-datepicker').datepicker({
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        yearRange: '1900:2017',
        minDate: new Date(1900, 1 - 1, 1)
    });
});

/*$(function(){

 $('.list-group a').click(function(e) {
 e.preventDefault()

 $that = $(this);

 $('.list-group').find('a').removeClass('active');
 $that.addClass('active');
 });
 })*/
