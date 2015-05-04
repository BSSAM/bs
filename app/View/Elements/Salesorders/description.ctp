<script>
    var path='<?PHP echo Router::url('/',true); ?>';
</script>
<script type="text/javascript">
    function setMaximumSelected(amount,element) {
        var itemsSelected = [];
        for (var i=0;i<element.options.length;i++) {
                if (element.options[i].selected) itemsSelected[itemsSelected.length]=i;
        }
        if (itemsSelected.length>5) {
                itemsSelected = element.getAttribute("itemsSelected").split(",");
                for (i=0;i<element.options.length;i++) {
                        element.options[i].selected = false;
                }
                for (i=0;i<itemsSelected.length;i++) {
                        element.options[itemsSelected[i]].selected = true;
                }			
        } else {
                element.setAttribute("itemsSelected",itemsSelected.toString());	
        }
    }
</script>
<script language=Javascript>
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
         return true;
      }
   </script>
<style>
    .sales_instrument_id
	{
		padding:10px; 
		border-bottom:1px #999 dashed;
		font-size:15px; 
		height:50px;
                float: top;
	}
	.sales_instrument_id:hover
	{
		background:#4c66a4;
		color:#FFF;
		cursor:pointer;
	}
        #search_instrument{
            position: absolute;
            z-index: 999;
            display:none;
        }
    </style>
<script type="text/javascript">
    $(function(){
    $("#val_instrument").keyup(function() 
    { 
        var instrument = $(this).val();
        var customer_id = $('#SalesorderCustomerId').val();
        var dataString = 'customer_id='+ customer_id+'&instrument='+instrument;
        
        if(customer_id!='')
        {
            $.ajax({
            type: "POST",
            url: path_url+"salesorders/instrument_search",
            data: dataString,
            cache: false,
            success: function(html)
            {
                $("#search_instrument").html(html).show();
            }
            });
        }return false;    
    });
    
    });
    $(function(){
$("#search_cusinstrument").hide();
    $("#val_model_no").keyup(function() 
    { 
       
        var model_no = $(this).val(); //alert(model_no);
        var customer_id = $('#SalesorderCustomerId').val();
        //alert(instrument);
        var device_id = $('#SalesorderInstrumentId').val();
        //alert(customer_id);
        var dataString = 'device_id='+ device_id+'&model_no='+model_no+'&customer_id='+customer_id;
        if(device_id!='')
        {
            $.ajax({
            type: "POST",
            url: path_url+"Salesorders/model_search",
            data: dataString,
            cache: false,
            success: function(html)
            {
                //console.log(html);
                //return false;
                $("#search_cusinstrument").html(html).show();
            }
            });
        }
        return false;    
    });});
    $('#val_instrument').blur(function(){
         $(this).val('');
         $('#search_instrument').fadeOut();
    });
    function Salesordercontroller($scope, $timeout, $http)
    {
        $scope.show_title1 = false;
        $scope.show_title2 = false;
        $scope.show_title3 = false;
        $scope.show_title4 = false;
        $scope.show_title5 = false;
        $scope.show_title6 = false;
        $scope.show_title7 = false;
        $scope.show_title8 = false;
        $scope.instruments = [];
        $scope.mode = 'add';
        $scope.edit_id = '';
        $scope.no_of_page = [];
        $scope.current_page = 1;
        $scope.start = 0;
        $scope.end = 0;
        $scope.edit_index = '';
//        $('#val_description').prop('required', true);
//        $('#val_quantity').prop('required', true);
//        $('#val_model_no').prop('required', true);
//        $('#val_brand').prop('required', true);
//        $('#val_range').prop('required', true);
//        $('#sales_call_location').prop('required', true);
//        $('#sales_call_type').prop('required', true);
//        $('#val_account_service').prop('required', true);
        //$('#val_description').prop('required', true);
        //$('#val_quantity').prop('required', true);
        //$("#val_description").attr("required","required");
        //$("#val_quantity").attr("required","required");
        $('#sales_quantity').prop("disabled", false);
        $('#val_instrument').prop("disabled", false);
       
        $(".error-custom").change(function(){
            $(".error-custom").each(function(){
                    if(($(this).val()).trim())
                    {
                        $(this).parents(".col-md-4").find('.name_error').removeClass('animation-slideDown');
                        $(this).parents(".col-md-4").find('.name_error').css('color','red');
                        $(this).parents(".col-md-4").find('.name_error').hide();
                    }
                    else
                    {
                        $(this).parents(".col-md-4").find('.name_error').addClass('animation-slideDown');
                        $(this).parents(".col-md-4").find('.name_error').css('color','red');
                        $(this).parents(".col-md-4").find('.name_error').show();
                    }
            });
        });    
            
        $scope.title_change = function()
        {
                //$("#val_description").attr("required","required");
                //$("#val_quantity").attr("required","required");
                 
                
                var customer_id =   $('#SalesorderCustomerId').val();
                var salesorder_id =   $('#SalesorderSalesorderId').val();
                var instrument_id   =   $('#SalesorderInstrumentId').val();
                var instrument_quantity =   $('#sales_quantity').val();
                var instrument_name=$('#val_instrument').val();
                var instrument_modelno=$('#val_model_no').val();
                var instrument_brand_text =$('#val_brand option:selected').text();
                var instrument_brand=$('#val_brand').val();
                var instrument_range_text =$('#sales_range option:selected').text();
                var instrument_range=$('#sales_range').val();
                var instrument_calllocation=$('#sales_calllocation').val();
                var instrument_calltype=$('#sales_calltype').val();
                var instrument_validity=$('#sales_validity').val();
                var instrument_unitprice=$('#sales_unitprice').val();
                var instrument_discount=$('#sales_discount').val();
                var instrument_cal=instrument_unitprice*instrument_discount/100;
                var instrument_total= instrument_unitprice - instrument_cal;

                var instrument_department=$('#sales_department_id').val();
                var instrument_account=$('#sales_accountservice').val();
                var instrument_title=$('#val_title').val();

                errr = 0;
                
                $(".error-custom").each(function(){
                    if(($(this).val()).trim())
                    {
                        $(this).parents(".col-md-4").find('.name_error').removeClass('animation-slideDown');
                        $(this).parents(".col-md-4").find('.name_error').css('color','red');
                        $(this).parents(".col-md-4").find('.name_error').hide();
                    }
                    else
                    {
                        $(this).parents(".col-md-4").find('.name_error').addClass('animation-slideDown');
                        $(this).parents(".col-md-4").find('.name_error').css('color','red');
                        $(this).parents(".col-md-4").find('.name_error').show();
                        errr++;
                    }
                });
                
                if(errr)
                    return false;
                
                
                    $http.post(path_url+'Salesorders/sales_add_instrument_2/',{
                        instrument_quantity:instrument_quantity,
                        "instrument_validity":instrument_validity,
                        "customer_id":customer_id,
                        "instrument_id":instrument_id,
                        instrument_name:instrument_name,
    //                    "instrument_quantity":instrument_quantity,
                        "instrument_brand":instrument_brand,
                        "instrument_brand_text":instrument_brand_text,
                        "instrument_modelno":instrument_modelno,
                        "instrument_range_text":instrument_range_text,
                        "instrument_range":instrument_range,
                        "instrument_calllocation":instrument_calllocation,
                        "instrument_calltype":instrument_calltype,
                        "instrument_unitprice":instrument_unitprice,
                        "instrument_discount":instrument_discount,
                        "instrument_department":instrument_department,
                        "instrument_account":instrument_account,
                        "instrument_title":instrument_title,
                        "instrument_total":instrument_total,
                        "salesorder_id":salesorder_id
                    }).success(function(data){
                        //alert(data);
                        $.each(data,function(k,v){
                            //console.log(k);
                            //console.log(v);
                            //,"id":k
                            $new_data = {serial:v,customer_id:customer_id,salesorder_id:salesorder_id,"id":v,"instrument_id":instrument_id,name:instrument_name,model:instrument_modelno,location:instrument_calllocation,type:instrument_calltype,"instrument_brand":instrument_brand,"instrument_brand_text":instrument_brand_text,"instrument_range_text":instrument_range_text,validity:instrument_validity,"instrument_range":instrument_range,service:instrument_account,"instrument_title":instrument_title,"instrument_department":instrument_department,total:instrument_total,"instrument_discount":instrument_discount,price:instrument_unitprice};
                            $scope.instruments.push($new_data);
                            setTimeout(
                                    function(){
                            $('.edit_title1').editable(path_url+'/Salesorders/update_title1', {
                                    id        : 'device_id',
                                    name      : 'title1',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit',
                                    
                               });
                            $('.edit_title2').editable(path_url+'/Salesorders/update_title2', {
                                    id        : 'device_id',
                                    name      : 'title2',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title3').editable(path_url+'/Salesorders/update_title3', {
                                    id        : 'device_id',
                                    name      : 'title3',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title4').editable(path_url+'/Salesorders/update_title4', {
                                    id        : 'device_id',
                                    name      : 'title4',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title5').editable(path_url+'/Salesorders/update_title5', {
                                    id        : 'device_id',
                                    name      : 'title5',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title6').editable(path_url+'/Salesorders/update_title6', {
                                    id        : 'device_id',
                                    name      : 'title6',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title7').editable(path_url+'/Salesorders/update_title7', {
                                    id        : 'device_id',
                                    name      : 'title7',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title8').editable(path_url+'/Salesorders/update_title8', {
                                    id        : 'device_id',
                                    name      : 'title8',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });},50);
                        });
                        $scope.pagination();
                        $('#sales_quantity').val(null);
                        $('#val_instrument').val(null);
                        $('#val_model_no').val(null);
                        $('#val_brand').empty().append('<option value="">Select Brand</option>');
                        $('#sales_range').empty().append('<option value="">Select Range</option>');
                        $('#sales_range').trigger('chosen:updated');
                        $('#val_brand').trigger('chosen:updated');
                    });

                if($scope.titles.indexOf("0") != "-1")
                    $scope.show_title1 = true;
                if($scope.titles.indexOf("1") != "-1")
                    $scope.show_title2 = true;
                if($scope.titles.indexOf("2") != "-1")
                    $scope.show_title3 = true;
                if($scope.titles.indexOf("3") != "-1")
                    $scope.show_title4 = true;
                if($scope.titles.indexOf("4") != "-1")
                    $scope.show_title5 = true;
                if($scope.titles.indexOf("5") != "-1")
                    $scope.show_title6 = true;
                if($scope.titles.indexOf("6") != "-1")
                    $scope.show_title7 = true;
                if($scope.titles.indexOf("7") != "-1")
                    $scope.show_title8 = true;

                    
//                    $scope.ins_sales_model = null;
//                    $scope.quan_sales_model = null;
//                    $scope.model_sales_model = null;
//                    $scope.brand_sales_model = null;
//                    $scope.range_sales_model = null;
                    
//                    $('#val_description').val(null);
//                    $('#val_description').removeAttr("required");
//                    $('#val_quantity').removeAttr("required");
//                    $('#val_description').prop('required', false);
//                    $('#val_quantity').prop('required', false);
//                    $('#val_model_no').prop('required', false);
//                    $('#val_brand').prop('required', false);
//                    $('#val_range').prop('required', false);
//                    $('#val_call_location').prop('required', false);
//                    $('#val_call_type').prop('required', false);
//                    $('#val_account_service').prop('required', false);
            
        }
       
       
       $scope.update_instrument = function()
       {
           //res = $scope.instruments[index];
           //console.log(res);
            $scope.mode = 'add';
//            var customer_id =   $('#QuotationCustomerId').val();
//            var quotation_id =   $('#QuotationQuotationId').val();
//            var instrument_id   =   $('#QuotationInstrumentId').val();
//            var instrument_quantity =   $('#val_quantity').val();
//            var instrument_name=$('#val_description').val();
//            var instrument_modelno=$('#val_model_no').val();
//            var instrument_brand=$('#val_brand').val();
//            var instrument_range=$('#val_range').val();
//            var instrument_calllocation=$('#val_call_location').val();
//            var instrument_calltype=$('#val_call_type').val();
//            var instrument_validity=$('#val_validity').val();
//            var instrument_unitprice=$('#val_unit_price').val();
//            var instrument_discount=$('#val_discount').val();
//            var instrument_cal=instrument_unitprice*instrument_discount/100;
//            var instrument_total= instrument_unitprice - instrument_cal;
//
//            var instrument_department=$('#val_department_id').val();
//            var instrument_account=$('#val_account_service').val();
//            var instrument_title=$('#val_title').val();
                var customer_id =   $('#SalesorderCustomerId').val();
                var salesorder_id =   $('#SalesorderSalesorderId').val();
                var instrument_id   =   $('#SalesorderInstrumentId').val();
                var instrument_quantity =   $('#sales_quantity').val();
                var instrument_name=$('#val_instrument').val();
                var instrument_modelno=$('#val_model_no').val();
                var instrument_brand_text =$('#val_brand option:selected').text();
                var instrument_brand=$('#val_brand').val();
                var instrument_range_text =$('#sales_range option:selected').text();
                var instrument_range=$('#sales_range').val();
                var instrument_calllocation=$('#sales_calllocation').val();
                var instrument_calltype=$('#sales_calltype').val();
                var instrument_validity=$('#sales_validity').val();
                var instrument_unitprice=$('#sales_unitprice').val();
                var instrument_discount=$('#sales_discount').val();
                var instrument_cal=instrument_unitprice*instrument_discount/100;
                var instrument_total= instrument_unitprice - instrument_cal;

                var instrument_department=$('#sales_department_id').val();
                var instrument_account=$('#sales_accountservice').val();
                var instrument_title=$('#val_title').val();
             
                errr = 0;
                
                $(".error-custom").each(function(){
                    if(($(this).val()).trim())
                    {
                        $(this).parents(".col-md-4").find('.name_error').removeClass('animation-slideDown');
                        $(this).parents(".col-md-4").find('.name_error').css('color','red');
                        $(this).parents(".col-md-4").find('.name_error').hide();
                    }
                    else
                    {
                        $(this).parents(".col-md-4").find('.name_error').addClass('animation-slideDown');
                        $(this).parents(".col-md-4").find('.name_error').css('color','red');
                        $(this).parents(".col-md-4").find('.name_error').show();
                        errr++;
                    }
                });

                if(errr)
                    return false;
                
                
                $http.post(path_url+'Salesorders/update_instrument/', {
                    device_id:$scope.edit_id,
                    instrument_quantity:instrument_quantity,
                    "instrument_validity":instrument_validity,
                    "customer_id":customer_id,
                    instrument_name:instrument_name,
                    "instrument_id":instrument_id,
                    "instrument_brand":instrument_brand,
                    "instrument_brand_text":instrument_brand_text,
                    "instrument_modelno":instrument_modelno,
                    "instrument_range_text":instrument_range_text,
                    "instrument_range":instrument_range,
                    "instrument_calllocation":instrument_calllocation,
                    "instrument_calltype":instrument_calltype,
                    "instrument_unitprice":instrument_unitprice,
                    "instrument_discount":instrument_discount,
                    "instrument_total":instrument_total,
                    "instrument_department":instrument_department,
                    "instrument_account":instrument_account,
                    "instrument_title":instrument_title,
                    "salesorder_id":salesorder_id
                }).success(function(data){
                            //console.log(data);
                    //return false;
                    
                    $scope.instruments[$scope.edit_index] = {serial:$scope.edit_id,customer_id:customer_id,salesorder_id:salesorder_id,"instrument_id":instrument_id,name:instrument_name,model:instrument_modelno,location:instrument_calllocation,type:instrument_calltype,"instrument_brand":instrument_brand,"instrument_brand_text":instrument_brand_text,"instrument_range_text":instrument_range_text,validity:instrument_validity,"instrument_range":instrument_range,service:instrument_account,"instrument_title":instrument_title,"instrument_department":instrument_department,total:instrument_total,"instrument_discount":instrument_discount,price:instrument_unitprice};
                        //res = $scope.instruments[$scope.edit_index];
                        //console.log(res);
                    $('#sales_quantity').val(null).prop("disabled", false);
                    $('#val_instrument').val(null).prop("disabled", false);
                    $('#val_model_no').val(null);
                    $('#sales_accountservice').val(null);
                    $('#sales_calllocation').val(null);
                    $('#val_brand').empty().append('<option value="">Select Brand</option>');
                    $('#sales_range').empty().append('<option value="">Select Range</option>');
                    $('#sales_range').trigger('chosen:updated');
                    $('#val_brand').trigger('chosen:updated');
                    $scope.pagination();
                    setTimeout(
                        function(){
                            $('.edit_title1').editable(path_url+'/Salesorders/update_title1', {
                                    id        : 'device_id',
                                    name      : 'title1',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title2').editable(path_url+'/Salesorders/update_title2', {
                                    id        : 'device_id',
                                    name      : 'title2',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title3').editable(path_url+'/Salesorders/update_title3', {
                                    id        : 'device_id',
                                    name      : 'title3',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title4').editable(path_url+'/Salesorders/update_title4', {
                                    id        : 'device_id',
                                    name      : 'title4',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title5').editable(path_url+'/Salesorders/update_title5', {
                                    id        : 'device_id',
                                    name      : 'title5',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title6').editable(path_url+'/Salesorders/update_title6', {
                                    id        : 'device_id',
                                    name      : 'title6',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title7').editable(path_url+'/Salesorders/update_title7', {
                                    id        : 'device_id',
                                    name      : 'title7',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title8').editable(path_url+'/Salesorders/update_title8', {
                                    id        : 'device_id',
                                    name      : 'title8',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                        },50);
                
                });
                
            if($scope.titles.indexOf("0") != "-1")
                $scope.show_title1 = true;
            if($scope.titles.indexOf("1") != "-1")
                $scope.show_title2 = true;
            if($scope.titles.indexOf("2") != "-1")
                $scope.show_title3 = true;
            if($scope.titles.indexOf("3") != "-1")
                $scope.show_title4 = true;
            if($scope.titles.indexOf("4") != "-1")
                $scope.show_title5 = true;
            if($scope.titles.indexOf("5") != "-1")
                $scope.show_title6 = true;
            if($scope.titles.indexOf("6") != "-1")
                $scope.show_title7 = true;
            if($scope.titles.indexOf("7") != "-1")
                $scope.show_title8 = true;
            
                
                
                
       }
       
       $scope.delete_instrument = function(index)
       {
           if($scope.instruments.length == 1)
           {
               alert('One Instrument should be there');
               return false;
           }
           res = $scope.instruments[index];
        
            $http.get(path_url+'Salesorders/delete_instrument/'+res.serial).success(function(data){
               instrument = [];
               
                $.each($scope.instruments, function(k,v){
                  if(k!=index) 
                  instrument.push(v);
               });
               
               $scope.instruments = instrument;
               
               $scope.pagination();
            });
       }
       
       $scope.edit_instrument = function(index)
       {
            res = $scope.instruments[index];
            //console.log(res); return false;
            $scope.mode = 'edit';
            var brand = res.instrument_brand;
            $scope.edit_id = res.serial;
            $scope.edit_index = index;
            var instrument_id = res.instrument_id;
            //alert(instrument_id);
            var customer_id = res.customer_id;
            //alert(customer_id);
            $http.post(path_url+'Salesorders/get_brand_value_edit/',{"instrument_id":instrument_id,"customer_id":customer_id}).success(function(data)
            {
               // alert(instrument_id);
                //console.log(data);
               /// parsedata = $.parseJSON(data);
                var dept    =   data.Instrument;
                $('#val_brand').empty().append('<option value="">Select Brand Name</option>');
//                $('#val_range').empty().append('<option value="">Select Range</option>');
                $.each(data.Instrument.InstrumentBrand, function(k, v)
                {
                     $('#val_brand').append('<option value="'+v.Brand.id+'">'+v.Brand.brandname+'</option>');
                     
                     if(k == (data.Instrument.InstrumentBrand).length - 1)
                     {
                        //console.log(res.instrument_brand);
                        $('#val_brand').val(res.instrument_brand);
                        $('#val_brand option[value="'+res.instrument_brand+'"]').prop('selected', true);
                     }
                });
                $.each(data.Instrument.InstrumentRange, function(k, v)
                {
                     $('#sales_range').append('<option value="'+v.Range.id+'">'+v.Range.range_name+'</option>');
                     
                     if(k == (data.Instrument.InstrumentRange).length - 1)
                     {
                        //console.log(res.instrument_brand);
                        $('#sales_range').val(res.instrument_range);
                        $('#sales_range option[value="'+res.instrument_range+'"]').prop('selected', true);
                     }
                });
                $('#sales_range').trigger('chosen:updated');
                $('#val_brand').trigger('chosen:updated');
                //$('#val_brand').find('<option value="'+res.instrument_brand+'></option>');
               // alert(res.instrument_brand);
//                $.each(parsedata.Instrument.InstrumentRange, function(k, v)
//                {
//                     $('#val_range').append('<option value='+v.Range.id+'>'+v.Range.range_name+'</option>');
//                });
                $('#sales_calllocation option[value="'+res.location+'"]').prop('selected', true);
                $('#sales_calltype option[value="'+res.type+'"]').prop('selected', true);
                $('#sales_accountservice option[value="'+res.service+'"]').prop('selected', true);    
                $('#val_department').val(dept.Department.departmentname);
                setTimeout(
                                    function(){
                            $('.edit_title1').editable(path_url+'/Salesorders/update_title1', {
                                    id        : 'device_id',
                                    name      : 'title1',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title2').editable(path_url+'/Salesorders/update_title2', {
                                    id        : 'device_id',
                                    name      : 'title2',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title3').editable(path_url+'/Salesorders/update_title3', {
                                    id        : 'device_id',
                                    name      : 'title3',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title4').editable(path_url+'/Salesorders/update_title4', {
                                    id        : 'device_id',
                                    name      : 'title4',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title5').editable(path_url+'/Salesorders/update_title5', {
                                    id        : 'device_id',
                                    name      : 'title5',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title6').editable(path_url+'/Salesorders/update_title6', {
                                    id        : 'device_id',
                                    name      : 'title6',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title7').editable(path_url+'/Salesorders/update_title7', {
                                    id        : 'device_id',
                                    name      : 'title7',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title8').editable(path_url+'/Salesorders/update_title8', {
                                    id        : 'device_id',
                                    name      : 'title8',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });},50);
                //$('#val_department_id').val(dept.Department.id);
                //$('#val_model_no').val(parsedata.CustomerInstrument.model_no);
                //$('#QuotationInstrumentId').val(instrument_id);
            });
            var customer_id =   $('#SalesorderCustomerId').val();
                var salesorder_id =   $('#SalesorderSalesorderId').val();
                var instrument_id   =   $('#SalesorderInstrumentId').val();
            $('#SalesorderCustomerId').val(res.customer_id);
            $('#SalesorderSalesorderId').val(res.salesorder_id);
            $('#SalesorderInstrumentId').val(res.instrument_id);
            $('#sales_quantity').val(1).prop("disabled", true);
            $('#val_instrument').val(res.name).prop("disabled", true);
            $('#val_model_no').val(res.model);
            /*setTimeout(function(){
                console.log(res.instrument_brand);
                $('#val_brand').val(res.instrument_brand);
                $('#val_brand option[value="'+res.instrument_brand+'"]').prop('selected', true);
            },500);*/
            //var a = $('#val_brand').val();
            // console.log(a);
            //$("#val_brand option[value='" + res.instrument_brand + "']").attr("selected", 1);
            //$("#val_brand").multiselect("refresh");
            //$("#val_brand option[value='" + res.instrument_brand + "']").attr('selected', 'selected');
            
            //$("#val_brand > option").filter( function() {
            //return $(this).val() == brand; 
            //}).prop('selected', true); //use .prop, not .attr
            $('#sales_range').val(res.instrument_range);
            $('#sales_calllocation').val(res.location);
            $('#sales_calltype').val(res.type);
            $('#sales_validity').val(res.validity);
            $('#val_department').val(res.instrument_department);
            $('#sales_accountservice').val(res.service);
           // $('#val_title').val(res.instrument_title);
        }
       
       
       
       $scope.pagination = function(){
           $scope.total = $scope.instruments.length;
           $scope.perpage = 15;

           $scope.length1 = Math.ceil($scope.total/$scope.perpage);

           $scope.no_of_page = [];

           for(i=1;i<=$scope.length1;i++)
           $scope.no_of_page.push(i);

           $scope.start = ($scope.current_page - 1) * $scope.perpage;
           $scope.end = ($scope.current_page * $scope.perpage) - 1;
           
           console.log($scope.no_of_page);
        }

        $scope.set_page = function(pg)
        {
            $scope.current_page = pg;
            $scope.pagination();
        }

       $scope.filter_and_set = function(total)
       {
           $scope.current_page = 1;
           $scope.total = total;
            $scope.perpage = 5;

           $scope.length1 = Math.ceil($scope.total/$scope.perpage);

           $scope.no_of_page = [];

            for(i=1;i<=$scope.length1;i++)
           $scope.no_of_page.push(i);

           $scope.start = ($scope.current_page - 1) * $scope.perpage;
           $scope.end = ($scope.current_page * $scope.perpage) - 1;
       }
    }
</script>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_description">Instrument <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('description', 
                array('id'=>'val_instrument','class'=>'form-control error-custom','ng-model' => 'ins_sales_model','placeholder'=>'Enter the Description','label'=>false,
                    'name'=>'instrument','autoComplete'=>'off')); ?>
        <?PHP echo $this->Form->input('instrument_id',array('type'=>'hidden')); ?>
        <?PHP echo $this->Form->input('device_id',array('type'=>'hidden','id'=>'device_id')); ?>
         
        <div id="search_instrument"></div>
        <span class="help-block_login ins_error">Enter the Instrument Name</span>
         <span class="name_error">Instrument Name is Required</span>
    </div>
    <label class="col-md-2 control-label" for="sales_quantity">Quantity <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('quantity', array('id'=>'sales_quantity','ng-model' => 'quan_sales_model','class'=>'form-control error-custom','label'=>false,'name'=>'sales_quantity','onkeypress'=>'return isNumberKey(event)','placeholder'=>'Enter the Quantity ( only Numbers )')); ?>
        <span class="name_error">Instrument Quantity is Required</span>
    </div>
        
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_model_no">Model No <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('model_no', array('id'=>'val_model_no','ng-model' => 'model_sales_model','class'=>'form-control error-custom',
                                               'placeholder'=>'Enter the Model Number','label'=>false,'name'=>'model_no','autoComplete'=>'off')); ?>
        <div id="search_cusinstrument">  </div>
         <?php //echo $this->Form->input('model_no', array('id'=>'val_model_no','class'=>'form-control',
                                                //'label'=>false,'name'=>'model_no','type'=>'select','empty'=>'Enter the Model Number')); ?>
        <span class="help-block_login insmo_error">Enter the Instrument Model No</span>
        <span class="name_error">Instrument Model No is Required</span>
    </div>
    
    
    <label class="col-md-2 control-label" for="val_brand">Brand <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('brand', array('id'=>'val_brand','class'=>'form-control select-chosen error-custom','ng-model' => 'brand_sales_model',
                                                'label'=>false,'name'=>'brand_id','type'=>'select','empty'=>'Select Brand')); ?>
        <span class="help-block_login brand_error">Select the Brand Name</span>
        <span class="name_error">Instrument Brand is Required</span>
    </div>
        
</div>
<div class="form-group">
    
    
    <label class="col-md-2 control-label" for="sales_range">Range <span class="text-danger">*</span></label>
    <div class="col-md-4">
         <?php echo $this->Form->input('range', array('id'=>'sales_range','class'=>'form-control select-chosen error-custom','ng-model' => 'range_sales_model',
                                                'label'=>false,'name'=>'range_id','type'=>'select','empty'=>'Select Range')); ?>
        <span class="name_error">Instrument Range is Required</span>
        
    </div>
    <label class="col-md-2 control-label" for="sales_validity">Validity (in months) </label>
    <div class="col-md-4">
        <?php echo $this->Form->input('validity', array('id'=>'sales_validity','class'=>'form-control',
                                                'label'=>false,'name'=>'sales_validity','disabled'=>'disabled','value'=>'12')); ?>
      
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="sales_calllocation">Call Location <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('call_location', array('id'=>'sales_calllocation','class'=>'form-control error-custom','ng-model' => 'loca_sales_model',
                                                'label'=>false,'name'=>'sales_calllocation','type'=>'select','options'=>array('Inlab'=>'In-Lab',
                                                    'subcontract'=>'Sub-Contract','onsite'=>'On Site'),'empty'=>'Select Call Location')); ?>
     <span class="name_error">Instrument Cal Location is Required</span>
    </div>
    <label class="col-md-2 control-label" for="sales_calltype">Call Type <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('call_type', array('id'=>'sales_calltype','class'=>'form-control error-custom','label'=>false,'name'=>'sales_calltype','ng-model' => 'type_sales_model',
                                      'type'=>'select','options'=>array('Singlas'=>'Singlas',
                                          'Non-Singlas'=>'Non-Singlas'),'empty'=>'Select Call Type')); ?>
        <span class="name_error">Instrument Cal Type is Required</span>
    </div>
</div>


        <?php echo $this->Form->input('sales_unitprice', array('id'=>'sales_unitprice','class'=>'form-control','label'=>false,
            'name'=>'sales_unitprice','placeholder'=>'Enter the Unit Price','type'=>'hidden')); ?>
    
        <?php echo $this->Form->input('sales_discount', array('id'=>'sales_discount','class'=>'form-control',
                                                'placeholder'=>'Enter the discount','label'=>false,'name'=>'sales_discount','type'=>'hidden')); ?>
    

<div class="form-group">
    
    
    <label class="col-md-2 control-label" for="val_department">Department</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('department', array('id'=>'val_department','class'=>'form-control','label'=>false,
                                      'name'=>'department','placeholder'=>'Enter the Departmnent Name','readonly')); ?>
        <?PHP echo $this->Form->input('department_id',array('type'=>'hidden','id'=>'sales_department_id')); ?>
    </div>
     <label class="col-md-2 control-label" for="sales_accountservice">Account Service <span class="text-danger">*</span></label>
    <div class="col-md-4">
        <?php echo $this->Form->input('account_service', array('id'=>'sales_accountservice','class'=>'form-control error-custom','ng-model' => 'service_sales_model',
                                      'label'=>false,'name'=>'sales_accountservice','options'=>array('calibration service'=>'Calibration Service'),
                                      'empty'=>'Select Account Service')); ?>
        <span class="name_error">Account Service is Required</span>
        <?php //echo $this->Form->input('sales_accountservice', array('id'=>'sales_accountservice','class'=>'form-control','ng-model' => 'service_sales_model',
                                      //'label'=>false,'name'=>'sales_accountservice','value'=>'Calibration Service')); ?>
     
    </div>
</div>
<div class="form-group">
    
   
    <label class="col-md-2 control-label" for="sales_titles">Titles</label>
    <div class="col-md-4">
        <?php //echo $this->Form->input('sales_titles', array('id'=>'sales_titles','class'=>'form-control','label'=>false,'name'=>'sales_titles','type'=>'select',
            //'options'=>$titles)); ?>
        <?php echo $this->Form->input('title', array('id'=>'val_title', 'ng-model' => 'titles', 'class'=>'form-control val_title','label'=>false,'name'=>'title',
            'options'=>$titles,'placeholder'=>'Enter the Title','multiple','onclick'=>'setMaximumSelected(5,this)')); ?>
    </div>
</div>
<!--<div class="form-group form-actions">
    <div class="col-md-9 col-md-offset-10 sales_update_device">
        <?php  //echo $this->Form->button('<i class="fa fa-plus fa-fw"></i> add',array('type'=>'button','class'=>'btn btn-sm btn-primary sales_description_add','escape' => false)); ?>
    </div>
</div>-->
<div class="form-group form-actions" ng-show="mode=='add'">
    <div class="col-md-9 col-md-offset-10 sales_update_device">
        <?php  echo $this->Form->button('<i class="fa fa-plus fa-fw"></i> add',array('type'=>'button', 'ng-disabled' => 'salesorder_add.$invalid', 'ng-click' => 'title_change()', 'class'=>'btn btn-sm btn-primary sales_description_add','escape' => false)); ?>
        
    </div>
</div>

<div class="form-group form-actions" ng-show="mode=='edit'">
    <div class="col-md-9 col-md-offset-10 sales_update_device">
        
        <?php  echo $this->Form->button('<i class="fa fa-plus fa-fw"></i> update',array('type'=>'button', 'ng-click' => 'update_instrument()', 'class'=>'btn btn-sm btn-primary sales_description_add','escape' => false)); ?>
    </div>
</div>

 <div class="pull-left dataTables_paginate paging_bootstrap custom_pagination">
        <ul ng-repeat="pg in no_of_page" class="pagination pagination-sm remove-margin">
            
            <li ng-click="set_page(pg);"><a href="#">{{pg}}</a></li>
          
        </ul>
    </div>
<div class="col-md-6 pull-right">
<label>
<div class="input-group">
    <input type="text" ng-model="sss" ng-change="filter_and_set((instruments | filter:sss).length);" class="form-control" placeholder="Search">
    <span class="input-group-addon"><i class="fa fa-search"></i></span>
</div>
</label>
</div>
<script>
$(function(){
       setTimeout(function(){
               $('.dataTable6').after("<div class='new_scroll6'></div>");
               $('.dataTable6').appendTo(".new_scroll6");
           },1000);
       });
</script>
<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
    <table id="Sales-ins" class="table table-vcenter table-condensed table-bordered dataTable6" id="one-datatable">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Instrument</th>
            <th class="text-center">Model No</th>
            <th class="text-center">Brand Name</th>
            <th class="text-center">Range</th>
            <th class="text-center">Cal Location</th>
            <th class="text-center">Cal Type</th>
            <th class="text-center">Validity</th>
<!--            <th class="text-center">Unit Price</th>-->
            <th class="text-center">Account Service</th>
<!--            <th class="text-center">Total</th>-->
            <th class="text-center edit_title1" ng-show="show_title1"><?php echo $titles[0]; ?></th>
            <th class="text-center edit_title2" ng-show="show_title2"><?php echo $titles[1]; ?></th>
            <th class="text-center edit_title3" ng-show="show_title3"><?php echo $titles[2]; ?></th>
            <th class="text-center edit_title4" ng-show="show_title4"><?php echo $titles[3]; ?></th>
            <th class="text-center edit_title5" ng-show="show_title5"><?php echo $titles[4]; ?></th>
            <th class="text-center edit_title6" ng-show="show_title6"><?php echo $titles[5]; ?></th>
            <th class="text-center edit_title7" ng-show="show_title7"><?php echo $titles[6]; ?></th>
            <th class="text-center edit_title8" ng-show="show_title8"><?php echo $titles[7]; ?></th>
            
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody class="sales_Instrument_info"> 
        <tr ng-repeat="res in instruments | filter:sss" ng-show="start<=$index && $index <= end">
            
            <td>{{$index + 1}}</td>
            <td>{{res.name}}</td>
            <td>{{res.model}}</td>
            <td>{{res.instrument_brand_text}}</td>
            <td>{{res.instrument_range_text}}</td>
            <td>{{res.location}}</td>
            <td>{{res.type}}</td>
            <td>{{res.validity}}</td>
<!--            <td>{{res.price}}</td>-->
            <td>{{res.service}}</td>
<!--            <td>{{res.total}}</td>-->
            <td ng-show="show_title1" class="text-center edit_title1" id="{{res.id}}">{{res.title1_val}}</td>
            <td ng-show="show_title2" class="text-center edit_title2" id="{{res.id}}">{{res.title2_val}}</td>
            <td ng-show="show_title3" class="text-center edit_title3" id="{{res.id}}">{{res.title3_val}}</td>
            <td ng-show="show_title4" class="text-center edit_title4" id="{{res.id}}">{{res.title4_val}}</td>
            <td ng-show="show_title5" class="text-center edit_title5" id="{{res.id}}">{{res.title5_val}}</td>
            <td ng-show="show_title6" class="text-center edit_title6" id="{{res.id}}">{{res.title6_val}}</td>
            <td ng-show="show_title7" class="text-center edit_title7" id="{{res.id}}">{{res.title7_val}}</td>
            <td ng-show="show_title8" class="text-center edit_title8" id="{{res.id}}">{{res.title8_val}}</td>
            <td>
                <div class="btn-group">
                            <a ng-click="edit_instrument($index)" class="btn btn-xs btn-default" data-toggle="tooltip" title="Edit">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a ng-click="delete_instrument($index)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger">
                                <i class="fa fa-times"></i>
                            </a>
                </div>
                
            </td>
        </tr>
        <tr ng-hide="instruments.length"><td colspan="12" class="no_instrument{{instruments.length}}">No Instruments found</td></tr>
    </tbody>
</table>
</ng-form>
</div>
</div>
