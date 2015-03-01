<?php
 
App::import('Vendor','xtcpdf');
 
$pdf = new XTCPDF('L', PDF_UNIT, 'A4', true, 'UTF-8', false);
 
$pdf->AddPage();
$html ='';
$html .= '<h1>
                                <i class="gi gi-usd"></i>Invoice
                            </h1>
                        </div>
                    </div>
                    <ul class="breadcrumb breadcrumb-top">
                        <li>Home</li>
                        <li><a href="#">Invoice</a></li>
                        <li><a href="#">INV015528</a></li>
                    </ul>
                    <!-- END Invoice Header -->

                    <!-- Invoice Block -->
                    <div class="block full">
                        <!-- Invoice Title -->
                        <div class="block-title">
                            <div class="block-options pull-right">
                               <!-- <a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default" data-toggle="tooltip" title="New invoice"><i class="fa fa-plus"></i></a>
                                <a href="javascript:void(0)" class="btn btn-sm btn-alt btn-default" data-toggle="tooltip" title="Delete invoice"><i class="fa fa-times"></i></a>-->
                            </div>
                            <h2><strong>Invoice</strong> #INV015528</h2>
                        </div>
                        <!-- END Invoice Title -->

                        <!-- Invoice Content -->
                        <!-- 2 Column grid -->
                        <div class="row block-section">
                            <!-- Company Info -->
                            <div class="col-sm-6">';

//                                $html.=$this->Html->image("logoBs.png", array("alt"=> "photo","class"=>""));
                               $html.='<hr>
                                <h2><strong>Best Standards Inc.</strong></h2>
                                <address>
                                    41 SENOKO DRIVE<br>
                                    SINGAPORE<br>
                                    758249<br><br>
                                    <i class="fa fa-phone"></i> 6458 4411<br>
                                    <i class="fa fa-envelope-o"></i> <a href="javascript:void(0)">invoice@bestandards.com</a><br>
                                    <a href="javascript:void(0)">GST REG NO. M200510697 / COMPANY REG NO. 200510697M</a>
                                </address>
                           
                                <ul class="list-unstyled">
                                    <li>Being provided calibration service of the following(s) :</li>
                                    <li><br></li>
                                    <dl class="dl-horizontal">
                                    <li><dt>SALES ORDER NO</dt>
                                    <dd><h4><span class="label label-six">BSO-13-000033</span></h4></dd></li>
                                    
                                    <li><dt>DELIVERY ORDER NO</dt>
                                    <dd><h4><span class="label label-warning">BDO-13-000032</span></h4></dd></li></dl>
                                </ul>
                            </div>
                            
                            <!-- END Company Info -->

                            <!-- Client Info -->
                            <div class="col-sm-6 text-right">';
                                
//                           $html.=  $this->Html->image('client.jpg', array('alt' => 'photo','class'=>'')); 
                              $html.='<hr>
                                <h2><strong>Rolls Royce</strong></h2>
                                <address>
                                    6 Tuas Drive 1<br>
                                    Singapore<br>
                                    638673<br><br>
                                    (65) 6862 1901 <i class="fa fa-phone"></i><br>
                                    <a href="javascript:void(0)">business@rolls-royce.com</a> <i class="fa fa-envelope-o"></i>
                                </address>
                                
                                 
                                
                            </div>
                            
                            <!-- END Client Info -->
                        </div>
                        <!-- END 2 Column grid -->
                        <div class="row block">
                            <div class="col-md-4">
                                   <ul class="list-unstyled">
                                   
                                    <dl class="dl-horizontal">
                                    <li><dt>OUR REF NO</dt>
                                    <dd>BSQ-13-000033</dd></li>
                                    <li><br></li>
                                    <li><dt>YOUR REF NO</dt>
                                    <dd>po</dd></li></dl>
                                   </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="list-unstyled">
                                   
                                    <dl class="dl-horizontal">
                                    <li><dt>Date</dt>
                                    <dd>31st July 2013</dd></li>
                                    <li><br></li>
                                    <li><dt>Payment Terms</dt>
                                    <dd>30 Days</dd></li></dl>
                                   </ul>
                            </div>
                            <div class="col-md-4">
                                <ul class="list-unstyled">
                                   
                                    <dl class="dl-horizontal">
                                    <li><dt>ATTN BY</dt>
                                    <dd>Mr.Karthikeyan</dd></li>
                                    <li><br></li>
                                    <li><dt>TEL</dt>
                                    <dd>6543 2272 - 802</dd></li></dl>
                                   </ul>
                            </div>
                        </div>
                        <hr>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table table-vcenter">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th style="width: 40%;">Instrument</th>
                                        <th class="text-center">Brand</th>
                                        <th class="text-center">Model</th>
                                        <th class="text-center">Serial No</th>
                                        <th class="text-center">Quantity</th>
                                        <th class="text-center">Unit Price <br>$(SGD)</th>
                                        <th class="text-right">Total Price <br>$(SGD)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>
                                            <h4>DIGIMATIC MICROMETER</h4>
                                            <span class="label label-danger">Faulty</span>
                                            <span class="label label-info">(9~10)/mm</span>
                                        </td>
                                        <td class="text-center">MITUTOYO</td>
                                        <td class="text-center">53254324</td>
                                        <td class="text-center">53254324</td>
                                        <td class="text-center"><strong>x <span class="badge">1</span></strong></td>
                                        <td class="text-center"><strong>$ 1.000</strong></td>
                                        <td class="text-right"><span class="label label-primary">$ 1.000</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">2</td>
                                        <td>
                                            <h4>DIGIMATIC MICROMETER</h4>
                                            <span class="label label-danger">Faulty</span>
                                            <span class="label label-info">(9~10)/mm</span>
                                        </td>
                                        <td class="text-center">MITUTOYO</td>
                                        <td class="text-center">53254324</td>
                                        <td class="text-center">53254324</td>
                                        <td class="text-center"><strong>x <span class="badge">1</span></strong></td>
                                        <td class="text-center"><strong>$ 1.000</strong></td>
                                        <td class="text-right"><span class="label label-primary">$ 1.000</span></td>
                                    </tr>
                                    <tr>
                                        <td class="text-center">3</td>
                                        <td>
                                            <h4>DIGIMATIC MICROMETER</h4>
                                            <span class="label label-danger">Faulty</span>
                                            <span class="label label-info">(9~10)/mm</span>
                                        </td>
                                        <td class="text-center">MITUTOYO</td>
                                        <td class="text-center">53254324</td>
                                        <td class="text-center">53254324</td>
                                        <td class="text-center"><strong>x <span class="badge">1</span></strong></td>
                                        <td class="text-center"><strong>$ 1.000</strong></td>
                                        <td class="text-right"><span class="label label-primary">$ 1.000</span></td>
                                    </tr>
                                    
                                    <tr class="active">
                                        <td colspan="7" class="text-right"><span class="h4">SUBTOTAL</span></td>
                                        <td class="text-right"><span class="h4">$ 3.000</span></td>
                                    </tr>
                                    <tr class="active">
                                        <td colspan="7" class="text-right"><span class="h4">GST ( 7.00% )</span></td>
                                        <td class="text-right"><span class="h4">$ 0.210</span></td>
                                    </tr>
                                    <tr class="active">
                                        <td colspan="7" class="text-right"><span class="h3"><strong>TOTAL DUE</strong></span></td>
                                        <td class="text-right"><span class="h3"><strong>$ 3.210</strong></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- END Table -->

                        <div class="clearfix">
                            <div class="btn-group pull-right">
                                
                                <a href="javascript:void(0)" class="btn btn-primary"><i class="fa fa-print"></i> Save</a>
                            </div>
                      ';
 
//foreach ( $posts as $post ){
//    $html .= '
//'.$post['Post']['title'];
//}
 
$pdf->writeHTML($html, true, false, true, false, '');
 
$pdf->lastPage();
 
echo $pdf->Output(APP . 'files\pdf' . DS . 'test.pdf', 'F');

?>