$(document).ready(function(){
  $('#submit-appliquer').click(function(e){
    e.preventDefault();
    if($('#login-password').val()==="" || $('#login-password2').val()==="" || $('#login-password').val()!=$('#login-password2').val()){
      if($('#login-password').val()==="") {
        $('#login-password').attr('placeholder',"You must enter a password");
        $('#login-password').attr('style',"border-color: rgb(240, 128, 128); background-color: rgb(255, 228, 225);");
      }
      if($('#login-password2').val()===""){
        $('#login-password2').attr('placeholder',"You must confirm the password");
        $('#login-password2').attr('style',"border-color: rgb(240, 128, 128); background-color: rgb(255, 228, 225);");
      }
      if($('#login-password').val()!=$('#login-password2').val()){
        $('#information').remove();
        $('.information').prepend('<div class="row" id="information" style="position:relative;left:20%;width:55%;"><div class="alert alert-warning alert-xcard alert-titled mrg-btm-md"><h5>Passwords are not the same. Try again !!!</p></div></div>');
      }
    }else{
      (function(){
        $.post(
          '../php/changeLogin.php',
          {
            login : $('#login-username').attr('value'),
            password : $('#login-password').val()
          },
          function(data){
            if(data == 'Success'){
              $('#login').hide();
              $('.col-card-image-sibling').prepend('<div class="well well-primary"><p class="mrg-btm-half">password changed. You can connect now.</p></div>');
              setTimeout(function (){document.location.replace('../en');},2000);
            }
          },
          'text'
        );
      })();
    }
  });
});
