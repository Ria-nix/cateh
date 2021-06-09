let log = $("input[type='text']");
let pass = $("input[type='text']");
if(log.val() == '' || pass.val() == ''){
    $('input').toggleClass('red_auto');
}
else{
    $('input').removeClass('red_auto');
    $('.button').click(function () {
        $.ajax({
            type: "POST",
            data: {
                login: login.val(), 
                password: pass.val()
            },
            url: "/login.php",
            success: (msg) => {
                //

                //
                },
            error: (msg) => {
                alert("error");
            }
        })
    })
}
