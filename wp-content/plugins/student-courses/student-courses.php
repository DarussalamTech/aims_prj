<?php
/**
 * @package sign up
 */
/*
  Plugin Name: student-courses
  Plugin URI: http://customtags.com/
  Description: Easy course-management plugin.
  Version: 1.0.0
  Author: Yasir
  Author URI: http://demosites.darussalampk.com/aims/
  License: GPLv2 or later
  Text Domain: Twitter
 */

add_shortcode('student-available-courses', 'student_available_courses');

function student_available_courses() {


    if (!is_user_logged_in ()) {
?>

        <div  class="quest_name" style="text-align: center">
<? echo 'You Must be Login To Take Courses. ' ?><a title="Login" href="<?php echo WP_SITEURL . '/wp-login.php'; ?>">Login</a>
        </div>

<?
    } else {
        global $wpdb;
        $current_user = wp_get_current_user();
?>
        <div  class="quest_name" style="text-align: center">
            Available Courses <br>
        </div>
<? echo 'Welcome, ' . $current_user->user_login; ?>
<?
        // var_dump($current_user->roles[0]); TODO Check Which User Can Access It.
        //var_dump($current_user->ID);
        //TODO Int Che
        $student_company = $wpdb->get_row($wpdb->prepare("SELECT aims_student_company_id FROM aims_student WHERE std_wp_user_id = %s", intval($current_user->ID)));
        //var_dump( $student_company_id->aims_student_company_id);die;

        if ($student_company) {
            $student_company_id = $student_company->aims_student_company_id;

            $student_courses = $wpdb->get_results($wpdb->prepare("SELECT * FROM aims_courses WHERE company_id = %s", $student_company_id));
            //  print_r($student_courses);die;
?>

<table border="2" class="" style="text-align: center; color: black;" cellpadding="5" align="center">

<?
            foreach ($student_courses as $student_course) {
                echo "<tr>";
                echo "<td><a href='".WP_SITEURL."/$student_course->course_name'/><div style='height:100%;width:100%'>$student_course->course_name</div></a></td>";
              

              //  echo "<td>" . $student_course->course_name . "</td>";
                echo "</tr>";
            }
?>
        </table>

    <? } else { ?>
        <div  class="quest_name" style="text-align: center">
            No Course Available Yet.<a href=<? home_url() ?> > Home </a>
        </div>
<?
        }
?>
<?php
    }
}
?>