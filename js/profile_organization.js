// $(document).ready(function(){
//     if($('.orders').isChecked()){

//     }
// })

$('#orders').click(function(){
    $('.orders_item').removeClass('none');
    $('.addresses_item').addClass('none');
    $('.clients_item').addClass('none');
    console.log('orders')
})

$('#addresses').click(function(){
    $('.orders_item').addClass('none');
    $('.addresses_item').removeClass('none');
    $('.clients_item').addClass('none');
    console.log('addresses')
})

$('#clients').click(function(){
    $('.orders_item').addClass('none');
    $('.addresses_item').addClass('none');
    $('.clients_item').removeClass('none');
    console.log('clients')
})