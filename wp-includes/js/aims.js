//Author Yasir


function select_student_company($role){
     if($role != 'student'){
          document.getElementById("company").style.display = "none";
          document.getElementById("company_label").style.display = "none";
          }else{
              document.getElementById("company").style.display = "block";
              document.getElementById("company_label").style.display = "block";
          }

    
}