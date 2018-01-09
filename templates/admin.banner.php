<?php
include_once 'library/class.database.php';
$db = new database();

if(!empty($_POST['activate']) && !empty($_POST['id'])) {
    $db-> sql_query('UPDATE stormguild.recruitment SET is_active='.$_POST['activate'].' WHERE recruitment_id='.$_POST['id']);

}
?>
<div class="row">
  TODO
</div>
