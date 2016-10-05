


/*=============================================================
    Authour URI: www.binarytheme.com
    License: Commons Attribution 3.0

    http://creativecommons.org/licenses/by/3.0/

    100% To use For Personal And Commercial Use.
    IN EXCHANGE JUST GIVE US CREDITS AND TELL YOUR FRIENDS ABOUT US
   
    ========================================================  */


(function ($) {
    "use strict";
    var mainApp = {

        main_fun: function () {
           
            /*====================================
              LOAD APPROPRIATE MENU BAR
           ======================================*/
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });

          
     
        },

        initialization: function () {
            mainApp.main_fun();

        }

    }

    function validateForm(){

        alert("matched");
    }


    // Initializing ///

    $(document).ready(function () {
        mainApp.main_fun();

    jQuery("#typeofbanner").change(function() {
        if (jQuery(this).val() === '0'){ 
            jQuery('input[name=text_red]').show();   
            jQuery('label[name=text_red]').show();
            jQuery('input[name=text_gray]').show();   
            jQuery('label[name=text_gray]').show();
            jQuery('input[name=title]').show();   
            jQuery('label[name=title]').show();
            jQuery('textarea[name=description]').show();   
            jQuery('label[name=description]').show();
            jQuery('input[name=button]').show();   
            jQuery('label[name=button]').show();                 
            jQuery('label[name=imagepath_price]').show();  
            jQuery('img[name=imagepath_price]').show();   
            jQuery('label[name=cbox2]').show();  
            jQuery('input[name=cbox2]').show();   
            jQuery('input[name=imagepath_price]').show();                  
            jQuery('label[name=msglargimg]').show();
            jQuery('label[name=msgtxtimg]').hide();                        

        } else {
            jQuery('input[name=text_red]').hide(); 
            jQuery('label[name=text_red]').hide();
            jQuery('input[name=text_gray]').hide();   
            jQuery('label[name=text_gray]').hide();
            jQuery('input[name=title]').hide();   
            jQuery('label[name=title]').hide();
            jQuery('textarea[name=description]').hide();   
            jQuery('label[name=description]').hide();
            jQuery('input[name=button]').hide();   
            jQuery('label[name=button]').hide();                 
            jQuery('label[name=imagepath_price]').hide();  
            jQuery('img[name=imagepath_price]').hide();   
            jQuery('label[name=cbox2]').hide();  
            jQuery('input[name=cbox2]').hide();   
            jQuery('input[name=imagepath_price]').hide();                  
            jQuery('label[name=msgtxtimg]').hide();
            jQuery('label[name=msglargimg]').show();
        }
    });

    

    });

}(jQuery));


