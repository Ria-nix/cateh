var summ = 1, inputs;
$('#add_adress').click(function(){
    let adresses = document.querySelectorAll(".text_adress");
    for(var elem of adresses){
        if(elem.value == ''){ RedAuto(elem); }
    }
    elem.addEventListener('change', function(){
        if(elem.value == ''){ RedAuto(elem); }
        else{
            elem.classList.remove('red_auto');             
            elem.setAttribute('placeholder',''); 
        }
    })
    if(elem.value == ''){}
    else{summ >= 5 ? inputs = '' : addInput(); }    
});

function addInput(){ 
    inputs = '<div class="cell"><input type="text" class="text_adress add_info"><img src="icon/close.svg" alt="close"></div>';
    
    document.documentElement.scrollWidth <= 620 ? $('.mobile_fields_adress').append(inputs) : $('.fields_adress').append(inputs);      
    summ++;

    // remove the cell
    for(var elem of $('.cell').children('img')){ }
    elem.addEventListener('click', function(){ elem.parentElement.remove();  summ--});    
}

function RedAuto(elem){
    elem.classList.add('red_auto');
    elem.setAttribute('placeholder','Введите адрес'); 
}


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

    




