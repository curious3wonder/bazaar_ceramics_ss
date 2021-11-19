// JavaScript Document
$(document).ready(function() {
   $("#userForm").submit(function(e) {
        removeFeedback();
        var errors = validateForm();
        if (errors == "") {
            return true;
        } else {
            provideFeedback(errors);
            e.preventDefault();
            return false;
        }
    });
        function validateForm() {
        var errorFields = new Array();
        //Check required fields have something in them
        if ($('#fname').val() == "") {
            errorFields.push('fname');
        }
		if ($('#lname').val() == "") {
            errorFields.push('lname');
        }
		if ($('#email').val() == "") {
            errorFields.push('email');
        }
		if ($('#addr').val() == "") {
            errorFields.push('addr');
        }
		if ($('#suburb').val() == "") {
            errorFields.push('suburb');
        }
		if ($('#state').val() == "") {
            errorFields.push('state');
        }
		if ($('#postcode').val() == "") {
            errorFields.push('postcode');
        }
		if ($('#country').val() == "") {
            errorFields.push('country');
        }	
		if ($('#phone').val() == "") {
            errorFields.push('phone');
        }	
		// Check phone number
        if ($('#phone').val() != "") {
            var phoneNum = $('#phone').val();
            phoneNum.replace(/[^0-9]/g, "");
			if (phoneNum.length != 10) {
				errorFields.push("phone");
			}
        }
		//check e-mail @ symbol 
		if ($('#email').val() != "") {
			if (!($('#email').val().indexOf(".") > 2) && ($('#email').val().indexOf("@"))) {
				errorFields.push('email');
			}
		}
        return errorFields;
        } //end function validateForm
    function provideFeedback(incomingErrors) {
            for (var i = 0; i < incomingErrors.length; i++) {
           $("#" + incomingErrors[i]).addClass("errorClass");
           $("#" + incomingErrors[i] + "Error").removeClass("errorFeedback");
        }
        $("#errorDiv").html("Errors encountered");
    }
    function removeFeedback() {
        $("#errorDiv").html("");
        $('input').each(function() {
            $(this).removeClass("errorClass");
        });
        $('.errorSpan').each(function() {
            $(this).addClass("errorFeedback");
        });
    }});