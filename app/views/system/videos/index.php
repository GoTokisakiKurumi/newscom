<?php

if (@$_GET["url"] == null) {
  echo "class='no-active'";
} elseif ($_GET["url"] == "videos") {
  echo "class='active'";
} elseif ($_GET["url"] == "video") {
  echo "class='active'";
} else {
  echo "class='no-active'";
}
