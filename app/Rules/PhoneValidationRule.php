<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneValidationRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
         if(strlen($value) > 11 || strlen($value) < 11){
            $fail("يجب ادخل رقم مكون من 11 رقم");
         }

          if (! ctype_digit($value)) {
             $fail("يجب ان يكون الرقم مكون من ارقام فقط");
          }

    }
}
