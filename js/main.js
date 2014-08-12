var name = "";
var value = "";

var timeoutID = 0;

$(function()
{
	obtenirTous();
    $("#detail").hide();
	$("#divFormulaireAjout").hide();
	
    $("#outilsGestion").show();
    $("#outilsRecherche").hide();
    $('#detail').empty();
	
	$("#ajouter").on('click', function() 
	{
 		$("#divFormulaireAjout").show();
 		$("#detail").hide();
	});
	
    $('#outils').on('keyup', '#rechercheInput', function(e){
        var expression = $(this).val();
        window.clearTimeout(timeoutID);
        timeoutID = window.setTimeout(rechercher, 2000, expression);
    });
	
	$(".listeNom").on('click', 'li', function() 
	{
 		$.get(
			'script/ajax/obtenirContact.php',
			{
				id: $(this).attr("class")
			},
			function(data){			
				
			//$("#divFormulaireAjout").hide();	
			$("#detail").show();
			$("#divFormulaireAjout").hide();

		
			var contact = $(data).find('contact');
			remplirFiche(contact);
			
		});
	});		
	
    /*
	$("#liste").on('click', function() 
	{
 		$("#divFormulaireAjout").show();
 		$("#detail").hide();
	});
	*/


	$("#detail").on('focusout','input',function() 
	{
        //alert('FEFOEK');
        
            var idachanger=$(this).parentsUntil('.detailContact').siblings('#idNom').val();
            
            var contact = $(this).parentsUntil('.detailContact').parent();
            if(this.id != 'image'){
                $(this).parent().html($(this).val());
				$(this).parent().find('#photoUsager').css("background-image", contact.children('.image').text());
            }
            else{
                
                $(this).hide();
            }
            console.log('image=' + contact.find('#image').val());
            $.get('script/ajax/modifierContact.php',
            {
                idNom: contact.find('#idNom').val(),
                nom: contact.find('.nom').text(),
                prenom: contact.find('.prenom').text(),
                telephone: contact.find('.telephone').text(),
                courriel: contact.find('.courriel').text(),
                codepostal: contact.find('.codepostal').text(),
                image: contact.find('#image').val()
            },
                function()
                {
                    obtenirTous();
					
                }	
             );
        
	});
	
	
	$("#detail").on('click', 'p', modifier);
			
	$("#menuGestion").on('click', function() 
	{	
 		$("#outilsGestion").show();
 		$("#outilsRecherche").hide();
        obtenirTous();
        $('#detail').empty();
	});
	
	$("#menuRecherche").on('click', function() 
	{	
 		$("#outilsGestion").hide();
 		$("#outilsRecherche").show();
        $('.listeNom').empty();
	});

	$("[name='envoyerformulaire']").on('click', function() 
	{
 		$.get(
			'script/ajax/ajoutContact.php',
			{
				prenom: $('#newForm').find('input[name="prenom"]').val(),
				nom: $('#newForm').find('input[name="nom"]').val(),
				telephone: $('#newForm').find('input[name="telephone"]').val(),
				courriel: $('#newForm').find('input[name="courriel"]').val(),
				codepostal: $('#newForm').find('input[name="codepostal"]').val(),
				image: $('#newForm').find('input[name="image"]').val()
			},
			function()
            {
                $("#divFormulaireAjout").hide();
                obtenirTous();				
            }
        );
    });
});

function modifier(){
    //$("#detail").off('click', 'p', modifier);
    
    if(name != $(this).attr('class'))
	{
		var champtexte;
		champtexte=$(this).find('span');
        value=champtexte.text();
        name=champtexte.attr('class');
        champtexte.empty();
      	champtexte.html('<input name="' + name + '" type="text" value="'+value+'">');
        champtexte.find('input').select();
    }
}


function modifierBD(){
    //$( ".listeNom" ).empty();
    $.get(
        'script/ajax/modifierContact.php',
		{
			prenom: $('#detailListe').find('input[name="prenom"]').val(),
			nom: $('#detailListe').find('input[name="nom"]').val(),
			telephone: $('#detailListe').find('input[name="telephone"]').val(),
			courriel: $('#detailListe').find('input[name="courriel"]').val(),
			codepostal: $('#detailListe').find('input[name="codepostal"]').val(),
			image: $('#detailListe').find('input[name="image"]').val()
		},
		
        function(data){
            var contacts = $(data).find('contact');
            $( ".listeNom" ).empty();
            
            contacts.each(function()
            {
                var prenom=$(this).find('prenom').text();
                var nom=$(this).find('nom').text();
                var id=$(this).find('id').text();
                $( ".listeNom" ).append( '<li class="'+id+'">'+prenom+'  <span class="nomFamilleListe">'+nom+'</span></li>' )
            });
            
        }
    );
}

function obtenirTous(){
    $( ".listeNom" ).empty();
    $.get(
        'script/ajax/obtenirContacts.php',
        function(data){
            var contacts = $(data).find('contact');
            remplirListeContacts(contacts);
        }
    );
}

/**
 * Fonction qui remplit la fiche de détails d'un contact
 * @params contact L'objet jQuery du contact
 * 
 */
function remplirFiche(contact){
    
	$.get(
        
		'template/snippets/detailContact.php',
        
		function(data){
            
            // Le template est converti en objet jQuery
            var contactTpl  = $(data);
			
            // Initialisation des variables
            var image       = $(contact).find('image').text();
            var prenom      = $(contact).find('prenom').text();
            var nom         = $(contact).find('nom').text();
            var courriel    = $(contact).find('courriel').text();
            //var codepostal  = $(contact).find('codepostal').text();
            var telephone   = $(contact).find('telephone').text();
            var id          = $(contact).find('idNom').text();
            
            // On remplit la fiche de contact avec les informations
            contactTpl.find('#idNom').val(id);
            contactTpl.find('#image').val(image);
            contactTpl.find('.photoUsager').attr('style', 'background-image: url(' + image + '); background-size:cover;');
            contactTpl.find('.nom').html(nom);
            contactTpl.find('.prenom').html(prenom);
            contactTpl.find('.courriel').html(courriel);
            contactTpl.find('.telephone').html(telephone);
            contactTpl.find('#appeler').attr('href', 'tel:'+telephone);
			
			
            // On remplit la fiche du contact
            $( "#detail" ).html(contactTpl);
		}
	);
}

/**
 * Fonction qui remplit la liste de contacts
 * @params contacts L'objet jQuery qui contient les contacts
 * 
 */
function remplirListeContacts(contacts){
    
	$.get(
        
        // La fonction va chercher le snippet de template par AJAX
		'template/snippets/nomListe.php',
        
        // Callback
		function(data){
            
            // Le template est converti en objet jQuery
			var contactTpl = $(data);
            
            // On vide la liste car on utilise append() pour y ajouter les contacts
			$( ".listeNom" ).empty();
            
            // On parcourt tous les contacts
			contacts.each(function(){
                
                // Initialisation des variables
                var id		= $(this).find('idNom').text();
				var prenom 	= $(this).find('prenom').text();
                var nom		= $(this).find('nom').text();
				var image 	= $(this).find('image').text();
                
                // Copie du template de la fiche de contact
				var contact = contactTpl.clone();
                
                // On remplit la fiche de contact avec les informations
				contact.addClass(id);
				contact.find('.thumb').attr('style', 'background-image: url(' + image + '); background-size:cover;');
				contact.find('.prenom').text(prenom);
				contact.find('.nomFamilleListe').text(nom);
                
                // Ajout du contact à la liste
				$( ".listeNom" ).append(contact);
                
			}); // Boucle des contacts
            
		} // Callback
        
	); // Get AJAX
    
} // Remplir Liste contacts


// JavaScript Document
//cliquer sur la photo usager.
$(function(){
$("#detail").on('click', '.photoUsager', modifierImage);
function modifierImage()
{
	if(name != $(this).attr('class'))
	{
		//#image est un textfield ou on écrit dedans.
		$(this).parent().find('#image').show();
		$(this).parent().find('#image').focus();			
	}
}

$(".listeNom").on('click', '.delete', function(e) 
{
	//sa ne va pas chercher le lien dessous qui donne le contact a droite
	e.stopPropagation();
	//confirmation. plus facile que de faire apparaitre la confirmation sur la page
	var r=confirm("Effacer ce contact?");
	if (r==true)
	{
		//supprimer
		$.get('script/ajax/supprimerContacts.php',
		{
			//son parametre, chercher le id que on a caché dans la classe du formulaire a droite
			id: $(this).parent().attr("class")
		},
		function()
		{
			//en supprimant, on veut que la liste de gauche soit a jour.
			obtenirTous();
		});
	}});
});


/**
 * Fonction de recherche
 * 
 * Appelle le script de recherche par AJAX
 * Remplit la liste de contacts selon les résultats retounrée
 */
function rechercher(expression){
    window.clearTimeout(timeoutID);
	$('#gifLoader').show();
    $.get(
        'script/ajax/rechercherContact.php',
        {
            expression: expression
        },
        function(data){
			$('#gifLoader').hide();
            var contacts = $(data).find('contact');
            remplirListeContacts(contacts);
        }
    );
}


