<?php
session_start();
    if (! isset($_SESSION['id']))
    {
        echo 'Vous n\'avez rien à faire ici';
        exit();
    }

/*
    define('DB_HOST',       'mysql-srecreig.alwaysdata.net');
    define('DB_USER',       'srecreig');
    define('DB_PASSWORD',   'SREPARIS');
    define('DB_NAME',       'srecreig_base');
 */
    define('DB_TABLE_NAME', $_POST['INTITULE_TABLE']);

    //On sort en cas de param�tre manquant ou invalide
   /* if(empty($_POST['nomEntreprise']) or empty($_POST['type']) or empty($_POST['champ']) or empty($_POST['valeur'])
       or !in_array(
       		$_POST['champ'],
            array('pays', 'adresse', 'codePostal', 'ville')// tableau des champs de la table sans le champ auto-incr�ment�
            ))
    {
        // echo "<p> C'est vide !!!! </p>";
        exit;
    }*/
    //Connexion � la base de donn�es
	require'db_connect.php';
	
    try
    {
        switch($_POST['TYPE'])
        {
            case 'texte':
    		/*	
                $sql  = 'UPDATE `'.DB_TABLE_NAME;
                $sql .= '` SET ' . ($_POST['CHAMP_INTITULE']) . '="';
                $sql .= ($_POST['CHAMP_VALEUR']);
                $sql .= '" WHERE'.$_POST['CLE_PRIMAIRE_INTITULE'].' =\'' .($_POST['CLE_PRIMAIRE_VALEUR']);
                $sql .="'";
              
    		 */ 
    		 	$sql= "UPDATE ". DB_TABLE_NAME . " SET ". $_POST['CHAMP_INTITULE'] . " = :valAttr WHERE " . $_POST['CLE_PRIMAIRE_INTITULE'] . " = :valCle";
    		  echo $sql;
    		 	$req=$conn->prepare($sql);

                // $args = array(DB_TABLE_NAME,
                //                     $_POST['CHAMP_INTITULE'],$_POST['CHAMP_VALEUR'],
                //                     $_POST['CLE_PRIMAIRE_INTITULE'],$_POST['CLE_PRIMAIRE_VALEUR'] 
                //             );
                // echo "$args[0]";
                            
    			$req->execute(array(
                                    //':nomAttr'=> $_POST['CHAMP_INTITULE'],
                                    ':valAttr'=> $_POST['CHAMP_VALEUR'],
    								// `:nomCle` => $_POST['CLE_PRIMAIRE_INTITULE'],
                                    ':valCle' => $_POST['CLE_PRIMAIRE_VALEUR'] 
    								)
    							);

                // echo $sql;
                // echo "<br/>";
                // echo $_POST['CHAMP_INTITULE'];
                // echo "<br/>";
                // echo $_POST['CHAMP_VALEUR'];
                // echo "<br/>";
                // echo $_POST['CLE_PRIMAIRE_INTITULE'];
                // echo "<br/>";
                // echo $_POST['CLE_PRIMAIRE_VALEUR'];

    		 	//echo ($sql);
                // echo "<p> $sql </p>";
                break;
            // case 'texte-multi':
           	// break;	
            case 'nombre':
                $sql= "UPDATE ? SET ? = ? WHERE ? = ?";
    			
                $req=$conn->prepare($sql);
    			$req->execute(array(DB_TABLE_NAME,
    								$_POST['CHAMP_INTITULE'],intval($_POST['CHAMP_VALEUR']),
    								$_POST['CLE_PRIMAIRE_INTITULE'],$_POST['CLE_PRIMAIRE_VALEUR'] 
    								)
    							);
                break;

            default:
                echo('default');
                exit;
        }
    }
    catch (PDOException $e) 
    {
        echo 'Échec lors de la connexion : ' . $e->getMessage();
    }
?>
