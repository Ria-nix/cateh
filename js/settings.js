$('#download_img').on('click', function(){

})
$('#delete_img').on('click', function(){
    
})



// ************ Image ************
$('#download_file').on('change',function(ev){    
    var f = ev.target.files[0];
    var fr = new FileReader();   
    
    fr.onload = function(ev2) {
        console.log(ev2);
        $('.logo').attr('src', ev2.target.result);
    };
    fr.readAsDataURL(f);
})

    