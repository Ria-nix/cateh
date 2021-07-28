$(document).ready(function(){

    // ************ ADD ORGANISATIONS AND SORTING ************
    // ************ Add organisation ************
    let arr = {
        "update":"06.06.2021 00:00:000",
        "employees":{
                "sysadmin":[
                        {
                            "id":"1",
                            "name":"новиков алексей",
                            "phone":"номер телефона",
                            "role":"0",
                            "isActive":"1",
                            "category":"массив доспутных категорий",
                            "accepted":"580",
                            "completed":"200",
                            "organisation":[
                                        {
                                            "id":"1",
                                            "name":"наименование организации",
                                            "accepted":"количество принятых заказов за месяц этим пользователем у этой организации",
                                            "completed":"количество выполненых заказов за месяц этим пользователем у этой организации"
                                        }
                                    ]
                        },
                        {
                            "id":"2",
                            "name":"системник андрей",
                            "phone":"номер телефона",
                            "role":"0",
                            "isActive":"0",
                            "category":"массив доспутных категорий",
                            "accepted":"530",
                            "completed":"100",
                            "organisation":[
                                        {
                                            "id":"2",
                                            "name":"наименование организации",
                                            "accepted":"количество принятых заказов за месяц этим пользователем у этой организации",
                                            "completed":"количество выполненых заказов за месяц этим пользователем у этой организации"
                                        }
                                    ]
                        },
                    ],
                
                "admin":[
                        {
                            "id":"1",
                            "name":"Михаил Куприн",
                            "phone":"номер телефона",
                            "role":"1",
                            "isActive":"0",
                            "category":"массив доспутных категорий",
                            "accepted":"520",
                            "completed":"300",
                            "organisation":[
                                        {
                                            "id":"1",
                                            "name":"наименование организации",
                                            "accepted":"количество принятых заказов за месяц этим пользователем у этой организации",
                                            "completed":"количество выполненых заказов за месяц этим пользователем у этой организации"
                                        }
                                    ]
                        },
                    ]
        
            }
        };
    
    function isEmployees(){
        let element, element1, obj = [], text, key, elem;
        for(element of arr['employees']['sysadmin']) obj.push(element);
        for(element1 of arr['employees']['admin']) obj.push(element1);
        for(elem of obj){
            for(key in elem){ }
            elem['role'] == '0' ? elem['role'] = 'Системный администратор' : elem['role'] = 'Администратор'; 
            text = '<div class="item_table"><div class="item_info border"><p class="main_fio">'+elem['name']+'</p><div class="mobile_version"><div class="mobile_title"><p>Выполнено за месяц</p><p>Текущих заказов </p></div><div class="mobile_info"><p class="complete_order">'+elem['completed']+'</p><p class="current_order">'+elem['accepted']+'</p></p></div></div><p class="mobile_none complete_order">'+elem['completed']+'</p><p class="mobile_none current_order">'+elem['accepted']+'</p></div><button class="click button border font_16">Просмотреть</button></div>'
            $("#table").append(text);
            elem['isActive'] == '1' ? $('.item_info').css('background', '#DBDBDB') : $('.item_info').css('background', '#F1F1F1');
        }    
    }
    isEmployees();
    
   // ************ Sorting of organisations ************
    let main_arrow = document.querySelector('.ask_des_arrow'), bool = false;
    main_arrow.addEventListener('click', function(){
        console.log('\nclick')
        let divs = document.querySelectorAll('.item_info');
    
        function ascendingSorting(){
            let asc = $(divs).sort(function (a, b) {
               return console.log($(a).find('.main_fio').text() - $(b).find('.main_fio').text());
            });
            main_arrow.classList.add('rotate');
            $("#table").html('.item_table').append(asc); bool = true; console.log('asc');
        }    
        function descendingSorting(){
            let des = $(divs).sort(function (a, b) {
                return console.log($(b).find('.main_fio').text() - $(a).find('.main_fio').text());
            });
            main_arrow.classList.remove('rotate');
            $("#table").html('.item_table').append(des);  bool = false; console.log('des');
        }
        !bool ? ascendingSorting() : descendingSorting();
    })
})





