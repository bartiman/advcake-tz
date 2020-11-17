<?php

require_once "Reverse.php";

$result = (new Reverse())->revertCharacters("Привет! Давно не виделись.");
echo $result;
