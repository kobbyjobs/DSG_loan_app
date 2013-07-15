<?php if ( ! defined( 'BASEPATH' )) exit( 'No direct script access allowed' ); ?>
<?php echo '<?xml version="1.0" encoding="UTF-8" ?' . ">\n"; ?>
<site-configuration id="<?php echo $id; ?>">
	<name><?php echo $name; ?></name>
	<landing><?php echo $landing; ?></landing>
	<short-form><?php echo $short_form; ?></short-form>
	<long-form><?php echo $long_form; ?></long-form>
	<banner><?php echo $banner; ?></banner>
	<round-robin size="4">
		<ping-tree order="1"><?php echo $ping_tree_1; ?></ping-tree>
		<ping-tree order="2"><?php echo $ping_tree_2; ?></ping-tree>
		<ping-tree order="3"><?php echo $ping_tree_3; ?></ping-tree>
		<ping-tree order="4"><?php echo $ping_tree_4; ?></ping-tree>
	</round-robin>
</site-configuration>