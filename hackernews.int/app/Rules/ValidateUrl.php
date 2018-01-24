<?php
namespace App\Rules;
use Illuminate\Contracts\Validation\Rule;

class ValidateUrl implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if ( !empty( $value ) && filter_var( $value, FILTER_VALIDATE_URL ) )
        {
            return true;
        }
    }
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Not a valid url';
    }
}