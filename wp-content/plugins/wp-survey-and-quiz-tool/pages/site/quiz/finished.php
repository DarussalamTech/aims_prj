<?php
// Set up the token object

require_once WPSQT_DIR.'/lib/Wpsqt/Tokens.php';
$objTokens = Wpsqt_Tokens::getTokenObject();
$objTokens->setDefaultValues();

?>
<form method="post" action="<?php  echo  get_site_url().'/evaluate-trainer'; ?>">
<h2 class="wpsqt-exam-finished-title"><?php _e('Exam Finished', 'wp-survey-and-quiz-tool'); ?></h2>
 <div><input type="hidden" name="course_name" required="true" value="<?php echo $_SESSION['wpsqt']['current_id']?>"></div>
 <!--<pre><?php //print_r($_SESSION['wpsqt']['current_id']);  ?></pre>
  <pre><?php //print_r($_SESSION['wpsqt'][$_SESSION['wpsqt']['current_id']]);die;  ?></pre>

 <pre><?php //print_r($_SESSION); die;?></pre>!-->
 <?php  if ($_SESSION['wpsqt'][$quizName]['details']['finish_display'] == 'Finish message' || $_SESSION['wpsqt'][$quizName]['details']['finish_display'] == 'Both'  ) { ?>
	<?php if (isset($_SESSION['wpsqt'][$quizName]['details']['pass_finish']) &&
		$_SESSION['wpsqt'][$quizName]['details']['pass_finish'] == "yes" &&
		$percentRight >= $_SESSION['wpsqt'][$quizName]['details']['pass_mark']) {
			// Show pass finish message
			$string = $objTokens->doReplacement($_SESSION['wpsqt'][$quizName]['details']['pass_finish_message']);
			echo nl2br($string);
	} else if ( isset($_SESSION['wpsqt'][$quizName]['details']['fail_review']) &&
		$_SESSION['wpsqt'][$quizName]['details']['fail_review'] == "yes" &&
		$percentRight < $_SESSION['wpsqt'][$quizName]['details']['pass_mark'] &&
   		$_SESSION['wpsqt'][$quizName]['details']['finish_display'] != 'Both'){
			require_once Wpsqt_Core::pageView('site/quiz/review.php');
	} else if ( isset($_SESSION['wpsqt'][$quizName]['details']['finish_message']) &&
		!empty($_SESSION['wpsqt'][$quizName]['details']['finish_message'])) {
			// PARSE TOKENS
			$string = $objTokens->doReplacement($_SESSION['wpsqt'][$quizName]['details']['finish_message']);
			echo nl2br($string);
	} else {
		_e('Thank you for your time.', 'wp-survey-and-quiz-tool');
	} ?>

<?php } if ($_SESSION['wpsqt'][$quizName]['details']['finish_display'] == 'Quiz Review' || $_SESSION['wpsqt'][$quizName]['details']['finish_display'] == 'Both'){
	require_once Wpsqt_Core::pageView('site/quiz/review.php');
}

	if ( $_SESSION['wpsqt'][$quizName]['details']['use_pdf'] == "yes" ){
		?>         

		<a href="<?php echo plugins_url('pdf.php?quizid='.$_SESSION['wpsqt'][$quizName]['details']['id'].'&id='.$_SESSION['wpsqt']['result_id'],WPSQT_FILE); ?>"><?php _e('Download certification', 'wp-survey-and-quiz-tool'); ?></a>
		<?php
	}
?>
<p><input type='submit' value='<?php _e('Submit', 'wp-survey-and-quiz-tool'); ?>' class='button-secondary' /></p>
</form>
