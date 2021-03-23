<?php

namespace App\Http\Requests;

use App\UserProfile;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'company_name' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', Rule::unique('user_profiles')->ignore(auth()->user()->profile), 'numeric', 'min:9'],
            'city_id' => ['required', 'exists:cities,id']
        ];
    }

    public function messages()
    {
        return [
            'company_name.required' => 'El campo empresa es obligatorio',
            'city_id.required' => 'El campo provincia es obligatorio'
        ];
    }

    public function updateProfile(UserProfile $profile)
    {
        DB::transaction(function () use ($profile) {

            $profile->forceFill(
                [
                    'city_id' => $this->city_id,
                    'company_name' => $this->company_name,
                    'address' => $this->address,
                    'phone' => $this->phone
                ]
            );

            $profile->save();
        });
    }
}
