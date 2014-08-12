var timeoutID = 0;

$(function(){
    $('#outils').on('keyup', '#rechercheInput', function(e){
        var expression = $(this).val();
        window.clearTimeout(timeoutID);
        timeoutID = window.setTimeout(rechercher, 2000, expression);
    });
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


