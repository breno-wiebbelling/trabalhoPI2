<?php

require_once("./getPaginas.php");

$inicial = file_get_contents("./paginasHtml/index/index.html");
echo($inicial);

?>