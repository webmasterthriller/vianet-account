$(document).ready(function(){
          $('.send').click(function(e){
            e.preventDefault();
            if($('.email').val()===""||$('.raison').val()===""||$('.message').val()===""){
              
              if($('.email').val()===""){
                $('.email').attr('placeholder',"You must put your email.");
                $('.email').attr('style',"background-color:#ffe4e1;");
              }else{
                $('.email').attr('style',"");
              }

              if($('.raison').val()===""){
                $('.raison').attr('placeholder',"You must put the reason for your contact.");
                $('.raison').attr('style',"background-color:#ffe4e1;");
              }else{
                $('.raison').attr('style',"");
              }

              if($('.message').val()===""){
                $('.message').attr('placeholder',"You must put the reason for your contact.");
                $('.message').attr('style',"background-color:#ffe4e1;");
              }else{
                $('.message').attr('style',"");
              }
            }else{
              $.post(
                'mailContact.php',
                {
                  mail : $('.email').val(),
                  raison : $('.raison').val(),
                  message : $('.message').val()
                },
                function (data) {
                 if(data.replace(/^\s*|\s*$/g,"")=='Success'){
                  window.location="compte.php";
                 }else{
                  alert(data);
                 }
                },
                'text'
              );
            }
          });
          $('.cancel').click(function(e){
            e.preventDefault();
            window.location="compte.php";
          });
        });