<?php

$url = @explode('/', $_GET["url"]);
$url = @$url[1];
if (@$_GET["url"] == null) {
  echo "class='no-active'";
} elseif ($_GET["url"] == "terbaru") {
  echo "class='active'";
} elseif ($_GET["url"] == "Berita/$url") {
  echo "class='active'";
} else {
  echo "class='no-active'";
}