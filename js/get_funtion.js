
	//==============search data
	$(document).ready(function() {
  $('#search').keyup(function() {
    data($(this).val());
  });
  function data(value) {
    $('#data #tbody').each(function() {
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
    //==============search data2
  $(document).ready(function() {
  $('#search1').keyup(function() {
    data($(this).val());
  });
  function data(value) {
    $('#data1 #tbody1').each(function() {
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