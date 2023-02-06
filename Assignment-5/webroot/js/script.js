
jQuery.validator.addMethod("regex", function(value, element, param) {return value.match(new RegExp("^" + param + "$")); });
var ALPHA_REGEX = "[a-zA-Z]*";
jQuery.validator.addMethod(
    'ContainsAtLeastOneDigit',
    function (value) { 
        return /[0-9]/.test(value); 
    },  
    'Your password must contain at least one digit.'
);  

jQuery.validator.addMethod(
    'ContainsAtLeastOneCapitalLetter',
    function (value) { 
        return /[A-Z]/.test(value); 
    },  
    'Your password must contain at least one capital letter.'
);
jQuery.validator.addMethod(
    'ContainsAtLeastOneSpecialLetter',
    function (value) { 
        return /[!@#$*&^]/.test(value); 
    },  
    'Your password must contain at least one Special Chracter.'
);
$(document).ready(function(){

$('form').validate({
    rules:{
        'user_profile[first_name]':{
            regex:ALPHA_REGEX,
            // alphanumeric: true,
            required:true,
            minlength: 2,

        },

        'user_profile[last_name]':{
            regex:ALPHA_REGEX,
            // alphanumeric: true,
            required:true,
            minlength: 2,

        },
        'user_profile[contact]':{
            // regex:ALPHA_REGEX,
            // number: true,
            required:true,
            minlength: 10,

        },
        'user_profile[address]':{
            regex:ALPHA_REGEX,
            required:true,
            minlength: 2,

        },
        'user_profile[images]':{
            // regex:ALPHA_REGEX,
            required:true,
            // minlength: 2,

        },
        password:{
            // regex:ALPHA_REGEX,
            required:true,
            // minlength: 4,
            ContainsAtLeastOneDigit: true,
            ContainsAtLeastOneCapitalLetter: true,
            ContainsAtLeastOneSpecialLetter: true

        },
        ConfirmPassword:{
            required: true,
            equlTo:'[name="password"]',
            
        },
        email:{
            required:true,
        },
        
         
    },
        messages:{
            first_name:{
                regex:"First Name should be only in letter",
                required:"Please Enter your first name",
                minlength:"Name should be at least 2 characters"
            },
            last_name:{
                regex:"Last Name should be only in letter",
                required:"Please Enter your Last name",
                minlength:"Name should be at least 2 characters"
            },
            address:{
                // regex:"Name should be only in letter",
                required:"Please Enter your Address",
                minlength:"Addresss should be at least 5 characters"
            },
            email:{
                // regex:"Name should be only in letter",
                required:"Please Enter your  email",
                minlength:"Email should be at least 2 characters"
            },
            ConfirmPassword:{
                required:"Please fill Confirm Password input",
                equlTo:"Password"
            },
            contact:{
                required:"Please Select Image",

            },
            images:{
                // regex:"Name should be only in letter",
                required:"Please Select Image",
                // minlength:"Password should be at least 4 characters"
            },             
         
            
    },      
  });

});   

