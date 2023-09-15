<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTagRequest extends FormRequest
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
            'tagName' => 'required|unique:tags,name|max:10',
            'categoryId' => 'required'
        ];
    }
    
    public function messages(): array
    {
        return [
            'tagName.required' => 'タグ名を入力してください。',
            'tagName.unique' => '同じ名前のタグが既に存在しています。',
            'tagName.max' => 'タグは10字以内で登録してください。',
            'categoryId.required' => 'カテゴリーを選択してください。'
        ];
    }
}
