<?php get_header(); ?>
<?php get_template_part( 'menu-featured-tpl' );           // Menu Featured (menu-featured-tpl.php) ?>
<style>
@media (max-width:480px){
	#iframe1{ display:none !important;}
        #iframe2{ display:block !important;}
}
#iframe1{ display:block; }
#iframe2{ display:none;}
</style>

<div style="width: 90%;margin:0 auto;margin-top: 30px;">
    <div id="iframe1" style="border:1px solid #ccc;">
    <iframe style="border: none; min-height: 2150px;" src="http://web.thinktankhosting.com/~kelfred/real-estate/property-details/<?php echo $_GET['details'];?>/?d=<?=time();?>" height="240" width="100%" frameborder="0" scrolling="no">
    <p>Your browser is old. It won't work with iframes.</p>
    </iframe></div>
    
    <div id="iframe2" style="display:none;border:1px solid #ccc;"><iframe style="border: none; min-height:2530px;" src="http://web.thinktankhosting.com/~kelfred/real-estate/property-details/<?php echo $_GET['details'];?>/?d=<?=time();?>"  width="298px" frameborder="0" scrolling="no">
    <p>Your browser is old. It won't work with iframes.</p>
    </iframe></div>
</div>

<?php get_footer(); ?>