<?php

$query = 'SELECT *
    FROM qrs 
    WHERE hash = "'.$parts[0].'"
    LIMIT 1';
$result = mysqli_query($connect, $query);

if(!mysqli_num_rows($result))
{
    
    include('404.php');
    exit();
    
}

$qr = mysqli_fetch_aSSOC($result);

$query = 'INSERT INTO qr_logs (
        name,
        hash,
        url,
        qr_id,
        created_at,
        updated_at
    ) VALUES (
        "'.$qr['name'].'",
        "'.$qr['hash'].'",
        "'.$qr['url'].'",
        "'.$qr['id'].'",
        NOW(),
        NOW()
    )';
mysqli_query($connect, $query);

define('APP_NAME', 'QR Codes');

define('PAGE_TITLE', 'Redirecting');
define('PAGE_SELECTED_SECTION', '');
define('PAGE_SELECTED_SUB_PAGE', '');

include('../templates/html_header.php');
include('../templates/login_header.php');  

?>

<div class="w3-center">


    <h1>Redirecting in <span id="countdown">3</span>...</h1>
    <hr>
    <h3><?=$qr['name']?></h3>
    <h4><a href="<?=$qr['url']?>"><?=$qr['url']?></h4>

</div>

<script>

let countdown = document.getElementById("countdown");
let counter = 3;

let interval = setInterval(() => {

    if(counter == 0)
    {
        clearInterval(interval);
        window.location = "<?=$qr['url']?>";
    }
    else
    {
        counter --;
        countdown.innerHTML = counter;
    }
    

}, 1000);

</script>

<?php

include('../templates/main_footer.php');
include('../templates/debug.php');
include('../templates/html_footer.php');
