$(document).ready(function(){
  var ibanTransit = "";
  var swiftInstitut = "";

  $('.address').change(function(){// selection de position la banque
    if ($('.address').val()=="ST"){
      $('.occident').hide();
      $('.standard').show();
    }
    if($('.address').val()=="OC"){
      $('.occident').show();
      $('.standard').hide();
    }
  });

  $('.ok').click(function(e){
    e.preventDefault();
    for(var i = 0; i < 2; i++) {
      if($('.address').val()=="ST"){
        ibanTransit=$('.iban').val();
        swiftInstitut=$('.swift').val();
      }
      if($('.address').val()=="OC"){
        ibanTransit=$('.transit').val();
        swiftInstitut=$('.institut').val();
      }
    }

    if($('.raison').val()==="" || $('.address').val()==="" || $('.compte').val()==="" || $('.montant').val()==="" || ibanTransit==="" || swiftInstitut===""){
      
      if ($('.address').val()==="") {
        $('.requireAddress').html('Choose location');
      }else{
        $('.requireAddress').empty();
      }

      if ($('.raison').val()==="") {
        $('.requireRaison').html('name of the bank required');
      }else{
         $('.requireRaison').empty();
      }

      for(i = 0; i < 2; i++) {
        if($('.address').val()=="ST"){
          if ($('.iban').val()==="") {
            $('.iban').attr('placeholder',"Enter the IBAN of the beneficiary account in the format [FR35XXXXXXXXXXXXXXXX25]");
            $('.iban').attr('style',"background-color:#ffe4e1;");
          }else{
            $('.iban').attr('style',"");
          }

          if ($('.swift').val()==="") {
            $('.swift').attr('placeholder',"Enter the SWIFT of the bank of the beneficiary account");
            $('.swift').attr('style',"background-color:#ffe4e1;");
          }else{
            $('.swift').attr('style',"");
          }
        }
        if($('.address').val()=="OC"){
          if ($('.transit').val()===""){
            $('.transit').attr('placeholder',"Enter the transit number of the beneficiary account");
            $('.transit').attr('style',"background-color:#ffe4e1;");
          }else{
            $('.transit').attr('style',"");
          }
          if ($('.institut').val()==="") {
            $('.institut').attr('placeholder',"Enter the institute number of the beneficiary account");
            $('.institut').attr('style',"background-color:#ffe4e1;");
          }else{
            $('.institut').attr('style',"");
          }
        }
      }

      if ($('.compte').val()==="") {
        $('.compte').attr('placeholder',"Enter the beneficiary account");
        $('.compte').attr('style',"background-color:#ffe4e1;");
      }else{
         $('.compte').attr('style',"");
      }

      if ($('.montant').val()==="") {
        $('.montant').attr('placeholder',"Enter the amount to transfer");
        $('.montant').attr('style',"background-color:#ffe4e1;");
      }else{
        $('.montant').attr('style',"");
      }
    }else{
      $.post(
        '../php/transfert.php',
        {
          login : $('#user').val(),
          address : $('.address').val(),
          raison : $('.raison').val(),
          ibanTransit : ibanTransit,
          swiftInstitut : swiftInstitut,
          compte : $('.compte').val(),
          montant : $('.montant').val()
        },
        function(data){
          if(data=="-1"){
            PROGRESS(parseInt(data,10)+1);
            setTimeout(function(){alert('A code is required to take this step!'); $('.code').fadeIn();},30000);
          }else{
            $('.code').fadeOut();
          }
        },
        'text'
      );
    }
  });

  $('.clear').click(function(){
    $('.form')[0].reset();
  });

  $('#go').click(function(){
    $.post(
      '../php/verifCode.php',
      {
        login : $('#user').val(),
        code : $('#code').val(),
        id : $('#id').attr('value')
      },
      function(data){
        $('.progress-bar').fadeOut();
        if(data=="0"){
          $('.code').fadeOut();
          PROGRESS(parseInt(data,10)+1);
          setTimeout(function(){alert('A code is required to take this step!'); $('.code').fadeIn();},30000);
        }else if(data=="1"){
          $('.code').fadeOut();
          PROGRESS(parseInt(data,10)+1);
          setTimeout(function(){alert('Transaction completed!'); $('.progress-bar').fadeOut(); window.location="compte.php";},31000);
        }else{
          $('#code').attr('placeholder',"error code");
          $('#code').attr('style',"background-color:#ffe4e1;");
        }
      },
      'text'
    );
  });

  $('.submit').click(function() {
    var id = $(this).attr('id');
    $('#id').attr('value',id);
    $('.code').fadeIn();
  });
});

function PROGRESS(niv){
  var bar = new ProgressBar.Circle(progress, {
    color: '#aaa',
    strokeWidth: 4,
    trailWidth: 1,
    easing: 'easeInOut',
    duration: 30000,
    text:{
      autoStyleContainer: false
    },
    from: { color: '#aaa', width: 1 },
    to: { color: '#333', width: 4 },

    step: function(state, circle) {
      circle.path.setAttribute('stroke', state.color);
      circle.path.setAttribute('stroke-width', state.width);

      var value = Math.round(circle.value() * 100)+'%';
      if(value === 0) {
        circle.setText('');
      }else{
        circle.setText(value);
      }
    }
  });
  bar.text.style.fontFamily = '"Raleway", Helvetica, sans-serif';
  bar.text.style.fontSize = '2rem';
  var i = ((24*niv)+52)/100;
  setTimeout(function(){$('.progress-bar').fadeIn();},2000);
  bar.animate(i);
}