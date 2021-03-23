<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
        return [
            'current_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ];
    }


    public function messages()
    {
        return [
            'current_password.required' => 'El campo contraseña actual es obligatorio.',
            'password.required' => 'El campo nueva contraseña es obligatorio.',
            'password_confirmation.required' => 'El campo confirmación contraseña es obligatorio.'
        ];
    }


    public function updatePassword(User $user)
    {
        $success = DB::transaction(function () use ($user) {

            if (Hash::check($this->current_password, $user->password)) {
                $success = true;
                $user->password = bcrypt($this->password);
                $user->save();
                session()->flash('msg', 'Contraseña cambiada.');
                return $success;
            } else {
                $success = false;
                session()->flash('msg', 'La contraseña actual no es correcta.');
                return $success;
            }
        });

        if (!$success) {
            $style = 'danger';
            return $style;
        }

        $style = 'success';
        return $style;
    }
}
