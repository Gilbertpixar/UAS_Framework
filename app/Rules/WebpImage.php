<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class WebpImage implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Check if the uploaded file is a valid webp image
        return $value->getClientOriginalExtension() === 'webp';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute must be a valid webp image.';
    }
}
