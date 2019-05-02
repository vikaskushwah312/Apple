$(document).ready(function(){

  jQuery.validator.addMethod("extension", function(value, element) {
  // allow any non-whitespace characters as the host part
  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
}, 'Please enter a valid email address.');

    $.validator.addMethod("customemail",
            function (value, element) {
                return /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test(value);
            });

    $.validator.addMethod('decimal', function (value, element) {
        return this.optional(element) || /^((\d+(\\.\d{0,2})?)|((\d*(\.\d{1,2}))))$/.test(value);
    }, "");

   $.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z]+$/i.test(value);
   }, "Please enter letters");   

   
});


//login form validation
$(function() {
 
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  var link = $('body').data('baseurl');
 
  $("form[name='auth']").validate({
    
    rules: {

      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 6
      }
    },

    messages: {
   
      password: {
        required: "Please enter password",
        minlength: "Your password must be at least 6 characters long"
      },
      email: {
        required: "Please enter email",
        email: "Please enter a valid email address"
      },
    },

    submitHandler: function(form) {
        form.submit();
    }
  });  

  $("form[name='forgot-auth']").validate({
    
    rules: {

      email: {
        required: true,
        email: true,
        minlength: 6 
      },
    },

    messages: {
   
      password: {
        required: "Please enter password",
        minlength: "Your password must be at least 6 characters long"
      },
    },

    submitHandler: function(form) {
        form.submit();
    }
  });


  //change password
  $("form[name='reset-auth']").validate({
      rules: {
          verification_code:{
              required : true,
           },
          password: {
              required: true,
              maxlength: 20,
              minlength: 6
          },
          confirm_password: {
              required: true,
              minlength: 6,
              maxlength: 20,
              equalTo: "#password"
          }
      },
      messages: {

        verification_code: {
              required: "We have sent you an OTP on the registered email id.Please enter it here to verify your account!.",
          },

          password: {
              required: "Please enter  password field.",
              maxlength: "Password maximun length should be 20 character.",
              minlength: "Password minimum length should be 6 character",
          },

          confirm_password: {
              required: "Confirm password should be equal to  password.",
              equalTo:   "Password and confirm password do not match.",
              minlength: "Confirm Password minimum length should be 6 character",
              maxlength: "Confirm Password maximun length should be 20 character.",
             
          },

      },
//          
  });


//change password
    $("#changepassword_form").validate({

        rules: {
            password:{
                required : true,
                maxlength : 20,
                minlength : 6
             },
            newPassword: {
                required: true,
                maxlength: 20,
                minlength: 6
            },
            confirmPassword: {
                required: true,
                maxlength: 20,
                minlength: 6,
                equalTo: "#newPassword"
            },
        },
        messages: {

          password: {
                required: "Please enter password field",

                maxlength: "New Password maximum length should be 20 character",

                minlength: "Your password must be at least 6 characters long"
            },

            newPassword: {
                required: "Please enter new password field",
                maxlength: "New Password maximum length should be 20 character",
                minlength: "Your password must be at least 6 characters long"
            },

        confirmPassword: {
          required: "Please enter confirm password field",
          equalTo:   "New password and confirm password do not match",
          minlength: "Confirm Password minimum length should be 6 character",
          maxlength: "Confirm Password maximun length should be 20 character",
         
      },
    },
//          
    });

/*-----------------------------------------------*/
//   For add Country (ADMIN)
    $("form[name='signup']").validate({
    
    rules: {
      first_name: {
        required: true
      },
      last_name: {
        required: true
      },
      email: {
        required: true
      },
      password: {
        required: true,
        minlength: 6,
        maxlength: 20,
      },
      confirm_Password: {
        required: true,
        minlength: 6,
        maxlength: 20,
        equalTo: "#password"
      },
      contact_no: {
        required: true
      },
    },

    messages: {
      first_name: {
        required: "Please enter first name",
      },
      last_name: {
        required: "Please enter last name",
      },
      email: {
        required: "Please enter email",
      },
      password: {
        required: "Please enter password ",
        maxlength: "Password maximum length should be 20 character",
        minlength: "Password must be at least 6 characters long"
      },
      confirm_Password: {
        required:  "Please enter confirm  password",
        equalTo:   "Password and confirm password do not match",
        minlength: "Password minimum length should be 6 character",
        maxlength: "Password maximun length should be 20 character",
      },
      contact_no: {
        required: "Please enter contact number",
      },


    },

    submitHandler: function(form) {
        form.submit();
    }
  });

  /*-----------------------------------------------*/
//   For edit Country (ADMIN)
    $("form[name='login']").validate({
    
    rules: {
      email: {
        required: true
      },
      password: {
        required: true
      },
    },

    messages: {
      email: {
        required: "Please enter email",
      },
      password: {
        required: "Please enter password ",
      },

    },

    submitHandler: function(form) {
        form.submit();
    }
  });



});




