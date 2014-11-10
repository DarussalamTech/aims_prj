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
   global $wpdb;

   //$current_user = wp_get_current_user();
   //var_dump($current_user);exit();
     if (is_user_logged_in ()) {
        $current_user = wp_get_current_user();
        $user_update = wp_update_user( array( 'ID' =>$current_user->ID, 'role' => 'student' ) );
        /*if($user_update){

            echo 'updated';


        }*/
?>

        <div  class="quest_name" style="text-align: center">
            <? echo 'Welcome, ' . $current_user->user_login; ?>
        </div>

<? } else {
?>
        <div  class="quest_name" style="text-align: center">
            Register
        </div>
<?
         if (!empty($_POST)) {

              
            if(email_exists($_POST["user_email"])) {
                ?>
                <div  class="quest_name" style="text-align: center">
                    That Email id is already Registered! Please<a href=<? home_url()."join-us"?> > try again. </a>
                </div>
                <? }
             elseif(username_exists($_POST["user_login"])){?>
                <div  class="quest_name" style="text-align: center">
                    That username already exists! Please <a href=<? home_url()."join-us" ?> >try again.</a>
                </div>
               <?}else{
                    $table = "wp_users";
                    $data = array(
                        'user_login' => $_POST["user_login"],
                        'user_pass' => md5($_POST["user_pass"]),
                        'display_name' => $_POST["display_name"],
                        'user_email' => $_POST["user_email"],
                        'user_url' => $_POST["user_url"],
                        'user_registered' => date('m/d/Y h:i:s a', time()),
                        'company_id' => $_POST["company"],
                        'role' => "student",
                            // 'user_activation_key' => $_POST["username"],
                            //'user_status' => $_POST["username"],
                            //'display_name' => $_POST["username"],
                    );
                    $format = array(
                        '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s'
                    );

                    $success = $wpdb->insert($table, $data, $format);
                    if ($success) {
//                         $current_user = wp_get_current_user();
//                        $user_update = wp_update_user( array( 'ID' =>$current_user->ID, 'role' => 'student' ) );
//                        if($user_update){
//                              echo 'updated';
//                            }
//                            var_dump($user_update);die();

                        ?>
                <div  class="quest_name" style="text-align: center">
                    Registered successfully Please<a title="Login" href="<?php echo WP_SITEURL.'/wp-login.php';?>">Login</a>

            </div>
<?
            }
        }} else {
            global $client_admins;
            $client_admins = get_users($args = array('role' => 'Clientadmin'));
            $list_client_admins = array();
           ?>
            <div class="signup_student" style="text-align: center; padding-top: 20px;">
                <form method="post">
                    <div><input type="text" name="user_login" placeholder="username" required="true"></div>
                    <div><input type="password" name="user_pass" placeholder="password" required="true"></div>
                    <div><input type="text" name="display_name" placeholder="display_name"></div>
                    <div><input type="text" name="user_email" placeholder="user_email"></div>
                 
                    <div class="company" style="color: black;"><label>Company</label>
                        <select name="company">

                            <?php foreach ($client_admins as $client_admin ){
                                     $list_client_admins['user_name'] = $client_admin->data->user_nicename;
                                     $list_client_admins['ID'] = $client_admin->data->ID;
                                     echo "<option value=$list_client_admins[ID]>$list_client_admins[user_name]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div><input class="button-secondary" type="submit"  value="sign-up"></div>
                </form>
            </div>
<?php
        }
    }
}
?>