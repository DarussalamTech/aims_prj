<?php
    require('../wp-blog-header.php');
   /* get_header();
	
	    get_sidebar();
    get_footer();    */
get_header(); 

?>

<!--BEGIN #sub-header-container-->
<div id="sub-header-container" class="solid-bg no-description" data-aspect-ratio="property_type" style="left:0;right:0;position:absolute;">

    <!--BEGIN #sub-header-->
    <div id="sub-header">

        <div class="bar"></div>
        <h1 class="sub-header-title">Title of page</h1>
    <!--END #sub-header-->
    </div>
    
<!--END #sub-header-container-->
</div>

<div id="left-panel" style="float: left; width: 210px;border-right:1px solid #F0ECED;margin-top:70px;">
  <div class="widget widget_text" id="text-12" style="margin-top:15px;border-bottom:1px solid #F0ECED;padding-bottom:15px;margin-bottom:20px;">
    <div class="textwidget">
      <div class="blue-bar"></div>
      <h3 style="line-height:20px;">Presented By</h3>
      <h3 style="line-height:20px;"><?= WEBSITE_NAME2 ?></h3>
      (813) 477-1761 - Direct<br>
      (813) 644-4442 - Fax<br>
      <a href="mailto:Candace@CandaceCourter.com">Candace@CandaceCourter.com</a><br>
    </div>
  </div>
  <div class="widget widget_text" id="text-12" style="margin-top:15px;border-bottom:1px solid #F0ECED;">
    <div class="textwidget">
      <div class="blue-bar"></div>
      <h3 style="line-height:20px;">Recently Viewed</h3>
      
    </div>
  </div>
</div>
<div class="blog-detail-page clearfix" style="float: right; width: 740px; margin:90px 0 15px 0;">
other text will go here;
	

</div>

<?php get_footer(); ?>
