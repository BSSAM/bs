<script> var path='<?PHP echo Router::url('/',true); ?>';</script>
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
            display: none;
        }
    </style>
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
                       // element.options[itemsSelected[i]].disabled = true;
                }			
        } else {
                element.setAttribute("itemsSelected",itemsSelected.toString());	
        }
    }
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
        $scope.titles = [];
        //$scope.brand_id = '';
        $('#val_description').prop('required', true);
        $('#val_quantity').prop('required', true);
        $('#val_model_no').prop('required', true);
        $('#val_brand').prop('required', true);
        $('#val_range').prop('required', true);
        $('#val_call_location').prop('required', true);
        $('#val_call_type').prop('required', true);
        $('#val_account_service').prop('required', true);
        //$('#val_description').prop('required', true);
        //$('#val_quantity').prop('required', true);
        //$("#val_description").attr("required","required");
        //$("#val_quantity").attr("required","required");
        var sales_id = $('#val_salesorderno').val();
        
        $scope.pagination = function(){
           $scope.total = $scope.instruments.length;
           $scope.perpage = 5;

           $scope.length1 = Math.ceil($scope.total/$scope.perpage);

           $scope.no_of_page = [];

           for(i=1;i<=$scope.length1;i++)
           $scope.no_of_page.push(i);

           $scope.start = ($scope.current_page - 1) * $scope.perpage;
           $scope.end = ($scope.current_page * $scope.perpage) - 1;
           
           //console.log($scope.no_of_page);
        }
            $http.post(path_url+'Salesorders/instrument_edit/',{
                        sales_id:sales_id,
                    }).success(function(data){
                        //console.log(data); 
                        //return false;
                        $.each(data,function(k,v){
                            //console.log(k);
                            //console.log(v);
                            //alert(v.Device.account_service);
                            $new_data = {
                                serial:v.Description.id,
                                customer_id:v.Customer.id,
                                salesorder_id:v.Salesorder.id,
                                "id":v.Description.id,
                                "instrument_id":v.Description.instrument_id,
                                name:v.Instrument.name,
                                model:v.Description.model_no,
                                location:v.Description.sales_calllocation,
                                type:v.Description.sales_calltype,
                                "instrument_brand":v.Brand.brandname,
                                brand_id:v.Brand.id,
                                brand_name:v.Brand.brandname,
                                validity:v.Description.sales_validity,
                                "instrument_range":v.Range.range_name,
                                range_id:v.Range.id,
                                price:v.Description.unit_price,
                                service:v.Description.sales_accountservice,
                                total:v.Description.total,
                                "instrument_discount":v.Description.discount,
                                "instrument_department":v.Department.departmentname,
                                "title1_val":v.Description.title1_val,
                                "title2_val":v.Description.title2_val,
                                "title3_val":v.Description.title3_val,
                                "title4_val":v.Description.title4_val,
                                "title5_val":v.Description.title5_val,
                                "title6_val":v.Description.title6_val,
                                "title7_val":v.Description.title7_val,
                                "title8_val":v.Description.title8_val
                            };
                            //console.log($new_data);
                            if(v.Description.title1_val){
                                $scope.show_title1 = true;
                            }
                            if(v.Description.title2_val){
                                $scope.show_title2 = true;
                            }
                            if(v.Description.title3_val){
                                $scope.show_title3 = true;
                            }
                            if(v.Description.title4_val){
                                $scope.show_title4 = true;
                            }
                            if(v.Description.title5_val){
                                $scope.show_title5 = true;
                            }
                            if(v.Description.title6_val){
                                $scope.show_title6 = true;
                            }
                            if(v.Description.title7_val){
                                $scope.show_title5 = true;
                            }
                            if(v.Description.title8_val){
                                $scope.show_title6 = true;
                            }
                            
                            
                            //console.log($new_data);
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
                     //console.log($scope.instruments);
                        $scope.current_page = 1;                 
                        $scope.pagination();
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
<!--<script type="text/javascript">
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
</script>-->
<div class="form-group">
   <label class="col-md-2 control-label" for="val_description">Instrument</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('description', 
                array('id'=>'val_instrument','class'=>'form-control','placeholder'=>'Enter the Instrument','label'=>false,
                    'name'=>'instrument','autoComplete'=>'off','readonly'=>'readonly')); ?>
        <?PHP echo $this->Form->input('instrument_id',array('type'=>'hidden')); ?>
        <?PHP echo $this->Form->input('device_id',array('type'=>'hidden','id'=>'device_id')); ?>
         <span class="help-block_login ins_error">Enter the Instrument Name</span>
        <div id="search_instrument">
        </div>
    </div>
    <label class="col-md-2 control-label" for="sales_quantity">Quantity</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('quantity', array('id'=>'sales_quantity','class'=>'form-control','label'=>false,'name'=>'sales_quantity','readonly'=>'readonly')); ?>
    </div>
        
</div>
<div class="form-group">
    
   
    <label class="col-md-2 control-label" for="val_model_no">Model No</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('model_no', array('id'=>'val_model_no','class'=>'form-control',
                                               'placeholder'=>'Enter the Model Number','label'=>false,'name'=>'model_no','readonly'=>'readonly')); ?>
    </div>
     <label class="col-md-2 control-label" for="val_brand">Brand</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('brand', array('id'=>'val_brand','class'=>'form-control',
                                                'label'=>false,'name'=>'brand_id','type'=>'select','empty'=>'Select Brand','readonly'=>'readonly')); ?>
       
    </div>
        
</div>
<div class="form-group">
    
   
    <label class="col-md-2 control-label" for="sales_range">Range</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('range', array('id'=>'sales_range','class'=>'form-control','label'=>false,'name'=>'sales_range','readonly'=>'readonly')); ?>
    </div>
     <label class="col-md-2 control-label" for="sales_validity">Validity (in months) </label>
    <div class="col-md-4">
        <?php echo $this->Form->input('validity', array('id'=>'sales_validity','class'=>'form-control',
                                                'label'=>false,'name'=>'sales_validity','readonly'=>'readonly','value'=>'12')); ?>
        
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label" for="sales_calllocation">Call Location</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('call_location', array('id'=>'sales_calllocation','class'=>'form-control','empty'=>'Please select Call Location',
                                                'label'=>false,'name'=>'sales_calllocation','type'=>'select','options'=>array('Inlab'=>'In-Lab',
                                                    'subcontract'=>'Sub-Contract','onsite'=>'On Site'),'readonly'=>'readonly')); ?>
    </div>
    <label class="col-md-2 control-label" for="sales_calltype">Call Type</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('call_type', array('id'=>'sales_calltype','class'=>'form-control','label'=>false,'name'=>'sales_calltype',
                                      'placeholder'=>'Enter the Fax Number','type'=>'select','options'=>array('singlas'=>'Singlas',
                                          'no-singlas'=>'Non-Singlas'),'readonly'=>'readonly')); ?>
    </div>
</div>

<!--<div class="form-group">
    <label class="col-md-2 control-label" for="sales_unitprice">Unit Price</label>
    <div class="col-md-4">-->
        <?php echo $this->Form->input('sales_unitprice', array('id'=>'sales_unitprice','class'=>'form-control','type'=>'hidden','label'=>false,
            'name'=>'sales_unitprice','placeholder'=>'Enter the Unit Price','readonly'=>'readonly')); ?>
<!--    </div>
    <label class="col-md-2 control-label" for="sales_discount">Discount </label>
    <div class="col-md-4">-->
        <?php echo $this->Form->input('sales_discount', array('id'=>'sales_discount','class'=>'form-control',
                                                'placeholder'=>'Enter the discount','label'=>false,'name'=>'sales_discount','type'=>'hidden','readonly'=>'readonly')); ?>
<!--    </div>
</div>-->

<div class="form-group">
    <label class="col-md-2 control-label" for="val_department">Department</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('department', array('id'=>'val_department','class'=>'form-control','label'=>false,
                                      'name'=>'department','placeholder'=>'Enter the Departmnent Name','readonly'=>'readonly')); ?>
        <?PHP echo $this->Form->input('department_id',array('type'=>'hidden','id'=>'sales_department_id')); ?>
    </div>
    <label class="col-md-2 control-label" for="sales_accountservice">Account Service</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('sales_accountservice', array('id'=>'sales_accountservice','class'=>'form-control',
                                      'label'=>false,'name'=>'sales_accountservice','options'=>array('calibration service'=>'Calibration Service'),
                                      'empty'=>'Select Account Service','readonly'=>'readonly')); ?>
    </div>
</div>
<div class="form-group">
    
    
    <label class="col-md-2 control-label" for="sales_titles">Titles</label>
    <div class="col-md-4">
        <?php echo $this->Form->input('sales_titles', array('id'=>'sales_titles','class'=>'form-control','label'=>false,'name'=>'sales_titles','type'=>'select',
            'options'=>$titles,'readonly'=>'readonly')); ?>
    </div>
</div>
<!--<div class="form-group form-actions">
    <div class="col-md-9 col-md-offset-10 sales_update_device">
        <?php  //echo $this->Form->button('<i class="fa fa-plus fa-fw"></i> add',array('type'=>'button','class'=>'btn btn-sm btn-primary sales_description_add','escape' => false)); ?>
    </div>
</div>-->
<div class="col-md-12 col-sm-3 clearfix">
  <div class="pull-left dataTables_paginate paging_bootstrap custom_pagination">
        <ul ng-repeat="pg in no_of_page" class="pagination pagination-sm remove-margin">
            
            <li ng-click="set_page(pg);"><a href="#">{{pg}}</a></li>
          
        </ul>
    </div>
<div class="pull-right col-md-3 col-sm-3">
<label>
<div class="input-group">
    <input type="text" ng-model="sss" ng-change="filter_and_set((instruments | filter:sss).length);" class="form-control" placeholder="Search">
    <span class="input-group-addon"><i class="fa fa-search"></i></span>
</div>
</label>
</div>
</div>
<div class="col-sm-3 col-lg-12">
<div class="table-responsive">
<table class="table table-vcenter table-condensed table-bordered">
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
            
<!--            <th class="text-center">Action</th>-->
        </tr>
    </thead>
    <tbody class="Instrument_info"> 
        <tr ng-repeat="res in instruments | filter:sss" ng-show="start<=$index && $index <= end">
            
            <td>{{$index + 1}}</td>
            <td>{{res.name}}</td>
            <td>{{res.model}}</td>
            <td>{{res.brand_name}}</td>
            <td>{{res.instrument_range}}</td>
            <td>{{res.location}}</td>
            <td>{{res.type}}</td>
            <td>{{res.validity}}</td>
<!--            <td>{{res.price}}</td>-->
            <td>{{res.service}}</td>
<!--            <td>{{res.total}}</td>-->
            <td ng-show="show_title1" class="text-center edit_title1" id="{{res.serial}}">{{res.title1_val}}</td>
            <td ng-show="show_title2" class="text-center edit_title2" id="{{res.serial}}">{{res.title2_val}}</td>
            <td ng-show="show_title3" class="text-center edit_title3" id="{{res.serial}}">{{res.title3_val}}</td>
            <td ng-show="show_title4" class="text-center edit_title4" id="{{res.serial}}">{{res.title4_val}}</td>
            <td ng-show="show_title5" class="text-center edit_title5" id="{{res.serial}}">{{res.title5_val}}</td>
            <td ng-show="show_title6" class="text-center edit_title6" id="{{res.serial}}">{{res.title6_val}}</td>
            <td ng-show="show_title7" class="text-center edit_title7" id="{{res.serial}}">{{res.title7_val}}</td>
            <td ng-show="show_title8" class="text-center edit_title8" id="{{res.serial}}">{{res.title8_val}}</td>
<!--            <td>
                <div class="btn-group">
                            <a ng-click="edit_instrument($index)" class="btn btn-xs btn-default" data-toggle="tooltip" title="Edit">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a ng-click="delete_instrument($index)" data-toggle="tooltip" title="Delete" class="btn btn-xs btn-danger">
                                <i class="fa fa-times"></i>
                            </a>
                </div>
                
            </td>-->
        </tr>
        <tr ng-hide="instruments.length"><td colspan="10">No Instruments found</td></tr>
    </tbody>
</table>
</ng-form>
</div>
</div>