<?php ob_start();
?>
<style>
.unselectable {
    -moz-user-select:none;
    -webkit-user-select:none;
}
</style>
<?php
$out = ob_get_clean();
return $out;
?>