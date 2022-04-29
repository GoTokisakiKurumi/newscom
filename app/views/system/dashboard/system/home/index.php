<?php

if ($_GET["url"] == "dashboard/") {
  echo "class='dashactive'";
} elseif ($_GET["url"] == "dashboard") {
  echo "class='dashactive'";
} elseif ($_GET["url"] == "dashboard/dashboard") {
  echo "class='dashactive'";
} else {
  echo "class='dashno-active'";
}
