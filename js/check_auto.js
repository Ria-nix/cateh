let log = $("input[type='text']");
let pass = $("input[type='text']");

$('a').click(function(){
    console.log('new');
})
if(log.val() == '' || pass.val() == ''){
    $('input').addClass('red_auto');
}
else{
    $('input').removeClass('red_auto');

    $('.button').click(function() {
        $.ajax({
            type: "POST",
            data: {
                email_OR_inn: login.val(), 
                password: pass.val()
            },
            url: "/login.php",
            success: (msg) => {
                console.log('msg');
            },
            error: (msg) => {
                alert("error");
            }
        })
    })
}
