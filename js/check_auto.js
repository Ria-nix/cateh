let log = $("input[type='text']");
let pass = $("input[type='text']");
if(log.val() == '' || pass.val() == ''){
    $('input').css('border-color','red');
}
else{
    $('.button').click(function () {
        $.ajax({
            type: "POST",
            data: {
                login: login.val(), 
                password: pass.val()
            },
            url: "http://localhost:90/login.php",
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
