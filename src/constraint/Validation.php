<?php

namespace App\src\constraint;

class Validation
{
    public function validate($data, $name)
    {
        if($name === 'New') {
            $newValidation = new NewValidation();
            $errors = $newValidation->check($data);
            return $errors;
        }
        elseif ($name === 'CommentNew') {
            $commentNewValidation = new CommentNewValidation();
            $errors = $commentNewValidation->check($data);
            return $errors;
        }
        elseif ($name === 'User') {
            $userValidation = new UserValidation();
            $errors = $userValidation->check($data);
            return $errors;
        }
    }
}