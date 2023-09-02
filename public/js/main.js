$('.msg-close').click(function(){
    $('.msg').hide();
})


$(".page-up").click(function(){

   let desc = $(this).data("dec")

   $("#dec-target").html(desc)
})

$("#editBtn").click(function(){
    $("#quantEdit").val($(this).data('quant'))
    
    $("#inputProdId").val($(this).data('prodid'))
})

