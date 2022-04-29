<?php

if (@$_GET["url"] == null) {
  echo "class='no-active'";
} elseif ($_GET["url"] == "terpopuler") {
  echo "class='active'";
} else {
  echo "class='no-active'";
}
