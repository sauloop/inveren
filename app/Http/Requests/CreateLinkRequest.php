<?php

namespace App\Http\Requests;

use App\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use App\Link;

class CreateLinkRequest extends FormRequest
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
            'title' => ['required', 'unique:links,title', 'max:100'],
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

    public function createLink()
    {
        $user = auth()->user();

        DB::transaction(function () use ($user) {

            Link::create([
                'user_id' => $user->id,
                'category_id' => $this->category_id,
                'city_id' => $this->city_id,
                'title' => $this->title,
                'price' => $this->price == "" ? 0 : str_replace(".", "", $this->price),
                'url' => $this->url,
            ]);
        });
    }
}
