$('.visibility-cart').on('click',function(){
       
    var $btn =  $(this);
    var $cart = $('.cart');
    console.log($btn);
    
    if ($btn.hasClass('is-open')) {
       $btn.removeClass('is-open');
       $btn.text('O')
       $cart.removeClass('is-open');     
       $cart.addClass('is-closed');
       $btn.addClass('is-closed');
    } else {
       $btn.addClass('is-open');
       $btn.text('X')
       $cart.addClass('is-open');     
       $cart.removeClass('is-closed');
       $btn.removeClass('is-closed');
    }
  
                    
  });
  
      // SHOPPING CART PLUS OR MINUS
      $('a.qty-minus').on('click', function(e) {
          e.preventDefault();
          var $this = $(this);
          var $input = $this.closest('div').find('input');
          var value = parseInt($input.val());
      
          if (value > 1) {
              value = value - 1;
          } else {
              value = 0;
          }
      
      $input.val(value);
          
      });
  
      $('a.qty-plus').on('click', function(e) {
          e.preventDefault();
          var $this = $(this);
          var $input = $this.closest('div').find('input');
          var value = parseInt($input.val());
  
          if (value < 100) {
          value = value + 1;
          } else {
              value =100;
          }
  
          $input.val(value);
      });
  
  // RESTRICT INPUTS TO NUMBERS ONLY WITH A MIN OF 0 AND A MAX 100
  $('input').on('blur', function(){
  
      var input = $(this);
      var value = parseInt($(this).val());
  
          if (value < 0 || isNaN(value)) {
              input.val(0);
          } else if
              (value > 100) {
              input.val(100);
          }
  });
(function ($) {
    "use strict";

    
    /*==================================================================
    [ Validate ]*/
    var name = $('.validate-input input[name="name"]');
    var email = $('.validate-input input[name="email"]');
    var subject = $('.validate-input input[name="subject"]');
    var message = $('.validate-input textarea[name="message"]');


    $('.validate-form').on('submit',function(){
        var check = true;

        if($(name).val().trim() == ''){
            showValidate(name);
            check=false;
        }

        if($(subject).val().trim() == ''){
            showValidate(subject);
            check=false;
        }


        if($(email).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
            showValidate(email);
            check=false;
        }

        if($(message).val().trim() == ''){
            showValidate(message);
            check=false;
        }

        return check;
    });


    $('.validate-form .input1').each(function(){
        $(this).focus(function(){
           hideValidate(this);
       });
    });

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    

})(jQuery);

