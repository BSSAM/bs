<?php 
$strXML = "<ENVELOPE>
 <HEADER>
 <TALLYREQUEST>Import Data</TALLYREQUEST>
 </HEADER>
 <BODY>
 <IMPORTDATA>
 <REQUESTDESC>
 <REPORTNAME>All Masters</REPORTNAME>
 <STATICVARIABLES>
 <SVCURRENTCOMPANY>BS TECH PTE LTD</SVCURRENTCOMPANY>
 </STATICVARIABLES>
 </REQUESTDESC>
 <REQUESTDATA>
 <TALLYMESSAGE xmlns:UDF='TallyUDF'>
 <COSTCENTRE NAME='Newone' RESERVEDNAME=''>
 <ADDRESS.LIST TYPE='String'>
 <ADDRESS>Bangalore</ADDRESS>
 </ADDRESS.LIST>
 <MAILINGNAME.LIST TYPE='String'>
 <MAILINGNAME>10</MAILINGNAME>
 </MAILINGNAME.LIST>
 <CATEGORY>Primary Cost Category</CATEGORY>
 <LOCATION>Bangalore</LOCATION>
 <DESIGNATION>Software Engineer</DESIGNATION>
 <BLOODGROUP>O Positive</BLOODGROUP>
 <AFFECTSSTOCK>No</AFFECTSSTOCK>
 <FORPAYROLL>Yes</FORPAYROLL>
 <FORJOBCOSTING>No</FORJOBCOSTING>
 <ISEMPLOYEEGROUP>No</ISEMPLOYEEGROUP>
 <SORTPOSITION> 1000</SORTPOSITION>
 <DEFAULTLANGUAGE>0</DEFAULTLANGUAGE>
 <LANGUAGENAME.LIST>
 <NAME.LIST TYPE='String'>
 <NAME>Kiran Subbaraman</NAME>
 </NAME.LIST>
 <LANGUAGEID> 1033</LANGUAGEID>
 </LANGUAGENAME.LIST>
 </COSTCENTRE>
 </TALLYMESSAGE>
 </REQUESTDATA>
 </IMPORTDATA>
 </BODY>
</ENVELOPE>";

$server = "http://203.175.170.64:8000/";
//$server = "http://localhost:9002/";
     $headers = array( "Content-type: text/xml" ,"Content-length: ".strlen($strXML) ,"Connection: close" );

    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL,$server);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $strXML);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $server_output = curl_exec($ch);



    if(curl_errno($ch)){
        echo curl_error($ch);
        echo " $server  something went wrong..... try later ";
        //if($_GET[counter]==$_GET[total])
        //echo 'done###';
    }else{
		echo 'done###';
        curl_close($ch);
    }


?>