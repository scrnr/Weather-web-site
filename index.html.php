<!DOCTYPE html>
<html>

<head lang='eu'>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimum-scale=1'>
    <link rel='apple-touch-icon' sizes='180x180' href='assets/favicon/apple-touch-icon.png'>
    <link rel='icon' type='image/png' sizes='32x32' href='assets/favicon/favicon-32x32.png'>
    <link rel='icon' type='image/png' sizes='16x16' href='assets/favicon/favicon-16x16.png'>
    <link rel='manifest' href='assets/favicon/site.webmanifest'>
    <link rel='stylesheet' href='assets/css/style.min.css'>
    <title>Weather</title>
</head>


<body class='<?= $today['isNight'] ? 'night-team' : ''; ?>'>
    <img src='assets/img/<?= $bgImg; ?>.png' id='bg-img' class='bg-img' hidden>

    <div class='preload' id='preload'>
        <div class='loader'></div>
    </div>

    <div class='container'>

        <div class='forecast'>

            <?php if ($forecast !== false) : ?>

                <div class='forecast__header-bar'>
                    <div class='header-bar__city-name'><?= $today['cityName']; ?></div>
                    <div class='header-bar__date'><?= $today['date']; ?></div>
                </div>

                <div class='forecast__today'>

                    <div class='today__main main'>
                        <div class='main__item'>
                            <div class='main__icon'>
                                <img src='<?= $today['icon']; ?>' alt=''>
                            </div>
                            <div class='degrees__current-max'><?= $today['temp']; ?>&#176;</div>
                        </div>

                        <div class='main__item'>
                            <div class='degrees__like'>Feels like - <b><?= $today['feelsLike']; ?>&#176;</b></div>
                            <div class='degrees__min'>Min - <b><?= $today['tempMin']; ?>&#176;</b></div>
                        </div>

                        <button class='today__add-btn add-btn' type='button'>More</button>
                    </div>

                    <div class='today__more more'>
                        <div class='more__item'>Sunrise - <b><?= $today['sunrise']; ?></b></div>
                        <div class='more__item'>Sunset - <b><?= $today['sunset']; ?></b></div>
                        <div class='more__item'>Wind - <b><?= join(' ', $today['wind']); ?></b></div>
                        <div class='more__item'>Humidity - <b><?= $today['humidity']; ?></b></div>
                        <div class='more__item'>Visibility - <b><?= $today['visibility']; ?></b></div>
                        <div class='more__item'>Pressure - <b><?= $today['pressure']; ?></b></div>
                    </div>

                </div>

                <div class='forecast__four-days'>

                    <?php foreach ($fourDays as $day) : ?>

                        <div class='four-days__item'>
                            <div class='four-days__icon'>
                                <img src='<?= $day['icon']; ?>' alt=''>
                            </div>
                            <div class='four-days__degrees-box'>
                                <div class='degrees-min'><?= $day['min']; ?>&#176;</div>
                                <div class='degrees-max'><?= $day['max']; ?>&#176;</div>
                            </div>
                            <div class='four-days__date'><?= $day['date']; ?></div>
                        </div>

                    <?php endforeach; ?>

                </div>

                <form method='get' action='/' class='forecast__form'>
                    <input type='text' name='city' placeholder='Enter the name of the city' class='form__input'>

                    <?php if (!empty($errors)) : ?>
                        <div class='form__error-box'><?= array_shift($errors); ?></div>
                    <?php endif; ?>

                    <input type='submit' value='Submit' class='form__submit-btn'>
                </form>
            <?php else : ?>
                <p class='only-error'><?= array_shift($errors); ?></p>
            <?php endif; ?>

        </div>
    </div>

    <script src='assets/js/script.js'></script>
</body>

</html>
