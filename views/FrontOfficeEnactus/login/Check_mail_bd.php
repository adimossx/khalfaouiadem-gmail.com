<?php
//echo '<script> alert("fez"); </script>';
include "../../../core/ClientC.php";
$test=false;
if(isset($_POST['email'])) {

    $mail = $_POST['email'] ;
    $old=$_POST['old'];
    $sql = "SElECT * From Client";
    $db = config::getConnexion();
    $liste = $db->query($sql);
    foreach ($liste as $row)
    {
        if ($row['mail'] == $mail)
        {
            $test=true;
        }
    }
    if ($test==true){
    echo '*Email déja exsistant !';
    echo '<script>
        var var1 = document.getElementById("checkout_email");
        var1.style.border = "1px solid #FF0000";
           </script>';
    }
    else if($old!==""){
        echo $old;
    }
}

?>