$(function(){
    
    //window.alert('test');
    $.get(
        'script/ajax/obtenirContacts.php',
        function(data){
           // console.log($(data).find('contact'));
			
			// $('.listeContacts .listeNom').append($(data));
			var contacts = $(data).find('contact');
			 
			//console.log(data);

			contacts.each(function(){
			//alert(this);		
			
			var prenom=$(this).find('prenom').text();
			var nom=$(this).find('nom').text();
			var id=$(this).find('id').text();
			
			$( ".listeNom" ).append( '<li class="'+id+'"> <p>'+prenom+'  <span class="nomFamilleListe">'+nom+'</span></li>' )
			
			});
                //       <li> <p>Jonathan <span class="nomFamilleListe"> Desmeules</span> </li>
        }
    );
	$( "p" ).click(function() {
  $( this ).slideUp();
});
	/*
	$("li").click(function() 
	{
 	alert('MASDASD');});
	/*	$.get(
			'script/ajax/obtenirContact.php',
			{
				id: 1
			},
			function(data){
				*/
				//   console.log(data);
				/*	var contacts = $(data).find('contact');
					 
					//console.log(data);
		
					contacts.each(function(){
					//alert(this);		
					
					var prenom=$(this).find('prenom').text();
					/*var nom=$(this).find('nom').text();
					var nom=$(this).find('nom').text();
					var nom=$(this).find('nom').text();
					var id=$(this).find('id').text();*/
					
					
					
					//$( ".detail" ).append( '<li class'+id+'> <p>'+prenom+'  <span class="nomFamilleListe">'+nom+'</span></li>' )
					
					//});
				 
				 
				 
					//<li> <p>Jonathan <span class="nomFamilleListe"> Desmeules</span> </li>
	 
			//});
	// });
    
})