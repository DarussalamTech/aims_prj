<?php
/**
 * @package sign up
 */
/*
  Plugin Name: course-management
  Plugin URI: http://customtags.com/
  Description: Easy course-management plugin.
  Version: 1.0.0
  Author: Yasir
  Author URI: http://demosites.darussalampk.com/aims/
  License: GPLv2 or later
  Text Domain: Twitter
 */

add_shortcode('course-management', 'course_mangement');

function course_mangement() {
    $this->add_action( 'admin_menu' );

    if (!is_user_logged_in ()) {
      
?>

        <div  class="quest_name" style="text-align: center">
    <? echo 'You Must be Login To Manage Courses. '?><a title="Login" href="<?php echo WP_SITEURL . '/wp-login.php'; ?>">Login</a>
    </div>

<? } else {
            global $wpdb;
            $current_user = wp_get_current_user();
?>
        <div  class="quest_name" style="text-align: center">
            Manage Course <br>
        </div>
      <? echo 'Welcome, ' . $current_user->user_login; ?>
<?
        if($current_user->roles[0] == 'administrator'){ //TODO Check Which User Can Access It.
        if (!empty($_POST)) {

            $course_exist = $wpdb->get_row( $wpdb->prepare("SELECT course_name FROM aims_courses WHERE course_name = %s", $_POST["course_name"] ));

            if ($course_exist) {
?>
                <div  class="quest_name" style="text-align: center">
                    This Course Name Already Exists Please <a href=<? home_url() . "course-management" ?> > try again. </a>
                </div>
<? } elseif (username_exists($_POST["user_login"])) {
 ?>
                <div  class="quest_name" style="text-align: center">
                    That username already exists! Please <a href=<? home_url() . "join-us" ?> >try again.</a>
                </div>
<?
            } else {
                 /*                 * ************************************************************* */
                //Add record to the students Table
                /*                 * ************************************************************* */

                $table = "aims_courses";

                $course_data = array(
                    'course_name' => $_POST["course_name"],
                    'aims_trainer_id' => $_POST["trainer"],
                    'company_id' => $_POST["company"],
                   
                );

                 $course_added = $wpdb->insert($table, $course_data);
               
                if ($course_data) {
   ?>
                 <div  class="quest_name" style="text-align: center">
                   Course Added Successfully <a href=<? home_url() ?> >Add Another Course.</a>
 
                 </div>
    <?
                }
            }
        } else {
            global $client_admins;
            global $trainers;

            $client_admins = get_users($args = array('role' => 'Clientadmin'));
            $list_client_admins = array();

            $trainers = get_users($args = array('role' => 'Trainer'));
            $list_trainers = array();

?>
            <div class="signup_student" style="text-align: center; padding-top: 20px;">
                <form method="post">
                    <div><input type="text" name="course_name" placeholder="CourseName" required="true"></div>

                    <div class="company" style="color: black;"><label>Company</label>
                        <select name="company">
<?php //Drop down for all Client Admins(company)
                    foreach ($client_admins as $client_admin) {
                        $list_client_admins['user_name'] = $client_admin->data->user_nicename;
                        $list_client_admins['ID'] = $client_admin->data->ID;
                        echo "<option value=$list_client_admins[ID]>$list_client_admins[user_name]</option>";
                    }
?>                      </select>
                    </div>

                    <div class="company" style="color: black;"><label>Trainer</label>
                        <select name="trainer">
<?php //Drop down for all Trainers
                    foreach ($trainers as $trainer) {
                        $list_trainers['user_name'] = $trainer->data->user_nicename;
                        $list_trainers['ID'] = $trainer->data->ID;
                        echo "<option value=$list_trainers[ID]>$list_trainers[user_name]</option>";
                    }
?>                      </select>
                    </div>

        <div><input class="button-secondary" type="submit"  value="add-Course"></div>
    </form>
</div>
<?php
        }
    }else{
        ?>
             <div  class="quest_name" style="text-align: center">
                   You have not sufficient permission to add course <a href=<? home_url() ?> >Home</a>

                 </div>
        <?
    }}
}
?>