<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'categoryName' => 'required|unique:categories,name|max:10'
        ];
    }
    
    public function messages() : array
    {
        return [
            'categoryName.required' => 'カテゴリを入力してください',
            'categoryName.unique' => '同じカテゴリ名は登録できません。',
            'categoryName.max' => 'カテゴリは10字以内で登録してください'
        ];
    }
}
