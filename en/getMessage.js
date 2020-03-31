$(document).ready(function (){
	$('.lire').click(function () {
		$.post(
			'getMessage.php',
			{
				id : $(this).attr('id')
			},
			function (data) {
				$('.table').fadeOut();
				$('.contain-table').append(data);
			},
			'html'
		);
	});
});