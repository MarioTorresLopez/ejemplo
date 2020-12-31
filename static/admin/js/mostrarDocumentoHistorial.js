$( function() {
    var dialog, form,
 
      tips = $( ".validateTips" );
      
        $("#a1").change(function () {
        validar('a1');
        cancelar('a1');
    });
    
    dialog = $( "#documento" ).dialog({
      autoOpen: false,
      height: 550,
      width: 550,
      modal: true,
      show: "blind",
      hide: "scale",
      buttons: {
        Cerrar: function() {
          dialog.dialog( "close" );   
        }}
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {          
      event.preventDefault();
    
    });
 
  $( ".mostrarDocumentoHistorial" ).button().on( "click", function() {
      dialog.dialog( "open" );
    });
  
   
    
  } );