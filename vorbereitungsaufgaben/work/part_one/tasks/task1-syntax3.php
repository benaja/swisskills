<?php

/**
 * Third syntax error
 *
 * @todo change the "$stringArray[] = ..." line (Line 16) only
 */

$data = [
    ['time' => '12:21', 'system' => 'host1', 'value' => 15612],
    ['time' => '12:23', 'system' => 'host1', 'value' => 45974],
];

$stringArray = array();
foreach ($data as $hostdata) {
    $stringArray[] = "Received data from {$hostdata['system']} with value {$hostdata['value']} at {$hostdata['time']}.";
}

if ($stringArray[0] === "Received data from host1 with value 15612 at 12:21." &&
    $stringArray[1] === "Received data from host1 with value 45974 at 12:23."
) {
    $params['solvedErrors']['the third syntax error'] = true;
}
