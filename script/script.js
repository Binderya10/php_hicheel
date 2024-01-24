function deleteNews(title, id){
    if(confirm('Та ' + title + ' гэсэн мэдээг устгах уу?')){
        // устгах үйлдэл
        $.get("newsdelete.php?id=" + id, function () {
            alert("Амжилттай устлаа");
        }).fail(function () {
            alert("Алдаа гарлаа");
        });
        location.reload();
    }else{
        // Эсрэг нөхцөл
    }
}

function deleteCategory(catname, id){
    if(confirm('Та ' + catname + ' гэсэн ангилал устгах уу?')){
           // Устгах үйлдэл
        $.get("catdelete.php?id=" + id, function (){
           alert('Амжилттай устлаа');
        }).fail(function (){
            alert('Алдаа гарлаа');
        });
        location.reload();
    }
}