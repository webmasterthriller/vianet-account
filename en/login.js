$(document).ready(function(){
  $('#submit-button').click(function(e){
    
    e.preventDefault();
    if($('#login-username').val()=="" || $('#login-password').val()==""){
      if($('#login-username').val()==""){
        $('#login-username').attr('placeholder',"Required identifier");
        $('#login-username').attr('style',"background-color:#ffe4e1;");
      }
      if($('#login-password').val()==""){ 
        $('#login-password').attr('placeholder',"Password required");
        $('#login-password').attr('style',"background-color:#ffe4e1;");
      }
    }else{
      $.post(
        '../php/login.php',
        {
          login : $('#login-username').val(),
          password : $('#login-password').val()
        },
        function(data){
          if(data == 'Success'){
            document.location.replace('compte.php');
          }else{
            $('#information').remove();
            $('.information').prepend('<div class="row" id="information"><div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12"><div class="alert alert-warning alert-xcard alert-titled mrg-btm-md"><h5>The authentication information is not correct.</h5><p class="mrg-btm-none">Check that you have entered the account number or password</p></div></div></div>');
          }
        },
        'text'
      );
    }
  }); 
});