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
	$objPHPExcel = PHPExcel_IOFactory::load("files/Tableau_Contact_Entreprise_FEE_2014.xlsx");
	 
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
		try
		{
			$req = $conn->prepare("INSERT INTO ForumSG (anneeDeParticipation,Entreprise_nomEntreprise)VALUES (2014,:nomEntreprise)");
				$req->execute(array(
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
