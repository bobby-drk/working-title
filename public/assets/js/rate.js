$(function() {
// Handler for .ready() called.
    // This is the slider selector
    $(".slider").slider();
    $("#ex6").on("slide", function(slideEvt) {
        $("#ex6SliderVal").text(slideEvt.value);
    });
    // This is the open and close the advanced rating panel
    $("#flip").click(function(){
    $("#open_panel").slideToggle("slow");
    });

});