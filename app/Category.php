<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * ラジオボタン用の配列データを作成
     * : arrayで戻り値の型宣言
     *
     * @return array
     */
    public function getAll(): array
    {
        $categoryForRadioButton = [];

        $allCategories = $this->all();
        foreach ($allCategories as $index => $category) {
            $categoryForRadioButton[$index + 1] = $category->name;
        }
        return $categoryForRadioButton;
    }
}