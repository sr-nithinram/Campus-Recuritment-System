
function showCulturals(){  
    $.ajax({
        url:"./adminView/viewcultural.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}


function showCompany(){
    $.ajax({
        url:"./adminView/viewcompany.php",
        method:"post",
        data:{record:1},
        success:function(data){
            $('.allContent-section').html(data);
        }
    });
}

