<?php
function validateData(string $date): bool
{
    $dateBlocks = explode("-", $date);

    if (count($dateBlocks) < 3) {
        return false;
    }

    if (isset($dateBlocks[0]) && $dateBlocks[0] > 31) {
        return false;
    }

    if (isset($dateBlocks[1]) && $dateBlocks[0] > 12) {
        return false;
    }

    if (isset($dateBlocks[2]) && $dateBlocks[2] > date('Y')) {
        return false;
    }

    return true;
}

function validateName(string $name): bool
{
    if (preg_match('/^[a-zA-Zа-яА-Я]+$/', $name)) {
        if (strlen($name) < 1 || strlen($name) > 13) {
            return false;
        }

        return true;
    } else {
        return false;
    }
}
