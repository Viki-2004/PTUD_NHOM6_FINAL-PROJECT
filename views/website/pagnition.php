<?php

if ($current_page > 3) {
    $first_page = 1;
    ?>
    <a class="page-item" href="?<?=$param?>&per_page=<?=$item_per_page?>&page=<?=$first_page?>">Trang đầu</a>
<?php
}

if ($current_page > 1) {
    $prev_page = $current_page - 1; ?>
    <a class="page-item" href="?<?=$param?>&per_page=<?=$item_per_page?>&page=<?=$prev_page?>">Trước</a>
<?php
}

for ($num = 1; $num <= $totalPages; $num++) { 
    if ($num != $current_page) {
        if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
            <a class="page-item" href="?<?=$param?>&per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a>
        <?php }
    } else { ?>
        <strong class="current-page page-item"><?=$num?></strong>
    <?php }
}

if ($current_page < $totalPages) {
    $next_page = $current_page + 1; ?>
    <a class="page-item" href="?<?=$param?>&per_page=<?=$item_per_page?>&page=<?=$next_page?>">Sau</a>
<?php
}

if ($current_page < $totalPages - 3) {
    $end_page = $totalPages; ?>
    <a class="page-item" href="?<?=$param?>&per_page=<?=$item_per_page?>&page=<?=$end_page?>">Trang cuối</a>
<?php 
}
?>
