$(document).ready(function () {
	
		$.post(
			'../php/check.php',
			{
				user : $('#user').val()
			},
			function (data) {
				if(data=="Hist"){
					$('.historique').attr('style',"display:block;");
					$('.transfert-form').attr('style',"display:none;");
				}else if(data=="Form"){
					$('.transfert-form').attr('style',"display:block;"); 
					$('.historique').attr('style',"display:none;");
				}
			},
			'text'
		);	
	
});