<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class downloadCsvController extends Controller
{
    /** CSVダウンロード
     * 
     * @return \Illuminate\Http\Response
     */
    public function downloadCsv()
    {
        $articles = Article::with('user', 'category')->orderBy('created_at', 'desc')->get()->toArray();
        $csvHeader = [
            '名前',
            'カテゴリー',
            'タイトル',
            '概要',
            'URL'
        ];
        $file = fopen('php://temp', 'r+b');
        if ($file) {
            fputcsv($file, $csvHeader);
            foreach ($articles as $article) {
                    $writeData = [
                        $article['user']['name'],
                        $article['category']['name'],
                        $article['title'],
                        $article['summary'],
                        $article['url'],
                    ];
                    fputcsv($file, $writeData);
            }
            rewind($file);
            $csv = str_replace(PHP_EOL, "\r\n", stream_get_contents($file));
            $csv = mb_convert_encoding($csv, 'SJIS-win', 'UTF-8');
            $headers = array(
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="yanbaru_qiita.csv"',
            );
        }

        return response($csv, 200, $headers);
    }

}
