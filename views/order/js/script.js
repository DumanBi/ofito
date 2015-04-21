$(function(){
    
    $('.order').on('click', '.order_checked', function(){
        var n = $(this).parent('td').find( "input:checked" ).length;
        var price = $(this).parent('td').siblings('.price').html();
        var quantity = encodeURIComponent($(this).parents('tr').find('.quantity').val());
        
        if(n === 1){
            $(this).parent('td').siblings('td').find('.ordersum').html(price*quantity);
            getSum();

            $(this).parents('tr').find('.quantity').keyup(function(){
                var price2 = $(this).parent('td').siblings('.price').html();
                var quantity = encodeURIComponent($(this).val());
                $(this).parent('td').siblings('td').find('.ordersum').html(price2*quantity);
                getSum();
            });
            
        }else{
            $(this).parent('td').siblings('td').find('.ordersum').html('');
            getSum();
        }
    });
});

function getSum(){
    var total = 0;
    $('.order tr').each(function(){
        if($.isNumeric(parseInt($(this).find('.ordersum').text()))){
            total += parseInt($(this).find('.ordersum').text());
        }
    });
    return $('.total').html(total);
}