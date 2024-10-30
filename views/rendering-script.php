<?php
	$settings = $this->getSettings();
	$uid = $settings[ 'headup_user_id' ];
	$customerid = !empty($uid) ? '?customerid='.$uid : '';
	//echo '<script type="text/javascript" src="http://mint1.headup.com/clientscripts/annotate.js' .$customerid. '"></script>';
?>