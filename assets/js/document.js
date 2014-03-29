$(document).ready(function() {
    $('.outwardDocument').click(function() {
        var hrefFields = $(this).attr('href').split("#");
      	var registerId = hrefFields[1];
      	var documentId = hrefFields[2];
		$('#outward_register_id').val(registerId)
        $('#outward_doc_id').val(documentId)
        $.blockUI({message: $('#outward_document')});
        return false;
        //setTimeout($.unblockUI, 2000); 
    });
    $('.inwardDocument').click(function() {
        var hrefFields = $(this).attr('href').split("#");
      	var registerId = hrefFields[1];
      	var documentId = hrefFields[2];
		$('#inward_register_id').val(registerId)
        $('#inward_doc_id').val(documentId)
        $.blockUI({message: $('#inward_document')});
        return false;
        //setTimeout($.unblockUI, 2000); 
    });

    $('.outwardRegister').click(function() {
        var registerId = $(this).attr('href').substr(1);
        $('#outward_register_id').val(registerId)
        $.blockUI({message: $('#outward_register')});
        return false;
        //setTimeout($.unblockUI, 2000); 
    });
    $('.inwardRegister').click(function() {
        var registerId = $(this).attr('href').substr(1);
        $('#inward_register_id').val(registerId)
        $.blockUI({message: $('#inward_register')});
        return false;
        //setTimeout($.unblockUI, 2000); 
    });

});

function closeBox() {
    $.unblockUI();
    return false;
}

function captureDocId(docId) {
    document.getElementById("selected_doc_id").value = docId;
    showDocs();
    showDocTrans();
}

function showDocTrans() {
    var docId = document.getElementById("selected_doc_id").value;
    $.get("<?php echo base_url(); ?>index.php/register/list_doc_trans/" + docId).done(function(data) {
        $('#show_doc_trans').html(data);
    });
}

function showDocs() {
    var docId = document.getElementById("selected_doc_id").value;
    $.get("<?php echo base_url(); ?>index.php/register/list_docs/" + docId).done(function(data) {
        $('#show_docs').html(data);
    });
}
    
function outwardDocument() {
    $.post("<?php echo base_url(); ?>index.php/register/outwardDoc/", $("#frmOutwardDocument").serialize()).done(function(data) {
        var result = data.split('|||');
        if (result[1] == 'success')
        {
            $.unblockUI();
            window.location.href = "<?php echo base_url(); ?>index.php/register/lists/?msg=outwardDocumentSuccess";
        }
    });
}

function inwardDocument() {
    $.post("<?php echo base_url(); ?>index.php/register/inwardDoc/", $("#frmInwardDocument").serialize()).done(function(data) {
        var result = data.split('|||');
        if (result[1] == 'success')
        {
            $.unblockUI();
            window.location.href = "<?php echo base_url(); ?>index.php/register/lists/?msg=inwardDocumentSuccess";
        }
    });
}
