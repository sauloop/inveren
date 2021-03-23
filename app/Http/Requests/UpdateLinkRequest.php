<?php

namespace App\Http\Requests;

use App\Link;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLinkRequest extends FormRequest
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
            'category_id' => ['required', 'exists:categories,id'],
            'title' => ['required', Rule::unique('links')->ignore($this->link), 'max:100'],
            'price' => ['nullable', 'numeric'],
            'url' => ['required', 'url'],
            'city_id' => ['nullable', 'exists:cities,id']
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'El campo tipo es obligatorio.',
            'price.numeric' => 'El campo precio debe ser un número.'
        ];
    }

    public function updateLink(Link $link)
    {
        DB::transaction(function () use ($link) {

            $link->forceFill(
                [
                    'category_id' => $this->category_id,
                    'city_id' => $this->city_id,
                    'title' => $this->title,
                    'price' => $this->price == "" ? 0 : str_replace(".", "", $this->price),
                    'url' => $this->url,
                ]
            );

            $link->save();
        });
    }
}
