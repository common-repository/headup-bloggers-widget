<?php $settings = $this->getSettings(); ?>
<div class="wrap">
	<h2><?php _e( 'Headup Widget Settings' ); ?></h2>
	<form method="post">
		<table class="form-table">
			<tbody>
				<tr>
					<th colspan='3'>Enter your blog's key (the user name you selected when you <a href='http://mint1.headup.com/Services/Backoffice/'>signed-up</a>) to connect your widget to your Headup Publisher Dashboard</th>
				</tr>
				<tr>
					<th scope="row"><label for="headup_user_id"><?php _e( "Headup ID" ); ?></label></th>
					<td>
						<input type="text" class="regular-text" id="headup_user_id" name="headup_user_id" value="<?php echo attribute_escape( $settings[ 'headup_user_id' ] ); ?>" />
					</td>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<?php wp_nonce_field( 'save-headup-for-wordpress-settings' ); ?>
			<input type="submit" name="save-headup-for-wordpress-settings" id="save-headup-for-wordpress-settings" value="<?php _e( 'Save Settings' ); ?>" />
		</p>
		<div style='-moz-border-radius:5px; -webkit-border-radius:5px; padding:10px; background-color:#EEE; border:1px solid #DDD;'>
			<h3>Why should I sign-up?</h3>
			<dl>
				<dt style='font-weight:bold'>Control Sources & Increase Page Views</dt>
				<dd style='margin-bottom:15px;'>Configure Headup to show related posts from blog & control your widget's article sources.</dd>
				<dt style='font-weight:bold'>Control Highlights</dt>
				<dd style='margin-bottom:15px;'>Headup highlighting topics you'd rather not see?<br>Use the dashboard to blacklist them!</dd>
				<dt style='font-weight:bold'>Select Default Tab</dt>
				<dd style='margin-bottom:15px;'>Rather show videos as your default tab?<br>
				Now you can! Use the dashboard to select your widget's default tab.</dd>
				<dt style='font-weight:bold'>Get Usage Stats</dt>
				<dd style='margin-bottom:15px;'>View how users are interacting with your widgets & which are the most popular topics on your site.<br>
			</dl>
		</div>
		<br>
		<div style='-moz-border-radius:5px; -webkit-border-radius:5px; padding:10px; background-color:#EEE; border:1px solid #DDD;'>
			<h3>Version update - Version 1.12</h3>
			<dl>
				<dd style='margin-bottom:15px;'>Headup plugin for WordPress was discontinued.</dd>
			</dl>
		</div>
		<br>
		<div style='-moz-border-radius:5px; -webkit-border-radius:5px; padding:10px; background-color:#EEE; border:1px solid #DDD;'>
			<h3>Version update - Version 1.11</h3>
			<dl>
				<dd style='margin-bottom:15px;'>Tested to work with Wordpress 3.0.</dd>
				<dd style='margin-bottom:15px;'>Small typos fixes.</dd>
			</dl>
		</div>
		<br>
		<div style='-moz-border-radius:5px; -webkit-border-radius:5px; padding:10px; background-color:#EEE; border:1px solid #DDD;'>
			<h3>Version update - Version 1.10</h3>
			<dl>
				<dt style='font-weight:bold'>Analytics</dt>
				<dd style='margin-bottom:15px;'><a href="http://mint1.headup.com/Services/Backoffice/" title="Register you Headup semantic web Wordpress plugin" target="_blank">Registered users</a> can now see how widgets are performing & learn which are the most popular topics on their site.</dd>
				<dt style='font-weight:bold'>Headup Snippet</dt>
				<dd style='margin-bottom:15px;'>The new slim Headup widget. Check it out on our <a href="http://blog.headup.com" title="Headup blog" target="_blank">blog</a>.</dd>
				<dt style='font-weight:bold'>Headup Topic Pages</dt>
				<dd style='margin-bottom:15px;'>Topic Pages you can customize to display your content & match your design.</dd>
			</dl>
			</div>
		<p>Questions? Feedback? Requests? <a href='http://www.headup.com/contact.php'>Contact us!</a></p>
		
	</form>
</div>