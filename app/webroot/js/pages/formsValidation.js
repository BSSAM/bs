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
            
            
            $('#form-assign-add').validate({
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
                    additionalcharge: {
                        required: true,
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
                        maxlength: 2
                    },
                    country_id: {
                        required: true,
                    },
                    currencycode: {
                        required: true,
                        maxlength: 4
                    },
                    exchangerate: {
                        required: true,
                    },
                   
                   
                },
                messages: {
                    symbol: {
                        required: 'Currency Symbol is Required',
                        maxlength: 'The Currency Symbol should have only 2 character'
                    },
                    country_id: {
                        required: 'Country is Required',
                    },
                    currencycode: {
                        required: 'Currency Symbol is Required',
                        maxlength: 'The Currency Symbol must not be more than 4 characters long'
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
                    branchname: {
                        required: true,
                        minlength: 3
                    },
                    address: {
                        required: true,
                        maxlength: 100
                    },
                    phone: {
                        required: true,
                        minlength: 9
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
                    phone: {
                        required: 'Phone No is Required',
                        minlength: 'Phone No should have minimum 9 characters'
                    },
                    
                    
                    
                  
                }
            });
            
            
            $('#form-user-add').validate({
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
                }
            });
            
            $('#form-userrole-add').validate({
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
            
            $('#form-referedby-add').validate({
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
                messages: {
                    sales_customername: {
                        required: 'Customer Name is Required',
                        minlength: 'Customer Name Should Aleast be 1 Characters'
                    }}
                    
                    
                },
                
            });
            
            
            
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