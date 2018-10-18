<script >
    //Main navigation scroll spy for shadow
    $(window).scroll(function() {
      var y = $(window).scrollTop();
      if (y > 100) {
        $("#scrolled").addClass('--not-top');
      } else {
        $("#scrolled").removeClass('--not-top');
      }
    });
</script>