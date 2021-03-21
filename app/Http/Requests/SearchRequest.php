<?php

namespace App\Http\Requests;

use App\Category;
use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
     * バリーデーションのためにデータを準備
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        if (!is_null($this->term)) {
            $this->merge([
                'term' => (int) $this->term,
            ]);
        }

        if (!is_null($this->category)) {
            $this->merge([
                'category' => (int) $this->category,
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $category = new Category();
        $maxCategoryId = $category->max('id');

        return [
            'term' => ['numeric', 'max:20', 'nullable'],
            'category' => ['numeric', 'max:' . $maxCategoryId, 'nullable'],
            'word' => ['string', 'nullable', 'max:20'],
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
            'term' => '期数',
            'category' => 'カテゴリー',
            'word' => '検索ワード',
        ];
    }

    /**
     * 定義済みバリデーションルールのエラーメッセージ取得
     *
     * @return array
     */
    public function messages()
    {
        return [
            'term.max' => '選択可能な期数で検索してください。',
            'category.max' => '選択可能なカテゴリーで検索してください。',
        ];
    }
}
