function reloadDataFromHtml(html_post, html_get, path){
    $(document).ready(function(){
        var value = html_post.val();
        $.get(path+value,function(data){
            html_get.html(data);
        });
    });
}

function reloadDataFromValue(value, html_get, path){
    $(document).ready(function(){
        $.get(path+value,function(data){
            html_get.html(data);
        });
    });
}

function checkImageFile(html_get, path){
    //kiem tra trinh duyet co ho tro File API
    if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        var ftype = $('#file-upload')[0].files[0].type;
        var ftype_length = ftype.length;
        var extension = ftype.slice(ftype_length-3);
        reloadDataFromValue(extension, html_get, path);
    }
    else{
        alert("Please upgrade your browser, because your current browser lacks some new features we need!");
    }
}

function checkSoundFile(html_get, path){
    //kiem tra trinh duyet co ho tro File API
    if (window.File && window.FileReader && window.FileList && window.Blob)
    {
        var ftype = $('#file-sound-upload')[0].files[0].type;
        var ftype_length = ftype.length;
        var extension = ftype.slice(ftype_length-3);
        reloadDataFromValue(extension, html_get, path);
    }
    else{
        alert("Please upgrade your browser, because your current browser lacks some new features we need!");
    }
}

function checkTopicImageUpload(){
    checkImageFile( $('.format-warning'), 'ajax/check-topic-image-upload/');
}

function checkVocaImageUpload(){
    checkImageFile( $('.format-warning'), 'ajax/check-topic-image-upload/');
}

function checkVocaSoundUpload(){
    checkSoundFile( $('.format-sound-warning'), 'ajax/check-voca-sound-upload/');
}

function checkFileTye(){
    switch(ftype){
        case 'image/png':
        case 'image/gif':
        case 'image/jpeg':
        case 'image/pjpeg':
            alert("Acceptable image file!");
            break;
        default:
            alert('Unsupported File!');
    }
}

// function checkImage(){
//     //kiem tra trinh duyet co ho tro File API
//     if (window.File && window.FileReader && window.FileList && window.Blob)
//     {
//        // lay dung luong va kieu file tu the input file
//         // var fsize = $('#i_file')[0].files[0].size;
//         // var fname = $('#i_file')[0].files[0].name;
//         var ftype = $('#topic-img')[0].files[0].type;
//         reloadDataFromValue(ftype, $('.format-warning', 'ajax/check-format-image'));
 
//         // if(fsize>1048576)  //thuc hien dieu gi do neu dung luong file vuot qua 1MB
//         // {
//         //     alert("Type :"+ ftype +" | "+ fsize +" bites\n(File: "+fname+") Too big!");
//         // }else{
//         //     alert("Type :"+ ftype +" | "+ fsize +" bites\n(File :"+fname+") You are good to go!");
//         // }
//     }
//     else{
//         alert("Please upgrade your browser, because your current browser lacks some new features we need!");
//     }
// }