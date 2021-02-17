<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * ラジオボタン用の配列データを作成
     *
     * @return array
     */

    public function getAll() :array
    {
        $allCategories = $this->all();
        $categoryForRadioButton = [];
        foreach ($allCategories as $index => $category) {
            $categoryForRadioButton[$index + 1] = $category->name;
        }
        return $categoryForRadioButton;
    }
}