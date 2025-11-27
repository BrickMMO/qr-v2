<?php

define('APP_NAME', 'QR Codes');
define('PAGE_TITLE', 'Dashboard');
define('PAGE_SELECTED_SECTION', '');
define('PAGE_SELECTED_SUB_PAGE', '');

include('../templates/html_header.php');
include('../templates/nav_header.php');
include('../templates/nav_slideout.php');
include('../templates/nav_sidebar.php');
include('../templates/main_header.php');

$query = 'SELECT qrs.*,(
        SELECT COUNT(*)
        FROM qr_logs
        WHERE qrs.id = qr_logs.qr_id
    ) AS scans
    FROM qrs 
    ORDER BY name';
$result = mysqli_query($connect, $query);
$qr_count = mysqli_num_rows($result);

$query = 'SELECT *
    FROM qr_logs
    INNER JOIN qrs 
    ON qrs.id = qr_logs.qr_id';
$log_count = mysqli_num_rows(mysqli_query($connect, $query));

?>

<div class="w3-center">
    <h1>Qr Codes</h1>
</div>

<hr>

<div class="w3-flex" style="flex-wrap: wrap; gap: 16px; align-items: stretch;">

    <?php while ($record = mysqli_fetch_assoc($result)): ?>


        <div style="width: calc(33.3% - 16px); box-sizing: border-box; display: flex; flex-direction: column;">
            <div class="w3-card-4 w3-margin-top" style="max-width:100%; height: 100%; display: flex; flex-direction: column;">
                        
                <header class="w3-container w3-green">
                    <h4 style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?=$record['name']?></h4>
                </header>

                <div class="w3-margin w3-center">
                    <a href="<?=ENV_DOMAIN?>/<?=$record['hash'] ?>" style="position: relative;">
                        <img src="<?=$record['image'] ?>" alt="" style="max-width: 60%; height: auto;" />
                    </a>
                    <div class="w3-container w3-center w3-margin-top">
                        <span style="display: inline-block; white-space: nowrap; max-width: 100%; overflow: hidden; text-overflow: ellipsis;">
                            <a href="#" onclick="return copy('<?=ENV_DOMAIN?>/<?=$record['hash'] ?>');"><i class="fa-solid fa-copy"></i></a>
                            <a href="<?=ENV_DOMAIN?>/<?=$record['hash'] ?>">https://qr.brickmmo.com/<?=$record['hash'] ?></a>
                        </span>
                        <span style="display: inline-block; white-space: nowrap; max-width: 100%; overflow: hidden; text-overflow: ellipsis;">
                            <a href="#" onclick="return copy('<?=$record['url'] ?>');"><i class="fa-solid fa-copy"></i></a>
                            <a href="<?=$record['url'] ?>"><?=$record['url'] ?></a>
                        </span>
                    </div>  
                </div>
                
            </div>

        </div>

    <?php endwhile; ?>

</div>

<?php

include('../templates/main_footer.php');
include('../templates/debug.php');
include('../templates/html_footer.php');