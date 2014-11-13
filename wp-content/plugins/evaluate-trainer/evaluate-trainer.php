<?php
/**
 * @package sign up
 */
/*
  Plugin Name: evaluate-trainert
  Plugin URI: http://customtags.com/
  Description: Easy course-management plugin.
  Version: 1.0.0
  Author: Yasir
  Author URI: http://demosites.darussalampk.com/aims/
  License: GPLv2 or later
  Text Domain: Twitter
 */

add_shortcode('evaluate-trainer', 'evaluate_trainer');

function evaluate_trainer() {
    $course_name;
    $course_name =$_REQUEST['course_name'];
    

    if (!is_user_logged_in ()) {    
?>
        <div  class="quest_name" style="text-align: center">
            <? echo 'You Must be Login To Evaluate Trainer'?><a title="Login" href="<?php echo WP_SITEURL . '/wp-login.php'; ?>">Login</a>
        </div>

<? } else {
            global $wpdb;
            $current_user = wp_get_current_user();
?>
            <div  class="quest_name" style="text-align: center">
                Evaluation <br>
            </div>
         <? echo 'Welcome, ' . $current_user->user_login; ?>
<?
        if( $current_user->roles[0] != 'trainer'){

            if($_POST["content_quality"] and $_POST['course_name']){

                $course_res = $wpdb->get_row( $wpdb->prepare("SELECT * FROM aims_courses WHERE course_name = %s", $_POST['course_name'] ));
                $trainer_id_db = 'aims_trainer_id';
                $company_id_db = 'company_id';

                $trainer_id = $course_res->$trainer_id_db;
                $company_id = $course_res->$company_id_db;
               // echo $trainer_id; echo $company_id; echo $_POST['course_name']; die;

                /*************************************************************** */
                //Add record to the trainer_evaluation
                /*************************************************************** */
                
                $table = "trainer_evaluation";
                $data = array(
                    'course_name' => $course_name,
                    'trainer_id' => $trainer_id,
                    'company_id' => $company_id,
                    'student_name' => $current_user->user_login ,
                    'student_email' => $current_user->user_email,
                    'student_id' => $current_user->ID,
                    'content_quality' => $_POST["content_quality"],
                    'methodology' => $_POST["methodology"],
                    'quantityofwork' => $_POST["quantityofwork"],
                   );
                
                $evluation_added = $wpdb->insert($table, $data);
                if ($evluation_added) {
   ?>
                 <div  class="quest_name" style="text-align: center">
                   Thank You for your valuable evaluation <a href=<? home_url() ?> >Home</a>
                 </div>
    <?
                }
            }else{
?>
            <div style="text-align: center; padding-top: 20px;" class="evaluate_trainer">
                <form method="post"  action="">
                    <input type="hidden" name="course_name" value=<?php echo $course_name?> >
                     <div><span class="ev_tr_span">Content Quality</span>
                        <!--  <input type="radio" name="content_quality"  value=1><label>Unsatisfactory</label>
                          <input type="radio" name="content_quality"  value=2><label>Satisfactory</label>
                          <input type="radio" name="content_quality"  value=3><label>Good</label>
                          <input type="radio" name="content_quality"  value=4><label>Best</label>
                          <input type="radio" name="content_quality"  value=5><label>Extra Ordinary</label>  -->

                          <input type="radio" name="content_quality"  value=1><label>1</label>
                          <input type="radio" name="content_quality"  value=2><label>2</label>
                          <input type="radio" name="content_quality"  value=3><label>3</label>
                          <input type="radio" name="content_quality"  value=4><label>4</label>
                          <input type="radio" name="content_quality"  value=5><label>5</label>
                     </div>

                     <div><span class="ev_tr_span">Methodology</span>
                          <input type="radio" name="methodology"  value=1><label>1</label>
                          <input type="radio" name="methodology"  value=2><label>2</label>
                          <input type="radio" name="methodology"  value=3><label>3</label>
                          <input type="radio" name="methodology"  value=4><label>4</label>
                          <input type="radio" name="methodology"  value=5><label>5</label>
                     </div>

                     <div><span class="ev_tr_span">Quantity Of Work</span>
                          <input type="radio" name="quantityofwork"  value=1><label>1</label>
                          <input type="radio" name="quantityofwork"  value=2><label>2</label>
                          <input type="radio" name="quantityofwork"  value=3><label>3</label>
                          <input type="radio" name="quantityofwork"  value=4><label>4</label>
                          <input type="radio" name="quantityofwork"  value=5><label>5</label>
                     </div>
                  
                    <div class="ev_tr_button"><input class="button-secondary" type="submit"  value="submit"></div>
                     
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
        }

    }
}
?>