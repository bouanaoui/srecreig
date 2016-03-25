<!DOCTYPE html>
<html>
  <head>
          <title>Ajout Entreprise</title>
          <meta charset="UTF-8">
          <link rel="stylesheet" href="../css/style.css"> 
  </head>


  <body>
  
  
  
	<?php include('header.php');  ?>
	<div class="row" id="content">
	<div class="col-md-2"> 	  </div>			 
	<div class="col-md-8">   
	
	

      <h1 class="text-center"> Fiche d'ajout d'une entreprise </h1></br>
      <form action="#" method="post" class="form-vertical" >
      <fieldset>
	  			

<div class="panel panel-primary">
									  <div class="panel-heading">
										<h3 class="panel-title">Entreprise</h3>
									  </div>
									  <div class="panel-body">

									 

				
<div class="col-md-8">	
												  
<div class="col-md-4">				
									<div class="input-group">
									  <span class="input-group-addon" id="sizing-addon1">Nom</span>
									  <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1">
									</div>
</div> 	
<div class="col-md-2">			
	<input type="text" id="nom" name="nom" required="true" placeholder="Nom"/> <span class="require"></span><br/>
</div>
<div class="col-md-10">	</div>



<div class="col-md-4">				
<label for="groupe">Groupe : </label>
</div> 	
<div class="col-md-2">			
	<input type="text" id="groupe" name="groupe" placeholder="Groupe" /> <br/>
</div>
<div class="col-md-10">	</div>



<div class="col-md-4">				
	<label for="codeNAF" >Code NAF : </label>
</div> 	
<div class="col-md-4">			
	<input type="text" id="codeNAF" name="codeNAF" placeholder="Code NAF"/> 
</div>
<div class="col-md-4">	
	<input type="text" disabled="disabled" id="libNAF" name="libNAF" placeholder="- > Libellé NAF"/>
</div>

<div class="col-md-10">	</div>


<div class="col-md-4">				
<label for="siret">N° SIRET : </label>
</div> 	
<div class="col-md-2">			
	<input type="text" id="siret" name="sirer" placeholder="N° SIRET"/><br/>
</div>
<div class="col-md-10">	</div>



<div class="col-md-4">				
	<label for="adresse">Adresse : </label>
</div> 	
<div class="col-md-2">			
              <input type="text" id="adresse" name="adresse" placeholder="Adresse "/><br/>
</div>
<div class="col-md-10">	</div>



<div class="col-md-4">				
	<label for="complAdr">Complement d'adresse:</label>
</div> 	
<div class="col-md-2">			
             <input type="text" id="complAdr" name="complAdr" /><br/>
</div>
<div class="col-md-10">	</div>


<div class="col-md-4">				
 <label for="codeP">Code postal : </label>
</div> 	
<div class="col-md-2">			
             <input type="text" id="codeP" name= "codeP" pattern="[0-9]{5}"/><br/>
</div>
<div class="col-md-10">	</div>

<div class="col-md-4">				
<label for="ville">Ville :</label>
</div> 	
<div class="col-md-2">			
              <input type="text" id="ville" name="ville" /><br/>
</div>
<div class="col-md-10">	</div>

<div class="col-md-4">				
 <label for="pays">Pays :</label>
</div> 	
<div class="col-md-2">			
             <input type="text" id="pays" name="pays" value="France"/><br/>
</div>
<div class="col-md-10">	</div>


<div class="col-md-4">				
  <label for="formations"> Formations : </label>
</div> 	
<div class="col-md-2">			
   <select name="formations" id="formations" type="select" multiple size="4">
                      <option value="tout">Tout</option>
                      <option value="air">AIR</option>
                      <option value="enera">ENERA</option>
                      <option value="gp">Génie des procédés</option>
                      <option value="info">Informatique</option>
                      <option value="isb">Ingénierie de la Santé Biomatériaux</option>
                      <option value="3ir">Ingénierie et Innovation en Images et Réseaux</option>
                      <option value="macs">MACS</option>
                      <option value="maths">Mathématiques</option>
                      <option value="psm">Physique en Sciences des Matériaux</option>
                      <option value="tr">Télécomunications et Réseaux</option>
                    </select> <span class="require"> * </span> <br/>
         </div>
<div class="col-md-10">	</div>


</div>

<div class="col-md-3">	
          <textarea class="input-lg" id="com" name="com">
            Votre commentaire ici...
          </textarea> <br/>
	</div>		
										  





				
				<div class="col-md-12">	</div>			

				
				<div class="col-md-4">				
<label class="row" for="groupe">Groupe : </label>
 <label  class="row" for="codeP">Code postal : </label>
<label class="row" for="groupe">Groupe : </label>

</div> 	
<div class="col-md-2">			
	<input type="text" id="groupe" name="groupe" placeholder="Groupe" /> <br/>
</div>
<div class="col-md-10">	</div>			
				
				
				
				
	
             
            
     

     
      </fieldset>

				


  
	  
	  <div class="col-md-4">	

	
      <fieldset class="fieldsetFloat">
       <legend> Contact Principal </legend>
          <label for="civiliteCP">Civilite :</label><input type="radio" name="civiliteCP" />Monsieur <input type="radio" name="civiliteCP" />Madame <span class="require"> * </span><br />
          <label for="nomCP">Nom : </label><input type="text" id ="nomCP" name="nomCP" required="true"/> <span class="require"> * </span><br/>
          <label for="prenomCP">Prenom : </label><input type="text" id ="prenomCP" name="prenomCP" /><br/>
          <label for="fonctionCP">Fonction : </label><input type="text" id="fonctionCP" name="fonctionCP" required="true"/><span class="require"> * </span><br/>
          <label for="telCP">Numéro de téléphone : </label><input type="tel" id="telCP" pattern="[0-9]{10}" name="telCP"/><br/>
          <label for="email">Email : </label><input type="email" id="email" name="email" /><br/>

      </fieldset>
	</div>
	  
	  	  <div class="col-md-4">	


     <fieldset class="fieldsetFloat">
      <legend> Contact Secondaire </legend>
          <label for="civiliteCS">Civilite :</label><input type="radio" name="civiliteCS" />Monsieur <input type="radio" name="civiliteCS" />Madame <span class="require"> * </span><br />
          <label for="nomCS">Nom : </label><input type="text" id ="nomCS" name="nomCS" required="true"/> <span class="require"> * </span><br/>
          <label for="prenomCS">Prenom : </label><input type="text" id ="prenomCS" name="prenomCS" /><br/>
          <label for="fonctionCS">Fonction : </label><input type="text" id="fonctionCS" name="fonctionCS" required="true"/><span class="require"> * </span><br/>
          <label for="telCS">Numéro de téléphone : </label><input type="tel" id="telCS" pattern="[0-9]{10}" name="telCS"/><br/>
          <label for="email">Email : </label><input type="email" id="email" name="email" /><br/>
      </fieldset>
	</div>
	  
	  
	  	  <div class="col-md-4">	


     <fieldset >
      <legend> Contact TA-LR </legend>
          <label for="civiliteTA">Civilite :</label><input type="radio" name="civiliteTA" />Monsieur <input type="radio" name="civiliteTA" />Madame <span class="require"> * </span><br />
          <label for="nomTA">Nom : </label><input type="text" id ="nomTA" name="nomTA" required="true"/> <span class="require"> * </span><br/>
          <label for="prenomTA">Prenom : </label><input type="text" id ="prenomTA" name="prenomTA" /><br/>
          <label for="fonctionTA">Fonction : </label><input type="text" id="fonctionTA" name="fonctionTA" required="true"/><span class="require"> * </span><br/>
          <label for="telTA">Numéro de téléphone : </label><input type="tel" id="telTA" pattern="[0-9]{10}" name="telTA"/><br/>
          <label for="email">Email : </label><input type="email" id="email" name="email" /><br/>
      </fieldset>
</div>
	  	  <div class="col-md-4">	

     <fieldset>
        <legend> Origine et type </legend>
                 <label for="orgineContact"> Origine du contact : </label>
                                <select name="origineContact" id="origineContact" type="select" multiple size="4">
                                  <option value="aisg">AISG</option>
                                  <option value="aimg">AMIG</option>
                                  <option value="cavam">CAVAM</option>
                                  <option value="cedip">CEDIP</option>
                                  <option value="corpsPeda">Corps Pédagogique</option>
                                  <option value="dig">Direction Institut Galilée</option>
                                  <option value="dsg">Direction Sup Galilée</option>
                                  <option value="estEns">Est Ensemble</option>
                                  <option value="mecig">Membre exterieur Conseil Institu Galilée</option>
                                  <option value="meCAsg">Membre exterieur CA Sup Galilée</option>
                                  <option value="pc">Plaine Commune</option>
                                  <option value="presidence">Présidence</option>
                                  <option value="rp">Responsable pédagogique</option>
                                  <option value="scuio">SCUIO-IP</option>
                                  <option value="sre">SRE</option>
                                </select> <br/>

                          
                  <label for="typeContact"> Type de contact : </label>
                  <input type="radio" name="typeContact" />Entreprise
                  <input type="radio" name="typeContact" />Personne
                  <input type="radio" name="typeContact" />Collectivité territoriale 
                  <input type="radio" name="typeContact" />Communauté d'agglomérations<br />
     </fieldset>


       <p>
       <input type="submit" value="Envoyer" />
       <input type="reset" value="Annuler" />
       </p>

      </form>
	  
	 

	
	  
	  
	  
	  
	  
	  
	  
	  
									<form class="bs-example bs-example-form" data-example-id="simple-input-groups">
									<div class="input-group input-group-lg">
									  <span class="input-group-addon" id="sizing-addon1">@</span>
									  <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon1">
									</div>


									<div class="input-group">
									  <span class="input-group-addon" id="sizing-addon2">@</span>
									  <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon2">
									</div>

									<div class="input-group input-group-sm">
									  <span class="input-group-addon" id="sizing-addon3">@</span>
									  <input type="text" class="form-control" placeholder="Username" aria-describedby="sizing-addon3">
									</div>

									</form>

									<div class="panel panel-primary">...</div>
									<div class="panel panel-success">...</div>
									<div class="panel panel-info">...</div>
									<div class="panel panel-warning">...</div>
									<div class="panel panel-danger">...</div>

									<div class="panel panel-default">
									  <div class="panel-heading">Panel heading without title</div>
									  <div class="panel-body">
										Panel content
									  </div>
									</div>
									<div class="row">
									  <div class="col-md-1">.col-md-1</div>
									  <div class="col-md-1">.col-md-1</div>
									  <div class="col-md-1">.col-md-1</div>
									  <div class="col-md-1">.col-md-1</div>
									  <div class="col-md-1">.col-md-1</div>
									  <div class="col-md-1">.col-md-1</div>
									  <div class="col-md-1">.col-md-1</div>
									  <div class="col-md-1">.col-md-1</div>
									  <div class="col-md-1">.col-md-1</div>
									  <div class="col-md-1">.col-md-1</div>
									  <div class="col-md-1">.col-md-1</div>
									  <div class="col-md-1">.col-md-1</div>
									</div>
									<div class="row">
									  <div class="col-md-8">.col-md-8 
									  <div class="col-md-4">.col-md-4</div>
									</div>
									<div class="row">
									  <div class="col-md-4">.col-md-4</div>
									 col-md-4
									  <div class="col-md-4">.col-md-4</div>
									</div>
									<div class="row">
									  <div class="col-md-6">.col-md-6</div>
									  <div class="col-md-6">.col-md-6</div>
									</div>

									
									
			 </div> 	 <div class="col-md-2"> </div>						
			   </div></div>
									</div></div> </div>						
  </body>
</html>
