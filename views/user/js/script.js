$(function(){
    $('.delete').click(function(e){
        e.preventDefault;
        
        var c = confirm("Are you sure you want to delete?");
        if(c == false) return false;
    });
});