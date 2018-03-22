/**
 * Floating Buttons - Plugin specific JS
 */

(function( $ ) {
  "use strict";

  $(function() {


  $("#buttonToggleOff").click(function(){
      $("#floatButtonContainer").removeClass("flyIn");
      $("#floatButtonContainer").addClass("flyOut");

      $(this).removeClass("flyIn");
      $(this).addClass("flyOut");

      $("#buttonToggleOn").addClass("flyIn");
  });

  $("#buttonToggleOn").click(function(){
    $("#floatButtonContainer").removeClass("flyOut");
    $("#floatButtonContainer").addClass("flyIn");

    $("#buttonToggleOff").removeClass("flyOut");
    $("#buttonToggleOff").addClass("flyIn");

    $(this).removeClass("flyIn");
    $("#buttonToggleOff").fadeOut();
  });

  $("#floatButtonContainer").mouseenter(function() {
    $("#buttonToggleOff").show();
  });

});

}(jQuery));
