$('document').ready(function(){
	$('#registrate').click(function (e){
		
		e.preventDefault();

		if ($('#civilite').val()==="" || $('.firstname').val()==="" || $('.lastname').val()==="" ||$('#address-line1').val()==="" || $('#address-postCode').val()==="" || $('#address-city').val()==="") {

			if($('#civilite').val()===""){
				$('.errCivilite').html('!');
			}else{
				$('.errCivilite').html('');
			}

			if($('.firstname').val()===""){
				$('.errFirstname').html('!');
			}else{
				$('.errFirstname').html('');
			}

			if($('.lastname').val()===""){
				$('.errLastname').html('!');
			}else{
				$('.errLastname').html('');
			}

			if($('#address-line1').val()===""){
				$('.errAdress').html('!');
			}else{
				$('.errAdress').html('');
			}

			if($('#address-postCode').val()==="" || $('#address-city').val()===""){
				$('.errLocal').html('!');
			}else{
				$('.errLocal').html('');
			}

			if($('#address-countryCode').val()===""){
				$('.errPays').html('!');
			}else{
				$('.errPays').html('');
			}

			if($('#Prefix').val()==="" || $('#Number').val()===""){
				$('.errNumero').html('!');
			}else{
				$('.errNumero').html('');
			}

			if($('#emailaddress-email').val()===""){
				$('.errMail').html('!');
			}else{
				$('.errMail').html('');
			}

		}else{
			var Devise = "";
			if($('#address-countryCode').val()=="CA"){
				Devise = "CAD";
			}else if ($('#address-countryCode').val()=="CH"){
				Devise = "CHF";
			}else{
				Devise = "EUR"
			}
			$.post(
				'registrate.php',
				{
					civilite : $('#civilite').val(),
					prenom : $('.firstname').val(),  
					nom : $('.lastname').val(),  
					adresse : $('#address-line1').val(),
					postal : $('#address-postCode').val(),
					ville : $('#address-city').val(),
					phone : $('#Prefix').val()+$('#Number').val(),
					mail : $('#emailaddress-email').val(),
					pays : $('#address-countryCode').val(),
					devise : Devise
				},
				function(data){
					if(data!==null){
						setTimeout(function() {
							$.post(
								'mailActivation.php',
								{
									compte : data,
									civilite : $('#civilite').val(),
									prenom : $('.firstname').val(),  
									nom : $('.lastname').val(),  
									mail : $('#emailaddress-email').val()
								},
								function(resp){
                                    if(resp.replace(/^\s*|\s*$/g,"")=='Success'){
                                        document.location.replace('../en');    
                                    }
								},
								'text'
							);
						},2000);

					}
				},
				'text'
			);
		}
	});
});