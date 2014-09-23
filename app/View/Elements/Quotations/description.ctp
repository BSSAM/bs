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
                $("#search_instrument").html(html).show();
            }
            });
        }
        return false;    
    });});

$('#val_title').multiselect({
    onChange: function(option, checked) {
        alert("sd");
        var selected = 0;
        $('option', $('#val_title')).each(function() {
            if ($(this).prop('selected')) {
                selected++;
            }
        });
 
        if (selected >= 1) {
            $('#val_title').siblings('div').children('ul').dropdown('toggle');
        }
    }
});

    function Quotationcontroller($scope, $timeout, $http)
    {
        $scope.show_serial = false;
        $scope.show_potno = false;
        $scope.instruments = [];
        //
        
        $scope.title_change = function()
        {
            var customer_id =   $('#QuotationCustomerId').val();
            var quotation_id =   $('#QuotationQuotationId').val();
            var instrument_id   =   $('#QuotationInstrumentId').val();
            var instrument_quantity =   $('#val_quantity').val();
            var instrument_name=$('#val_description').val();
            var instrument_modelno=$('#val_model_no').val();
            var instrument_brand=$('#val_brand').val();
            var instrument_range=$('#val_range').val();
            var instrument_calllocation=$('#val_call_location').val();
            var instrument_calltype=$('#val_call_type').val();
            var instrument_validity=$('#val_validity').val();
            var instrument_unitprice=$('#val_unit_price').val();
            var instrument_discount=$('#val_discount').val();
            var instrument_cal=instrument_unitprice*instrument_discount/100;
            var instrument_total= instrument_unitprice - instrument_cal;

            var instrument_department=$('#val_department_id').val();
            var instrument_account=$('#val_account_service').val();
            var instrument_title=$('#val_title').val();
             
             //{"instrument_validity":instrument_validity,"customer_id":customer_id,"instrument_id":instrument_id,"instrument_quantity":instrument_quantity,"instrument_brand":instrument_brand,"instrument_modelno":instrument_modelno,"instrument_range":instrument_range,"instrument_calllocation":instrument_calllocation,"instrument_calltype":instrument_calltype,"instrument_unitprice":instrument_unitprice,"instrument_discount":instrument_discount,"instrument_department":instrument_department,"instrument_account":instrument_account,"instrument_title":instrument_title,"instrument_total":instrument_total,"quotationno":quotation_id}
             
            for ( var i = 1; i <= instrument_quantity; i++ ){
                $http.post(path_url+'Quotations/add_instrument/', "instrument_validity="+instrument_validity+"&customer_id="+customer_id+"&instrument_id="+instrument_id+"&instrument_quantity="+instrument_quantity+"&instrument_brand="+instrument_brand+"&instrument_modelno="+instrument_modelno+"&instrument_range="+instrument_range+"&instrument_calllocation="+instrument_calllocation+"&instrument_calltype="+instrument_calltype+"&instrument_unitprice="+instrument_unitprice+"&instrument_discount="+instrument_discount+"&instrument_department="+instrument_department+"&instrument_account="+instrument_account+"&instrument_title="+instrument_title+"&instrument_total="+instrument_total+"&quotationno="+quotation_id).success(function(data){
                    $new_data = {serial:data,name:instrument_name,model:instrument_modelno,location:instrument_calllocation,type:instrument_calltype,validity:instrument_validity,price:instrument_unitprice,service:instrument_account,total:instrument_total};
                    $scope.instruments.push($new_data);
                });
                //$new_data = {serial:i,name:instrument_name,model:instrument_modelno,location:instrument_calllocation,type:instrument_calltype,validity:instrument_validity,price:instrument_unitprice,service:instrument_account,total:instrument_total};
                
            }
            //console.log($scope.titles);
            if($scope.titles.indexOf("0") != "-1")
                $scope.show_serial = true;
            if($scope.titles.indexOf("1") != "-1")
                $scope.show_potno = true;

            $scope.pagination();
        }
       $scope.no_of_page = [];
       $scope.current_page = 1;
       $scope.start = 0;
       $scope.end = 0;
       $scope.pagination = function(){
           $scope.total = $scope.instruments.length;
           $scope.perpage = 5;

           $scope.length = Math.ceil($scope.total/$scope.perpage);

           $scope.no_of_page = [];

           for(i=1;i<=$scope.length;i++)
           $scope.no_of_page.push(i);

           $scope.start = ($scope.current_page - 1) * $scope.perpage;
           $scope.end = ($scope.current_page * $scope.perpage) - 1;
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

           $scope.length = Math.ceil($scope.total/$scope.perpage);

           $scope.no_of_page = [];

            for(i=1;i<=$scope.length;i++)
           $scope.no_of_page.push(i);

           $scope.start = ($scope.current_page - 1) * $scope.perpage;
           $scope.end = ($scope.current_page * $scope.perpage) - 1;
       }
    }
</script>
<div class="form-group" >
     <label class="col-md-2 control-label" for="val_description">Instrument</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('description', 
                array('id'=>'val_description','class'=>'form-control','placeholder'=>'Enter the Description','label'=>false,
                    'name'=>'description','autoComplete'=>'off')); ?>
        <?PHP echo $this->Form->input('instrument_id',array('type'=>'hidden')); ?>
        <?PHP echo $this->Form->input('device_id',array('type'=>'hidden','id'=>'device_id')); ?>
         <span class="help-block_login ins_error">Enter the Instrument Name</span>
         <span class="help-block_login inscus_error">Instrument Needs Customer Details</span>
        <div id="search_instrument">  </div>
    </div>
    <label class="col-md-2 control-label" for="val_quantity">Quantity</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('quantity', array('id'=>'val_quantity','class'=>'form-control','label'=>false,'name'=>'quantity')); ?>
        <span class="help-block_login insqn_error">Enter the Instrument Quantity</span>
    </div>
        
</div>
    
<div class="form-group">
    <label class="col-md-2 control-label" for="val_address">Model No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('model_no', array('id'=>'val_model_no','class'=>'form-control',
                                               'placeholder'=>'Enter the Model Number','label'=>false,'name'=>'model_no')); ?>
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
        <?php echo $this->Form->input('brand', array('id'=>'val_brand','class'=>'form-control',
                                                'label'=>false,'name'=>'brand','type'=>'select','empty'=>'Select Brand')); ?>
        <span class="help-block_login insbr_error">Enter the Instrument Brand</span>
    </div>
    <label class="col-md-2 control-label" for="val_range">Range</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('range', array('id'=>'val_range','class'=>'form-control',
                                                'label'=>false,'name'=>'range','type'=>'select','empty'=>'Select Range')); ?>
       <span class="help-block_login insra_error">Enter the Instrument Range</span>
    </div>
</div>
<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_call_location">Call Location</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('call_location', array('id'=>'val_call_location','class'=>'form-control',
                                                'label'=>false,'name'=>'call_location','type'=>'select','options'=>array('Inlab'=>'In-Lab',
                                                    'subcontract'=>'Sub-Contract','onsite'=>'On Site'),'empty'=>'Select Call Location')); ?>
        <span class="help-block_login inscal_error">Enter the Call Location</span>
    </div>
    <label class="col-md-2 control-label" for="val_call_type">Call Type</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('call_type', array('id'=>'val_call_type','class'=>'form-control','label'=>false,'name'=>'call_type',
                                      'type'=>'select','options'=>array('Non-Singlas'=>'Non-Singlas','Singlas'=>'Singlas'))); ?>
    </div>
</div>

<div class="form-group">
    
    <label class="col-md-2 control-label" for="val_discount1">Discount </label>
    <div class="col-md-4">
        <?php echo $this->Form->input('discount', array('id'=>'val_discount1','class'=>'form-control',
                                                'placeholder'=>'Enter the discount','label'=>false,'name'=>'discount','type'=>'text')); ?>
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
        <?php echo $this->Form->input('account_service', array('id'=>'val_account_service','class'=>'form-control',
                                      'label'=>false,'name'=>'account_service','options'=>array('calibration service'=>'Calibration Service'),
                                      'empty'=>'Select Account Service')); ?>
        <span class="help-block_login insser_error">Enter the Account Service</span>
    </div>
    
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="val_title">Titles</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('title', array('id'=>'val_title', 'ng-model' => 'titles', 'class'=>'form-control','label'=>false,'name'=>'title',
            'options'=>$titles,'placeholder'=>'Enter the Title','multiple')); ?>
    </div>
</div>
<div class="form-group form-actions">
    <div class="col-md-9 col-md-offset-10 update_device">
        <?php  echo $this->Form->button('<i class="fa fa-plus fa-fw"></i> add',array('type'=>'button', 'ng-click' => 'title_change()', 'class'=>'btn btn-sm btn-primary description_add','escape' => false)); ?>
    </div>
</div>
<ul ng-repeat="pg in no_of_page"><li ng-click="set_page(pg);">{{pg}}</li></ul>
<input type="text" ng-model="sss" ng-change="filter_and_set((instruments | filter:sss).length);">

<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered">
    <thead>
        <tr>
            <th class="text-center">S.No</th>
            <th class="text-center">Instrument</th>
            <th class="text-center">Model No</th>
            <th class="text-center">Call Location</th>
            <th class="text-center">Call Type</th>
            <th class="text-center">Validity</th>
            <th class="text-center">Unit Price</th>
            <th class="text-center">Account Service</th>
            <th class="text-center">Total</th>
            <th class="text-center" ng-show="show_serial">Serialno</th>
            <th class="text-center" ng-show="show_potno">potno</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody class="Instrument_info"> 
        <tr ng-repeat="res in instruments | filter:sss" ng-show="start<=$index && $index <= end">
            <td>{{$index + 1}}</td>
            <td>{{res.name}}</td>
            <td>{{res.model}}</td>
            <td>{{res.location}}</td>
            <td>{{res.type}}</td>
            <td>{{res.validity}}</td>
            <td>{{res.price}}</td>
            <td>{{res.service}}</td>
            <td>{{res.total}}</td>
            <td ng-show="show_serial"></td>
            <td ng-show="show_potno"></td>
            <td></td>
        </tr>
    </tbody>
</table>
   
</div>
</div>