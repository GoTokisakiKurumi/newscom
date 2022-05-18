<?php

$url = @explode('/', $_GET["url"]);
$url = @$url[2];
if (@$_GET["url"] == null) {
  echo "class='active'";
} elseif ($_GET["url"] == "home") {
  echo "class='active'";
} elseif ($_GET["url"] == "home/berita/$url") {
  echo "class='active'";
} else {
  echo "class='no-active'";
}
