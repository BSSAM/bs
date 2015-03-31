/*
 *  Document   : formsValidation.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Forms Validation page
 */

var FormsValidation = function() {

    return {
        init: function() {
            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Initialize Form Validation */
            $('#form-login').validate({
                
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    val_username: {
                        required: true,
                        minlength: 3
                    },
                    val_email: {
                        required: true,
                        email: true
                    },
                    val_password: {
                        required: true,
                        minlength: 5,
			maxlength: 10
                    },
                    val_confirm_password: {
                        required: true,
                        equalTo: '#val_password'
                    },
                    val_bio: {
                        required: true,
                        minlength: 5
                    },
                    val_skill: {
                        required: true
                    },
                    val_website: {
                        required: true,
                        url: true
                    },
                    val_credit_card: {
                        required: true,
                        creditcard: true
                    },
                    val_digits: {
                        required: true,
                        digits: true
                    },
                    val_number: {
                        required: true,
                        number: true
                    },
                    val_range: {
                        required: true,
                        range: [1, 1000]
                    },
                    val_terms: {
                        required: true
                    }
                },
                messages: {
                    val_username: {
                        required: 'Please enter a username',
                        minlength: 'Your username must consist of at least 6 characters'
                    },
                    val_email: 'Please enter a valid email address',
                    val_password: {
                        required: 'Please provide a password',
                        minlength: 'Your password must be at least 8 characters long',
						maxlength: 'Your password must not be more than 16 characters long'
                    },
                    val_confirm_password: {
                        required: 'Please provide a password',
                        minlength: 'Your password must be at least 5 characters long',
                        equalTo: 'Please enter the same password as above'
                    },
                    val_bio: 'Don\'t be shy, share something with us :-)',
                    val_skill: 'Please select a skill!',
                    val_website: 'Please enter your website!',
                    val_credit_card: 'Please enter a valid credit card! Try 446-667-651!',
                    val_digits: 'Please enter only digits!',
                    val_number: 'Please enter a number!',
                    val_range: 'Please enter a number between 1 and 1000!',
                    val_terms: 'You must agree to the service terms!'
                }
            });
//            $().ready(function() {
//    // validate the form when it is submitted
//     $("#form-country-add").validate();
//     $("#val_country").rules("add", {
//         required:true,
//         messages: {
//                required: "Please Enter Country Name."
//         }
//      });
//     $("#last_name").rules("add", {
//         required:true,
//         messages: {
//                required: "Please Enter Description of Project."
//         }
//      }
//      );
     /*  You Can add oter fields like above
         Here with messages. But remember you have to mention
         $("#testingform").validate(); first and then write
         all other code
     */
//});
            $('#form-country-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    country: {
                        required: true,
                        minlength: 3
                    },
                    countrycode: {
                        required: true,
                        minlength: 2
                    },
                   
                },
                messages: {
                    country: {
                        required: 'Please enter a Country Name',
                        minlength: 'Your Country Name must at least 3 characters'
                    },
                    
                    countrycode: {
                        required: 'Please enter a Country Code',
                        minlength: 'Your Country Code must at least 2 characters'
                    },
                    
                }
                
            });
//            $("#val_country").rules("add", { 
//             required: true,  
//             minlength: 3
//            });
//            $("#val_country").messages("add", { 
//            required: 'Please enter a Country Name',
//            minlength: 'Your Country Name must at least 3 characters'
//            });
            
            
            
            $('#form-assign-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    assignedto: {
                        required: true,
                        minlength: 3
                    },
                    
                   
                },
                messages: {
                    assignedto: {
                        required: 'Whom its Assigned To',
                        minlength: 'The Name must at least 3 characters'
                    },
                    
                    
                    
                }
            });
            
            $('#form-service-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    servicetype: {
                        required: true,
                        minlength: 3
                    },
                   
                },
                messages: {
                    servicetype: {
                        required: 'Service Type Required',
                        minlength: 'The Service Type must contain at least 3 characters'
                    },
                    
                   
                }
            });
            
            $('#form-additionalcharge-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    additionalcharge: {
                        required: "#val_additionalcharge",
                        minlength: 3
                    },
                   
                   
                },
                messages: {
                    additionalcharge: {
                        required: 'Additional Charge Required',
                        minlength: 'The Additional Charge must contain at least 3 characters'
                    },
                    
                   
                    
                }
            });
            
            $('#form-department-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    departmentname: {
                        required: true,
                        minlength: 3
                    },
                    
                },
                messages: {
                    departmentname: {
                        required: 'Department Name Required',
                        minlength: 'The Department Name must contain at least 3 characters'
                    },
                    
                    
                }
            });
            
            $('#form-tallyledger-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    tallyledgeraccount: {
                        required: true,
                        minlength: 3
                    },
                   
                   
                },
                messages: {
                    tallyledgeraccount: {
                        required: 'Tally Ledger A/C Name Required',
                        minlength: 'The Tally Ledger A/C Name must contain at least 3 characters'
                    },
                    
                  
                }
            });
            
                 $('#form-currency-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    symbol: {
                        required: true,
                        
                    },
                    country_id: {
                        required: true,
                    },
                    currencycode: {
                        required: true,
                        
                    },
                    exchangerate: {
                        required: true,
                    },
                   
                   
                },
                messages: {
                    symbol: {
                        required: 'Currency Symbol is Required',
                        
                    },
                    country_id: {
                        required: 'Country is Required',
                    },
                    currencycode: {
                        required: 'Currency Code is Required',
                        
                    },
                    exchangerate: {
                        required: 'Exchange Rate is Required',
                    },
                    
                  
                }
            });
            
             $('#form-branch-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    branchname: {
                        required: true,
                        minlength: 3
                    },
                    address: {
                        required: true,
                        maxlength: 100
                    },
                    
                    
                   
                   
                   
                },
                messages: {
                    branchname: {
                        required: 'Branch Name is Required',
                        minlength: 'The Branch Name should have minimum 3 characters'
                    },
                    address: {
                        required: 'Address is Required',
                        maxlength: 'The Address should have only 100 characters'
                    },
                    
                    
                    
                  
                }
            });
            
            
            $('#form-user-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    username: {
                        required: true,
                        minlength: 3
                    },
                    password: {
                        required: true,
                        minlength: 5,
			maxlength: 10
                    },
                    firstname: {
                        required: true,
                       
                    },
                   
                    emailid: {
                        required: true,
                        email: true
                    },
                    userrole_id: {
                        required: true
                        
                    },
                    department_id:{
                        required:true
                    }
                },
                messages: {
                    username: {
                        required: 'Please enter a username',
                        minlength: 'Your username must consist of at least 6 characters'
                    },
                    password: {
                        required: 'Please provide a password',
                        minlength: 'Your password must be at least 8 characters long',
			maxlength: 'Your password must not be more than 16 characters long'
                    },
                    firstname: {
                        required: 'First Name is Required',
                       
                    },
                    
                    emailid: {
                        required: 'Email Id is Required',
                        
                    },
                    userrole_id: {
                        required: 'User Role is Required'
                        
                    },
                    department_id:{
                       required: 'Department is Required'
                    }
                }
            });
            
            $('#form-userrole-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    user_role: {
                        required: true,
                        minlength: 3
                    },
                   
                   
                },
                messages: {
                    user_role: {
                        required: 'User Role is Required',
                        minlength: 'The User Role must contain at least 3 characters'
                    },
                    
                  
                    
                }
            });
            
            $('#form-industry-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    industryname: {
                        required: true,
                        minlength: 3
                    },
                    
                   
                },
                messages: {
                    industryname: {
                        required: 'Industry Name Required',
                        minlength: 'The Industry Name must contain at least 3 characters'
                    },
                    
                   
                    
                }
            });
            
            $('#form-location-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    locationname: {
                        required: true,
                        minlength: 3
                    },
                   
                   
                },
                messages: {
                    locationname: {
                        required: 'Location Name Required',
                        minlength: 'The Location Name must contain at least 3 characters'
                    },
                    
                   
                    
                }
            });
            $('#form-priority-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    priority: {
                        required: true,
                        minlength: 1
                    },
                    noofdays: {
                        required:true
                    },
                    multipleof: {
                        required:true
                    }
                   
                   
                },
                messages: {
                    priority: {
                        required: 'Priority is Required',
                        minlength: 'Priority must contain at least 1 characters'
                    },
                    noofdays: {
                        required: 'No of Days is Required',
                    },
                    multipleof: {
                        required: 'Multiples of is Required',
                    }
                }
            });
            
            $('#form-referedby-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    referedby: {
                        required: true,
                        minlength: 3
                    },
                   
                   
                },
                messages: {
                    referedby: {
                        required: 'Referred By is Required',
                        minlength: 'Referred By must contain at least 3 characters'
                    },
                }
            });
           
            $('#form-salesperson-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    salesperson: {
                        required: true,
                        minlength: 3
                    },
                    salespersoncode: {
                        required: true,
                        maxlength: 15
                    },
                    
                   
                },
                messages: {
                    salesperson: {
                        required: 'Sales Person is Required',
                        minlength: 'Sales Person Name must contain at least 3 characters'
                    },
                    
                    salespersoncode: {
                        required: 'Sales Person is Required',
                        maxlength: 'Sales Person Name must not be more than 15 characters long'
                    },
                    
                }
            });
            
            $('#form-paymentterm-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    paymentterm: {
                        required: true,
                        
                    },
                    paymenttype: {
                        required: true
                        
                    },
                    
                },
                messages: {
                    paymentterm: {
                        required: 'Payment Term is Required',
                       
                    },
                    
                    paymenttype: {
                        required: 'Payment Type is Required'
                        
                    },
                    
                }
            });
            $('#form-customer-add').validate({
               ignore: ".ignore",
                invalidHandler: function(e, validator){
                    if(validator.errorList.length)
                    $('#tabs a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show');
                },
               
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                   // e.parents('.basic-wizard > tab').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    customername: {
                        required: true,
                        minlength: 3
                        
                    },
                    postalcode: {
                        required: true
                        
                    },
                    tag_name: {
                        required: true
                        
                    },
//                    salesperson_id: {
//                        required: true                        
//                    },
                    phone: {
                        required: true
                        
                    },
                    industry_id: {
                        required: true
                    },
                    location_id: {
                        required: true
                    },
                    customertype:{
                        required:true
                    },
                    paymentterm_id:{
                        required:true
                    },
                    calibrationtype: {
                        required:true
                    },
                    invoice_type_id: {
                        required:true
                    },
                    deliveryordertype_id:{
                        required:true
                    },
                    acknowledgement_type_id:{
                        required:true
                    }
                    
                },
                messages: {
                    customername: {
                        required: 'Customer Name is Required',
                        minlength: 'Customer Name Should Aleast be 3 Characters'
                        
                    },
                    
                    postalcode: {
                        required: 'Postal Code is Required'
                        
                    },
//                    salesperson_id: {
//                        required: 'Salesperson is Required'
//                        
//                    },
                    tag_name: {
                        required: 'Tag Name is Required'
                        
                        
                    },
                    phone: {
                        required: 'Phone No is Required'
                        
                    },
                    industry_id: {
                        required: 'Industry is Required'
                    },
                    location_id: {
                        required: 'Location is Required'
                    },
                    customertype:{
                        required:'Customer Type is Required'
                    },
                    paymentterm_id: {
                        required:'Payment Term is Required'
                    },
                    calibrationtype: {
                        required:'Calibration Type is Required'
                    },
                    invoice_type_id: {
                        required:'Invoice Type is Required'
                    },
                    deliveryordertype_id:{
                        required:'Deliveryorder Type is Required'
                    },
                    acknowledgement_type_id:{
                        required:'Acknowledgement Type is Required'
                    }
                    
                    
                },
            });
            
            $('#form-customer-edit').validate({
               ignore: ".ignore",
                invalidHandler: function(e, validator){
                    if(validator.errorList.length)
                    $('#tabs a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show');
                },
               
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                   // e.parents('.basic-wizard > tab').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    customername: {
                        required: true,
                        minlength: 3
                        
                    },
                    postalcode: {
                        required: true
                        
                    },
//                    salesperson_id: {
//                        required: true                        
//                    },
                    phone: {
                        required: true
                        
                    },
                    industry_id: {
                        required: true
                    },
                    location_id: {
                        required: true
                    },
                    customertype:{
                        required:true
                    },
                    paymentterm_id:{
                        required:true
                    },
                    calibrationtype: {
                        required:true
                    },
                    invoice_type_id: {
                        required:true
                    },
                    deliveryordertype_id:{
                        required:true
                    },
                    acknowledgement_type_id:{
                        required:true
                    }
                    
                },
                messages: {
                    customername: {
                        required: 'Customer Name is Required',
                        minlength: 'Customer Name Should Aleast be 3 Characters'
                        
                    },
                    
                    postalcode: {
                        required: 'Postal Code is Required'
                        
                    },
//                    salesperson_id: {
//                        required: 'Salesperson is Required'
//                        
//                    },
                    
                    phone: {
                        required: 'Phone No is Required'
                        
                    },
                    industry_id: {
                        required: 'Industry is Required'
                    },
                    location_id: {
                        required: 'Industry is Required'
                    },
                    customertype:{
                        required:'Customer Type is Required'
                    },
                    paymentterm_id: {
                        required:'Payment Term is Required'
                    },
                    calibrationtype: {
                        required:'Calibration Type is Required'
                    },
                    invoice_type_id: {
                        required:'Invoice Type is Required'
                    },
                    deliveryordertype_id:{
                        required:'Deliveryorder Type is Required'
                    },
                    acknowledgement_type_id:{
                        required:'Acknowledgement Type is Required'
                    }
                    
                    
                },
            });
            $('#fileupload').validate({
               ignore: ".ignore",
                invalidHandler: function(e, validator){
                    if(validator.errorList.length)
                    $('#tabs a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show');
                },
               
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                   // e.parents('.basic-wizard > tab').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    customername: {
                        required: true,
                        minlength: 1
                
                    
                },
                messages: {
                    customername: {
                        required: 'Customer Name is Required',
                        minlength: 'Customer Name Should Aleast be 1 Characters'
                        
                    }}
                    
                    
                },
            });
            /**************************For Title Module Validation**************************/
            
            $('#form-title-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    tilte_name: {
                        required: true,
                        minlength: 3
                    },
                    
                   
                },
                messages: {
                    tilte_name: {
                        required: 'Please enter a Country Name',
                        minlength: 'Your Country Name must at least 3 characters'
                    },
                    
                }
            });
            
             /**************************For Quotation Module************************/
//            $('#form-quotation-add').validate({
//                ignore: ".ignore",
//                invalidHandler: function(e, validator){
//                    if(validator.errorList.length)
//                    $('#tabs a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show');
//                },
//               
//                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
//                errorElement: 'div',
//                errorPlacement: function(error, e) {
//                    e.parents('.form-group > div').append(error);
//                   // alert('inside_error');
//                   // e.parents('.basic-wizard > tab').append(error);
//                },
//                highlight: function(e) {
//                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
//                    $(e).closest('.help-block_login').remove();
//                    //alert('inside_invalidhandler');
//                },
//                success: function(e) {
//                    // You can use the following if you would like to highlight with green color the input after successful validation!
//                     //alert('inside_success');
//                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
//                    e.closest('.help-block_login').remove();
//                },
//                rules: {
//                    val_customer: {
//                        required: true,
//                        minlength: 3
//                    },
//                    
//                    
//                },
//                messages: {
//                    val_customer: {
//                        required: 'Customer Name is Required',
//                        minlength: 'Customer Name Should Aleast be 3 Characters'
//                        
//                    },
//                    
//                    
//                    
//                    
//                },
//            });
            $('#form-quotation-add').validate({
               ignore: ".ignore",
                invalidHandler: function(e, validator){
                    if(validator.errorList.length)
                    $('#tabs a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show');
                },
               
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                     e.parents('.instrument_details > div').append(error);
                   // e.parents('.basic-wizard > tab').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.instrument_details').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error');
                    e.closest('.instrument_details').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    customername: {
                        required: true,
                        minlength: 1
                    },
                    "data[Quotation][ref_no]": {
                        required: true
                    },
                    "data[Quotation][attn]": {
                        required: true
                    },
                    "data[Quotation][instrument_type_id]": {
                        required: true    
                    },
                    "data[Customerspecialneed][gsttype]":{
                        required: true
                    },
                    "data[Customerspecialneed][currency_id]":{
                        required: true
                    } 
                   
                },
                messages: {
                    customername: {
                        required: 'Customer Name is Required',
                        minlength: 'Customer Name Should Aleast be 1 Characters'
                    }, 
                    "data[Quotation][ref_no]": {
                        required: 'Ref No is Required'
                       },
                    "data[Quotation][attn]": {
                        required: 'Contact Person is Required'
                    },
                    "data[Quotation][instrument_type_id]":{
                        required: 'Instrument Details is Required'
                    },
                    "data[Customerspecialneed][gsttype]":{
                        required: 'GST Type is Required'
                    },
                    "data[Customerspecialneed][currency_id]":{
                        required: 'Currency is Required'
                    } 
                    
                    
                }
                
                
            });
            
             /*******************************************************************************/
            
            
            /**************************For Sales order Module************************/
            $('#form-salesorder-add').validate({
               ignore: ".ignore",
                invalidHandler: function(e, validator){
                    if(validator.errorList.length)
                    $('#tabs a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show');
                },
               
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                   // e.parents('.basic-wizard > tab').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    sales_customername: {
                        required: true,
                        minlength: 1
                    },
                    "data[Salesorder][ref_no]":{
                        required: true,
                    },
                    "data[Salesorder][instrument_type_id]":{
                        required: true,
                    },
                    "data[Salesorder][service_id]":{
                        required: true,
                    }
                },
                messages: {
                    sales_customername: {
                        required: 'Customer Name is Required',
                        minlength: 'Customer Name Should Aleast be 1 Characters'
                    },
                    "data[Salesorder][ref_no]":{
                        required: 'Purchase Order No is Required',
                    },
                    "data[Salesorder][instrument_type_id]":{
                        required: 'Instrument Type is Required',
                    },
                    "data[Salesorder][service_id]":{
                        required: 'Service Type is Required',
                    }
                    
                },
                
            });
           // $('#form-machine-add').
            $('#form-machine-add').validate({
               errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                     
                   // e.parents('.basic-wizard > tab').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error');
                    // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    name: {
                        required: true,
                    },
                    department_id: {
                        required: true
                    },
                    "data[InstrumentProcedure][procedure_id][]": {
                        required: true
                    },
                    "data[InstrumentBrand][brand_id][]": {
                        required: true    
                    },
                    "data[InstrumentRange][range_id][]":{
                        required: true
                    } 
                   
                },
                messages: {
                    name: {
                        required: 'Instrument Name is Required',
                    }, 
                    department_id: {
                        required: 'Department is Required'
                       },
                    "data[InstrumentProcedure][procedure_id][]": {
                        required: 'Instrument Procedure No Required'
                    },
                    "data[InstrumentBrand][brand_id][]":{
                        required: 'Brand Name is Required'
                    },
                    "data[InstrumentRange][range_id][]":{
                        required: 'Range is Required'
                    } 
                    
                    
                }
                
                
            });
            $('#form-procedure-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    procedure_no: {
                        required: true
                    },
                    department_id: {
                        required: true,
                    },
                    
                },
                messages: {
                    procedure_no: {
                        required: 'Enter Procedure No',
                    },
                    department_id: {
                        required: 'Select Department Name',
                    },
                    
                }
            });
            
            $('#form-brand-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    brandname: {
                        required: true,
                      
                    },
                    
                    
                    
                },
                messages: {
                    brandname: {
                        required: 'Please enter the Brand Name',
                       
                    },
                    
                }
            });
            
            $('#subcontractdo-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    "data[Subcontractdo][subcontract_name]": {
                        required: true,
                      
                    },
                    "sub-sales-no" : {
                        required: true,
                    },
                    "data[Subcontractdo][subcontract_attn]": {
                        required: true,
                      
                    },
                    val_remarks: {
                        required: true,
                      
                    },
                    
                },
                messages: {
                    "data[Subcontractdo][subcontract_name]": {
                        required: 'Please enter the SubContractor Name',
                       
                    },
                    "sub-sales-no" : {
                        required: 'Please enter the Salesorder No',
                    },
                    "data[Subcontractdo][subcontract_attn]": {
                        required: 'Please enter the Contact Person',
                      
                    },
                    val_remarks: {
                        required: 'Please enter the remarks',
                      
                    },
                }
            });
            
            $('#form-group-add').validate({
              
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                   // e.parents('.basic-wizard > tab').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    group_name: {
                        required: true,
                        minlength: 1
                },
                 
                    quotation: {
                        required: true,
                        minlength: 1
                },
                 salesorder: {
                        required: true,
                        minlength: 1
                },
                deliveryorder: {
                        required: true,
                        minlength: 1
                },
                invoice: {
                        required: true,
                        minlength: 1
                },
                purchaseorder: {
                        required: true,
                        minlength: 1
                },
                performainvoice: {
                        required: true,
                        minlength: 1
                },
                 subcontract_deliveryorder: {
                        required: true,
                        minlength: 1
                },
                 purchase_requisition: {
                        required: true,
                        minlength: 1
                },
                 recall_service: {
                        required: true,
                        minlength: 1
                },
                 onsite_schedule: {
                        required: true,
                        minlength: 1
                },
                
                messages: {
                    group_name: {
                        required: "The Group name is required",
                        minlength: "The Group name must contain at least 3 characters",
                    },
                    
                    quotation: {
                        required: "Quotation Words are Required",
                        minlength:  "The Quotation must contain at least 3 characters",
                    },
                    salesorder: {
                        required: true,
                        minlength: "The Salesorder must contain at least 3 characters",
                    },
                    deliveryorder: {
                        required: true,
                        minlength: "The Delivery order must contain at least 3 characters",
                    },
                    invoice: {
                        required: true,
                        minlength: "The Invoice must contain at least 3 characters",
                    },
                    purchaseorder: {
                        required: true,
                        minlength: "The Purchase order must contain at least 3 characters",
                    },
                    performainvoice: {
                        required: true,
                        minlength: "The Performa Invoice must contain at least 3 characters",
                    },
                    subcontract_deliveryorder: {
                        required: true,
                        minlength: "The Subcontract Delivery order must contain at least 3 characters",
                    },
                    purchase_requisition: {
                        required: true,
                        minlength: "The Purchase order Requisition must contain at least 3 characters",
                    },
                    recall_service: {
                        required: true,
                        minlength: "The Recall Service must contain at least 3 characters",
                    },
                    onsite_schedule: {
                        required: true,
                        minlength: "The Onsite Schedule must contain at least 3 characters",
                    },
                }
                },
            });
            $('#form-range-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    from_range: {
                        required: true,
                        minlength: 1
                    },
                    
                    unit_id: {
                        required: true
                    }
                   
                    
                    
                },
                messages: {
                    from_range: {
                        required: 'Please enter the Starting Range',
                        minlength: 'Starting Range must consist of at least 1 character'
                    },
                    
                    unit_id: {
                        required: 'Please Select The Unit',
                    },
                }
            });
            $('#form-unit-add').validate({
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    unit_name: {
                        required: true,
                        minlength: 1
                    },
                    
                    
                    
                },
                messages: {
                    unit_name: {
                        required: 'Please enter the Unit Name',
                        minlength: 'Unit Name must consist of at least 1 characters'
                    },
                    
                }
            });
            
//             $('#form-poapp-view').validate({
//                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
//                errorElement: 'div',
//                errorPlacement: function(error, e) {
//                    e.parents('.col-md-4 > div').append(error);
//                },
//                highlight: function(e) {
//                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
//                    $(e).closest('.help-block_login').remove();
//                },
//                success: function(e) {
//                    // You can use the following if you would like to highlight with green color the input after successful validation!
//                    e.closest('.col-md-4').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
//                    e.closest('.help-block_login').remove();
//                },
//                rules: {
//                    "ponumber[]": {
//                        required: true
//                    }
//                },
//                messages: {
//                    "ponumber[]": {
//                        required: 'Please enter the PO Number',
//                        excluded: [':disabled']
//                    }
//                }
//            });
             /*******************************************************************************/
            
            
//             $('#form-customer-address-add').validate({
//                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
//                errorElement: 'div',
//                errorPlacement: function(error, e) {
//                    e.parents('.form-group > div').append(error);
//                },
//                highlight: function(e) {
//                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
//                    $(e).closest('.help-block_login').remove();
//                },
//                success: function(e) {
//                    // You can use the following if you would like to highlight with green color the input after successful validation!
//                    e.closest('.form-group').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
//                    e.closest('.help-block_login').remove();
//                },
//                rules: {
//                    regaddress: {
//                        required: true,
//                       
//                    },
//                    
//                },
//                messages: {
//                    regaddress: {
//                        required: 'Please enter a Registered Address',
//                       
//                    },
//                    
//                    
//                }
//            });
            $('#form-deliveryorder-add').validate({
               ignore: ".ignore",
                invalidHandler: function(e, validator){
                    if(validator.errorList.length)
                    $('#tabs a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show');
                },
               
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                   // e.parents('.basic-wizard > tab').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    "data[Deliveryorder][customer_address]": {
                        required: true,
                    },
                    "data[Deliveryorder][service_id]": {
                        required: true,
                    }
                   
                   
                },
                messages: {
                    "data[Deliveryorder][customer_address]": {
                        required: 'Delivery Address is Required',
                    }, 
                    "data[Deliveryorder][service_id]": {
                        required: 'Service Type is Required',
                    }
                    
                    
                }
                
                
            });
            $('#form-deliveryorder-edit').validate({
               errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                     
                   // e.parents('.basic-wizard > tab').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error');
                    // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    "data[Deliveryorder][customer_address]": {
                        required: true,
                    },
                   
                   
                },
                messages: {
                    "data[Deliveryorder][customer_address]": {
                        required: 'Delivery Address is Required',
                    }, 
                    
                    
                    
                }
                
                
            });
            
            $('#form-puchasereq-add').validate({
               ignore: ".ignore",
                invalidHandler: function(e, validator){
                    if(validator.errorList.length)
                    $('#tabs a[href="#' + jQuery(validator.errorList[0].element).closest(".tab-pane").attr('id') + '"]').tab('show');
                },
               
                errorClass: 'help-block_login animation-slideDown', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.col-md-4 > div').append(error);
                     e.parents('.instrument_details > div').append(error);
                   // e.parents('.basic-wizard > tab').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.col-md-4').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.instrument_details').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block_login').remove();
                },
                success: function(e) {
                    // You can use the following if you would like to highlight with green color the input after successful validation!
                    e.closest('.col-md-4').removeClass('has-success has-error');
                    e.closest('.instrument_details').removeClass('has-success has-error'); // e.closest('.form-group').removeClass('has-success has-error').addClass('has-success');
                    e.closest('.help-block_login').remove();
                },
                rules: {
                    customername: {
                        required: true,
                        minlength: 1
                    },
                   "data[PurchaseRequisition][attn]": {
                        required: true
                    },
                    "data[PurchaseRequisition][ref_no]": {
                        required: true
                    },
                    "data[PurchaseRequisition][instrument_type_id]":{
                        required: true    
                    },
                    
                },
                messages: {
                    customername: {
                        required: 'Customer Name is Required',
                        minlength: 'Customer Name Should Aleast be 1 Characters'
                    }, 
                    "data[PurchaseRequisition][attn]": {
                        required: 'Select Contact person'
                       },
                    "data[PurchaseRequisition][ref_no]": {
                        required: 'Reference No is Required'
                    },
                    "data[PurchaseRequisition][instrument_type_id]":{
                        required: 'Instrument Type is Required'
                    },
                    
                }
                
                
            });
            
            // Initialize Masked Inputs
            // a - Represents an alpha character (A-Z,a-z)
            // 9 - Represents a numeric character (0-9)
            // * - Represents an alphanumeric character (A-Z,a-z,0-9)
            $('#masked_date').mask('99/99/9999');
            $('#masked_date2').mask('99-99-9999');
            $('#masked_phone').mask('(999) 999-9999');
            $('#masked_phone_ext').mask('(999) 999-9999? x99999');
            $('#masked_taxid').mask('99-9999999');
            $('#masked_ssn').mask('999-99-9999');
            $('#masked_pkey').mask('a*-999-a999');
        }
    };
    
}();
$(document).on('click','#form-poapp-view',function(){
                var i = $('#ponumber[]').val();
                alert(i);
                return false;
                if(i==='')
                {
                    alert('wrong');
                }
                else
                {
                    alert('right');
                }
                
            });
            
            
            