<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ProformasController extends AppController
{

    public $helpers = array('Html', 'Form', 'Session','xls','Number');
    public $uses =array('Priority','Paymentterm','Quotation','Currency',
                            'Country','Additionalcharge','Service','CustomerInstrument','Customerspecialneed','Invoice',
                            'Instrument','Brand','Customer','Device','Salesorder','Description','Deliveryorder','Proforma','Logactivity');

    public function index() {
        $delivery_data = $this->Proforma->find('all', array('order' => array('Proforma.id' => 'DESC')));
        $this->set('proforma', $delivery_data);
    }
    public function export() {      
        $delivery_data = $this->Proforma->find('all', array('order' => array('Proforma.id' => 'DESC')));
        $this->set('proforma', $delivery_data);
        //$data = $this->Model->find('all');
        //$this->set('models', $data);
    }
    
    function export_report_all_format($file_type, $filename, $html)
    {    
        
        if($file_type == 'pdf')
        {
    
            App::import('Vendor', 'dompdf', array('file' => 'dompdf' . DS . 'dompdf_config.inc.php'));
            $this->dompdf = new DOMPDF();        
            $papersize = "a4";
            $orientation = 'portrait';        
            $this->dompdf->load_html($html);
            $this->dompdf->set_paper($papersize, $orientation);        
            $this->dompdf->render();
            $this->dompdf->stream("Proforma_Invoice_".$filename.".pdf");
            echo $this->dompdf->output();
           // $output = $this->dompdf->output();
            //file_put_contents($filename.'.pdf', $output);
            die();
            
        
        }    
        else if($file_type == 'xls')
        {    
            $file = $filename.".xls";
            header('Content-Type: text/html');
            header("Content-type: application/x-msexcel"); //tried adding  charset='utf-8' into header
            header("Content-Disposition: attachment; filename=$file");
            echo $html;
            
        }
        else if($file_type == 'doc')
        {                
            $file = $filename.".doc";
            header("Content-type: application/vnd.ms-word");
            header("Content-Disposition: attachment;Filename=$file");
            echo $html;
            
        }

        
    }
    
    function xls($id = NULL) {
        $this->autoRender = false;
        $delivery_data = $this->Proforma->find('all', array('order' => array('Proforma.id' => 'DESC'),'recursive'=>5));
        //pr($delivery_data);exit;
        //$this->set('proforma', $delivery_data);
        
        
        $file_type = 'xls';
        $filename = $id;
            $html = '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>PDF</title>
<style>
body { background-color:#fff; font-family:"Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif; color:#394263; font-size:14px; }
* { text-decoration: none; font-size: 1em; outline: none; padding: 0; margin: 0; }
.group:before, .group:after { content: ""; display: table; }
.group:after { clear: both; }
.group { zoom: 1; /* For IE 6/7 (trigger hasLayout) */ }
.pdf_container { margin: 0 auto; min-height: 800px; padding: 10px; width: 900px; }
.header_id { padding:10px 0; width:100%; display:block; }
.logo { margin-top:10px;display:inline-block;width:50%; }
.address_details { width:46%; line-height:20px; text-align:right;display:inline-block; }
.address_details p { float:left; width:100%; }
.address_details a { color: #1bbae1; float:left; width:100%; }
.cmpny_reg { background:#FF8E00; padding:5px; color:#fff; text-transform:uppercase; width:100%; float:left; margin:10px 0 0 -8px; }
.address_box { border: 1px solid #ccc; margin-top: 20px; padding: 10px; width: 47%; min-height: 185px;display:inline-block; }
.address_box h2 { width:100%; padding:5px 0; font-size:23px; font-weight:bold; text-align:center; display:inline-block;}
.address_box p { display:inline-block;}
.invoice_address_blog { margin-top:20px; display:inline-block;width:100%;}
.invoice_add {  margin:3px 0; display:inline-block;width:100%;}
.invoice_add h5 { display:inline-block; width:30%; }
.invoice_add span { margin-right:15px;display:inline-block; }
.invoice_add abbr { font-style: italic;display:inline-block; }
.services_details { margin-top:20px; width:100%; }
.services_details h4 { width:100%; margin-top:20px; font-size:15px; font-weight:bold; }
.services_details h4 abbr { width: 22%; display:inline-block;}
.services_details h4 span { color:#fff; background-color:#1BBAE1; padding: 0 10px; }
.invoice_table { width:100%; margin-top:20px;margin-bottom:30px; }
.invoice_table table { width:100%; border:1px  solid #ccc; border-bottom:none; border-left:none; }
.invoice_table table th, td { padding: 10px; text-align: center; text-transform:uppercase; border:1px solid #ccc; border-top:none; border-right:none; }
.invoice_table table thead { background-color: #f1f1f1; }
.instrument h4 { font-weight:normal; }
.instrument span { font-size: 13px; color: #2980b9; font-style: italic; margin: 0 10px; }
    
</style>
</head>';
        foreach ($delivery_data as $delivery_data_list):

            $customername = $delivery_data_list['Customer']['customername'];
            $billing_address = $delivery_data_list['Customer']['Address'][1]['address'];
            $phone = $delivery_data_list['Salesorder']['phone'];
            $fax = $delivery_data_list['Salesorder']['fax'];
            $email = $delivery_data_list['Salesorder']['email'];
            $our_ref_no = $delivery_data_list['Salesorder']['our_ref_no'];
            $ref_no = $delivery_data_list['Salesorder']['ref_no'];
            $reg_date = $delivery_data_list['Proforma']['reg_date'];
            $payment_term = $delivery_data_list['Customer']['Paymentterm']['paymentterm'] . ' ' . $delivery_data_list['Customer']['Paymentterm']['paymenttype'];
            $salesorderno = $delivery_data_list['Proforma']['salesorderno'];
            
            foreach($delivery_data_list['Salesorder']['Description'] as $device):
                $device_name[] = $device;
            
                //$device_price[]= $device;
            endforeach;
            

        endforeach;
        //pr($device_name);exit;
        $html .= '<body>
<div class="pdf_container group"> 
     <!-- header part-->
     <div class="header_id">
          <div class="f_left logo"><img src="logo_1.png" width="273" height="50" alt="" /></div>
          <div class="address_details f_right">
               <p>41 SENOKO DRIVE</p>
               <p>SINGAPORE</p>
               <p>758249</p>
               <p> 6458 4411</p>
               <a href="#" title="">invoice@bestandards.com</a>
               <div class="cmpny_reg">GST REG NO. M200510697 / COMPANY REG NO. 200510697M</div>
          </div>
     </div>
     <div class="address_box">
          <p> '.$customername.' </p>
          <p> '.$billing_address.' </p>
          <p> Singapore 758301 </p>
          <div class="invoice_address_blog">
               <div class="invoice_add">
                    <h5>ATTN </h5>
                    <span>:</span><abbr>Mr Thai Tian Loy</abbr></div>
               <div class="invoice_add">
                    <h5>TEL </h5>
                    <span>:</span><abbr> '.$phone.' </abbr></div>
               <div class="invoice_add">
                    <h5>FAX </h5>
                    <span>:</span><abbr>'.$fax.'</abbr></div>
               <div class="invoice_add">
                    <h5>EMAIL </h5>
                    <span>:</span><abbr>'.$email.'</abbr></div>
          </div>
     </div>
     <div class="address_box">
          <h2 class=""> '.$id.' </h2>
          <div class="invoice_address_blog f_left">
               <div class="invoice_add f_left">
                    <h5> TRACK ID </h5>
                    <span>:</span><abbr>'.$our_ref_no.'</abbr></div>
               <div class="invoice_add f_left">
                    <h5>PURCHASE ORDER NUMBER </h5>
                    <span>:</span><abbr>'.$ref_no.'</abbr></div>
               <div class="invoice_add f_left">
                    <h5>DATE </h5>
                    <span>:</span><abbr>'.$reg_date.'</abbr></div>
               <div class="invoice_add f_left">
                    <h5> PAYMENT TERMS </h5>
                    <span>:</span><abbr>'.$payment_term.'</abbr></div>
          </div>
     </div>
     <div class="services_details f_left">
          <p>Being provided calibration service of the following(s) :</p>
          <h4 class="f_left"><abbr>SALES ORDER NO</abbr><span> '.$salesorderno.'</span></h4>
     </div>
     <div class="invoice_table f_left">
          <table cellpadding="0" cellspacing="0">
               <thead>
                    <tr>
                         <th>Instrument</th>
                         <th>Brand</th>
                         <th>Model</th>
                         <th>Serial No</th>
                         <th>Quantity</th>
                         <th>Unit Price $(SGD)</th>
                         <th>Total Price $(SGD)</th>
                    </tr>
               </thead>
               <tbody>';
               $subtotal = 0;
                foreach($device_name as $device):
                    $html .= '
                    <tr>
                         <td class="instrument"><h4>'.$device['Instrument']['name'].'</h4>
                              <span>Faulty</span> <span>(9~10)/mm</span></td>
                         <td>'.$device['Instrument']['InstrumentBrand']['Brand']['brandname'].'</td>
                         <td>'.$device['model_no'].'</td>
                         <td>53254324</td>
                         <td>1</td>
                         <td> $'.$device['sales_unitprice'].'</td>
                         <td> $'.$device['sales_unitprice'].'</td>
                    </tr>';
                $subtotal = $subtotal + $device['sales_unitprice']; 
                endforeach;
                
                $gst = $subtotal * 0.07;
                //setlocale(LC_MONETARY, 'en_SG');
                //$subtotal = money_format('%i', $subtotal);
                //$gst = money_format('%i', $gst);
                
                $total_due = $gst + $subtotal;
                App::uses('CakeNumber', 'Utility');$currency = 'USD';
                $total_due = CakeNumber::currency($total_due, $currency);
                $gst = CakeNumber::currency($gst, $currency);
                $subtotal = CakeNumber::currency($subtotal, $currency);
                
                //$total_due = $this->Number->currency($total_due, $currency);
                //$total_due = money_format('%i', $total_due);
                    //echo $a;
                    //exit;
                    $html .= '<tr>
                         <td colspan="6">SUBTOTAL</td>
                         <td>'.$subtotal.'</td>
                    </tr>
                    <tr>
                         <td colspan="6">GST ( 7.00% )</td>
                         <td>'.$gst.'</td>
                    </tr>
                    <tr>
                         <td colspan="6"><h4>TOTAL DUE</h4></td>
                         <td><h4>'.$total_due.'</h4></td>
                    </tr>
               </tbody>
          </table>
     </div>
</div>
</body>
</html>';
        $this->export_report_all_format($file_type, $filename, $html);
    }
    
    function word($id = NULL) {
        $this->autoRender = false;
        $delivery_data = $this->Proforma->find('all', array('order' => array('Proforma.id' => 'DESC'),'recursive'=>5));
        //pr($delivery_data);exit;
        //$this->set('proforma', $delivery_data);
        
        
        $file_type = 'doc';
        $filename = $id;
            $html = '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>PDF</title>
<style>
body { background-color:#fff; font-family:"Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif; color:#394263; font-size:14px; }
* { text-decoration: none; font-size: 1em; outline: none; padding: 0; margin: 0; }
.group:before, .group:after { content: ""; display: table; }
.group:after { clear: both; }
.group { zoom: 1; /* For IE 6/7 (trigger hasLayout) */ }
.pdf_container { margin: 0 auto; min-height: 800px; padding: 10px; width: 900px; }
.header_id { padding:10px 0; width:100%; display:block; }
.logo { margin-top:10px;display:inline-block;width:50%; }
.address_details { width:46%; line-height:20px; text-align:right;display:inline-block; }
.address_details p { float:left; width:100%; }
.address_details a { color: #1bbae1; float:left; width:100%; }
.cmpny_reg { background:#FF8E00; padding:5px; color:#fff; text-transform:uppercase; width:100%; float:left; margin:10px 0 0 -8px; }
.address_box { border: 1px solid #ccc; margin-top: 20px; padding: 10px; width: 47%; min-height: 185px;display:inline-block; }
.address_box h2 { width:100%; padding:5px 0; font-size:23px; font-weight:bold; text-align:center; display:inline-block;}
.address_box p { display:inline-block;}
.invoice_address_blog { margin-top:20px; display:inline-block;width:100%;}
.invoice_add {  margin:3px 0; display:inline-block;width:100%;}
.invoice_add h5 { display:inline-block; width:30%; }
.invoice_add span { margin-right:15px;display:inline-block; }
.invoice_add abbr { font-style: italic;display:inline-block; }
.services_details { margin-top:20px; width:100%; }
.services_details h4 { width:100%; margin-top:20px; font-size:15px; font-weight:bold; }
.services_details h4 abbr { width: 22%; display:inline-block;}
.services_details h4 span { color:#fff; background-color:#1BBAE1; padding: 0 10px; }
.invoice_table { width:100%; margin-top:20px;margin-bottom:30px; }
.invoice_table table { width:100%; border:1px  solid #ccc; border-bottom:none; border-left:none; }
.invoice_table table th, td { padding: 10px; text-align: center; text-transform:uppercase; border:1px solid #ccc; border-top:none; border-right:none; }
.invoice_table table thead { background-color: #f1f1f1; }
.instrument h4 { font-weight:normal; }
.instrument span { font-size: 13px; color: #2980b9; font-style: italic; margin: 0 10px; }
    
</style>
</head>';
        foreach ($delivery_data as $delivery_data_list):

            $customername = $delivery_data_list['Customer']['customername'];
            $billing_address = $delivery_data_list['Customer']['Address'][1]['address'];
            $phone = $delivery_data_list['Salesorder']['phone'];
            $fax = $delivery_data_list['Salesorder']['fax'];
            $email = $delivery_data_list['Salesorder']['email'];
            $our_ref_no = $delivery_data_list['Salesorder']['our_ref_no'];
            $ref_no = $delivery_data_list['Salesorder']['ref_no'];
            $reg_date = $delivery_data_list['Proforma']['reg_date'];
            $contact = $delivery_data_list['Quotation']['Customer']['Contactpersoninfo'][0]['name'];
            $payment_term = $delivery_data_list['Customer']['Paymentterm']['paymentterm'] . ' ' . $delivery_data_list['Customer']['Paymentterm']['paymenttype'];
            $salesorderno = $delivery_data_list['Proforma']['salesorderno'];
            
            foreach($delivery_data_list['Salesorder']['Description'] as $device):
                $device_name[] = $device;
            
                //$device_price[]= $device;
            endforeach;
            

        endforeach;
        //pr($device_name);exit;
        $html .= '<body>
<div class="pdf_container group"> 
     <!-- header part-->
     <div class="header_id">
          <div class="f_left logo"><img src="img/logoBs.png" width="273" height="50" alt="" /></div>
          <div class="address_details f_right">
               <p>41 SENOKO DRIVE</p>
               <p>SINGAPORE</p>
               <p>758249</p>
               <p> 6458 4411</p>
               <a href="#" title="">invoice@bestandards.com</a>
               <div class="cmpny_reg">GST REG NO. M200510697 / COMPANY REG NO. 200510697M</div>
          </div>
     </div>
     <div class="address_box">
          <p> '.$customername.' </p>
          <p> '.$billing_address.' </p>
          <p> Singapore 758301 </p>
          <div class="invoice_address_blog">
               <div class="invoice_add">
                    <h5>ATTN </h5>
                    <span>:</span><abbr>'.$contact.'</abbr></div>
               <div class="invoice_add">
                    <h5>TEL </h5>
                    <span>:</span><abbr> '.$phone.' </abbr></div>
               <div class="invoice_add">
                    <h5>FAX </h5>
                    <span>:</span><abbr>'.$fax.'</abbr></div>
               <div class="invoice_add">
                    <h5>EMAIL </h5>
                    <span>:</span><abbr>'.$email.'</abbr></div>
          </div>
     </div>
     <div class="address_box">
          <h2 class=""> '.$id.' </h2>
          <div class="invoice_address_blog f_left">
               <div class="invoice_add f_left">
                    <h5> TRACK ID </h5>
                    <span>:</span><abbr>'.$our_ref_no.'</abbr></div>
               <div class="invoice_add f_left">
                    <h5>PURCHASE ORDER NUMBER </h5>
                    <span>:</span><abbr>'.$ref_no.'</abbr></div>
               <div class="invoice_add f_left">
                    <h5>DATE </h5>
                    <span>:</span><abbr>'.$reg_date.'</abbr></div>
               <div class="invoice_add f_left">
                    <h5> PAYMENT TERMS </h5>
                    <span>:</span><abbr>'.$payment_term.'</abbr></div>
          </div>
     </div>
     <div class="services_details f_left">
          <p>Being provided calibration service of the following(s) :</p>
          <h4 class="f_left"><abbr>SALES ORDER NO</abbr><span> '.$salesorderno.'</span></h4>
     </div>
     <div class="invoice_table f_left">
          <table cellpadding="0" cellspacing="0">
               <thead>
                    <tr>
                         <th>Instrument</th>
                         <th>Brand</th>
                         <th>Model</th>
                         <th>Serial No</th>
                         <th>Quantity</th>
                         <th>Unit Price $(SGD)</th>
                         <th>Total Price $(SGD)</th>
                    </tr>
               </thead>
               <tbody>';
               $subtotal = 0;
                foreach($device_name as $device):
                    $html .= '
                    <tr>
                         <td class="instrument"><h4>'.$device['Instrument']['name'].'</h4>
                              <span>Faulty</span> <span>(9~10)/mm</span></td>
                         <td>'.$device['Instrument']['InstrumentBrand']['Brand']['brandname'].'</td>
                         <td>'.$device['model_no'].'</td>
                         <td>53254324</td>
                         <td>1</td>
                         <td> $'.$device['sales_unitprice'].'</td>
                         <td> $'.$device['sales_unitprice'].'</td>
                    </tr>';
                $subtotal = $subtotal + $device['sales_unitprice']; 
                endforeach;
                
                $gst = $subtotal * 0.07;
                //setlocale(LC_MONETARY, 'en_SG');
                //$subtotal = money_format('%i', $subtotal);
                //$gst = money_format('%i', $gst);
                
                $total_due = $gst + $subtotal;
                App::uses('CakeNumber', 'Utility');$currency = 'USD';
                $total_due = CakeNumber::currency($total_due, $currency);
                $gst = CakeNumber::currency($gst, $currency);
                $subtotal = CakeNumber::currency($subtotal, $currency);
                
                //$total_due = $this->Number->currency($total_due, $currency);
                //$total_due = money_format('%i', $total_due);
                    //echo $a;
                    //exit;
                    $html .= '<tr>
                         <td colspan="6">SUBTOTAL</td>
                         <td>'.$subtotal.'</td>
                    </tr>
                    <tr>
                         <td colspan="6">GST ( 7.00% )</td>
                         <td>'.$gst.'</td>
                    </tr>
                    <tr>
                         <td colspan="6"><h4>TOTAL DUE</h4></td>
                         <td><h4>'.$total_due.'</h4></td>
                    </tr>
               </tbody>
          </table>
     </div>
</div>
</body>
</html>';
        $this->export_report_all_format($file_type, $filename, $html);
    }
    
    function pdf($id = NULL) {
        $this->autoRender = false;
        $delivery_data = $this->Proforma->find('all', array('order' => array('Proforma.id' => 'DESC'),'recursive'=>5));
        //pr($delivery_data);exit;
        //$this->set('proforma', $delivery_data);
        
        
        $file_type = 'pdf';
        $filename = $id;
            $html = '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>PDF</title>
<style>
body { background-color:#fff; font-family:"Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif; color:#394263; font-size:14px; }
* { text-decoration: none; font-size: 1em; outline: none; padding: 0; margin: 0; }
.group:before, .group:after { content: ""; display: table; }
.group:after { clear: both; }
.group { zoom: 1; /* For IE 6/7 (trigger hasLayout) */ }
.pdf_container { margin: 0 auto; min-height: 800px; padding: 10px; width: 700px; }
.header_id { padding:10px 0; width:100%; display:block; }
.logo { margin-top:10px;display:inline-block;width:50%; }
.address_details { width:46%; line-height:20px; text-align:right;display:inline-block; }
.address_details p { float:left; width:100%; }
.address_details a { color: #1bbae1; float:left; width:100%; }
.cmpny_reg { background:#FF8E00; padding:5px; color:#fff; text-transform:uppercase; width:100%; float:left; margin:10px 0 0 -8px; }
.address_box { border: 1px solid #ccc; margin-top: 20px; padding: 10px; width: 47%; min-height: 185px;display:inline-block; }
.address_box h2 { width:100%; padding:5px 0; font-size:23px; font-weight:bold; text-align:center; display:inline-block;}
.address_box p { display:inline-block;}
.invoice_address_blog { margin-top:20px; display:inline-block;width:100%;}
.invoice_add {  margin:3px 0; display:inline-block;width:100%;}
.invoice_add h5 { display:inline-block; width:30%; }
.invoice_add span { margin-right:15px;display:inline-block; }
.invoice_add abbr { font-style: italic;display:inline-block; }
.services_details { margin-top:20px; width:100%; }
.services_details h4 { width:100%; margin-top:20px; font-size:15px; font-weight:bold; }
.services_details h4 abbr { width: 22%; display:inline-block;}
.services_details h4 span { color:#fff; background-color:#1BBAE1; padding: 0 10px; }
.invoice_table { width:100%; margin-top:20px;margin-bottom:30px; }
.invoice_table table { width:100%; border:1px  solid #ccc !important; border-bottom:none !important; border-left:none !important; }
.invoice_table th, td { padding: 10px; text-align: center; text-transform:uppercase; border:1px solid #ccc !important; border-top:none !important; border-right:none !important; }
.invoice_table table thead { background-color: #f1f1f1; }
.instrument h4 { font-weight:normal; }
.instrument span { font-size: 13px; color: #2980b9; font-style: italic; margin: 0 10px; }
.address_table{width:50%;display:inline-block;}
    .address_table table{width:100%;border:1px solid #ccc;}
  .address_table td { padding: 10px; text-align: left !important; text-transform:none; border:none !important; }
</style>
</head>';
        foreach ($delivery_data as $delivery_data_list):

            $customername = $delivery_data_list['Customer']['customername'];
            $billing_address = $delivery_data_list['Customer']['Address'][1]['address'];
            $phone = $delivery_data_list['Salesorder']['phone'];
            $fax = $delivery_data_list['Salesorder']['fax'];
            $email = $delivery_data_list['Salesorder']['email'];
            $our_ref_no = $delivery_data_list['Salesorder']['our_ref_no'];
            $ref_no = $delivery_data_list['Salesorder']['ref_no'];
            $reg_date = $delivery_data_list['Proforma']['reg_date'];
            $proformano = $delivery_data_list['Proforma']['id'];
            $payment_term = $delivery_data_list['Customer']['Paymentterm']['paymentterm'] . ' ' . $delivery_data_list['Customer']['Paymentterm']['paymenttype'];
            $salesorderno = $delivery_data_list['Proforma']['salesorderno'];
            
            foreach($delivery_data_list['Salesorder']['Description'] as $device):
                $device_name[] = $device;
            
                //$device_price[]= $device;
            endforeach;
            

        endforeach;
        //pr($device_name);exit;
        $html .= '<body>
<div class="pdf_container group"> 
     <!-- header part-->
     <div class="header_id">
          <div class="f_left logo"><img src="img/logoBs.png" width="273" height="50" alt="" /></div>
          <div class="address_details f_right">
               <p>41 SENOKO DRIVE</p>
               <p>SINGAPORE</p>
               <p>758249</p>
               <p> 6458 4411</p>
               <a href="#" title="">invoice@bestandards.com</a>
               <div class="cmpny_reg">GST REG NO. M200510697 / COMPANY REG NO. 200510697M</div>
          </div>
     </div>
            <div class="address_box">
          <p> '.$customername.' </p>
          <p> '.$billing_address.' </p>
          <p> Singapore 758301 </p>
          <div class="invoice_address_blog">
               <div class="invoice_add">
                    <h5>ATTN </h5>
                    <span>:</span><abbr>'.$contact.'</abbr></div>
               <div class="invoice_add">
                    <h5>TEL </h5>
                    <span>:</span><abbr> '.$phone.' </abbr></div>
               <div class="invoice_add">
                    <h5>FAX </h5>
                    <span>:</span><abbr>'.$fax.'</abbr></div>
               <div class="invoice_add">
                    <h5>EMAIL </h5>
                    <span>:</span><abbr>'.$email.'</abbr></div>
          </div>
     </div>
     <div class="address_box">
          <h2 class=""> '.$id.' </h2>
          <div class="invoice_address_blog f_left">
               <div class="invoice_add f_left">
                    <h5> TRACK ID </h5>
                    <span>:</span><abbr>'.$our_ref_no.'</abbr></div>
               <div class="invoice_add f_left">
                    <h5>PURCHASE ORDER NUMBER </h5>
                    <span>:</span><abbr>'.$ref_no.'</abbr></div>
               <div class="invoice_add f_left">
                    <h5>DATE </h5>
                    <span>:</span><abbr>'.$reg_date.'</abbr></div>
               <div class="invoice_add f_left">
                    <h5> PAYMENT TERMS </h5>
                    <span>:</span><abbr>'.$payment_term.'</abbr></div>
          </div>
     </div>
     <div class="services_details f_left">
          <p>Being provided calibration service of the following(s) :</p>
          <h4 class="f_left"><abbr>SALES ORDER NO</abbr><span> '.$salesorderno.'</span></h4>
     </div>
     <div class="invoice_table f_left">
          <table cellpadding="0" cellspacing="0">
               <thead>
                    <tr>
                         <th>Instrument</th>
                         <th>Brand</th>
                         <th>Model</th>
                         <th>Serial No</th>
                         <th>Quantity</th>
                         <th>Unit Price $(SGD)</th>
                         <th>Total Price $(SGD)</th>
                    </tr>
               </thead>
               <tbody>';
               $subtotal = 0;
                foreach($device_name as $device):
                    $html .= '
                    <tr>
                         <td class="instrument"><h4>'.$device['Instrument']['name'].'</h4>
                              <span>Faulty</span> <span>(9~10)/mm</span></td>
                         <td>'.$device['Instrument']['InstrumentBrand']['Brand']['brandname'].'</td>
                         <td>'.$device['model_no'].'</td>
                         <td>53254324</td>
                         <td>1</td>
                         <td> $'.$device['sales_unitprice'].'</td>
                         <td> $'.$device['sales_unitprice'].'</td>
                    </tr>';
                $subtotal = $subtotal + $device['sales_unitprice']; 
                endforeach;
                
                $gst = $subtotal * 0.07;
                //setlocale(LC_MONETARY, 'en_SG');
                //$subtotal = money_format('%i', $subtotal);
                //$gst = money_format('%i', $gst);
                
                $total_due = $gst + $subtotal;
                App::uses('CakeNumber', 'Utility');$currency = 'USD';
                $total_due = CakeNumber::currency($total_due, $currency);
                $gst = CakeNumber::currency($gst, $currency);
                $subtotal = CakeNumber::currency($subtotal, $currency);
                
                //$total_due = $this->Number->currency($total_due, $currency);
                //$total_due = money_format('%i', $total_due);
                    //echo $a;
                    //exit;
                    $html .= '<tr>
                         <td colspan="6">SUBTOTAL</td>
                         <td>'.$subtotal.'</td>
                    </tr>
                    <tr>
                         <td colspan="6">GST ( 7.00% )</td>
                         <td>'.$gst.'</td>
                    </tr>
                    <tr>
                         <td colspan="6"><h4>TOTAL DUE</h4></td>
                         <td><h4>'.$total_due.'</h4></td>
                    </tr>
               </tbody>
          </table>
     </div>
</div>
</body>
</html>';
        $this->export_report_all_format($file_type, $filename, $html);
    }

    
    public function add()
        {
            $str=NULL;
          
            if($this->request->is('post'))
            {
               $priority=$this->Priority->find('list',array('fields'=>array('id','priority')));
            $this->set('priority',$priority);
            $payment=$this->Paymentterm->find('list',array('fields'=>array('id','pay')));
            $this->set('payment',$payment);
            $services=$this->Service->find('list',array('fields'=>array('id','servicetype')));
            $this->set('service',$services);
               if($this->Proforma->save($this->request->data))
                    {
                         $customer_id    =   $this->request->data['Proforma']['customer_id'];
                    $this->request->data['Proforma']['customername']=$this->request->data['Proforma']['customername'];
                    $this->request->data['Proforma']['salesorderno']=$this->request->data['Proforma']['salesorderno'];
                        //pr($this->request->data);exit;
                        $sales_orderid  =   $this->Proforma->getLastInsertID();
                        
//                        $device_node    =   $this->Description->find('all',array('conditions'=>array('Description.customer_id'=>$customer_id)));
//                        if(!empty($device_node))
//                        {
//                            $this->Description->updateAll(array('Description.salesorder_id'=>'"'.$sales_orderid.'"','Description.status'=>'1'),array('Description.customer_id'=>$customer_id));
//                        }
                        /******************
                        * Data Log
                        */
                        $this->request->data['Logactivity']['logname']   =   'Proforma Invoice';
                        $this->request->data['Logactivity']['logactivity']   =   'Add Proforma';
                        $this->request->data['Logactivity']['logid']   =   $sales_orderid;
                        $this->request->data['Logactivity']['loguser'] = $this->Session->read('sess_userid');
                        $this->request->data['Logactivity']['logapprove'] = 1;
                        $a = $this->Logactivity->save($this->request->data['Logactivity']);
                        //pr($a);exit;
                        /******************/
                        $this->Session->setFlash(__('Proforma Invoice has been Added Successfully '));
                        $this->redirect(array('action'=>'index'));
                   // }
               }
            }
           
        }    
        
            

    public function salesorder_id_search($sales_id = NULL)
        {
            
            $this->loadModel('Salesorder');
            $sales_id =  $this->request->data['sale_id'];
            $this->autoRender = false;
           // $data1 = $this->Proforma->find('all',array('conditions'=>array('Proforma.salesorderno LIKE'=>'%'.$sales_id.'%','Proforma.is_approved'=>'1')));
            $data = $this->Salesorder->find('all',array('conditions'=>array('Salesorder.salesorderno LIKE'=>'%'.$sales_id.'%','Salesorder.is_approved'=>'1')));
            $c = count($data);
            //$d = count($data1);&&!empty($d)
            if(!empty($c))
            {
                for($i = 0; $i<$c;$i++)
                {    
                    echo "<div class='proforma_show instrument_drop_show' align='left' id='".$data[$i]['Salesorder']['id']."'>";
                    echo $data[$i]['Salesorder']['salesorderno'];
                    echo "<br>";
                    echo "</div>";
                }   
            }
            else
            {
                echo "<div class='delivery_no_result' align='left'>";
                echo "No Results Found";
                echo "<br>";
                echo "</div>";
            }
        }
        //////// delivery_order.js
        public function get_sales_details()
        {
            $this->loadModel('Salesorder');
            $sales_id =  $this->request->data['sales_id'];
            $this->autoRender = false;
            $dmt = array('BPI'=>array('id' => $this->random('proforma')));
            $sales_data = $this->Salesorder->find('first',array('conditions'=>array('Salesorder.salesorderno'=>$sales_id,'Salesorder.is_approved'=>'1'),'recursive'=>'3'));
            if(!empty($sales_data))
            {
                $tot = array_merge($sales_data,$dmt);
                echo json_encode($tot);
                //echo json_encode($dmt);
            }
            else
            {
                echo "failure";
            }
            
        }

}