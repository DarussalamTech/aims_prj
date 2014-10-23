<?php global $wpdb; ?>
<div class="wrap">

	<div id="icon-tools" class="icon32"></div>
	<h2>Aims Assesment Tool - Results</h2>
		
	<?php require WPSQT_DIR.'pages/admin/misc/navbar.php'; ?>	

	<form action="" method="post">
		<input type="submit" name="deleteall" value="Delete All Results" />
	</form>
	<div class="tablenav">
		<div class="tablenav-pages">
			<a href="<?php echo WPSQT_URL_MAIN; ?>&section=results&subsection=quiz&id=<?php echo urlencode($_GET['id']); ?>&wpsqt-download=<?php echo urlencode($_GET['id']); ?>">Export CSV</a>
		</div>
	</div>
	<?php if ( isset($message) ) { ?>
	<div class="updated">
		<strong><?php echo $message; ?></strong>
	</div>
	<?php } ?>
	
	<form method="post" action="">
	
		<input type="hidden" name="wpsqt_nonce" value="<?php echo WPSQT_NONCE_CURRENT; ?>" />
		
		<?php
		echo '<h2>Results for '.$quizName.'</h3>';
		$pollId = (int) $_GET['id'];	
		Wpsqt_Page_Main_Results_Poll::displayResults($pollId);
		
		?>
		
	</form>
</div>
<?php require_once WPSQT_DIR.'/pages/admin/shared/image.php'; ?>
