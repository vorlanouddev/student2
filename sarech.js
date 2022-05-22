$(document).ready(function() {
  $('#search').keyup(function() {
    searchtb($(this).val());
  });
  function searchtb(value) {
    $('#data #body').each(function() {
      var found='false';
      $(this).each(function() {
        if($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0){
          found='true';
          }
        });
        if(found=='true'){
          $(this).show();
        }else{
          $(this).hide();
        }
      });
    }
  });