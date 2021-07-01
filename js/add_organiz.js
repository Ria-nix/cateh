var summ = 1, inputs;
$('#add_adress').click(function(){
    let adresses = document.querySelectorAll(".text_adress");
    for(var elem of adresses){
        if(elem.value == ''){ 
            elem.classList.add('red_auto');
            elem.setAttribute('placeholder','Введите адрес');    
            console.log('add adress')          
        }
    }
    elem.addEventListener('change', function(){
        if(elem.value == ''){ 
            elem.classList.add('red_auto');
            elem.setAttribute('placeholder','Введите адрес');    
            console.log('add adress')          
        }
        else{
            elem.classList.remove('red_auto');             
            elem.setAttribute('placeholder',''); 
        }
    })

    if(elem.value == ''){}
    else{summ >= 5 ? inputs = '' : addInput(); }
    
});

function addInput(){ 
    inputs = '<div class="cell"><input type="text" class="text_adress"><img src="icon/close.svg" alt="close"></div>';
    $('.fields_adress').append(inputs); 
    summ++;

    // remove the cell
    for(var elem of $('.cell').children('img')){ }
    elem.addEventListener('click', function(){ elem.parentElement.remove();  summ--});
    
}

$('#input_file').on('change',function(ev){    
    var f = ev.target.files[0];
    var fr = new FileReader();
    
    
    fr.onload = function(ev2) {
        console.log(ev2);
        $('.logo').attr('src', ev2.target.result);
    };
    // console.log(f + " " + fr);
    // fr.readAsDataURL(f);

    console.log($('#input_file').val());
    // $('.logo').attr('src') = $('#input_file').val();
    
})

    


















