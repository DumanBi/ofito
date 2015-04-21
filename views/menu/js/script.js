$(function(){
    $('.delete').click(function(e){
        e.preventDefault;
        
        var c = confirm("Вы уверены что хотите удалить?");
        if(c == false) return false;
    });
});