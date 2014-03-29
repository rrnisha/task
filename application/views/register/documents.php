<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.blockui.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    $('.outwardDocument').click(function() {
	        var hrefFields = $(this).attr('href').split("#");
	      	var registerId = hrefFields[1];
	      	var documentId = hrefFields[2];
			$('#outward_doc_register_id').val(registerId);
	        $('#outward_doc_id').val(documentId);
	        var edit_start_date = hrefFields[3];
	        $('#outward_edit_start_date').val(edit_start_date);
	        $.blockUI({message: $('#outward_document')});
	        return false;
	        //setTimeout($.unblockUI, 2000); 
	    });
	    $('.inwardDocument').click(function() {
	        var hrefFields = $(this).attr('href').split("#");
	      	var registerId = hrefFields[1];
	      	var documentId = hrefFields[2];
			$('#inward_doc_register_id').val(registerId);
	        $('#inward_doc_id').val(documentId);
	        var edit_start_date = hrefFields[3];
	        $('#inward_edit_start_date').val(edit_start_date);
	        $.blockUI({message: $('#inward_document')});
	        return false;
	        //setTimeout($.unblockUI, 2000); 
	    });
	
	    $('.outwardRegister').click(function() {
	        var registerId = $(this).attr('href').substr(1);
	        $('#outward_register_id').val(registerId);
	        $.blockUI({message: $('#outward_register')});
	        return false;
	        //setTimeout($.unblockUI, 2000); 
	    });
	    $('.inwardRegister').click(function() {
	        var registerId = $(this).attr('href').substr(1);
	        $('#inward_register_id').val(registerId);
	        $.blockUI({message: $('#inward_register')});
	        return false;
	        //setTimeout($.unblockUI, 2000); 
	    });
	});
    $(function() {
        $("#filter_client_search").autocomplete({
            source: "<?php echo base_url(); ?>index.php/task/get_client",
            minLength: 1,
            select: function(event, ui) {
                $('#filter_client_id').val(ui.item.id)
            }
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
                window.location.href = "<?php echo base_url(); ?>index.php/register/tomedia/"+result[2]+"/outwardDoc/"+result[3];
            }
        });
    }

    function inwardDocument() {
        $.post("<?php echo base_url(); ?>index.php/register/inwardDoc/", $("#frmInwardDocument").serialize()).done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/register/tomedia/"+result[2]+"/inwardDoc/"+result[3];
            }
        });
    }

    function outwardRegister() {
        $.post("<?php echo base_url(); ?>index.php/register/outwardRegister/", $("#frmOutwardRegister").serialize()).done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/register/tomedia/"+result[2]+"/outwardRegister";
            }
        });
    }

    function inwardRegister() {
        $.post("<?php echo base_url(); ?>index.php/register/inwardRegister/", $("#frmInwardRegister").serialize()).done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success')
            {
                $.unblockUI();
                window.location.href = "<?php echo base_url(); ?>index.php/register/tomedia/"+result[2]+"/inwardRegister";
            }
        });
    }
    
    function filter_register_by_client() {
        $.get("<?php echo base_url(); ?>index.php/register/lists", $("#frmFilterClient").serialize())
                .done(function(data) {
            var result = data.split('|||');
            if (result[1] == 'success') {
                window.location.href = "<?php echo base_url(); ?>index.php/register/lists/";
            }else if(result[1] == 'failure'){
                window.location.href = "<?php echo base_url(); ?>index.php/register/lists/?msg=clientNotFound";
            }
        });
    }    
</script>
    	<table class="tablesorter" cellspacing="0"> 
		<thead> 
        	<tr>
            	<th rowspan="1">ID</th>
               	<th rowspan="1">Particulars</th>
                <th rowspan="1">Tag</th> 
                <th rowspan="1">Status</th>
                <th rowspan="1">By Employee</th>
                <th rowspan="1">Mode of Receipt</th>
                <th  rowspan="1">Action</th>
			</tr>
		</thead>
		<tbody>                            
			<?php
            	$i = 1;
            	foreach ($documents as $document) {
            ?>
            <tr>
            	<td><?php echo $document->doc_id; ?></td>
                <td><?php echo $document->particulars; ?></td>
                <td><?php echo $document->tag; ?></td> 
                <?php if ($document->status == 'inward') { ?>
                	<td><label style="visibility:hidden">1</label><img src="<?php echo base_url(); ?>/assets/img/new/Inward.png"/></td>
				<?php } else { ?>
                	<td><label style="visibility:hidden">2</label><img src="<?php echo base_url(); ?>/assets/img/new/Outward.png"/></td>
				<?php } ?>                                        
                <td><?php echo $document->by_employee_name; ?></td>
                <td><?php echo $document->mode_of_receipt; ?></td>
                <?php if ($document->status == 'inward') { ?>
                	<td><a href="#<?php echo $document->register_id; ?>#<?php echo $document->doc_id; ?>#<?php echo mdate('%Y-%m-%d %H:%i:%s', gmt_to_local(now(),'UP45',FALSE)) ?>" class="outwardDocument">O</a></td>
				<?php } else { ?>
                	<td><a href="#<?php echo $document->register_id; ?>#<?php echo $document->doc_id; ?>#<?php echo mdate('%Y-%m-%d %H:%i:%s', gmt_to_local(now(),'UP45',FALSE)) ?>" class="inwardDocument">I</a></td>
				<?php } ?>
			</tr>
            <?php
            	$i++;
            	}
            ?>
    	</tbody>
	</table>
