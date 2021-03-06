<script>var path_url='<?PHP echo Router::url('/',true); ?>';</script>
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
<script type="text/javascript">
    $(function(){
    $("#search_instrument").hide();
    $("#val_description").keyup(function() 
    { 
        var instrument = $(this).val();
        //alert(instrument);
        var customer_id = $('#QuotationCustomerId').val();
        //alert(customer_id);
        var dataString = 'customer_id='+ customer_id+'&instrument='+instrument;
        if(customer_id!='')
        {
            $.ajax({
            type: "POST",
            url: path_url+"Quotations/instrument_search",
            data: dataString,
            cache: false,
            success: function(html)
            {
                //console.log(html);
                //return false;
                $("#search_instrument").html(html).show();
            }
            });
        }
        return false;    
    });
    //$(".val_title").chosen({max_selected_options: 5});
    });
$(function(){
$("#search_cusinstrument").hide();
    $("#val_model_no").keyup(function() 
    { 
       
        var model_no = $(this).val(); //alert(model_no);
        var customer_id = $('#QuotationCustomerId').val();
        //alert(instrument);
        var device_id = $('#QuotationInstrumentId').val();
        //alert(customer_id);
        var dataString = 'device_id='+ device_id+'&model_no='+model_no+'&customer_id='+customer_id;
        if(device_id!='')
        {
            $.ajax({
            type: "POST",
            url: path_url+"Quotations/model_search",
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


//    $('#val_title').multiselect({
//        onChange: function(option, checked) {
//            //alert("sd");
//            var selected = 0;
//            $('option', $('#val_title')).each(function() {
//                if ($(this).prop('selected')) {
//                    selected++;
//                }
//            });
//
//            if (selected >= 1) {
//                $('#val_title').siblings('div').children('ul').dropdown('toggle');
//            }
//        }
//    });
    

    function Quotationcontroller($scope, $timeout, $http)
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
        $scope.titles = '';
//        $('#val_description').prop('required', true);
//        $('#val_quantity').prop('required', true);
//        $('#val_model_no').prop('required', true);
//        $('#val_brand').prop('required', true);
//        $('#val_range').prop('required', true);
//        $('#val_call_location').prop('required', true);
//        $('#val_call_type').prop('required', true);
//        $('#val_account_service').prop('required', true);
        $('#val_quantity').prop("disabled", false);
        $('#val_description').prop("disabled", false);
        //$('#val_description').prop('required', true);
        //$('#val_quantity').prop('required', true);
        //$("#val_description").attr("required","required");
        //$("#val_quantity").attr("required","required");
       
        $scope.validate = function()
        {
            counter = 0;
            val_cus_ins = $('#val_description').val();
            //alert(val_cus_ins);
            $(".error-custom").each(function(){
                if(!($(this).val()).trim())
                {
//                    if((counter == 0) && (val_cus_ins ==''))
//                    {
//                        $(this).parent().parent().addClass('error_custom_data');
//                        //return false;
//                    }
//                    else
//                    {
                        $(this).parent().parent().removeClass('error_custom_data');
                        $(this).parent().parent().addClass('error_data');
                        counter++;
                    //}
                }
                else
                    $(this).parent().parent().removeClass('error_data');
            });
           
            
            if(counter)
                return false;
            else
                return true;
        };
            
        $scope.title_change = function()
        {
                //$("#val_description").attr("required","required");
                //$("#val_quantity").attr("required","required");
                 
                 //if(!$scope.validate())
                  //   return false;
                 
                var customer_id =   $('#QuotationCustomerId').val();
                var quotation_id =   $('#QuotationQuotationId').val();
                var instrument_id   =   $('#QuotationInstrumentId').val();
                var instrument_quantity =   $('#val_quantity').val();
                var instrument_name=$('#val_description').val();
                var instrument_modelno=$('#val_model_no').val();
                var instrument_brand_text =$('#val_brand option:selected').text();
                var instrument_brand=$('#val_brand').val();
                var instrument_range=$('#val_range').val();
                var instrument_range_text =$('#val_range option:selected').text();
                var instrument_calllocation=$('#val_call_location').val();
                var instrument_calltype=$('#val_call_type').val();
                var instrument_validity=$('#val_validity').val();
                var instrument_unitprice=$('#val_unit_price').val();
                var instrument_discount=$('#val_discount1').val();
                var overall_discount=$('#val_discount').val();
                if(overall_discount!==''){
                    instrument_unitprice1 = instrument_unitprice*overall_discount/100;
                    instrument_unitprice = instrument_unitprice-instrument_unitprice1;
                }
                
                //alert(instrument_discount);
                var instrument_cal=instrument_unitprice*instrument_discount/100;
                var instrument_total= instrument_unitprice - instrument_cal;

                var instrument_department=$('#val_department_id').val();
                var instrument_account=$('#val_account_service').val();
                var instrument_title=$('#val_title').val();

                
                    $http.post(path_url+'Quotations/add_instrument/',{
                        instrument_quantity:instrument_quantity,
                        "instrument_validity":instrument_validity,
                        "customer_id":customer_id,
                        "instrument_id":instrument_id,
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
                        "quotationno":quotation_id
                    }).success(function(data){
                         $.each(data,function(k,v){
                            //console.log(k);
                            //console.log(v);
                            //return false;
                            $new_data = {
                                serial:v,
                                customer_id:customer_id,
                                quotation_id:quotation_id,
                                "id":v,
                                "instrument_id":instrument_id,
                                name:instrument_name,
                                model:instrument_modelno,
                                location:instrument_calllocation,
                                type:instrument_calltype,
                                "instrument_brand":instrument_brand,
                                "instrument_brand_text":instrument_brand_text,
                                "instrument_range_text":instrument_range_text,
                                validity:instrument_validity,
                                "instrument_range":instrument_range,
                                price:instrument_unitprice,
                                service:instrument_account,
                                total:instrument_total,
                                "instrument_discount":instrument_discount,
                                "instrument_title":instrument_title,
                                "instrument_department":instrument_department
                            };
                            $scope.instruments.push($new_data);
                            setTimeout(
                                    function(){
                            $('.edit_title1').editable(path_url+'/Quotations/update_title1', {
                                    id        : 'device_id',
                                    name      : 'title1',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit',
                                    
                               });
                            $('.edit_title2').editable(path_url+'/Quotations/update_title2', {
                                    id        : 'device_id',
                                    name      : 'title2',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title3').editable(path_url+'/Quotations/update_title3', {
                                    id        : 'device_id',
                                    name      : 'title3',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title4').editable(path_url+'/Quotations/update_title4', {
                                    id        : 'device_id',
                                    name      : 'title4',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title5').editable(path_url+'/Quotations/update_title5', {
                                    id        : 'device_id',
                                    name      : 'title5',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title6').editable(path_url+'/Quotations/update_title6', {
                                    id        : 'device_id',
                                    name      : 'title6',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title7').editable(path_url+'/Quotations/update_title7', {
                                    id        : 'device_id',
                                    name      : 'title7',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title8').editable(path_url+'/Quotations/update_title8', {
                                    id        : 'device_id',
                                    name      : 'title8',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });},50);
                        });
                        $scope.pagination();
                         $('#val_description').val(null);
                $('#val_quantity').val(null);
                $('#val_model_no').val(null);
                //$('#val_account_service').val(null);
                //$('#val_title').attr("itemsselected","");
                //$('#val_call_location').val(null);
                $('#val_brand').empty().append('<option value="">Select Brand</option>');
                $('#val_range').empty().append('<option value="">Select Range</option>');
                $('#val_unit_price').val(null);
                $('#val_discount1').val(null);
                $('#val_description').val(null);
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
                    //console.log(data);
                      //  return false;
                       
                   
//                    $('#val_description').val(null);
//                    $('#val_description').removeAttr("required");
//                    $('#val_quantity').removeAttr("required");
                    $('#val_description').prop('required', false);
                    $('#val_quantity').prop('required', false);
                    $('#val_model_no').prop('required', false);
                    $('#val_brand').prop('required', false);
                    $('#val_range').prop('required', false);
                    $('#val_call_location').prop('required', false);
                    $('#val_call_type').prop('required', false);
                    $('#val_account_service').prop('required', false);
            
        }
       
       
       $scope.update_instrument = function()
       {
           //res = $scope.instruments[index];
           //console.log(res);
            $scope.mode = 'add';
            var customer_id =   $('#QuotationCustomerId').val();
            var quotation_id =   $('#QuotationQuotationId').val();
            var instrument_id   =   $('#QuotationInstrumentId').val();
            var instrument_quantity =   $('#val_quantity').val();
            var instrument_name=$('#val_description').val();
            var instrument_modelno=$('#val_model_no').val();
            var instrument_brand_text =$('#val_brand option:selected').text();
            var instrument_brand=$('#val_brand').val();
            var instrument_range_text =$('#val_range option:selected').text();
            var instrument_range=$('#val_range').val();
            var instrument_calllocation=$('#val_call_location').val();
            var instrument_calltype=$('#val_call_type').val();
            var instrument_validity=$('#val_validity').val();
            var instrument_unitprice=$('#val_unit_price').val();
            var instrument_discount=$('#val_discount1').val();
            //var overall_discount=$('#val_discount').val();
//            if(overall_discount!==''){
//                instrument_unitprice1 = instrument_unitprice*overall_discount/100;
//                instrument_unitprice = instrument_unitprice-instrument_unitprice1;
//            }
            var instrument_cal=instrument_unitprice*instrument_discount/100;
            var instrument_total= instrument_unitprice - instrument_cal;

            var instrument_department=$('#val_department_id').val();
            var instrument_account=$('#val_account_service').val();
            var instrument_title=$('#val_title').val();
             
            
                $http.post(path_url+'Quotations/update_instrument/', {
                    device_id:$scope.edit_id,
                    instrument_quantity:instrument_quantity,
                    "instrument_validity":instrument_validity,
                    "customer_id":customer_id,
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
                    "instrument_department":instrument_department,
                    "instrument_account":instrument_account,
                    "instrument_title":instrument_title,
                    "instrument_total":instrument_total,
                    "quotationno":quotation_id
                }).success(function(data){
                    //console.log(data);
                    //return false;
        
                   // $scope.instruments[$scope.edit_index] = {serial:$scope.edit_id,customer_id:customer_id,quotation_id:quotation_id,"instrument_id":instrument_id,name:instrument_name,model:instrument_modelno,location:instrument_calllocation,type:instrument_calltype,"instrument_brand":instrument_brand,validity:instrument_validity,"instrument_range":instrument_range,price:instrument_unitprice,service:instrument_account,total:instrument_total,"instrument_discount":instrument_discount,"instrument_title":instrument_title,"instrument_department":instrument_department};
                    $scope.instruments[$scope.edit_index]['serial']=$scope.edit_id;
                    $scope.instruments[$scope.edit_index]['customer_id']=customer_id;
                    $scope.instruments[$scope.edit_index]['quotation_id']=quotation_id;
                    $scope.instruments[$scope.edit_index]['instrument_id']=instrument_id;
                    $scope.instruments[$scope.edit_index]['name']=instrument_name;
                    $scope.instruments[$scope.edit_index]['model']=instrument_modelno;
                    $scope.instruments[$scope.edit_index]['instrument_brand_text']=instrument_brand_text;
                    $scope.instruments[$scope.edit_index]['instrument_range_text']=instrument_range_text;
                    $scope.instruments[$scope.edit_index]['location']=instrument_calllocation;
                    $scope.instruments[$scope.edit_index]['type']=instrument_calltype;
                    $scope.instruments[$scope.edit_index]['instrument_brand']=instrument_brand;
                    $scope.instruments[$scope.edit_index]['validity']=instrument_validity;
                    $scope.instruments[$scope.edit_index]['instrument_range']=instrument_range;
                    $scope.instruments[$scope.edit_index]['price']=instrument_unitprice;
                    $scope.instruments[$scope.edit_index]['service']=instrument_account;
                    $scope.instruments[$scope.edit_index]['total']=instrument_total;
                    $scope.instruments[$scope.edit_index]['instrument_discount']=instrument_discount;
                    $scope.instruments[$scope.edit_index]['instrument_title']=instrument_title;
                    $scope.instruments[$scope.edit_index]['instrument_department']=instrument_department;
                        //res = $scope.instruments[$scope.edit_index];
                        //console.log(res);
                    $scope.pagination();
                    setTimeout(
                        function(){
                            $('.edit_title1').editable(path_url+'/Quotations/update_title1', {
                                    id        : 'device_id',
                                    name      : 'title1',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title2').editable(path_url+'/Quotations/update_title2', {
                                    id        : 'device_id',
                                    name      : 'title2',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title3').editable(path_url+'/Quotations/update_title3', {
                                    id        : 'device_id',
                                    name      : 'title3',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title4').editable(path_url+'/Quotations/update_title4', {
                                    id        : 'device_id',
                                    name      : 'title4',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title5').editable(path_url+'/Quotations/update_title5', {
                                    id        : 'device_id',
                                    name      : 'title5',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title6').editable(path_url+'/Quotations/update_title6', {
                                    id        : 'device_id',
                                    name      : 'title6',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title7').editable(path_url+'/Quotations/update_title7', {
                                    id        : 'device_id',
                                    name      : 'title7',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title8').editable(path_url+'/Quotations/update_title8', {
                                    id        : 'device_id',
                                    name      : 'title8',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                        },50);
                $('#val_description').val(null);
                $('#val_quantity').val(null);
                $('#val_quantity').prop("disabled", false);
                $('#val_description').prop("disabled", false);
                $('#val_model_no').val(null);
                //$('#val_account_service').val(null);
                //$('#val_title').attr("itemsselected","");
                //$('#val_call_location').val(null);
                $('#val_brand').empty().append('<option value="">Select Brand</option>');
                $('#val_range').empty().append('<option value="">Select Range</option>');
                $('#val_unit_price').val(null);
                $('#val_discount1').val(null);
                $('#val_description').val(null);
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
            
//                $('#val_quantity').val(null).prop("disabled", false);
//                $('#val_description').val(null).prop("disabled", false);
                
       }
       
       $scope.delete_instrument = function(index)
       {
           res = $scope.instruments[index];
        
            $http.get(path_url+'Quotations/delete_instrument/'+res.serial).success(function(data){
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
            ///console.log(res);
            $scope.mode = 'edit';
            var brand = res.instrument_brand;
            $scope.edit_id = res.serial;
            $scope.edit_index = index;
            var instrument_id = res.instrument_id;
            //alert(instrument_id);
            var customer_id = res.customer_id;
            //alert(customer_id);
            $http.post(path_url+'Quotations/get_brand_value_edit/',{"instrument_id":instrument_id,"customer_id":customer_id}).success(function(data)
            {
               // alert(instrument_id);
                //console.log(data);
                //console.log(res);
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
                     $('#val_range').append('<option value="'+v.Range.id+'">'+v.Range.range_name+'</option>');
                     
                     if(k == (data.Instrument.InstrumentRange).length - 1)
                     {
                        //console.log(res.instrument_brand);
                        $('#val_range').val(res.instrument_range);
                        $('#val_range option[value="'+res.instrument_range+'"]').prop('selected', true);
                     }
                });
                //$('#val_brand').find('<option value="'+res.instrument_brand+'></option>');
               // alert(res.instrument_brand);
//                $.each(parsedata.Instrument.InstrumentRange, function(k, v)
//                {
//                     $('#val_range').append('<option value='+v.Range.id+'>'+v.Range.range_name+'</option>');
//                });
                $('#val_call_location option[value="'+res.location+'"]').prop('selected', true);
                $('#val_call_type option[value="'+res.type+'"]').prop('selected', true);
                $('#val_account_service option[value="'+res.service+'"]').prop('selected', true);
                $('#val_department').val(dept.Department.departmentname);
                setTimeout(
                                    function(){
                            $('.edit_title1').editable(path_url+'/Quotations/update_title1', {
                                    id        : 'device_id',
                                    name      : 'title1',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title2').editable(path_url+'/Quotations/update_title2', {
                                    id        : 'device_id',
                                    name      : 'title2',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title3').editable(path_url+'/Quotations/update_title3', {
                                    id        : 'device_id',
                                    name      : 'title3',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title4').editable(path_url+'/Quotations/update_title4', {
                                    id        : 'device_id',
                                    name      : 'title4',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title5').editable(path_url+'/Quotations/update_title5', {
                                    id        : 'device_id',
                                    name      : 'title5',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title6').editable(path_url+'/Quotations/update_title6', {
                                    id        : 'device_id',
                                    name      : 'title6',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title7').editable(path_url+'/Quotations/update_title7', {
                                    id        : 'device_id',
                                    name      : 'title7',
                                    type      : 'text',
                                    cancel    : 'Cancel',
                                    submit    : 'Save',
                                    tooltip   : 'Click to edit'
                               });
                            $('.edit_title8').editable(path_url+'/Quotations/update_title8', {
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
            
            $('#QuotationCustomerId').val(res.customer_id);
            $('#QuotationQuotationId').val(res.quotation_id);
            $('#QuotationInstrumentId').val(res.instrument_id);
            $('#val_quantity').val(1).prop("disabled", true);
            $('#val_description').val(res.name).prop("disabled", true);
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
            $('#val_range').val(res.instrument_range);
            $('#val_call_location').val(res.location);
            $('#val_call_type').val(res.type);
            $('#val_validity').val(res.validity);
            $('#val_unit_price').val(res.price);
            $('#val_discount1').val(res.instrument_discount);
            

            $('#val_department_id').val(res.instrument_department);
            $('#val_account_service').val(res.service);
            $('#val_title').val(res.instrument_title);
        }
       
       
       
       $scope.pagination = function(){
           $scope.total = $scope.instruments.length;
           $scope.perpage = 5;

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
<style>
    .quotation_add .help-block_login{
        display:none;
    }
    .quotation_add .error_data .help-block_login{
        display:block !important; color: red;
    }
    .quotation_add .error_data .error-custom{
        border:1px solid red;
    }
    .quotation_add .error_custom_data .help-block_login_cus{
        display:block !important; color: red;
    }
    .quotation_add .error_custom_data .error-custom{
        border:1px solid red;
    }
    
</style>
<div class="quotation_add" >
<div class="form-group" >
     <label class="col-md-2 control-label" for="val_description">Instrument</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('description', 
                array('id'=>'val_description','class'=>'form-control error-custom','ng-model' => 'desc_quo_model','placeholder'=>'Enter the Description','label'=>false,
                    'name'=>'description','autoComplete'=>'off')); ?>
        <?PHP echo $this->Form->input('instrument_id',array('type'=>'hidden')); ?>
        <?PHP echo $this->Form->input('device_id',array('type'=>'hidden','id'=>'device_id')); ?>
        <!-- ng-if="quotation_add.desc_quo_model.$viewValue.length>0" -->
        <span class="help-block_login ins_error">Enter the Instrument Name</span>
        <span class="help-block_login_cus inscus_error">Instrument Needs Customer Details</span>
        <div id="search_instrument" class="instrument_drop">  </div>
    </div>
    <label class="col-md-2 control-label" for="val_quantity">Quantity</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('quantity', array('id'=>'val_quantity','ng-model' => 'quan_quo_model','class'=>'form-control error-custom','label'=>false,'name'=>'quantity')); ?>
        <span class="help-block_login insqn_error">Enter the Instrument Quantity</span>
    </div>
        
</div>
    
<div class="form-group">
    <label class="col-md-2 control-label" for="val_model_no">Model No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('model_no', array('id'=>'val_model_no','ng-model' => 'model_quo_model','class'=>'form-control error-custom',
                                               'placeholder'=>'Enter the Model Number','label'=>false,'name'=>'model_no','autoComplete'=>'off')); ?>
        <div id="search_cusinstrument"  class="instrument_drop" style="display:none;">  </div>
         <?php //echo $this->Form->input('model_no', array('id'=>'val_model_no','class'=>'form-control',
                                                //'label'=>false,'name'=>'model_no','type'=>'select','empty'=>'Enter the Model Number')); ?>
        <span class="help-block_login insmo_error">Enter the Instrument Model No</span>
    </div>
    <label class="col-md-2 control-label" for="val_validity">Validity (in months) </label>
    <div class="col-md-4">
        <?php echo $this->Form->input('validity', array('id'=>'val_validity','class'=>'form-control',
                                                'label'=>false,'name'=>'validity','disabled'=>'disabled','value'=>'12')); ?>
    </div>
</div>
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_brand">Brand</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('brand', array('id'=>'val_brand','class'=>'form-control error-custom','ng-model' => 'brand_quo_model',
                                                'label'=>false,'name'=>'brand','type'=>'select','empty'=>'Select Brand')); ?>
        <span class="help-block_login insbr_error">Enter the Instrument Brand</span>
    </div>
    <label class="col-md-2 control-label" for="val_range">Range</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('range', array('id'=>'val_range','class'=>'form-control error-custom','ng-model' => 'range_quo_model',
                                                'label'=>false,'name'=>'range','type'=>'select','empty'=>'Select Range')); ?>
       <span class="help-block_login insra_error">Enter the Instrument Range</span>
    </div>
</div>
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_call_location">Call Location</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('call_location', array('id'=>'val_call_location','class'=>'form-control error-custom','ng-model' => 'loca_quo_model',
                                                'label'=>false,'name'=>'call_location','type'=>'select','options'=>array('Inlab'=>'In-Lab',
                                                    'subcontract'=>'Sub-Contract','onsite'=>'On Site'),'empty'=>'Select Call Location')); ?>
        <span class="help-block_login inscal_error">Enter the Call Location</span>
    </div>
    <label class="col-md-2 control-label" for="val_call_type">Call Type</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('call_type', array('id'=>'val_call_type','class'=>'form-control','label'=>false,'name'=>'call_type','ng-model' => 'type_quo_model',
                                      'type'=>'select','ng-init'=>'type_quo_model="Singlas"','options'=>array('Non-Singlas'=>'Non-Singlas','Singlas'=>'Singlas'))); ?>
        
    </div>
</div>

<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_discount1">Discount </label>
    <div class="col-md-4">
        <?php echo $this->Form->input('discount', array('id'=>'val_discount1','class'=>'form-control','ng-model' => 'type_quo_discount',
                                                'placeholder'=>'Enter the discount','label'=>false,'name'=>'discount','type'=>'text','max'=>$ins_cost_user)); ?>
    </div>
    <label class="col-md-2 control-label" for="val_unit_price">Unit Price</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('unit_price', array('id'=>'val_unit_price','class'=>'form-control','label'=>false,
            'name'=>'unit_price','placeholder'=>'Enter the Unit Price','disabled'=>'disabled')); ?>
    </div>
</div>

<div class="form-group">
    
  
    <label class="col-md-2 control-label" for="val_department">Department</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('department', array('id'=>'val_department','class'=>'form-control','label'=>false,
                                      'name'=>'department','placeholder'=>'Enter the Departmnent Name','readonly')); ?>
        <?PHP echo $this->Form->input('dept_id',array('id'=>'val_department_id','type'=>'hidden')) ?>
    </div>
     <label class="col-md-2 control-label" for="val_account_service">Account Service</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('account_service', array('id'=>'val_account_service','class'=>'form-control error-custom','ng-model' => 'service_quo_model',
                                      'label'=>false,'name'=>'account_service','options'=>array('calibration service'=>'Calibration Service'),
                                      'empty'=>'Select Account Service')); ?>
        <span class="help-block_login insser_error">Enter the Account Service</span>
    </div>
    
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_title">Titles</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('title', array('id'=>'val_title', 'ng-model' => 'titles', 'class'=>'form-control val_title','label'=>false,'name'=>'title',
            'options'=>$titles,'placeholder'=>'Enter the Title','multiple','onclick'=>'setMaximumSelected(5,this)')); ?>
    </div>
</div>
<div class="form-group form-actions" ng-show="mode=='add'">
    <div class="col-md-9 col-md-offset-10 update_device">
        <?php  echo $this->Form->button('<i class="fa fa-plus fa-fw"></i> add',array('type'=>'button', 'ng-disabled' => 'quotation_add.$invalid', 'ng-click' => 'title_change()', 'class'=>'btn btn-sm btn-primary description_add','escape' => false)); ?>
        
    </div>
</div>

<div class="form-group form-actions" ng-show="mode=='edit'">
    <div class="col-md-9 col-md-offset-10 update_device">
        
        <?php  echo $this->Form->button('<i class="fa fa-plus fa-fw"></i> update',array('type'=>'button', 'ng-click' => 'update_instrument()', 'class'=>'btn btn-sm btn-primary description_add','escape' => false)); ?>
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
<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered" id="Quo-ins">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Instrument</th>
            <th class="text-center">Model No</th>
            <th class="text-center">Brand Name</th>
            <th class="text-center">Range</th>
            <th class="text-center">Call Location</th>
            <th class="text-center">Call Type</th>
            <th class="text-center">Validity</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">Account Service</th>
            <th class="text-center">Total</th>
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
    <tbody class="Instrument_info"> 
        <tr ng-repeat="res in instruments | filter:sss" ng-show="start<=$index && $index <= end">
            
            <td>{{$index + 1}}</td>
            <td>{{res.name}}</td>
            <td>{{res.model}}</td>
            <td>{{res.instrument_brand_text}}</td>
            <td>{{res.instrument_range_text}}</td>
            <td>{{res.location}}</td>
            <td>{{res.type}}</td>
            <td>{{res.validity}}</td>
            <td>{{res.price}}</td>
            <td>{{res.service}}</td>
            <td>{{res.total}}</td>
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
        <tr ng-hide="instruments.length"><td colspan="12">No Instruments found</td></tr>
    </tbody>
</table>
</div>
</div>
</div>