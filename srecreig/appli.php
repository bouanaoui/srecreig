
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>SRE CREIG</title>
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="style.css" />
		<link rel="stylesheet" href="../js/jquery-ui.css" />

		<script src="//code.jquery.com/jquery-1.10.2.js"></script>
		<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
		<script src="../js/jquery-1.11.0.min.js"></script>
		<script src="../js/jquery-ui.min.js"></script>
		<script src="../js/jquery.dataTables.min.js"></script>

		<script type="text/javascript" src="js_export/tableExport.js"> </script>
		<script type="text/javascript" src="js_export/jquery.base64.js"> </script>

		<script type="text/javascript" src="js_export/jspdf/libs/sprintf.js"> </script>
		<script type="text/javascript" src="js_export/jspdf/jspdf.js"> </script>
		<script type="text/javascript" src="js_export/jspdf/libs/base64.js"> </script>


		<script src="inlinemod.js"></script>
		<script type="text/javascript">
		$(document).ready(function() 
			{
				 $( "#tabs" ).tabs();
				 var table_array=new Array("Entreprise","CoordonneesPersonne","Alternance","TaxeApprentissage","AtelierRH","Conference","ForumSG");
				for(var i=0;i<table_array.length;i++)
				{
					$("#"+table_array[i]).dataTable({
					"bJQueryUI": true,
					"sPaginationType": "full_numbers",
					"oLanguage": { "sUrl": "js/fr_FR.txt" }
					});	
				}			
			});	
			
		</script>
	</head>
	<body>
		<div class="Div Sup">
			<FORM>
			    <SELECT onChange="niveau(this.options[this.selectedIndex].value)">
			      <OPTION VALUE="#" SELECTED>CHOISIR LE NIVEAU</OPTION>
			      <OPTION VALUE="1">NIVEAU 1</OPTION>
			      <OPTION VALUE="2">NIVEAU 2</OPTION>
			      <OPTION VALUE="3">NIVEAU 3</OPTION>
			    </SELECT>
			    <button class="button" id="export" style="vertical-align:middle;margin-left: 8%;">
					<span>Export</span>
				</button>

				<button class="button" id="disconnect" style="vertical-align:middle; margin-left: 20%;" onclick="self.location.href='deconnexion.php'">
					<span>Deconnexion</span>
				</button>
			</FORM>
		<div>
		<!-- onClick ="$('#Entreprise_menu').tableExport({type:'excel',escape:'true',htmlContent:'false'});" -->
		<div id="tabs">
			<ul> 
		  <?php 
		  		require "db_connect.php";
				$table_array= array("Entreprise","CoordonneesPersonne","Alternance","TaxeApprentissage","AtelierRH","Conference","ForumSG");
				for($i=0;$i<count($table_array);$i++)
				{
					echo "<li> <a href=\"#".$table_array[$i]."_menu\">".$table_array[$i]."</a> </li>";
					// echo "<li> <a href=\"#".$table_array[$i]."_form\">".$table_array[$i]."ajout"."</a> </li>";
				}
				echo "</ul>";

				for($i=0;$i<7;$i++)
				{
					try
					{
						$sql = "DESCRIBE $table_array[$i]";
						$rep=$conn->query($sql);
						//iterate on results row and create new index array of data
						$colonne_array = array();
						$pk;
						while( $row = $rep->fetch()) 
						{ 
							$lettre=substr($row['Field'],0,1);
							if(isset($row['Key']) && $row['Key'] == 'PRI')
								$pk=$row['Field'];
							if(strtoupper($lettre)!=$lettre || $row['Field']=="OCTA")
								array_push($colonne_array,$row['Field']);
						}

						echo "<div id=\"".$table_array[$i]."_menu\">";
						echo "<table width='100%' border='0' cellspacing='0' cellpadding='0' id='$table_array[$i]' class='display'>";
						echo '<thead><tr>';

						for($j=0;$j<count($colonne_array);$j++)
						{
							echo  "<th> $colonne_array[$j] </th>";
						}

						// echo "<form action=\"$table_array[$i]_form.php\" method=\"get\">";
						// for($j=0;$j<count($colonne_array);$j++)
						// {
						// 	echo "$colonne_array[$j]";
	  			// 			echo "<th> $colonne_array[$j] </th>: <input type=\"text\" name=\"$colonne_array[$j]\"><br>";
						// }
						// echo "<input type=\"submit\" value=\"Submit\">";
						// echo "</form>";

						echo '</tr></thead>';
						echo '<tbody>';

						$sql=" SELECT ".implode($colonne_array,",")." FROM $table_array[$i]";
					
						$rep=$conn->query($sql);

						while($data=$rep->fetch())
						{
								echo "<tr>";
								$valeur_pk=$data[$pk];
								for ($k=0;$k<count($colonne_array);$k++)
								{
									$valeur=$data[$colonne_array[$k]];
									// echo "<td id='$table_array[$i]_$colonne_array[$k]_$valeur_pk' ondblclick='inlineMod(this,$colonne_array[$k] , 'texte',$pk,$valeur_pk)'> $valeur</td>";
									// Remarque : pour gérer les profils, linker ou non le ondbclick
									echo "<td id='$table_array[$i]"."_$pk"."_$valeur_pk"."_$colonne_array[$k]' ondblclick=\"inlineMod(this,this,'$colonne_array[$k]','texte')\"> $valeur</td>";
									// echo "<td id='$table_array[$i]_$colonne_array[$k]_$valeur_pk'> $valeur</td>";
								}
								echo '</tr>';
						}
						echo '</tbody>';
						echo '<tfoot><tr><th colspan="4"></th></tr></tfoot>';
						echo '</table>';
						echo '</div>';	
					}
					catch(PDOException $e)
					{
					    echo "erreur: " . $e->getMessage();
					}
					
				}
		  ?>
		</div>
	</body>
</html>