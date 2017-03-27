$( document ).ready(function() {

    /**
     * Click sul bottone "passa alla registrazione"
     */
    $("#btn-register").click(function(){
      $("#form-register").addClass('animated bounceInRight');
      $("#form-login").addClass('animated bounceOutLeft');
      $("#form-register").removeClass("displayNo");
      $("#form-login").removeClass('animated bounceOutLeft');
      $("#form-login").addClass("displayNo");

    });

    /**
     * Click sul bottone "passa al login"
     */
    $("#btn-login").click(function(){
      $("#form-login").addClass('animated bounceInLeft');
      $("#form-register").addClass('animated bounceOutRight');
      $("#form-login").removeClass("displayNo");

      $("#form-register").removeClass('animated bounceOutRight');
      $("#form-register").addClass("displayNo");
    });

    /**
     * Click sul bottone del menu che gestisce il terremoto
     */
    $("#btn-n").click(function(){
      $('body').addClass('animated shake');
      setInterval(function () {
        $('.navbar').addClass('animated hinge');
      }, 500);
      setInterval(function () {
        $('#main-wrapper').addClass('animated hinge');
      }, 800);
      setInterval(function () {
        $('.page-sidebar').addClass('animated hinge');
      }, 1200);
      setInterval(function () {
        $('.page-inner').addClass('animated hingeR');
      }, 1200);
      setInterval(function () {
        $('#logo').removeClass('displayNo');
        $('#logo').addClass('animated fadeIn');
      }, 2000);
      setTimeout(function () {
        $('body').removeClass('animated shake');
      }, 5000);
    });
});
