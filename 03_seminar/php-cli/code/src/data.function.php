<?php
function validateData(string $date): bool
{
    $dateBlocks = explode("-", $date);

    if (count($dateBlocks) < 3) {
        return false;
    }

    if (isset($dateBlocks[0]) && $dateBlocks[0] > 31) {
        echo 'ошибка в числе';
        return false;
    }


    if (isset($dateBlocks[1]) && $dateBlocks[1] > 12) {
        echo 'ошибка в месяце';
        return false;
    }

    if (isset($dateBlocks[2]) && $dateBlocks[2] > date('Y')) {
        echo 'ошибка в году';
        return false;
    }

    if ($dateBlocks[1] == 1 || $dateBlocks[1] == 3 || $dateBlocks[1] == 5 || $dateBlocks[1] == 7 || $dateBlocks[1] == 8 || $dateBlocks[1] == 10 || $dateBlocks[1] == 12) {
        if ($dateBlocks[0] > 31) {
            echo 'ошибка в числе 31';
            return false;
        }
    }

    if ($dateBlocks[1] == 4 || $dateBlocks[1] == 6 || $dateBlocks[1] == 9 || $dateBlocks[1] == 11) {
        if ($dateBlocks[0] > 30) {
            echo 'ошибка в числе 30';
            return false;
        }
    }

    if ($dateBlocks[2] % 4 === 0 && $dateBlocks[1] == 2 && $dateBlocks[0] > 29) {
        echo 'ошибка в феврале';
        return false;
    } // високосный год (кратность 4)

    return true;
}

function validateName(string $name): bool
{
    if (preg_match('/^[a-z A-Z а-я А-Я]+$/', $name)) {
        if (strlen($name) < 1 || strlen($name) > 13) {

            echo 'ошибка в имени';
            return false;
        }

        return true;
    } else {
        return false;
    }
}
