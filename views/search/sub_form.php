<?php			  
	include'../../lib/config.php';
	$id = $_GET['id'];
	if($id == '5'){
		$q=mysql_query('SELECT * FROM countries');
		while($row=mysql_fetch_array($q)){
?>
	
		<option value="<?php echo $row['0']?>"><?php echo $row['1']?></option>
<?
		}
	}
?>

