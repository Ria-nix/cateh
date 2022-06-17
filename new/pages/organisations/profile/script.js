$(document).ready(function(){

    for(let elem of $('.item_tabs')){       
        elem.addEventListener("click", function(){
            if(elem.textContent == 'Заказы'){
                $('#orders').addClass("active_btn");
                $('#addresses').removeClass("active_btn");
                $('#clients').removeClass("active_btn");
            }
            else if(elem.textContent == 'Адреса'){
                $('#addresses').addClass("active_btn");
                $('#clients').removeClass("active_btn");
                $('#orders').removeClass("active_btn");
            }
            else if(elem.textContent == 'Клиенты'){
                $('#clients').addClass("active_btn");
                $('#addresses').removeClass("active_btn");
                $('#orders').removeClass("active_btn");
            }

        });
    }
    
    $('#orders').click(function(){
        $('.orders_item').removeClass('none_label');
        $('.addresses_item').addClass('none_label');
        $('.clients_item').addClass('none_label');
    })
    
    $('#addresses').click(function(){
        $('.orders_item').addClass('none_label');
        $('.addresses_item').removeClass('none_label');
        $('.clients_item').addClass('none_label');
    })
    
    $('#clients').click(function(){
        $('.orders_item').addClass('none_label');
        $('.addresses_item').addClass('none_label');
        $('.clients_item').removeClass('none_label');
    })


})


function goToUserProfile(profile_id) {
    window.open(window.location.href + "/profile?id=" + profile_id, '_self').focus();
}

function goToEditOrgan(profile_id) {
    window.open("https://" + window.location.hostname + "/organisations/profile/edit?id=" + profile_id, '_self').focus();
}

function deleteOrgan(profile_id) {
    alert("пока не работает ^_^")
}

function goToOrder(profile_id) {
    window.open("https://" + window.location.hostname + "/organisations/profile?id=" + profile_id, '_self').focus();
    return true;
}

