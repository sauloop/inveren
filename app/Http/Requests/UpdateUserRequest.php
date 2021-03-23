<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($this->user)],
            'admin' => ['required', 'in:0,1'],
            'company_name' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'phone' => ['nullable', 'numeric', 'min:9'],
            'company' => ['required', 'in:0,1'],
            'filled' => ['required', 'in:0,1'],
            'trial' => ['required', 'in:0,1'],
            'subscription' => ['required', 'in:0,1'],
            'approved' => ['required', 'in:0,1'],
            'subscription_end' => ['nullable', 'date_format:Y-m-d']
        ];
    }

    public function messages()
    {
        return [
            'admin.required' => 'El campo rol es obligatorio',
        ];
    }

    public function updateUser(User $user)
    {
        DB::transaction(function () use ($user) {

            $user->forceFill(
                [
                    'name' => $this->name,
                    'email' => $this->email,
                    'admin' => $this->admin,
                    'company' => $this->company,
                    'filled' => $this->filled,
                    'trial' => $this->trial,
                    'subscription' => $this->subscription,
                    'approved' => $this->approved,
                    'subscription_end' => $this->subscription_end,
                ]
            );

            $user->save();

            $user->profile()->update(
                [
                    'company_name' => $this->company_name,
                    'address' => $this->address,
                    'phone' => $this->phone
                ]
            );
        });
    }
}
