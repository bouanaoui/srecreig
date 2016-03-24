<?php
	require_once 'Classes/PHPExcel/IOFactory.php'; 
	header('Content-Type: text/html; charset=utf-8');

	try 
	{
		require('db_connect.php');
	    echo "Connected successfully";
	}
	catch(PDOException $e)
	{
	    echo "Connection failed: " . $e->getMessage();
	}
	// Chargement du fichier Excel
	$objPHPExcel = PHPExcel_IOFactory::load("files/MAITRE_FEE_2013.xlsx");
	 
	$sheet = $objPHPExcel->getSheet(0);
	$objWorksheet = $objPHPExcel->getActiveSheet();

	$highestRow = $objWorksheet->getHighestRow(); 

	$nomEntreprise="";
	$commentaire="";
	//echo "<li> highestRow = $highestRow </li>";
	for ($row = 2; $row <= $highestRow; ++$row) 
	{
	  	//echo '<tr>';
	  	$nomEntreprise=$objWorksheet->getCell('A'.$row)->getCalculatedValue();
	  	$commentaire=$objWorksheet->getCell('B'.$row)->getCalculatedValue();
		try
		{
			$req = $conn->prepare("INSERT INTO ForumSG (anneeDeParticipation,commentaire,Entreprise_nomEntreprise)VALUES (2013,:comm,:nomEntreprise)");
				$req->execute(array(
					'comm' => $commentaire;
				    'nomEntreprise' => $id,
				 ));
				//echo "<li> Ajout de $id $cycle $mention $specialite </li>";
		}
		catch(PDOException $e)
		{
		    echo "<li>errrrrrrrrrrrrrreur sql: " . $e->getMessage()."</li>";
		}
	}	
?>
