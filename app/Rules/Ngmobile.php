<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Ngmobile implements Rule
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
        $ncc_alloted_prefixes = [ // as at 2017
                    '701',
                    '703',
                    '705',
                    '706',
                    '708',
                    '709',
                    '802',
                    '803',
                    '804',
                    '805',
                    '806',
                    '807',
                    '808',
                    '809',
                    '810',
                    '811',
                    '812',
                    '813',
                    '814',
                    '815',
                    '816',
                    '817',
                    '818',
                    '902',
                    '903',
                    '905',
                    '906',
                    '907',
                    '908',
                    '909',
                    '912',
                    '914',
                    '913',
                    '916',
                    '915',
                    '917',
                    '918',
                    '919',
                ];
                $pattern = '/^0[0-9]{3}[0-9]{7}/';
                if (preg_match($pattern, $value)) {
                    return (in_array(substr($value, 1, 3), $ncc_alloted_prefixes));
                }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        // return 'The :attribute is an invalid Nigerian mobile number.';
        return 'Please supply a valid Nigerian mobile number';
    }
}
