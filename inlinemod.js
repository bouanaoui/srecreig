$(document).ready(function() 
{
    $('#export').click(function(e) {
    	alert('export');
        //getting values of current time for generating the file name
        var dt = new Date();
        var day = dt.getDate();
        var month = dt.getMonth() + 1;
        var year = dt.getFullYear();
        var hour = dt.getHours();
        var mins = dt.getMinutes();
        var postfix = day + "." + month + "." + year + "_" + hour + "." + mins;
        //creating a temporary HTML link element (they support setting file names)
        var a = document.createElement('a');
        //getting data from our div that contains the HTML table
        var data_type = 'data:application/vnd.ms-excel';
        var table_div = document.getElementById('Entreprise');
        var table_html = table_div.outerHTML.replace(/ /g, '%20');
        a.href = data_type + ', ' + table_html;
        //setting the file name
        a.download = 'exported_table_' + postfix + '.xls';
        //triggering the function
        a.click();
        //just in case, prevent default behaviour
        e.preventDefault();
    });
});

function niveau(i)
{
	var indice = parseInt(i);
	$($("#Entreprise >thead >tr >th:nth-child("+indice+")")).css('display','none');
	$($("#Entreprise >tbody >tr >td:nth-child("+indice+")")).css('display','none');
}


//Fonction renvoyant le code de la touche appuyée lors d'un événement clavier
function getKeyCode(evenement)
{
    for (prop in evenement)
    {
        if(prop == 'which')
        {
            return evenement.which;
        }
    }

    return event.keyCode;
}


//Suppression des espaces/sauts de ligne inutiles (http://www.breakingpar.com/bkp/home.nsf/0/87256B280015193F87256C0C0062AC78)
function trim(value) {
   var temp = value;
   var obj = /^(\s*)([\W\w]*)(\b\s*$)/;
   if (obj.test(temp)) { temp = temp.replace(obj, '$2'); }
   var obj = /  /g;
   while (temp.match(obj)) { temp = temp.replace(obj, " "); }
   return temp;
}

//Fonction donnant la largeur en pixels du texte donné (merci SpaceFrog !)
function getTextWidth(texte)
{
	//Valeur par défaut : 150 pixels
	var largeur = 150;

	if(trim(texte) == "")
	{
		return largeur;
	}

	//Création d'un span caché que l'on "mesurera"
	var span = document.createElement("span");
	span.style.visibility = "hidden";
	span.style.position = "absolute";

	//Ajout du texte dans le span puis du span dans le corps de la page
	span.appendChild(document.createTextNode(texte));
	document.getElementsByTagName("body")[0].appendChild(span);

	//Largeur du texte
	largeur = span.offsetWidth;

	//Suppression du span
	document.getElementsByTagName("body")[0].removeChild(span);
	span = null;

	return largeur;
}


//Fonction renvoyant une valeur "aléatoire" pour forcer le navigateur (ie...)
//à envoyer la requête de mise à jour
function ieTrick(sep)
{
	d = new Date();
	trick = d.getYear() + "ie" + d.getMonth() + "t" + d.getDate() + "r" + d.getHours() + "i" + d.getMinutes() + "c" + d.getSeconds() + "k" + d.getMilliseconds();

	if (sep != "?")
	{
		sep = "&";
	}

	return sep + "ietrick=" + trick;
}

//On ne pourra éditer qu'une valeur à la fois
var editionEnCours = false;

//variable évitant une seconde sauvegarde lors de la suppression de l'input
var sauve = false;

//Fonction de modification inline de l'élément double-cliqué
function inlineMod(nomEntreprise, obj, nomValeur, type)
{

	// alert(nomEntreprise.id.split("_")[0],nomValeur,type);
	nomTable=nomEntreprise.id.split("_")[0];
	nomCle=nomEntreprise.id.split("_")[1];
	valCle=nomEntreprise.id.split("_")[2];
	nomChamp=nomEntreprise.id.split("_")[3];

	// alert('inline mode recoit'+nomTable+" "+nomCle+" "+valCle+" "+nomChamp);
	// alert('inline mode recoit'+nomCle);
	// alert('inline mode recoit'+valCle);
	// alert('inline mode recoit'+nomChamp);


	if(editionEnCours)
	{
		return false;
	}
	else
	{
		editionEnCours = true;
		sauve = false;
	}
	//Objet servant à l'édition de la valeur dans la page
	var input = null;

	//On crée un composant différent selon le type de la valeur à modifier
	switch(type)
	{
		//Valeur de type texte ou nombre
		case "texte":
			input = document.createElement("input");
			break;
		case "nombre":
			input = document.createElement("input");
			break;

		//Valeur de type texte multilignes
		case  "texte-multi":
			input = document.createElement("textarea");
			break;
		default:
			alert("new case");
			break;
	}

	//Assignation de la valeur
	if (obj.innerText)
		input.value = obj.innerText;
	else
		input.value = obj.textContent;
		
	input.value = trim(input.value);

	//On lui donne une taille un peu plus large que le texte à modifier
	input.style.width  = getTextWidth(input.value) + 30 + "px";

	//Remplacement du texte par notre objet input
	obj.replaceChild(input, obj.firstChild);

	//On donne le focus à l'input et on sélectionne le texte qu'il contient
	input.focus();
	input.select();

	//Assignation des deux événements qui déclencheront la sauvegarde de la valeur

	//Sortie de l'input
	input.onblur = function sortir()
	{
		//alert('Avant appel a sauverMod '+nomTable+' '+nomCle+' '+valCle+' '+nomChamp+' '+input.value+' '+type);
		sauverMod(nomTable,nomCle,valCle,nomChamp,input.value, type,obj);
		delete input;
	};

	//Appui sur la touche Entrée
	input.onkeydown = function keyDown(event)
	{
        if (!event&&window.event)
        {
            event = window.event;
        }
		if(getKeyCode(event) == 13)
        {
	// nomTable=nomEntreprise.id.split("_")[0];
	// nomCle=nomEntreprise.id.split("_")[1];
	// valCle=nomEntreprise.id.split("_")[2];
	// nomChamp=nomEntreprise.id.split("_")[3];
			sauverMod(nomTable,nomCle,valCle,nomChamp,input.value, type,obj);
			delete input;
		}
	};
}


function sauverMod(nomTable,nomCle,valCle,nomChamp,valeur, type,obj)
{
	// alert("sauverMod a recu"+' '+nomTable+' '+nomCle+' '+valCle+' '+nomChamp+' '+valeur+' '+type);
	if(sauve)
	{
		return false;
	}
	else
	{
		sauve = true;		
	}
	$.ajax({
	// XHR.open("POST", "sauverMod.php?nomEntreprise=" + nomEntreprise + "&champ=" + nomValeur + "&valeur=" + escape(valeur) + "&type=" + type + ieTrick(), true);
	  type: "POST",
	  url: "sauverMod.php",
	  data: {INTITULE_TABLE:nomTable,CLE_PRIMAIRE_INTITULE:nomCle,CLE_PRIMAIRE_VALEUR:valCle,CHAMP_INTITULE:nomChamp,CHAMP_VALEUR:valeur,TYPE:type}
	})
	  .done(function( msg ) {
	    // alert( "Data Saved: " + msg );
	    
	    	editionEnCours = false;
	    	// alert('OK');
			//Remplacement de l'input par le texte qu'il contient
			obj.replaceChild(document.createTextNode(valeur), obj.firstChild);
	  });
}