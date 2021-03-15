<script>
            // Variables
            var scrollPos = $(window).scrollTop();
            var topJumpPos = $("#topJumpBtn").css("bottom");
            var navBottomClosed = false;
            var isBottom = false;
            var Colors = {"hitam" : 'rgb(0, 0, 0)', "cyan" : 'rgb(0, 255, 255)', "ufoGreen" : 'rgb(79, 206, 93)'};
            var hitam = 'rgb(0, 0, 0)', cyan = 'rgb(0, 255, 255)', ufoGreen = 'rgb(79, 206, 93)';

            // jquery start
            $(document).ready(function(){
              $("#closeNavBawah").click(function(){
                $("#topJumpBtn").css("bottom", "10px");
                $("#Tutor").addClass('animate__animated');
                $("#Tutor").addClass('animate__slideOutDown');
                navBottomClosed = true;
              });

              // scroll event
              $(window).scroll(function() {
                if($(window).scrollTop() + $(window).height() >= 
                    $(document).height() - 70) {
                  // topJumpPos = $("#topJumpBtn").css("bottom");
                  $("#topJumpBtn").css("bottom", "10px");
                  $("#Tutor").hide();
                  $("#Tutor").show();
                  $("#Tutor").addClass('animate__animated');
                  $("#Tutor").addClass('animate__slideOutDown');
                  isBottom = true;
                  


                }else if(($(window).scrollTop() + $(window).height() < $(document).height()-70) && 
                        ($("#Tutor").css("display") == 'block') && 
                        (navBottomClosed == false) &&
                        (isBottom == true)){
                  if(($(window).width() <= 935-16) && ($(window).width() >= 770-16)){
                    topJumpPos = '100px';
                  }else if(($(window).width() <= 770-16)){
                    topJumpPos = '130px';
                  }else{
                    topJumpPos = '50px';
                  }

                  $("#topJumpBtn").css("bottom", topJumpPos);
                  // $("#Tutor").css("display", "block");
                  // if($("#Tutor").hasClass())
                  $("#Tutor").removeClass('animate__animated');
                  $("#Tutor").removeClass('animate__slideOutDown');
                  $("#Tutor").removeClass('animate__slideInUp');
                  $("#Tutor").hide();
                  // alert("a");
                  $("#Tutor").show();
                  $("#Tutor").addClass('animate__animated');
                  $("#Tutor").addClass('animate__slideInUp');
                  isBottom = false;
                }


              });
              
              

              $(document).on('click', '.navbar-collapse > ul > li > a[href^="#"]', function (event) {
                  event.preventDefault();
                  // $('.navbar-toggler').attr('aria-expanded','false');
                  // $(this).
                  $('html, body').animate({
                      scrollTop: $($.attr(this, 'href')).offset().top
                  }, 'slow');
              });

              $('#topJumpBtn').each(function(){
                  $(this).click(function(){ 
                      $('html,body').animate({ scrollTop: 0 }, 'slow');
                      return false; 
                  });
              });

              // alert($('.contact-button button').eq(1).attr('title'));
              
              $(document).on('click', '.contact-button button' ,function (event) {
                
                $('.contact-button button').css('background-color', 'black');
                if(($('.contact-button').children().index(this) == 0) && //gmaps
                    ($(this).css('background-color') == hitam)
                  ){
                    $(this).css('background-color', 'red');
                } else if(($('.contact-button').children().index(this) == 1) && //email
                    ($(this).css('background-color') == hitam)
                  ){
                    $(this).css('background-color', 'cyan');
                } else if(($('.contact-button').children().index(this) == 2) && //whatsapp
                    ($(this).css('background-color') == hitam)
                  ){
                    $(this).css('background-color', 'rgb(79, 206, 93)');
                }
                
              });

              //end jquery
            });
            AOS.init();
        </script>