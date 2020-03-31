$(document).ready(function(){
  var texte=['choisir sa langue','choose your language','wähle deine Sprache'];
  $('#country').change(function(){
    if($('#country').val()=="fr"){
      $('.flag-icon').attr('class',"flag-icon flag-icon-position flag-icon-fr");
      setTimeout(function(){window.location = $('.fr').attr('value')},2000);
    }
    if($('#country').val()=="en"){
      $('.flag-icon').attr('class',"flag-icon flag-icon-position flag-icon-en");
      setTimeout(function(){window.location = $('.en').attr('value')},2000);
    }
    if($('#country').val()=="de"){
      $('.flag-icon').attr('class',"flag-icon flag-icon-position flag-icon-de");
      setTimeout(function(){window.location = $('.de').attr('value')},2000);
    }
    if($('#country').val()=="nl"){
      $('.flag-icon').attr('class',"flag-icon flag-icon-position flag-icon-nl");
      setTimeout(function(){window.location = $('.nl').attr('value')},2000);
    }
    if($('#country').val()=="es"){
      $('.flag-icon').attr('class',"flag-icon flag-icon-position flag-icon-es");
      setTimeout(function(){window.location = $('.es').attr('value')},2000);
    }
    if($('#country').val()=="it"){
      $('.flag-icon').attr('class',"flag-icon flag-icon-position flag-icon-it");
      setTimeout(function(){window.location = $('.it').attr('value')},2000);
    }
    if($('#country').val()=="pt"){
      $('.flag-icon').attr('class',"flag-icon flag-icon-position flag-icon-pt");
      setTimeout(function(){window.location = $('.pt').attr('value')},2000);
    }
  });
});