<?php get_header(); ?>
<div class="theme_page relative">
	<div class="page_layout clearfix">
		<div class="page_header clearfix">
			<div class="page_header_left">
				<h1>Add Course</h1>
		        </div>
		</div>
		<ul class="bread_crumb clearfix">
			<li>You are here:</li>
			<li><a title="Home" href="http://localhost/aims">Home</a>
			</li>
			<li class="separator icon_small_arrow right_white">
				&nbsp;
			</li>
			<li>Add Course</li>
		</ul>
		<div class="page_left page_margin_top">
		</div>
	</div>
	<div>
             
           <?php
            if (!empty($_POST)) {
                
                global $wpdb;
                $table = "aims_courses";
                $data = array(
                    'course_name' => $_POST["course_name"],
                    );
                $format = array(
                    '%s',
                );

                $success=$wpdb->insert( $table, $data, $format );
                if($success){
                  echo 'Course has been save' ;
                }  else {
                    echo'Error While adding course' ; 
                }
            }else{
            ?>
            <div style="color: black;">
                <form method="post">
                 Course Name:
                <input type="text" name="course_name">
                <input type="submit" value="Add">
                </form>

            <?php }  ?>

	</div>
</div>
<?php get_footer(); ?>