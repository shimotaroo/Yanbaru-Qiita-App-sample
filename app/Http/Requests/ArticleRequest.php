<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required|max:50',
            'category_id'=> 'required|size:1',
            'summary' => 'required|min:30',
            'url' => 'required|url'
        ];
    }

    /**
     * バリデーションメッセージの日本語化
     * 
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => '記事タイトル',
            'category_id'=> 'カテゴリー',
            'summary' => '記事概要',
            'url' => 'URL' 
        ];
    }
}