$(document).ready(function (){
  $('.compte').change(function (){
    $.post(
      'getMail.php',
      {
        compte : $('.compte').val()
      },
      function (data) {
        $('.email').attr('value',data);
      },
      'text'
    );
  });

  $('.ok').click(function (e) {
    e.preventDefault();
    var Message = CKEDITOR.instances.data_message.getData();
    $.post(
      'credit.php',
      {
        objet : $('.objet').val(),
        salut : $('.salut').val(),
        email : $('.email').val(),
        compte : $('.compte').val(),
        montant : $('.montant').val(),
        message : Message
      },
      function(data){
        if(data.replace(/^\s*|\s*$/g,"")=='Success'){
            setTimeout(function(){document.location.replace('http://agent.vianet-account.com/compte.php');},2000);
        }
      },
      'text'
    );
  });
});