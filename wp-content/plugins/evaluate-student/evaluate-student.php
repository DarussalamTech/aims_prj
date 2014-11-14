<?php
/**
 * @package sign up
 */
/*
  Plugin Name: evaluate-student
  Plugin URI: http://customtags.com/
  Description: Easy course-management plugin.
  Version: 1.0.0
  Author: Yasir
  Author URI: http://demosites.darussalampk.com/aims/
  License: GPLv2 or later
  Text Domain: Twitter
 */


add_shortcode('evaluate-student', 'evaluate_student');
//include WP_CONTENT_DIR."/plugins/evaluate-student/aims.js";

function select_student_company(){
    echo 'Hello World';
    wp_enqueue_script("jquery");
    wp_register_script('evaluate-student_aims',  plugins_url('aims.js',__FILE__));
    wp_enqueue_script('evaluate-student_aims',  plugins_url('aims.js',__FILE__));
}
function evaluate_student() {
  
    $student_id =$_REQUEST['id'];
    select_student_company();
   // add_action('wp_head','select_student_company');
   // select_student_company('this.value');
    if (!is_user_logged_in ()) {
     
?>
        <div  class="quest_name" style="text-align: center">
            <? echo 'You Must be Login To Evaluate Student'?><a title="Login" href="<?php echo WP_SITEURL . '/wp-login.php'; ?>">Login</a>
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
 
            if($_POST["total_score"]){

                /*************************************************************** */
                //Add record to the trainer_evaluation
                /*************************************************************** */
               
                $table = "student_evaluation";
                $data = array(
                    'trainer_id' => $current_user->ID,
                    'student_id' => $_POST['student_id'],
                    'intrest_in_work' => $_POST["intrest_in_work"] ,
                    'ability_to_learn' => $_POST["ability_to_learn"],
                    'quantity_work' => $_POST["quantity_work"],
                    'problem_solving' => $_POST["problem_solving"],
                    'total_score' => $_POST["total_score"],
                    'comments' => $_POST["comments"],
                    'quality_work' => $_POST['quality_work']
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
                     <input type="hidden" name="student_id" value=<?php echo $student_id?> >

                     <div><span class="ev_tr_span">Interest In Work</span>
                          <input type="radio" name="intrest_in_work"  value=1><label>1</label>
                          <input type="radio" name="intrest_in_work"  value=2><label>2</label>
                          <input type="radio" name="intrest_in_work"  value=3><label>3</label>
                          <input type="radio" name="intrest_in_work"  value=4><label>4</label>
                          <input type="radio" name="intrest_in_work"  value=5><label>5</label>
                     </div>

                     <div><span class="ev_tr_span">Ability To Work</span>
                          <input type="radio" name="ability_to_learn"  value=1><label>1</label>
                          <input type="radio" name="ability_to_learn"  value=2><label>2</label>
                          <input type="radio" name="ability_to_learn"  value=3><label>3</label>
                          <input type="radio" name="ability_to_learn"  value=4><label>4</label>
                          <input type="radio" name="ability_to_learn"  value=5><label>5</label>
                     </div>

                     <div><span class="ev_tr_span">Quantity Of Work</span>
                          <input type="radio" name="quantity_work"  value=1><label>1</label>
                          <input type="radio" name="quantity_work"  value=2><label>2</label>
                          <input type="radio" name="quantity_work"  value=3><label>3</label>
                          <input type="radio" name="quantity_work"  value=4><label>4</label>
                          <input type="radio" name="quantity_work"  value=5><label>5</label>
                     </div>                  

                     <div><span class="ev_tr_span">Quality Of Work</span>
                          <input type="radio" name="quality_work"  value=1><label>1</label>
                          <input type="radio" name="quality_work"  value=2><label>2</label>
                          <input type="radio" name="quality_work"  value=3><label>3</label>
                          <input type="radio" name="quality_work"  value=4><label>4</label>
                          <input type="radio" name="quality_work"  value=5><label>5</label>
                     </div>


                     <div><span class="ev_tr_span">Problem Solving</span>
                          <input type="radio" name="problem_solving"  value=1><label>1</label>
                          <input type="radio" name="problem_solving"  value=2><label>2</label>
                          <input type="radio" name="problem_solving"  value=3><label>3</label>
                          <input type="radio" name="problem_solving"  value=4><label>4</label>
                          <input type="radio" name="problem_solving"  value=5><label>5</label>
                     </div>
                    <div><span class="ev_tr_span">Total Score</span><input type="text" name="total_score"></div>
                    <div><span class="ev_tr_span">Comments</span><textarea type="textarea" cols="50" rows="5" name="comments"></textarea></div>
 
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