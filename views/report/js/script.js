


$(function(){

    if($.cookie('target')){
        var cookieVal = $.cookie('target');
        var ankorTarget = $('#' + cookieVal).offset();
        $("html, body").animate({scrollTop: ankorTarget.top}, 0);
    }
    
    //var windowHeight = window.screen.height;
    $('.table').on('click', '.click', function(){
        var _id = $(this).prop('id');
        //var ankorTarget = $(this).offset();
        $.cookie('target', _id, { path: '/' });
        
    });    
});
