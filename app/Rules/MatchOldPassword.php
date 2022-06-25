<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\User;


class MatchOldPassword implements Rule
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
        //
      //   dd(auth()->user()->password);
      //   $hh = Hash::make($value);
      //   $user = User::where('email', '=', 'eyob@localhost.com')->first();

         // dd($attribute, $value,$hh, $user->password,
        //  Hash::check($hh, $user->password), Hash::check($value, $hh));

        return Hash::check($value, auth()->user()->password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'passowrd is incorrrect!.';
    }
}
