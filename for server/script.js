
$('input').click(function(){
    function onFileSelected(event) {
    var selectedFile = event.target.files[0];
    var reader = new FileReader();

    var imgtag = document.getElementById("myimage");
    imgtag.title = selectedFile.name;

    reader.onload = function(event) {
        imgtag.src = event.target.result;
    };
    reader.readAsDataURL(selectedFile);
    }

    var file_data = $("#category_image").prop('files')[0];
    var can = document.createElement("canvas");
    img = document.getElementById("myimage");
    
    can.width  = img.width*2.5;
    can.height = img.height*2.5;
    var ctx = can.getContext("2d");
    ctx.drawImage(img, 0, 0, can.width,can.height);
    file_data = can.toDataURL('image/jpeg', 100);
    img.src = file_data//<-size = 30,2 KB (30.990 Bytes)
    console.log(file_data);
    
})


