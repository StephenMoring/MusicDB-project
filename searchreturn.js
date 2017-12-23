 /* $(document).ready(function(){
        
        $('form#searchbar span button').click(function(){

          alert('searching');  
          var $this = $(this),
          target = $this.data('target');
          $('#content').load('Browse_index.php');

          return false;

        });
  });*/

  function chk(){

    var searchterm = document.getElementById('search').value;
    $.ajax({
      type:"post",
      url:"Browse_index.php",
      data: searchterm,
      cache: false,
      success: function(html){
        $('#content').html(html);
      }
    });



    return false;
  }
