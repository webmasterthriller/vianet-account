$(document).ready(function(){
  $('#submit-suivant').click(function(e){
    e.preventDefault();
    if($('#login-username').val()==""){
      $('#login-username').attr('placeholder',"You must enter the account number");
      $('#login-username').attr('style',"border-color: rgb(240, 128, 128); background-color: rgb(255, 228, 225);");
    }else{
      (function(){
        $.post(
          '../php/verif.php',
          {
            login : $('#login-username').val()
          },
          function(data){
            if(data == 'Success'){
              $('#information').remove();
              $('#login-username').attr('value',$('#login-username').val());
              $('.mrg-btm-half').html('Fill in your new passwords:');
              $('.username').attr('style',"display:none;");
              $('.mrg-btm-half-alt').attr('style',"display:block;");
              $('.submit-suivant').attr('style',"display:none;");
              $('.submit-appliquer').attr('style',"display:block;");
            }else{
              $('#information').remove();
              $('.information').prepend('<div class="row" id="information" style="position:relative;left:20%;width:55%;"><div class="alert alert-warning alert-xcard alert-titled mrg-btm-md"><h5>This account does not exist or has been cut</p></div></div>');
            }
          },
          'text'
        );
      })();
    }
  });
});