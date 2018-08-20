$(document).ready(function () {

    $('.registration-window').on('click', '.tab', function () {
        $('.registration-window').find('.active').removeClass('active');
        $(this).addClass('active');
        $('.tab-form').eq($(this).index()).addClass('active')
    })

});