$(document).ready(function(){
    let bool = false, arr, text;
    arr = ['Ведение технической документации', 'Обновление работоспособности компьютерных систем после сбоев',
            'Ремонт (несложный) технического оборудования предприятия', 'Модернизация и усовершенствование компьютерных систем предприятия, конфигурация рабочих мест'];
    $('#list_competence').click(function(){
        
       if(bool){ 
            $('#list').addClass('none');
            bool = false;            
        }
       else{
            $('#list').removeClass('none');
            bool = true;    
            text='';
            filterFunction();
            for(let like of text){

            }
       } 
    })

    function filterFunction() {
        arr.forEach(function(item){
            console.log(item);
            text = '<li>'+ item +'</li>';
            $('#list').append(text);
        })
       
      };

       // remove the cell
    // (function isRemoveCell(){        
    //     console.log('work')
    //     for(var elem of $('.cell').children('img')){console.log(elem) }
    //     elem.addEventListener('click', function(){ 
    //         console.log('yup')
    //         elem.parentElement.remove();
    //     })
    // }());
   


        // let input, filter,  li,  i;
        // input = document.getElementById("list_competence");
        // filter = input.value.toUpperCase();
        // li = document.querySelectorAll("li");
        // for (i = 0; i < li.length; i++) {
        //   txtValue = li[i].textContent || li[i].innerText;
        //   if (txtValue.toUpperCase().indexOf(filter) > -1) {
        //     li[i].style.display = "";
        //     console.log('empty')
        //   } else {
        //     li[i].style.display = "none";
        //     console.log('none')
        //   }
        // }

});

