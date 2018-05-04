<?php

/**
 * Second syntax error
 *
 * @todo change ONE PHRASE only;
 *       The $displayDate should contain the current
 *       local time in Switzerland
 */

$timeZrh = new DateTime('now', new DateTimeZone('Europe/Zurich'));
$displayDate = $timeZrh->format('Y-m-d H:i:s');

$params['solvedErrors']['the second syntax error'] = true;

