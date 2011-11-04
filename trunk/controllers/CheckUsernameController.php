<?php
/**
 * Created by JetBrains PhpStorm.
 * User: LuChanThanh - Willy
 * Date: 10/20/11
 * Time: 10:31 PM
 * To change this template use File | Settings | File Templates.
 */
    include("../configs/database.php");
    require_once("../models/CheckUsername.php");
    $username= $_REQUEST["username"];
    $valid = check_username($username);
    if(!$valid['ok'])
    {
         echo $valid['msg'] ;
    }

?>