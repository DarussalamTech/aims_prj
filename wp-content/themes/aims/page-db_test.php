<?php

?>

<?php


if ( is_user_logged_in() ) {
	echo 'Welcome, registered user!';
} else {
	echo 'Welcome, visitor!';
}

exit();
     if (!empty($_POST)) {
            global $wpdb;
            $table = "db_test";
            $data = array(
                'name' => $_POST["yourname"],
                'age'    => $_POST["comments"]
                );
            $format = array(
                '%s',
                '%s'
            );

            $success=$wpdb->insert( $table, $data, $format );
            if($success){
              echo 'data has been save' ;
            }
        }else{
?>
            <form method="post">
            <input type="text" name="yourname">
            <input type="text" name="comments">
            <input type="submit">
            </form>

       <?php }  ?>

<?php
get_footer(); 
?>