<?php

namespace App\Traits;

trait HandleGenericInputs
{
    public static function handleBooleanInput($aData, $fieldName)
    {
        if (isset($aData[$fieldName]) && $aData[$fieldName] == 'on') {
            $aData[$fieldName] = true;
        } else {
            $aData[$fieldName] = false;
        }

        return $aData;
    }

    public static function handleGenericInputs($aData, $oModel)
    {
        $aBooleanColumnNames = array_keys(array_filter($oModel->casts, function ($value) {
            return $value === 'boolean';
        }));

        foreach ($aBooleanColumnNames as $booleanColumnName) {
            $aData = self::handleBooleanInput($aData, $booleanColumnName);
        }

        return $aData;
    }
}
