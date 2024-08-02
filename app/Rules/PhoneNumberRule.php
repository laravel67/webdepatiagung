<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PhoneNumberRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match('/^(?:\+62|62|08)\d{9,13}$/', $value)) {
            $fail('Format nomor kontak tidak valid. Harus diawali dengan +62, 62, atau 08 dan memiliki panjang antara 9 hingga 13 digit.');
        }
    }
}
