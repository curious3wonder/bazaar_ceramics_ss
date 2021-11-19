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
        if ($('#UserID').val() == "") {
            errorFields.push('UserID');
        }
        if ($('#password').val() == "") {
            errorFields.push('password');
        }
        if ($('#Email').val() == "") {
            errorFields.push('Email');
        }
        //very basic e-mail check, just an @ symbol
        if (!($('#Email').val().indexOf(".") > 2) && ($('#Email').val().indexOf("@"))) {
            errorFields.push('Email');
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