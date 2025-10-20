<?php
$serverName     = "200.94.150.46"; //serverName\instanceName
$connectionInfo = ["Database" => "bd_MTC_PozaRica", "UID" => "residente", "PWD" => "gatoloco100@"];
$conn           = sqlsrv_connect($serverName, $connectionInfo);
