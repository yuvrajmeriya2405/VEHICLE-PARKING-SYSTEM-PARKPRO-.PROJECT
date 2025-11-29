<?php

session_start();
if(!isset($_SESSION["pm"]))
    {
    	echo"<script type='text/javascript'>
                                               
        window.location.replace('index.php');
            </script>";
    	}
?>