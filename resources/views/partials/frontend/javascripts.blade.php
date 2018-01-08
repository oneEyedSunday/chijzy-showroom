<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
    <script src="{{ asset('/js/jquery.magnific-popup.min.js')}}"></script>
    <script>
        function adjustHeightOfPage(pageNo) {

            var pageContentHeight = 0;

            var pageType = $('div[data-page-no="' + pageNo + '"]').data("page-type");

            if( pageType != undefined && pageType == "gallery") {
                pageContentHeight = $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .tm-img-gallery-container").height();
            }
            else {
                pageContentHeight = $(".cd-hero-slider li:nth-of-type(" + pageNo + ") .js-tm-page-content").height() + 20;
            }
           
            // Get the page height
            var totalPageHeight = $('nav').height() + $('#myCarousel').height()
                                    + pageContentHeight
                                    + $('.tm-footer').outerHeight();

            // Adjust layout based on page height and window height
            if(totalPageHeight > $(window).height()) 
            {
                $('.cd-hero-slider').addClass('small-screen');
                $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", totalPageHeight + "px");
            }
            else 
            {
                $('.cd-hero-slider').removeClass('small-screen');
                $('.cd-hero-slider li:nth-of-type(' + pageNo + ')').css("min-height", "100%");
            }
        }    

    	$(document).ready(function(){
            // adjustHeightOfPage(1);
    		$('#gallery').magnificPopup({
                    delegate: 'a',
                    type: 'image',
                    gallery:{enabled:true}                
            });

            // $( window ).resize(function() {
            //     var currentPageNo = $(".cd-hero-slider li.selected .js-tm-page-content").data("page-no");
                
            //     // wait 3 seconds
            //     setTimeout(function() {
            //         adjustHeightOfPage( currentPageNo );
            //     }, 1000);
                    
            // });

            // $('body').addClass('loaded');

            // Write current year in copyright text.
            // $(".tm-copyright-year").text(new Date().getFullYear());
    	})
    </script>