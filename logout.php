<?php

    session_start();
    $i=session_destroy();
    if($i)
    {
        header("location:index.php");
    }
    else
    {
        echo "session not destroy";
    }
?>