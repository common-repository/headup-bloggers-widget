<?php

function headup_request($name, $default=null) 
{
	if (!isset($_REQUEST[$name])) return $default;
	return stripslashes_deep($_REQUEST[$name]);
}
	
function headup_field_checkbox($name, $label='', $tips='', $attrs='')
{
  global $options;
  echo '<th scope="row">';
  echo '<label for="options[' . $name . ']">' . $label . '</label></th>';
  echo '<td><input type="checkbox" ' . $attrs . ' name="options[' . $name . ']" value="1" ' . 
    ($options[$name]!= null?'checked':'') . '/>';
  echo ' ' . $tips;
  echo '</td>';
}

function headup_field_textarea($name, $label='', $tips='', $attrs='')
{
  global $options;
  
  if (strpos($attrs, 'cols') === false) $attrs .= 'cols="70"';
  if (strpos($attrs, 'rows') === false) $attrs .= 'rows="5"';
  
  echo '<th scope="row">';
  echo '<label for="options[' . $name . ']">' . $label . '</label></th>';
  echo '<td><textarea wrap="off" ' . $attrs . ' name="options[' . $name . ']">' . 
    htmlspecialchars($options[$name]) . '</textarea>';
  echo '<br /> ' . $tips;
  echo '</td>';
}	

if (isset($_POST['save']))
{
    if (!wp_verify_nonce($_POST['_wpnonce'], 'save')) die('Security violated');
    $options = headup_request('options');
    update_option('headup-bloggers-widget', $options);
}
else 
{
    $options = get_option('headup-bloggers-widget');
}
?>	

<div class="wrap">

<form method="post">
<?php wp_nonce_field('save') ?>
<h2>Headup for Wordpress</h2>

        <p>.</p>


<table class="form-table">
<tr valign="top"><?php headup_field_textarea('CustormerID', 'Customer ID', 'default customer ID', 'rows="1"'); ?><a href='http://mint1.headup.com/Services/Backoffice/'/></tr>
</table>

<p class="submit"><input type="submit" name="save" value="<?php _e('save', 'headup-bloggers-widget'); ?>"></p>

<p>To help us improve please answer 6 questions in our anonymous <a target="_blank" href="http://surveys.polldaddy.com/s/44185E7CA5518182">survey</a>.<br>
THANK YOU : )</p>


</form>
</div>
