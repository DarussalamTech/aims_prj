//Author Yasir
//    alert('alert');


//$(document).ready(function(){
//     document.getElementById("#menu-item-309").style.display = "none";
//});


function select_student(){
     if($role != 'student'){
          document.getElementById("company").style.display = "none";
          document.getElementById("company_label").style.display = "none";
          }else{
              document.getElementById("company").style.display = "block";
              document.getElementById("company_label").style.display = "block";
          }

    
}