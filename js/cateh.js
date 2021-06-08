let inputs = document.querySelectorAll('input');
for(let elem of inputs){
    elem.addEventListener('focus', function(){
        elem.style.borderColor = 'transparent';
        console.log('new');
    })    
    elem.addEventListener('blur', function(){
        elem.style.borderColor = '';
        console.log('new');
    })  
}

