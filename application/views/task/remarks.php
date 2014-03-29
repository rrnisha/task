<?php
if ($remarks == '') {
    ?>    
    <div class="message">
        <p>No Remarks added</p>
    </div>
    <?php
}

$remarkslist = explode('<br>', $remarks);
$cnt = count($remarkslist);

for ($index = $cnt-1; $index >= 0; $index--) {
//foreach ($remarkslist as $remark) {
    ?>
    <div class="message">
        <p><?php echo $remarkslist[$index]; ?></p>
    </div>
    <?php
}
?>  