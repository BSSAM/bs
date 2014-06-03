/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
   

    $('#fileupload').submit(function(e)
    {
        e.preventDefault();
        if (import_errors())
        {
            return false;
        }
        import_db();
        return false;
    });

    function import_errors()
    {
        if ($('#fileImportData').val() == '')
        {
            alert('No file(s) selected. Please choose a JSON file to upload.');
            return true;
        }
        if ($('#fileImportData').val() != '')
        {
            var ext = $('#fileImportData').val().split('.').pop().toLowerCase();
            if($.inArray(ext, ['docx']) == -1) 
            {
                alert('Invalid file type. Please choose a JSON file to upload.');
                return true;
            }
        }
        return false;
    }

    function import_db()
    {
        var importnonce = "3x4mpl3f4k3n0nc3"; 
        //REMOVED - Everything was switched over to be added to the FormData Objects
        //var ajaxData = { 
        //    action : 'ajax_handler_import',
        //    _ajax_nonce : importNonce
        //};

        //This is where issues occurred, I couldn't get the file added to ajax
        // and preserved in $_FILE, and this isn't the only method I've tried 
        // to add data. However, this was the most promising.

        //MODIFIED - Everything is appended to the FormData Object instead.
        //ajaxData.formD = new FormData();
        //jQuery.each($('#fileImportData')[0].files, function(i, file) {
        //    ajaxData.formD.append('file-'+i, file);
        //});

        var formData = new FormData();
        jQuery.each($('#fileImportData')[0].files, function(i, file) {
           
            formData.append('uploadFile-'+i, file);
        });
        formData.append('action', 'ajax_handler_import');
        formData.append('_ajax_nonce', importnonce);

        jQuery.ajax({
            url: ajaxurl,
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,

            //MODIFIED - From ajaxData to formData
            data: formData,

            beforeSend: function(jqXHR, settings){
                console.log("Haven't entered server side yet.");
            },
            dataFilter: function(data, type){
                //May need/want to create a function to parse the data. Which includes
                // PHP Errors that would normally break the AJAX function with a JS 
                // Error with no sign of the PHP Error message. Normally want to 
                // try/catch php errors.
                console.log("JSON string echoed back from server side.");
            },
            success: function(data, textStatus, jqXHR){
                console.log("Back from server-side!");
                //Checking errors that may have been caught on the server side that
                // normally wouldn't display in the error Ajax function.
                if (data.msg != 'success')
                {
                    alert(data.error);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.log("A JS error has occurred.");
            },
            complete: function(jqXHR, textStatus){
                console.log("Ajax is finished.");
            }
        });  
    } 
});

