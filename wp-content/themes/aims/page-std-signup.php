<?php get_header(); ?>
<div class="theme_page relative">
	<div class="page_layout clearfix">
		<div class="page_header clearfix">
			<div class="page_header_left">
				<h1>Register</h1>
		        </div>
		</div>
		<ul class="bread_crumb clearfix">
			<li>You are here:</li>
			<li><a title="Home" href="http://localhost/aims">Home</a>
			</li>
			<li class="separator icon_small_arrow right_white">
				&nbsp;
			</li>
			<li>Register</li>
		</ul>
		<div class="page_left page_margin_top">
		</div>
	</div>
	<div>
             
          <?php
              
            if (!empty($_POST)) {
                $table = "student_signup";
                $data = array(
                    'name' => $_POST["fullname"],
                    'email' => $_POST["email"],
                    'username' => $_POST["username"],
                    'password' => $_POST["password"],
                    'course_name' => $_POST["course"],
                    );

                $format = array(
                     '%s',
                     '%s',
                     '%s',
                     '%s',
                     '%s',
                );

                $success=$wpdb->insert( $table, $data, $format );
                if($success){
                  echo 'Registered Successfully' ;
                }  else {
                    echo'Error While REgistering' ;
                }
            }else{
            ?>
            <div style="color: black;">

                <form  method="post">
                    <fieldset>
                          <table cellpadding="3" align="center">
                              <tr><td><legend><strong>Register</strong></legend></tr></td>
                              <tr><td width="150px"><strong>Your Full Name*:</strong></td><td><input type="text" name="fullname"></td></tr>
                              <tr><td><strong>Email Address*:</strong></td><td><input type="text" name="email"></td></tr>
                              <tr><td><strong>UserName</strong></td><td><input type="text" name="username"></td></tr>
                              <tr><td><strong>Password*:</strong></td><td><input type="text" name="password"></td></tr>
                              <tr><td><strong>Course*:</strong></td><td><input type="text" name="course"></td></tr>

                              <tr><td><input type='submit' name='Submit' value='Submit' /></tr></td>

                          </table>
                      </fieldset>
 
                </form>

            <?php }  ?>

	</div>
</div>
<?php get_footer(); ?>