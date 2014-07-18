<?php
  /**
   * Export all member records in .xls format
   * with the help of the xlsHelper
   */
 
  //declare the xls helper
  $xls= new XlsHelper();
 
  //input the export file name
  $xls->setHeader('Model_'.date('Y_m_d'));
 
  $xls->addXmlHeader();
  $xls->setWorkSheetName('Model');
   
  //1st row for columns name
  $xls->openRow();
  $xls->writeString('Customer ID');
  $xls->writeString('ID');
  $xls->writeString('Customer Name');
  $xls->writeString('Sales Order No');
  $xls->closeRow();
   
  //rows for data
  foreach ($proforma as $model):
    $xls->openRow();
    $xls->writeString($model['Proforma']['customer_id']);
    $xls->writeString($model['Proforma']['id']);
    $xls->writeString($model['Proforma']['customername']);
    $xls->writeString($model['Proforma']['salesorderno']);
    $xls->closeRow();
  endforeach;
  
  $xls->addXmlFooter();
  exit();
?> 