 <h1>
                                <i class="gi gi-user"></i>Edit Currency
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                          <li><?php echo $this->Html->link('Home',array('controller'=>'Dashboards','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Currencies',array('controller'=>'Currencies','action'=>'index')); ?></li>
                        <li>Edit Currency</li>
                    </ul>
                    <!-- END Forms General Header -->

<div class="row">
                        <div class="col-md-12">
                            <!-- Basic Form Elements Block -->
                            <div class="block">
                                <!-- Basic Form Elements Title -->
                                <div class="block-title">
                                    
                                      <h2></h2>
                                </div>
                                <!-- END Form Elements Title -->

                                <!-- Basic Form Elements Content -->
                                 <?php echo $this->Form->create('Currency',array('class'=>'form-horizontal form-bordered','id'=>'form-currency-add')); ?>
                                
                                    <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_symbol">Currency Symbol <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('symbol', array('id'=>'val_symbol','class'=>'form-control','placeholder'=>'Enter the Currency Symbol','label'=>false,'name'=>'symbol')); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="val_country">Country <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('country_id', array('id'=>'val_country','options' => $country,'class'=>'form-control','empty'=>'Enter the Country','label'=>false,'name'=>'country_id')); ?>
                                        </div>
                                   
                                    </div>
                                     <div class="form-group">
                                       
                                        <label class="col-md-2 control-label" for="val_currencycode">Currency Code</label>
                                        <div class="col-md-4">
                                            <?php echo $this->Form->input('currencycode', array('id'=>'val_currencycode','class'=>'form-control','placeholder'=>'Enter the Currency Code','label'=>false,'name'=>'currencycode')); ?>
                                        </div>
                                   
                                        <label class="col-md-2 control-label" for="val_exchangerate">Exchange Rate <span class="text-danger">*</span></label>
                                        <div class="col-md-4">
                                           <?php echo $this->Form->input('exchangerate', array('id'=>'val_exchangerate','class'=>'form-control','placeholder'=>'Enter the Exchange Rate','label'=>false,'name'=>'exchangerate')); ?>
                                        </div>
                                   
                                    </div>
                                    
                                   
                                    
                                     <div class="form-group form-actions">
                                        <div class="col-md-9 col-md-offset-3">
                                            <?php  echo $this->Form->button('<i class="fa fa-angle-right"></i> Submit',array('type'=>'submit','class'=>'btn btn-sm btn-primary','escape' => false)); ?>
                                            <?php echo $this->Form->button('<i class="fa fa-repeat"></i> Reset', array('type'=>'reset','class'=>'btn btn-sm btn-warning','escape' => false)); ?>
<!--                                            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>-->
                                        </div>
                                    </div>
                                <?php echo $this->Form->end(); ?>
                                <!-- END Basic Form Elements Content -->
                            </div>
                            <!-- END Basic Form Elements Block -->
                        </div>
    <?php echo $this->Html->script('pages/formsValidation'); ?>
        <script>$(function(){ FormsValidation.init(); });</script>
         <?php echo $this->Html->script('pages/uiProgress'); ?>
                            <script>$(function(){ UiProgress.init(); });</script>
                                
                                <?php if($this->Session->flash()!='') { ?>
                            <script> var UiProgress = function() {
                                
                                // Get random number function from a given range
                                var getRandomInt = function(min, max) {
                                    return Math.floor(Math.random() * (max - min + 1)) + min;
                                };
                                
                                return {
                                    init: function() {
                                        
                                        
                                        
                                        $.bootstrapGrowl('Country for Currency is Already Exists!', {
                                            type: 'danger',
                                            allow_dismiss: true
                                        });
                                        
                                        $(this).prop('disabled', true);
                                        $('#val_symbol').focus();
                                    }
                                };
                            }();
                            
                            
                            </script> 
                            <?php } ?>
                        
                        