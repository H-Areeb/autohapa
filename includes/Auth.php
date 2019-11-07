<?php

if(!isset($_SESSION['customer_id']) && !isset($_SESSION['customer_id2']) ){
    	header("Location: ../login/");
    }

?>