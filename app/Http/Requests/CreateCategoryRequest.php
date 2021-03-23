<?php

namespace App\Http\Requests;

use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'name' => ['required', 'max:25']
        ];
    }

    public function createCategory()
    {
        DB::transaction(function () {

            Category::create([
                'name' => $this->name
            ]);
        });
    }
}
