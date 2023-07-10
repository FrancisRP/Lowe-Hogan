(function ($) {
    $(document).ready(function () {

        // slideout Navigation
        var slideoutNav = $('.slideout-nav'),
            slideoutNavicon = $('.slideout-navicon'),
            naviconClose = $('.navicon-close'),
            body = $('body'),
            site = $('.site');

        slideoutNavicon.on("click", handleSlideoutNav);
        naviconClose.on("click", handleSlideoutNav);

        site.on('click', function (e) {
            handlePageOnNavSlide(slideoutNav, e, handleSlideoutNav);
        });

        function handleSlideoutNav() {
            slideoutNav.toggleClass('slideout-nav--open');
            body.toggleClass('body--overflow-hide');
        }

        function handlePageOnNavSlide(slideoutNav, e, handleSlideoutNav) {
            if (slideoutNav.hasClass('slideout-nav--open')) {
                e.preventDefault();
                handleSlideoutNav();
            }
        }

        // Sticky Header
        // ------------------------------------------------------

        // When the user scrolls the page, execute myFunction
        window.onscroll = function() { 
            stickyHeader() 
        };

        // Get the header
        var header = document.getElementById("masthead");

        // Get the offset position of the navbar
        var sticky = header.offsetTop + 150;

        // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function stickyHeader() {
          if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
          } else {
            header.classList.remove("sticky");
          }
        }

        // AJAX functionality for blog index category filtering
        // ------------------------------------------------------
            $('.filter-toggle').click(function() {
                $('.filter-toggle__dropdown').slideToggle();
            });

            // Filter by the selected category
            $('.filter-toggle__dropdown li').click(function() {

                var filterValue = $(this).attr('data-id');
                
                $('#filter select').val(filterValue);

                var filter = $('#filter');
                $.ajax({
                    url:filter.attr('action'),
                    data:filter.serialize(), // form data
                    type:filter.attr('method'), // POST
                    beforeSend:function(xhr){
                        $('.filter-toggle__label').text('Processing...'); // changing the button label
                        $('.filter-toggle__dropdown').slideToggle();
                    },
                    success:function(data){
                        $('.filter-toggle__label').text('Filter'); // changing the button label back
                        $('#response').html(data); // insert data
                    }
                });
                return false;
         

            });

            // Reset the results
            $('.filter-reset').click(function() {

                var filterValue = $(this).attr('data-id');
                
                $('#filter select').val(filterValue);

                var filter = $('#filter');
                $.ajax({
                    url:filter.attr('action'),
                    data:filter.serialize(), // form data
                    type:filter.attr('method'), // POST
                    beforeSend:function(xhr){
                        $('.filter-reset').html('<i class="fas fa-times"></i> Processing...'); // changing the button label
                    },
                    success:function(data){
                        $('.filter-reset').html('<i class="fas fa-times"></i> Reset'); // changing the button label back
                        $('#response').html(data); // insert data
                    }
                });
                return false;
         
            });

        // Show mobile sub menu on first click if the top-level menu items have child pages
        $('.mobile-navigation .menu > .menu-item-has-children > a').one('click', false);
        $('.mobile-navigation .menu > .menu-item-has-children > a').click(function() {
            $(this).next('.sub-menu').show();
        });

        $('.hero-slider').slick({
            prevArrow: '<button type="button" class="slick-prev"></button>',
            nextArrow: '<button type="button" class="slick-next"></button>',
            autoplay: true,
            autplaySpeed: 5000,
            pauseOnHover: false,
        });

        $('.team-slider .fl-post-carousel-link').click(function(event) {
            event.preventDefault();
        });
        
    });
})(jQuery);