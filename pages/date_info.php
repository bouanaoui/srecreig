<?php include('db_connect.php'); $d=$_GET['dt']; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Details de  la date : <?php echo $d;?></title>
	</head>
	<body>
		<h1>Detail de la date : <?php echo $d;?></h1>
		<?php
			$sql="select * from Agenda where dt='$d'";
			$req=$conn->query($sql);
			while($data=$req->fetch())
			{
		?>
		<table>
			<tr>
				<td><strong>Evenement</strong></td>
				<td><?php echo $data['event'];?></td>
			</tr>
			<tr>
				<td><strong>Lieu</strong></td>
				<td><?php echo $data['lieu'];?></td>
			</tr>
		</table>
		<?php
			}
		?>
	</body>
</html>
