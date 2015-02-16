/*
 *  Document   : instrumentsvalidation.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Forms Validation page
 */
var InstrumentValidation = function() {

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
                    
                    
                },
                messages: {
                    brandname: {
                        required: 'Please enter the Brand Name',
                        minlength: 'Brand Name must consist of at least 3 characters'
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
            
            
            //Customer Instrument Validation 
            $('#form-customerinstrument-adds').validate({
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
                    instrument_name: {
                        required: true,
                        minlength: 1
                },
                    model_no: {
                        required: true,
                        minlength: 1
                },
                    range: {
                        required: true,
                        minlength: 1
                },
                messages: {
                    instrument_name: {
                        required: 'Instrument Name is Required',
                        minlength: 'Instrument Name Should Aleast be 1 Characters'
                    },
                     model_no: {
                        required: 'Model No is Required',
                        minlength: 'Model No Should Aleast be 1 Characters'
                    },
                     range: {
                        required: 'Range is Required',
                        minlength: 'Range Should Aleast be 1 Characters'
                    }
                }
                },
            });
            //Instrument type for group Validation 
            $('#form-group-add').validate({
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
                    group_name: {
                        required: true,
                        minlength: 1
                },
                    group_description: {
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
                        required: true,
                        minlength: "The Group name must contain at least 3 characters",
                    },
                    group_description: {
                        required: true,
                        minlength: "The Group Description must contain at least 3 characters",
                    },
                    quotation: {
                        required: true,
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
            
        }
    }
           
}();