$("#menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
  });



  jQuery(function(){
        jQuery('#showAll').click(function(){
            jQuery('.target').show();
        });

        jQuery('.Single').click(function(){
            jQuery('.target').hide();
            jQuery('#div' + $(this).attr('target')).show();
        });


  });

/*
 
  $('#button_1').click(function() {
    showOne(4);
    
});



$('#button_2').click(function() {
   showOne(5);
});



function showOne(id) {
    $('.hide').not('#' + id).hide();
}

*/