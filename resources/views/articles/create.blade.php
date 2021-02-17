@extends('layouts.app')

@section('title', '記事投稿')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <h2 class="text-center my-2"><i class="fas fa-pen mr-2"></i>記事投稿</h2>
                </div>
                <form action="{{ route('articles.store') }}" method="POST">
                    @csrf
                    <div class="card-body col-md-8 mx-auto">
                        <div class="form-group mb-4">
                            <label for="title">記事タイトル</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="記事タイトル" value="{{ old('title') }}" autofocus required>
                            <small id="url" class="form-text text-muted">30文字以内で入力してください。</small>
                        </div>
                        <div class="form-group mb-4">
                            <p for="exampleInputPassword1">カテゴリー</p>
                            @foreach ($categoryForRadioButton as $index => $categoryName)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="category_id" id="category{{ $index }}" value="{{ $index }}">
                                    <label class="form-check-label" for="category{{ $index }}">{{ $categoryName }}</label>
                                </div>                        
                            @endforeach
                        </div>
                        <div class="form-group mb-4">
                            <label for="summary">記事概要</label>
                            <textarea class="form-control" id="summary" name="summary" placeholder="記事概要" rows="6" required>{{ old('summary') }}</textarea>
                            <small id="url" class="form-text text-muted">30文字以上で入力してください。</small>
                        </div>
                        <div class="form-group mb-4">
                            <label for="url">記事URL</label>
                            <input type="url" class="form-control" id="url" name="url" placeholder="記事URL" value="{{ old('url') }}" required>
                            <small id="url" class="form-text text-muted">Qiitaの記事のURLを入力してください。</small>
                        </div>                        
                        <button type="submit" class="btn btn-block btn-success col-md-4 mx-auto py-2 mt-5">
                            投稿する
                        </button>
                        <a class='btn btn-block btn-secondary text-white col-md-4 mx-auto py-2  mb-4' href="{{ route('index') }}">戻る</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection