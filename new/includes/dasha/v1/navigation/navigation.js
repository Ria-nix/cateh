tryAuthWithToken();
function tryAuthWithToken() {
    if (getCookie("DBname") === undefined || getCookie("token") === undefined) {
        deleteCookie("DBname");
        deleteCookie("token");
        deleteCookie("token");
        console.log("cookie has been deleted");
        window.location.href = '/';
    }
    $.ajax({
        type: "POST",
        data: {
            DBname: getCookie("DBname"),
            token: getCookie("token"),
        },
        url: "https://covidlist.online/api/authentication/check/login-or-token",
        success: (msg) => {
            let json = JSON.parse(msg);

            // проверка на правильно введенные данные
            if (json['action'] === 'success') {
            } else if (json['action'] === 'error-Token-Not-Found') {
                console.log("error-Token-Not-Found");
                deleteCookie("DBname");
                deleteCookie("token");
                deleteCookie("token");
                console.log("cookie has been deleted");
                window.location.href = '/';
            }
        },
    })
}

function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

function deleteCookie(name) {
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

$(".exit").on("click", function () {
    deleteCookie("DBname");
    deleteCookie("token");
    window.location.href = '/';
})

//*******************************************************************/

$(document).ready(function(){
    (function transitionMenu(){
        for(let elem of $('.admin')){
            elem.addEventListener('click',function(){
            window.location.href = '/sysadmins';});
        }
        
        for(let elem of $('.admin_plus')){
            elem.addEventListener('click',function(){
            window.location.href = '/sysadmins/profile/add'; });
        }
        
        for(let elem of $('.organization')){
            elem.addEventListener('click',function(){
            window.location.href = '/organisations'; });
        }
        
        for(let elem of $('.organization_plus')){
            elem.addEventListener('click',function(){
            window.location.href = '/organisations/profile/add'; });
        }
        
        for(let elem of $('.exit')){
            elem.addEventListener('click',function(){
            window.location.href = '/login'; });
        }

        $('#main_logo_navigation').on('click',function(){
            window.location.href = 'sysadmins';
        })
    }());

    
    
    (function toggleButton(){
        let button = false;
        $('.toggle_but').click(function(){
            if(!button){
                $('.toggle_menu_fon').removeClass('none').addClass('grid');
                $('.toggle_but').addClass('close');
                $('body').addClass('scroll_none');
                $('#arrow').addClass('opacity_none');
                $('.head_table').addClass('opacity_none');
                button = true;
            }
            else{
                $('.toggle_menu_fon').removeClass('grid').addClass('none');
                $('.toggle_but').removeClass('close');
                $('body').removeClass('scroll_none');
                $('#arrow').removeClass('opacity_none');
                $('.head_table').removeClass('opacity_none');
                button = false;
            }    
        });
    }());
    
    //*--------- ADD AND EDIT IMGAE ADMIN ---------*//
    let uploaded_img_admin = '';    
    $('.choose_file').on('change',function(){
        const reader = new FileReader();         
        reader.addEventListener('load', ()=>{
            uploaded_img_admin = reader.result;
            console.log(uploaded_img_admin);
            $('.wrap_admin').attr('src', uploaded_img_admin);
        });
        reader.readAsDataURL(this.files[0]);
    });

    $("#delete_admin").click(function(){   
        $('.wrap_admin').attr('src', 'site/includes/dasha/icons/anonym_user.svg');
    });    

    //*--------- ADD AND EDIT IMGAE organisation ---------*//
    let uploaded_img_organis = '';    
    $('.choose_file').on('change',function(){
        const reader = new FileReader();         
        reader.addEventListener('load', ()=>{
            uploaded_img_organis = reader.result;
            console.log(uploaded_img_organis);
            $('.wrap_organ').attr('src', uploaded_img_organis);
        });
        reader.readAsDataURL(this.files[0]);
    });

    $("#delete_organ").click(function(){    
        $('.wrap_organ').attr('src', 'site/includes/dasha/icons/anonym_organization.svg');
    }); 
})
