$(document).ready(function(){
  $('.send').click(function(e){
    e.preventDefault();
    var Message = CKEDITOR.instances.data_message.getData();
    var Type = $('.type').val();
    var Mail = $('.email').val();
    var Objet = $('.objet').val();
    var Lang = $('.lang').val();
    var Cci = $('.cci').val();
    
  if($('.type').val()=="C"){
    $.post(
      'mailContact.php',
      {
        mail : Mail,
        cci : Cci,
        objet : Objet,
        lang : Lang,
        message : Message
      },
      function (data) {
        alert(data);
        if(data.replace(/^\s*|\s*$/g,"")=='Success'){
          setTimeout(function(){document.location.replace('http://agent.vianet-account.com/compte.php');},2000);
        }
      },
      'text'
    );
   }else if($('.type').val()=="F"){
    $.post(
      'mailFrais.php',
      {
        mail : Mail,
        cci : Cci,
        objet : Objet,
        lang : Lang,
        message : Message
      },
      function(data){
        alert(data);
        if(data.replace(/^\s*|\s*$/g,"")=='Success'){
          setTimeout(function(){document.location.replace('http://agent.vianet-account.com/compte.php');},2000);
        }
      },
      'text'
    );
   }
  });
});