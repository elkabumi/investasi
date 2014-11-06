<?php			  
	include'../../lib/config.php';
	$id = $_GET['id'];
	
		$q=mysql_query("SELECT * FROM subcategory where cat_id = '$id'");
		?>
		<option value="0">-- Pilih Semua --</option>
		<?php
		while($row=mysql_fetch_array($q)){
?>
	
		<option value="<?php echo $row[0] ?>"><?php echo $row['2']?></option>
<?
		}
	
?>

