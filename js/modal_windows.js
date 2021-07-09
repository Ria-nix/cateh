//Open the modal window
let bool, summ_check, obj, json, arr_inputs, obj_keys;
$('#add_button').click(function(){ 
    arr_inputs = document.querySelectorAll(".add_info");
    CheckInputs(arr_inputs);    
    bool ? $('.modal_window').removeClass('none') : bool == false;     
});

function CheckInputs(arr_inputs){   
    summ_check = 0; 
    arr_inputs.forEach(function(item){
        item.value == '' ? isRedAuto(item) : summ_check++;
        item.addEventListener('change', function(){
            item.value == '' ? isRedAuto(item) : isNoneRedAuto(item);
        });
    });  summ_check == arr_inputs.length ? bool = true : bool = false;
}
function isRedAuto(item_info){
    item_info.classList.add('red_auto');
    item_info.setAttribute('placeholder','Заполните поле'); 
}
function isNoneRedAuto(item_info){
    item_info.classList.remove('red_auto');
    item_info.setAttribute('placeholder','');  
}

// Close the modal window
$('.close_button').click(function(){ 
    $('.modal_window').addClass('none');
});

// The output of data on the server to Lera or Artemy (ActionPickle.php)
$('.add_button').click(function(){
    json = document.querySelectorAll(".add_info"); 
    obj = {};
    // obj_keys = ["name_organ", "inn", "addresses", "img"];
    obj_keys = ["name_organ", "inn", "addresses"];
    
    json.forEach(function(item, index){  
        for(var elem of obj_keys){
            obj[elem] = item;
            console.log(obj)
        }
        
    })
    console.log(obj); 
               
});


