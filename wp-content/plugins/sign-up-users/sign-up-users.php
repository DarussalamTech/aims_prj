<?php
/**
 * @package sign up
 */
/*
  Plugin Name: Sign Up User
  Plugin URI: http://customtags.com/
  Description: Easy Sign up users this plugin saves form data in wp_users database, just use short code i.e [signupform] in your page.
  Version: 1.0.0
  Author: Yasir
  Author URI: http://demosites.darussalampk.com/aims/
  License: GPLv2 or later
  Text Domain: Twitter
 */

add_shortcode('signupform', 'signupuser');

//function css_changes(){
//
//    wp_enqueue_script("jquery");
//    wp_register_script('sign-up-users_aims',  plugins_url('aims.js',__FILE__));
//    wp_enqueue_script('sign-up-users_aims',  plugins_url('aims.js',__FILE__));
//     //alert('select_student_company');
//
//}

function signupuser() {
    global $wpdb;
    global $post;
   // $redirect_to = site_url()."/join-us";
    //echo $redirect_to;
   //wp_safe_redirect($redirect_to);
   // header("Location: http://www.example.com/");
    //exit;
    $slug = get_post( $post )->post_name;
    //$page = $_SERVER['REQUEST_URI'];
    //$uri = home_url().$page;
    //var_dump($page);
    //echo $uri;
    //var_dump($slug); die;
  
    if (is_user_logged_in () && $slug == 'sign-in') {
        $current_user = wp_get_current_user();
?>

        <div  class="quest_name" style="text-align: center">
    <? echo 'Welcome, ' . $current_user->user_login; ?> </div>
 <div  class="quest_name" style="text-align: center"> Click Here To View Avalaible Courses <a title="Available Courses" href="<?php echo WP_SITEURL . '/student-available-courses'; ?>">Available Courses</a>

    </div>

<? }elseif($slug == 'sign-in'){
        wp_safe_redirect(WP_SITEURL.'/wp-login.php');
    ?>
           <div  class="quest_name" style="text-align: center">
                    Please Login <a title="Login" href="<?php echo WP_SITEURL . '/wp-login.php'; ?>">Login</a>
            </div>
    <?
  
}else {

?>
        <div  class="quest_name" style="text-align: center">
            Register
        </div>
<?
        if (!empty($_POST)) {

            if (email_exists($_POST["user_email"])) {
?>
                <div  class="quest_name" style="text-align: center">
                    That Email id is already Registered! Please<a href=<? home_url() . "join-us" ?> > try again. </a>
                </div>
<? } elseif (username_exists($_POST["user_login"])) {
 ?>
                <div  class="quest_name" style="text-align: center">
                    That username already exists! Please <a href=<? home_url() . "join-us" ?> >try again.</a>
                </div>
<?
            } else {
                /*                 * ************************************************************* */
                //Create new user with student role add record in wp_users and wp_usermeta
                /*                 * ************************************************************* */
                $register_student = array(
                    'user_login' => $_POST["user_login"],
                    'user_pass' => $_POST["user_pass"],
                    'display_name' => $_POST["display_name"],
                    'user_email' => $_POST["user_email"],
                    'user_url' => $_POST["user_url"],
                    'user_registered' => date('m/d/Y h:i:s a', time()),
                    'role' => "student",
                );

                $res_register_student = wp_insert_user($register_student);
                //On failure
                if (is_wp_error($res_register_student)) {
                    return "Unable to create user : " . $res_register_student;
                }


                /*                 * ************************************************************* */
                //Add record to the students Table
                /*                 * ************************************************************* */

                $table = "aims_student";
              
                $student_data = array(
                    'std_wp_user_id' => intval($res_register_student),
                    'aims_student_name' => $_POST["user_login"],
                    'aims_student_email' => $_POST["user_email"],
                    'aims_student_company_id' => $_POST["company"]
                );
                /*$format = array($table
                    '%i', '%s', '%s', '%i'
                );*/
                 $student_added = $wpdb->insert($table, $student_data);
              //   echo $student_added;
                /*                 * ************************************************************* */
                //set user role
                /*                 * ************************************************************* */

                if ($student_added) {
                        $current_user = get_user_by( 'email', $_POST["user_email"] );
                        if($current_user){
                             $user_update = wp_update_user( array( 'ID' =>$current_user->ID, 'role' => 'student' ) );
                        }
                }
?>
                <div  class="quest_name" style="text-align: center">
                    Registered successfully.<a title="Login" href="<?php echo WP_SITEURL . '/wp-login.php'; ?>">Login</a>
                </div>
<?
            }
        } else {
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

<?php
            foreach ($client_admins as $client_admin) {
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
    <div  class="quest_name" style="text-align: center">
        <a title="Login" href="<?php echo WP_SITEURL . '/wp-login.php'; ?>">Login</a>
    </div>
<?php
        }
    }
}
?>