//Author Yasir
//    alert('alert');


$(document).ready(function(){
//    alert
     //document.getElementById("menu-item-309").innerHTML = "whatever";
     var a =document.getElementById("menu-item-309");
     a.setAttribute("href", "somelink url");
});


function select_student(){
     if($role != 'student'){
          document.getElementById("company").style.display = "none";
          document.getElementById("company_label").style.display = "none";
          }else{
              document.getElementById("company").style.display = "block";
              document.getElementById("company_label").style.display = "block";
          }

    
}