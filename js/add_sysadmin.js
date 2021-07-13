$(document).ready(function(){
    let bool = false;
    $('#list_competence').on('click', function(){
        console.log('re')
       if(!bool){ 
           $('#list').removeClass('none')
           bool == true;
        }
       else{
            $('#list').addClass('none');
            bool = false;
       } 

    })
//     function filterFunction(that) {
//         let container, input, filter, li, input_val;
//         container = $(that).closest(".searchable");
//         input_val = container.find("input").val().toUpperCase();
    
//         if (["ArrowDown", "ArrowUp", "Enter"].indexOf(event.key) != -1) {
//             keyControl(event, container)
//         } else {
//             li = container.find("ul li");
//             li.each(function (i, obj) {
//                 if ($(this).text().toUpperCase().indexOf(input_val) > -1) {
//                     $(this).show();
//                 } else {
//                     $(this).hide();
//                 }
//             });
    
//             container.find("ul li").removeClass("selected");
//             setTimeout(function () {
//                 container.find("ul li:visible").first().addClass("selected");
//             }, 100)
//         }
//     }
    
   
//     function onSelect(val) {
//         alert(val)
//     }
    
//     $(".searchable input").focus(function () {
//         $(this).closest(".searchable").find("ul").show();
//         $(this).closest(".searchable").find("ul li").show();
//     });
//     $(".searchable input").blur(function () {
//         let that = this;
//         setTimeout(function () {
//             $(that).closest(".searchable").find("ul").hide();
//         }, 300);
//     });
    
//     $(document).on('click', '.searchable ul li', function () {
//         $(this).closest(".searchable").find("input").val($(this).text()).blur();
//         onSelect($(this).text())
//     });
    
//     $(".searchable ul li").hover(function () {
//         $(this).closest(".searchable").find("ul li.selected").removeClass("selected");
//         $(this).addClass("selected");
//     });



});

