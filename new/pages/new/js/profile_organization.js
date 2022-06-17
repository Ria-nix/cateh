$(document).ready(function(){

    $('#orders').click(function(){
        $('.orders_item').removeClass('none_label');
        $('.addresses_item').addClass('none_label');
        $('.clients_item').addClass('none_label');
        console.log('item1')
    })
    
    $('#addresses').click(function(){
        $('.orders_item').addClass('none_label');
        $('.addresses_item').removeClass('none_label');
        $('.clients_item').addClass('none_label');
        console.log('item2')
    })
    
    $('#clients').click(function(){
        $('.orders_item').addClass('none_label');
        $('.addresses_item').addClass('none_label');
        $('.clients_item').removeClass('none_label');
        console.log('item3')
    })


})

