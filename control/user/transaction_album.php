<?php
$datas = db_factory::query("select * from ".TABLEPRE."album where uid ='" . $uid . "'");