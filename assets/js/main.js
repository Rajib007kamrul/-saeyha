; (function ($) {
    "use strict";

    $(document).ready(function () {

        /**-----------------------------
         *  Navbar fix
         * ---------------------------*/
        $(document).on('click', '.navbar-area .navbar-nav li.menu-item-has-children>a', function (e) {
            e.preventDefault();
        })
       
        /*-------------------------------------
            menu
        -------------------------------------*/
        if ($('.dropdown-menu-btn').length){
            $(".dropdown-menu-btn").on('click', function(){
                $(".menu-inner").fadeToggle("nemu-inner-show", "linear");
                $('.dropdown-menu-btn').toggleClass('open');
            });
            $(".menu-close").on('click', function(){
                $(".menu-inner").fadeToggle("nemu-inner-show", "linear");
                $('.dropdown-menu-btn').toggleClass('open');
            });
        };

        /* -------------------------------------------------------------
          on click js
        ------------------------------------------------------------- */
        if ($('.intro-select').length){
          $('.intro-select').not("#scrollUp").on('click',function (e) {
            e.preventDefault();
            var target = this.hash;
            var $target = $(target);
            $('html, body').stop().animate({
                 'scrollTop': $target.offset().top
            }, 900, 'swing');
          });
        }

        /*--------------------------------------------------
            select onput
        ---------------------------------------------------*/
        if ($('.single-select').length){
            $('.single-select').niceSelect();
        }

        /* -----------------------------------------------------
            Variables
        ----------------------------------------------------- */
        var leftArrow = `<img src=${saeyha.leftArrow} alt="img">`;
        var rightArrow = `<img src=${saeyha.leftArrow} alt="img">`;
        //experience-slider
        $(".experience-slider").owlCarousel({
            items: 1,
            loop: true,
            smartSpeed: 1500,
            nav: true,
            dots: false,
            navText: [leftArrow, rightArrow],
        });

    });


    $(window).on('load', function () {

        /*-----------------
            preloader
        ------------------*/
        var preLoder = $("#preloader");
        preLoder.fadeOut(0);

        /*---------------------
            Cancel Preloader
        ----------------------*/
        $(document).on('click', '.cancel-preloader a', function (e) {
            e.preventDefault();
            $("#preloader").fadeOut(2000);
        });



    });

    if ($(window).width() > 992) {
        $('#fullpage').fullpage({
          navigation: true,
          navigationPosition: 'right',
          navigationTooltips: ['section1', 'section2','section3','section4','section5',],
          showActiveTooltip: true,
          slidesNavigation: true,
            slidesNavPosition: 'bottom',
          controlArrows:false,


              menu: '#menu',

              afterLoad: function(anchorLink, index) {
                if (index == 5) {
                    $('#fp-nav').hide();
                  }
              },

              onLeave: function(index, nextIndex, direction) {
                if(index == 5) {
                  $('#fp-nav').show();
                }
              },

              afterSlideLoad: function( anchorLink, index, slideAnchor, slideIndex) {
                if(anchorLink == 'fifthSection' && slideIndex == 1) {
                  $.fn.fullpage.setAllowScrolling(false, 'up');
                  $(this).css('background', '#374140');
                  $(this).find('h2').css('color', 'white');
                  $(this).find('h3').css('color', 'white');
                  $(this).find('p').css(
                    {
                      'color': '#DC3522',
                      'opacity': 1,
                      'transform': 'translateY(0)'
                    }
                  );
                }
              },

              onSlideLeave: function( anchorLink, index, slideIndex, direction) {
                if(anchorLink == 'fifthSection' && slideIndex == 1) {
                  $.fn.fullpage.setAllowScrolling(true, 'up');
                }
              } 
        });
    };


    /*** sal *******/
    sal({
        once: true
    });

    $(window).on("scroll", function () {
        /*---------------------------------------
        sticky menu activation && Sticky Icon Bar
        -----------------------------------------*/
        var mainMenuTop = $(".navbar-area");
        if ($(window).scrollTop() >= 1) {
            mainMenuTop.addClass("navbar-area-fixed");
        } else {
            mainMenuTop.removeClass("navbar-area-fixed");
        }
    });


  $(document).on('click', '.contact_submit', function(event) {
        event.preventDefault();

        let data = {
            username: $('#contact_name').val(),
            email: $('#contact_email').val(),
            message: $('#contact_message').val(),
            action: 'contact_submit'
        };

        jQuery.ajax({
          url: saeyha.ajaxurl,
          type: 'POST',
          data: data,
          complete: function(xhr, textStatus) {
            //called when complete
          },
          success: function(response, textStatus, xhr) {
            if( response.data ) {
              
              $('#con_message').text(response.data.message);
              
              $('#contact_message').val('');
              $('#contact_name').val('');
              $('#contact_email').val('');
                        
              // $('.contact_submit').prop('disabled', true);
            }
          },
          error: function(xhr, textStatus, errorThrown) {
            //called when there is an error
          }
        });
    });


    $('#saeyhaTab a').click(function(){
      console.log('tabcontent', $(this) );
      $(this).tab('show');
    });

})(jQuery);