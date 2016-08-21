<?
session_start();
// include 'models/db.php';

// Use this for generating a GUID...
function gen_uuid() {
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),

        // 16 bits for "time_mid"
        mt_rand( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff )
    );
}

function accessCodeGen() {
    require 'models/config.php';

    $mysqli = mysqli_connect($dbServername, $dbUsername, $dbPassword, $database);

    $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                     .'0123456789'); // and any other characters
    shuffle($seed); // probably optional since array_is randomized; this may be redundant
    $rand = '';
    foreach (array_rand($seed, 5) as $k) { 
        $rand .= $seed[$k];
    }

    $sql = "SELECT `id` FROM `tbl_access` WHERE `accessCode` = '$rand'";

    // $result = $mysqli->query($sql);
    
    $result = mysqli_query($mysqli, $sql) or trigger_error("Query Failed! SQL: $sql - Error: ". mysqli_error($mysqli), E_USER_ERROR);

    if ($result->num_rows === 0) {
        echo $rand;
        $_SESSION['access'] = $rand;
    } else {
        accessCodeGen();
    }    
    mysqli_close($mysqli);
}

// 1:   Setup the session 
//      -> Press start
//      -> app creates folder and DB record
//      -> Move to 2
//      
// 2:   Shoot and upload
//      -> Take your shots, then
//      -> Drag and drop to this dropzone
//      -> Images uploaded
//      -> Show completion notification
//      -> Move to 1

require 'views/admin.head.inc.php'; ?>

<section id="panel1" class="panel container_12">
    <div class="grid_12">
        <p style="margin-bottom:0;margin-top:40px;">Session's Access Code:</p>
        <h1 class="headline" style="margin-top:-20px;"><?php accessCodeGen(); ?></h1>
    </div>
</section>
<section id="panel2" class="panel container_12">
    <div class="grid_12">
        <form action="models/uploader.php" class="dropzone" enctype="multipart/form-data"></form>
        <button class="button" onclick="location.reload();">Done</button>        
    </div>
</section>


<script>
    function start() {
        'use strict';

        $.ajax({
            method: 'POST',
            url: 'as',
            data: 's'
        }).done(function () {
            // complete
        });
    }
</script>
</body>
</html>