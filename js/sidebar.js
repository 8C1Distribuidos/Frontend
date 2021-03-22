$(document).ready(function(){
    $("#menu-toggle").click(function(e){
      e.preventDefault();
      $("#wrapper").toggleClass("menuDisplayed");    
      });
    });
  
  


  $(document).ready(function(){
    $("#menu-toggle_vinos").click(function(e){
      e.preventDefault();
      $("#wrapper_vinos").toggleClass("menuDisplayed_vinos");
    });
  });
