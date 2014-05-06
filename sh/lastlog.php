<?php

exec(
    '/usr/bin/last -w -n6 |' .
    ' /usr/bin/awk \'!/^wtmp|^$/ {print $1","$3","$4" "$5" "$6" "$7}\'',
    $users
);
$result = array();
# ignore the first line of column names
for ($i = 0; $i < count($users); ++$i) {
    $result[$i] = explode(",", $users[$i]);
}

header('Content-Type: application/json; charset=UTF-8');
echo json_encode($result);
