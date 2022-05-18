<?php

$url = @explode('/', $_GET["url"]);
$url = @$url[2];
if (@$_GET["url"] == null) {
  echo "class='no-active'";
} elseif ($_GET["url"] == "terbaru") {
  echo "class='active'";
} elseif ($_GET["url"] == "terbaru/berita/$url") {
  echo "class='active'";
} else {
  echo "class='no-active'";
}
