<p>Details for <strong><?php echo $details[0]->id; ?> - <?php echo $details[0]->title; ?></strong></p>
<table class="tablesorter" cellspacing="0">
    <tr>
        <td  class="required">
            Start Date
        </td>
        <td>
            <?php echo $details[0]->start_date ?>
        </td>
        <td>&nbsp;</td>
        <td  class="required">
            Due Date
        </td>
        <td>
            <?php echo $details[0]->due_date ?>
        </td>
        <td>
            End Date
        </td>
        <td>
            <?php echo $details[0]->end_date ?>
        </td>
    </tr>
</table>
