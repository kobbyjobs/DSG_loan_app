<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed'); 
$this->load->helper('url');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Update iLeads Passwords</title>
	</head>
	<body>
		<h3>Update iLeads Passwords</h3>
		
		<form name="update_ileads_passwords" id="update_ileads_passwords" method="post" action="<?php echo site_url('long_form/update_ileads_passwords') . '/' . $secret . '/'; ?>">
			<p>Tree #1 <input type="text" name="tree_1" id="tree_1" value="<?php echo $tree_1; ?>" /></p>
			<p>Tree #2 <input type="text" name="tree_2" id="tree_2" value="<?php echo $tree_2; ?>" /></p>
			<p>Tree #3 <input type="text" name="tree_3" id="tree_3" value="<?php echo $tree_3; ?>" /></p>
			<p>Tree #4 <input type="text" name="tree_4" id="tree_4" value="<?php echo $tree_4; ?>" /></p>
			<p><input type="submit" value="Submit" /></p>
		</form>
	</body>
</html>