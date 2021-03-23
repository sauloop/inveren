<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = array(
            'name' => ['required', 'alpha_num', 'min:3', 'max:32'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user)]
        );

        return $rules;
    }

    public function updateAccount(User $user)
    {
        DB::transaction(function () use ($user) {

            $user->forceFill(
                [
                    'name' => $this->name,
                    'email' => $this->email,
                ]
            );

            if ($this->password != null) {
                $user->password = bcrypt($this->password);
            }

            $user->save();
        });
    }
}
