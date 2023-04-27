<?php

declare(strict_types=1);

use Scrnr\Weather\Weather;

require_once __DIR__ . '/vendor/autoload.php';

Weather::setToken(require_once 'token.php');
$forecast = Weather::getWeather($_GET['city'] ?? '');
$errors = Weather::getErrors();

if ($forecast === false) {
    $hour = date('H');
    $bgImg = '01' . (($hour >= 15 or $hour <= 3) ? 'n' : 'd');
    $today['isNight'] = str_contains($bgImg, 'n');
} else {
    preg_match('#/ (?P<icon>\d{2}\w) @#sx', $forecast['today']['icon'], $matches);
    $icon = $matches['icon'];

    $bgImg = match ($icon) {
        '02d', '03d', '04d' => '02d',
        '02n', '03n', '04n' => '02n',
        '09d', '10d' => '09d',
        '09n', '10n' => '09n',
        default => $icon
    };

    extract($forecast);
}

require_once 'index.html.php';
