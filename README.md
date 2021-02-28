## 概要

Herokuデプロイ版：
Git管理：`feature/{issue番号}`ブランチで作業→`develop`ブランチにPR発行

## 環境構築

### Dockerでの環境構築

以下リポジトリを使用して構築
https://github.com/shimotaroo/Yanbaru-Qiita-App#docker%E7%92%B0%E5%A2%83%E6%A7%8B%E7%AF%89%E6%89%8B%E9%A0%86

**注意事項 ：Laravelプロジェクトは本リポジトリのソースを使うので、「DBの接続を確認」までで止める**

### クローン

この時点でのディレクトリ構成

```
$ pwd
/Users/PCのユーザー名/Yanbaru-Qiita-App

$ ls
README.md		development-document	docker			docker-compose.yml	src

srcディレクトリごと消す
$ rm -rf src

再度srcディレクトリ作成
$ mkdir src

$ ls
README.md		development-document	docker			docker-compose.yml	src（←このsrcは新しく作成した空ディレクトリ）

$ cd 

$ pwd
/Users/PCのユーザー名/Yanbaru-Qiita-App/src

developブランチをクローン（最後のカンマを忘れないように）
$ git clone -b develop https://github.com/shimotaroo/Yanbaru-Qiita-App-sample.git .
```

### Laravelプロジェクト側の設定

https://github.com/shimotaroo/Yanbaru-Qiita-App#laravel%E3%83%97%E3%83%AD%E3%82%B8%E3%82%A7%E3%82%AF%E3%83%88%E7%94%A8%E3%81%AEenv%E3%82%92%E4%BD%9C%E6%88%90

↑ここから再開<br>

作業概要

- Laravel用`.env`作成、環境変数設定
- appコンテナに入って`composer install`実行
- appコンテナに入って`php artisan key:generate`実行

### ページ確認

`localhost:{docker-compose.ymlで設定したポート番号}`にアクセスしてアプリ画面（一覧画面が表示されたらOK）