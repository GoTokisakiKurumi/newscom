<?php

$url = @explode('/', $_GET["url"]);
$url = @$url[1];
if (@$_GET["url"] == null) {
  echo "class='active'";
} elseif ($_GET["url"] == "home") {
  echo "class='active'";
} elseif ($_GET["url"] == "berita/$url") {
  echo "class='active'";
} else {
  echo "class='no-active'";
}
