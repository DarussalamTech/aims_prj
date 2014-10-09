<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>CandaceCourter</title>
</head>
<body>
<style type="text/css">
<!--
body {
   background-color: #333333;
   margin: 0;
   padding: 0;
}
a {
	color:#ef942e;
	text-decoration:none;
}
a:hover {
	color:#ef942e;
	text-decoration:underline;
}
img {
	border: none;
	}
-->
</style>
<table width="100%" border="0" align="center" cellpadding="20" cellspacing="0" bgcolor="#333333">
  <tr>
    <td valign="top"><table width="650" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#f7f7f7">
        <tr>
          <td><!-- START OF Header Table -->
            <table width="650" height="148" border="0" cellspacing="0" cellpadding="0" bgcolor="#f7f7f7">
              <tr>
                <td height="148" width="425"  align="left" valign="top" bgcolor="#f7f7f7"><img src="http://candacecourter.com/wp-content/uploads/2012/04/candace-courter-logo.png" width="425" height="148" alt="CandaceCourter Logo" /></td>
                <td width="193" align="left" valign="top" bgcolor="#f7f7f7"><table width="132" height="148" border="0" cellspacing="0" cellpadding="0" bgcolor="#f7f7f7">
                    <tr>
                      <td height="93" width="132" align="right" bgcolor="#000000" style="color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; font-size: 18px; letter-spacing: 0px;"><?=date('F j, Y');?></td>
                    </tr>
                    <tr>
                      <td height="55" width="132" bgcolor="#f7f7f7"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
            <!-- END OF Header Table -->
            <!-- START OF full width Table with image -->
            <table width="630" border="0" align="center" cellpadding="30" cellspacing="0">
              <tr>
                <td width="590" align="left" valign="top" style="font-family: Arial, Helvetica, sans-serif; font-size: 14px; color: #333333; line-height: 18px;"><?php $this->load->view($content_view, $this->data); ?>
                </td>
              </tr>
            </table>
            <!-- END OF full width Table with image -->
            <!-- START OF FOOTER TABLE -->
            <table width="650" border="0" cellspacing="0" cellpadding="10" bgcolor="#333333">
              <tr>
                <td height="68" colspan="3" valign="middle" bgcolor="#f7f7f7"><img src="<?php echo base_url(); ?>/bootstrap/img/hr.jpg" width="630" height="9" alt="line" /></td>
              </tr>
              <tr>
            	<td height="100" colspan="3" valign="middle" bgcolor="#000000">
                	<table width="100%" border="0" cellspacing="0" cellpadding="0"valign="middle" bgcolor="#000000" style="font-family: Helvetica, sans-serif; font-size: 11px; color: #a5a5a5; line-height: 16px;">
                    <tr>
                      <td bgcolor="#000000" style="font-family: Helvetica, sans-serif; font-size: 11px; color: #f7f7f7; line-height: 16px;"><?php if (!empty($to)): ?>
                        This email was sent to you at the following address: <a href="mailto:<?=$to;?>" style="color:#ffffff;">
                        <?=$to;?>
                        </a>
                        <?php endif; ?></td>
                      <td align="right" valign="top"><img src="http://candacecourter.com/wp-content/uploads/2012/04/candace-courter-logo.png" width="200" height="50" alt="CandaceCourter" /></td>
                    </tr>
                  </table>
                 </td>
              </tr>
              <tr>
                <td width="401" height="55" colspan="3" align="left" valign="middle" bgcolor="#333333" style="font-family: Helvetica, sans-serif; font-size: 11px; color: #a5a5a5; line-height: 16px;">&copy; <?php echo date("Y"); ?> CandaceCourter.  All rights reserved.<br />
                  (813) 477-1761 - Direct<br />
                  <a href="mailto:info@CandaceCourter.com" style="color:#ef942e;">info@CandaceCourter.com</a>
                </td>
              </tr>
            </table>
            <!-- END OF FOOTER TABLE -->
          </td>
        </tr>
      </table>
       </td>
  </tr>
</table>
</body>
</html>
