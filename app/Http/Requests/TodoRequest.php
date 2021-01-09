<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
{
    public function authorize()
    {
        if($this->path() == 'todo/create' || $this->path() == 'todo/edit')
        {
            return true;
        } else {
            return false;
        }
    }


    public function rules()
    {
        return [
            'title' => 'required|max:20',
            'content' => 'max:100',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => 'タイトルは必ず必要です。',
            'title.max' => '20文字が上限です。',
            'content.max' => '100文字が上限です。',
        ];    
    }
}
