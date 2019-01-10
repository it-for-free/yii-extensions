<?php

namespace ItForFree\YiiExtensions\Validator;

use yii\validators\Validator;
use ItForFree\rusphp\PHP\Str\Validator as StrValidator;

/**
 * Проверка строки - может ли она быть именем человека
 * 
 */
class HumanNameValidator extends Validator {
    
    public function validateAttribute($model, $attribute)
    {
        if (!StrValidator::isHumanName($model->$attribute)) {
            $this->addError($model, $attribute, 'Строка может содержать только буквы, тире и пробелы.');
        }
    }
}
