<?php

// function readAllFunction(string $address) : string {
function readAllFunction(array $config): string
{
    $address = $config['storage']['address'];

    if (file_exists($address) && is_readable($address)) {
        $file = fopen($address, "rb");

        $contents = '';

        while (!feof($file)) {
            $contents .= fread($file, 100);
        }

        fclose($file);
        return $contents;
    } else {
        return handleError("Файл не существует");
    }
}

// function addFunction(string $address) : string {
function addFunction(array $config): string
{
    $address = $config['storage']['address'];

    $name = readline("Введите имя: ");
    if (!validateName($name)) {
        return handleError("Неверный формат имени");
    }

    $date = readline("Введите дату рождения в формате ДД-ММ-ГГГГ: ");
    if (!validateData($date)) {
        return handleError("Неверный формат даты");
    }
    $data = "$name,  $date\r\n";
    $fileHandler = fopen($address, 'a');

    if (fwrite($fileHandler, $data)) {
        return "Запись $data добавлена в файл $address";
    } else {
        return handleError("Произошла ошибка записи. Данные не сохранены");
    }

    fclose($fileHandler);
}

// function clearFunction(string $address) : string {
function clearFunction(array $config): string
{
    $address = $config['storage']['address'];

    if (file_exists($address) && is_readable($address)) {
        $file = fopen($address, "w");

        fwrite($file, '');

        fclose($file);
        return "Файл очищен";
    } else {
        return handleError("Файл не существует");
    }
}

function helpFunction()
{
    return handleHelp();
}

function readConfig(string $configAddress): array|false
{
    return parse_ini_file($configAddress, true);
}

function readProfilesDirectory(array $config): string
{
    $profilesDirectoryAddress = $config['profiles']['address'];

    if (!is_dir($profilesDirectoryAddress)) {
        mkdir($profilesDirectoryAddress);
    }

    $files = scandir($profilesDirectoryAddress);

    $result = "";

    if (count($files) > 2) {
        foreach ($files as $file) {
            if (in_array($file, ['.', '..']))
                continue;

            $result .= $file . "\r\n";
        }
    } else {
        $result .= "Директория пуста \r\n";
    }

    return $result;
}

function readProfile(array $config): string
{
    $profilesDirectoryAddress = $config['profiles']['address'];

    if (!isset($_SERVER['argv'][2])) {
        return handleError("Не указан файл профиля");
    }

    $profileFileName = $profilesDirectoryAddress . $_SERVER['argv'][2] . ".json";

    if (!file_exists($profileFileName)) {
        return handleError("Файл $profileFileName не существует");
    }

    $contentJson = file_get_contents($profileFileName);
    $contentArray = json_decode($contentJson, true);

    $info = "Имя: " . $contentArray['name'] . "\r\n";
    $info .= "Фамилия: " . $contentArray['lastname'] . "\r\n";

    return $info;
}

function birthdayToDay(array $config): string
{
    $address = $config['storage']['address'];

    if (!file_exists($address) || !is_readable($address)) {
        return handleError("Файл не существует");
    }

    $fileHandler = fopen($address, 'r');

    $result = "";

    while (!feof($fileHandler)) {
        $line = fgets($fileHandler);

        $lineArray = explode(',', $line);

        $date = trim($lineArray[1]);

        $dateArray = explode('-', $date);

        $month = $dateArray[1];
        $day = $dateArray[0];

        if ($month == date('m') && $day == date('d')) {
            $result .= $line;
        }
    }


    fclose($fileHandler);

    if ($result == "") {
        return "Сегодня никто не родился";
    } else {
        return $result;
    }
}

function personSearch(array $config): string
{
    $address = $config['storage']['address'];

    if (!file_exists($address) || !is_readable($address)) {
        return handleError("Файл не существует");
    }

    $fileHandler = fopen($address, 'r');

    $result = "";

    while (!feof($fileHandler)) {
        $line = fgets($fileHandler);

        $lineArray = explode(', ', $line);

        $name = trim($lineArray[0]);

        if (str_contains($name, $_SERVER['argv'][2])) {
            $result .= $line;
        }
    }

    fclose($fileHandler);

    if ($result == "") {
        return "Ничего не найдено";
    } else {
        return $result;
    }
}
