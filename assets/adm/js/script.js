$(function(){
    var content = $('meta[name=controller]').prop('content');
    var method = $('meta[name=method]').prop('content');
    $('.' + content + ', .' + content + '_' + method).addClass('active');

    $('[data-toggle="tooltip"]').tooltip();
    $( 'input.date' ).datepicker();
})