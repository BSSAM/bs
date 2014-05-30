/*
 *  Document   : instrumentsvalidation.js
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
                        minlength: 3
                    },
                    branddescription: {
                        required: true,
                        minlength: 6
                    },
                    
                    
                },
                messages: {
                    brandname: {
                        required: 'Please enter the Brand Name',
                        minlength: 'Brand Name must consist of at least 3 characters'
                    },
                    branddescription: {
                        required: 'Please enter the Brand Description',
                        minlength: 'Description must consist of at least 6 characters'
                    },
                }
            });
            
            /* Unit Module Validation*/
            
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
                        minlength: 3
                    },
                    unit_description: {
                        required: true,
                        minlength: 6
                    },
                    
                    
                },
                messages: {
                    unit_name: {
                        required: 'Please enter the Unit Name',
                        minlength: 'Unit Name must consist of at least 3 characters'
                    },
                    unit_description: {
                        required: 'Please enter the Unit Description',
                        minlength: 'Description must consist of at least 6 characters'
                    },
                }
            });
            
            
            /* Range Module Validation*/
            
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
                    to_range: {
                        required: true,
                        minlength: 1
                    },
                    unit_id: {
                        required: true,
                        minlength: 1
                    },
                   
                    
                    
                },
                messages: {
                    from_range: {
                        required: 'Please enter the Starting Range',
                        minlength: 'Starting Range must consist of at least 1 character'
                    },
                    to_range: {
                        required: 'Please enter the To Range',
                        minlength: 'To Range must consist of at least 1 character'
                    },
                    unit_id: {
                        required: 'Please Select The Unit',
                    },
                }
            });
            
            /*
             * for Procedures Module Form Validation 
             * Changes by Iyappan
             */
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
                        required: true,
                        minlength: 3
                    },
                    department_id: {
                        required: true,
                    },
                    
                },
                messages: {
                    procedure_no: {
                        required: 'Enter Procedure No',
                        minlength: 'Must consist of at least 3 character'
                    },
                    department_id: {
                        required: 'Select Department Name',
                    },
                    
                }
            });
             /*
             * for Instrument(MachineController) Module Form Validation 
             * Changes by Iyappan
             */
            $('#form-machine-add').validate({
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
                    name: {
                        required: true,
                        minlength: 3
                    },
                    name: {
                        required: true,
                        minlength: 3
                    },
                    name: {
                        required: true,
                        minlength: 3
                    },
                    department_id: {
                        required: true,
                    },
                    
                },
                messages: {
                    name: {
                        required: 'Enter Instrument Name',
                        minlength: 'Must consist of at least 3 character'
                    },
                    department_id: {
                        required: 'Select Department Name',
                    },
                    
                }
            });
            
        }
    }
           
}();