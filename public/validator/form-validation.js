jQuery(function ($) {

    $('#contact-us-form').validate({
        rules: {
            name:{
                required:true,
                minlength: 2,
            },  
            email: {
                required: true,
                email: true,
            },
            phone: {
                required: true,
                digits: true,
                minlength: 6,
            },
            companyname: {
                required:true,
                minlength: 3,
            },
            msg: {
                required: true,
            },
        },

        messages: {
        
            name: {
                minlength: "* Name should be 2 characters at least."
            },
            email: {
                email: "* Please enter a valid email."
            },
            phone:{
                digits: "* Please enter a valid phone number.",
                minlength: "* Please enter a valid phone number.",
            },
            companyname: {
                minlength: "* Company Name should be 3 characters at least."
            },
        },

        showErrors: function(errorMap, errorList) {

            this.defaultShowErrors();

            if(this.numberOfInvalids() >= 1 && $("#email-error").text() != "* Please enter a valid email." && $("#phone-error").text() != "* Please enter a valid phone number." && $("#name-error").text() != "* Name should be 2 characters at least." && $("#companyname-error").text() != "* Company Name should be 3 characters at least." ) 
            {
                $("#summary").html("* All fields are required"); //" + this.numberOfInvalids() + "  
                $("#summary").show();  
            }
            else if (this.numberOfInvalids() == 0 || $("#email-error").text() == "* Please enter a valid email." || $("#phone-error").text() == "* Please enter a valid phone number." || $("#name-error").text() == "* Name should be 2 characters at least." || $("#companyname-error").text() == "* Company Name should be 3 characters at least." )
            {
                 $("#summary").hide();
            }

        },

        errorPlacement: function(error, element) {
            error.appendTo('#summary-' + element.attr('property'));
        },

        submitHandler: function (form, e) {

            e.preventDefault();

            var form = $(form);

            var dataString = form.serialize();

            $.ajax({

                type: "POST",
                url: form.attr('action'),
                data: dataString,
                dataType: "text",

                success: function(data)
                {
                    /*form.find('p.response').addClass('success').append(response.message);*/
                    document.getElementById("contact-us-form").reset();
                    $('#response').append("We've received your message and will get back to you shortly!");
                   /*$('#contact-us-form')[0].reset();
                   alert("لقد تلقينا رسالتك وسنرد عليك قريبًا");*/
                },
                error: function(data)
                {
                    alert('Server Error! Please try again later.');
                },
            });
        }
    });

});

$('#summary-name').bind("DOMSubtreeModified",function() {
    if ($("#summary-name label").text() =="* Name should be 2 characters at least.") 
    {
        $("#summary-name").show();
    }
    else 
    {
        $("#summary-name").hide();
    }
});

$('#summary-email').bind("DOMSubtreeModified",function() {
    if ($("#summary-email label").text() == "* Please enter a valid email.") 
    {
        $("#summary-email").show();
    }
    else 
    {
        $("#summary-email").hide();
    }
});

$('#summary-phone').bind("DOMSubtreeModified",function() {
    if ($("#summary-phone label").text() == "* Please enter a valid phone number.") 
    {
        $("#summary-phone").show();
    }
    else 
    {
        $("#summary-phone").hide();
    }
});

$('#summary-companyname').bind("DOMSubtreeModified",function() {
    if ($("#summary-companyname label").text() == "* Company Name should be 3 characters at least.") 
    {
        $("#summary-companyname").show();
    }
    else 
    {
        $("#summary-companyname").hide();
    }
});