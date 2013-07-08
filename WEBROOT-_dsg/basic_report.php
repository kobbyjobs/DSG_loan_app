<?php
////////////////////////////////////////////////////////////////
//	File:	public_html/secure/basic_report.php
//
//	Author:	eamohl@leadsanddata.net
//
//	Date:	03 June 2013
//
//	Description:
//		Provide some basic reporting of short-form and
//		long-form payday loan applications from website(s)
////////////////////////////////////////////////////////////////

require_once('./db_utils.php');

function make_indent_tab_str($indent_level)
{
	$indent_str = "";
	
	for ($i = 0; $i < $indent_level; $i++) {
		$indent_str = $indent_str . "\t";
	}
	
	return $indent_str;
}

function open_table($indent_level, $id, $class, $style, $headings)
{
	$indent_str = make_indent_tab_str($indent_level);
	
	echo $indent_str;
	echo '<table id="' . $id . '" ';
	echo 'class="' . $class . '" ';
	echo 'style="' . $style . '" ';
	echo ">\r\n";
	
	echo "<thead><tr>";
	
	echo $indent_str . "\t";
	//echo "<th>";
	foreach ($headings as $k => $v) {
		echo '<th';
		if (isset($v['id'])) {
			echo ' id="' . $v['id'] . '"';
		}
		if (isset($v['class'])) {
			echo ' class="' . $v['class'] . '"';
		}
		if (isset($v['style'])) {
			echo ' style="' . $v['style'] . '"';
		}
		echo '>';
		
		echo $k;
		
		echo '</th>';
	}
	//echo "</th>\r\n";
	
	echo "</tr></thead>\r\n";
}

function fetch_and_output_rows($indent_level, $stmt)
{
	$indent_str = make_indent_tab_str($indent_level);
	
	echo $indent_str;
	echo "\t";
	echo "<tbody>\r\n";

	try {
		for (
			$row = $stmt->fetch(PDO::FETCH_NUM);
			$row != FALSE;
			$row = $stmt->fetch(PDO::FETCH_NUM)
		) {
			echo $indent_str;
			echo "\t\t";
			echo "<tr>";
			
			foreach ($row as $k => $v) {
				echo "<td>$v</td>";
			}
			
			echo "</tr>";
			echo "\r\n";
		}
	} catch (Exception $e) {
		echo $e->getMessage();
	}
	
	echo $indent_str;
	echo "\t";
	echo "</tbody>\r\n";
}

function close_table($indent_level)
{
	$indent_str = make_indent_tab_str($indent_level);
	
	echo $indent_str;
	echo "</table>";
	echo "\r\n";
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<title>Payday Website Loan Applications - Basic Report</title>
	
	<link rel="stylesheet" media="screen" type="text/css" href="/secure/_dsg/css/reset.css" />
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	
	<style type="text/css">
	#root > h1 {
		text-align: center;
		padding-top: 10px;
		padding-bottom: 10px;
		font-size: 24px;
	}
	
	#root > h2 {
		text-align: center;
		padding-top: 10px;
		padding-bottom: 10px;
	}
	
	#report_table {
		margin-top: 15px;
		margin-bottom: 15px;
		margin-left: auto;
		margin-right: auto;
	}
	
	#report_table > thead {
		margin-bottom: 5px;
	}
	
	#report_table > thead th {
	
	}
	
	#report_table > tbody {
		margin-top: 5px;
	}
	</style>
</head>
	
<body>
	<div id="root">
		<h1>Basic Report</h1>
		<h2>Payday Leads for topdollarcashloans.com - Last 24 Hours</h2>
		<div id="report">	
<?php

// use the offer id for topdollarcashloans.com
$offer_id = 136;

$sql = "SELECT timestamp, email, response, aff_id FROM leads WHERE offer_id = :offer_id AND timestamp < :end_of_period AND timestamp >= :start_of_period;";

$_end_of_period = time();
$_start_of_period = $_end_of_period - (60 * 60 *24);

$end_of_period = date('Y-m-d H:i:s', $_end_of_period);
$start_of_period = date('Y-m-d H:i:s', $_start_of_period);

$dbh = db_connect();
$stmt = NULL;

try {
	$stmt = $dbh->prepare($sql);
	
	$stmt->bindValue(':offer_id', $offer_id);
	$stmt->bindValue(':end_of_period', $end_of_period);
	$stmt->bindValue(':start_of_period', $start_of_period);
	
	$stmt->execute();
} catch (Exception $e) {
	echo $e->getMessage();
}

$table_indent_level = 3;
$table_id = "report_table";
$table_class = "";
$table_style = "";
$table_headings = array(
	'Timestamp' => array(),
	'E-mail' => array(),
	'Response' => array(),
	'Affiliate ID' => array()
);

open_table($table_indent_level, $table_id, $table_class, $table_style, $table_headings);

fetch_and_output_rows($table_indent_level, $stmt);

try {
	$stmt->closeCursor();
} catch (Exception $e) {
	echo $e->getMessage();
}

$stmt = NULL;

close_table($table_indent_level);

?>
		</div>
	</div>
</body>
</html>