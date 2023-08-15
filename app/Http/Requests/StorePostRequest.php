<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            'title'=>'required|max:50',
            'content'=>'required|max:200',
        ];
    }
    //バリデーションメッセージを設定する
    public function messages()
    {
        return[
            'title.required'=>'タイトルを決定してください',
            'title.max'=>'タイトルは20字以下で入力してください',
            'content.required'=>'白紙では投稿できません',
            'content.max'=>'200文字以内に収めてください'
        ];            
    }
}
