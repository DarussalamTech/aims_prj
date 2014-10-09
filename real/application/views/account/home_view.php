
<style>



.accountLogOut {

    background: none repeat scroll 0 0 #7FAAD4;

    border-top: 1px solid #FFFFFF;

    color: #FFFFFF;

    font-size: 12px;

    padding: 10px;

    text-align: right;

}



#account_menu {

    background: none repeat scroll 0 0 #0A57A3;

    border-top: 1px solid #FFFFFF;

    color: #FFFFFF;

    padding: 7px 10px;

	margin-bottom:3%;

}



#account_menu ul {

    list-style: none outside none;

    margin: 0;

    padding: 0;

}



#account_menu li {

    background: url("/images/account_nav_bar.gif") no-repeat scroll right center rgba(0, 0, 0, 0);

    float: left;

    margin-right: 9px;

}



#account_menu a {

    color: #FFFFFF !important;

    display: block;

    padding-right: 9px;

    text-decoration: none;

    outline: medium none;

}

#account_menu a:hover {

    text-decoration: underline;

}





#dashboardHomeLeft {

    color: #666666;

    float: left;

    font-size: 12px;

    margin: 0 15px 0 0;

    padding: 0;

    width: 58%;

}





#dashboardHomeRight {

    color: #666666;

    float: right;

    font-size: 12px;

    margin: 0;

    padding: 0;

    width: 37%;

}
#admin_links a{
	color:#2d2d2d;
}
#admin_links a:hover{
	color:#0A57A3;
}


@media only screen and (max-width : 480px) {#dashboardHomeRight, #dashboardHomeLeft,.blog-detail-page {width:100%!important;}.contentMargin{margin:5px;}}
</style>

<div class="blog-detail-page clearfix" id="admin_links" style="margin-top:2%;width:85%;margin:auto;">



    <div class="accountLogOut">

        <strong>Welcome,</strong> <span class="CurrentUserName"><?= substr(get_field('first_name'), 0, 15) ?> <?= substr(get_field('last_name'), 0, 15) ?></span>

     <br>

    </div>

    <div id="account_menu">

        <ul>

            <li><a class="activeLink" href="<?php echo $base; ?>account/home">Dashboard</a></li>
           
			    <li><a href="<?php echo $base; ?>account/manage_favorites/">Favorites</a> </li>
            <?php /*?> 
                <li><a href="<?php echo $base; ?>account/searches/">Saved Searches</a> </li>
           <?php */?>
                <li><a href="<?php echo $base; ?>account/edit/">Account Details</a></li>
                <?php /*?><li><a class="last" href="/account/contact_agent/">Contact Your Preferred Agent</a>
            </li><?php */?>
                <li class="last"><a href="<?php echo $base; ?>account/logout">Logout</a></li>
        </ul>

        <div class="clearAll">&nbsp;</div>

    </div>

    

    <div class="contentMargin">

        <div id="dashboardHomeLeft" style="float:left">

            <img src="<?php echo $base; ?>/img/dolphin-house.jpg" class="floatLeft cms_img_left full_width" alt="Client Login">

            <p>New clients - Be the First To Know!</p>

            <p>Are you looking for instant, up-to-date information on real estate in the Tampa Bay area? Receiving new listing information and price changes doesn't get any easier (or faster) than this! <?=WEBSITE_NAME2?> will send you free email updates when property that matches your requirements hits the local real estate market. With these updates you will always be the First To Know regarding real estate in Tampa Bay! </p>

        </div>

        <div id="dashboardHomeRight">

            <div class="AccountHomeBoxes">

                <h4 style="margin:0;">Find Your Home</h4>

                <p>Search for properties in Florida and beyond.</p>

                <p>

                    <a title="Search for properties" href="<?= WEBSITE_URL ?>search-all-properties/">

                        Search for Properties

                    </a>

                </p>

            </div>
            <div class="AccountHomeBoxes">

                <h4>Favorites</h4>
                <p>Save, manage, compare and share your favorite properties.</p>

                <p>
                    <a title="Manage your favorites" href="<?php echo $base; ?>account/manage_favorites/">
                        Manage Favorites
                    </a>
                </p>

            </div>

            <div class="AccountHomeBoxes">

                <h4>Account Details</h4>

                <p>Review or edit your email address, contact information or password.</p>

                <p>

                    <a title="Review or edit your account" href="<?php echo $base; ?>account/edit">

                        Edit Your Account Details

                    </a>

                </p>

            </div>	

            <div style="margin-bottom:0;" class="AccountHomeBoxes">

                <h4>Contact Us</h4>

                <p>Contact <?=WEBSITE_NAME2?> with any inquiries about properties, scheduling a showing, relocating, or anything else.</p>

                <p>

                    <a title="Contact us" href="<?= WEBSITE_URL ?>contact/">

                        Contact Us

                    </a>

                </p>

            </div>

        </div>

        <div class="clearAll">&nbsp;</div>

    </div>

        

</div>

