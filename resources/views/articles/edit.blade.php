@extends('layouts.app')

@section('title', '記事編集')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2"><i class="fas fa-pen mr-2"></i>記事編集</h3>
                </div>
                <form action="{{ route('articles.update', $article) }}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="card-body col-md-8 mx-auto">
                        <div class="form-group row">
                            <p class="col-md-12 text-center"><span class="text-danger">(※)</span>は入力必須項目です。</p>
                        </div>                            
                        <div class="form-group mb-4">
                            <label for="title">記事タイトル<span class="text-danger">(※)</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="記事タイトル" value="{{ old('title') ?? $article->title }}" autofocus required>
                            <small id="url" class="form-text text-muted">50文字以内で入力してください。</small>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <p for="exampleInputPassword1">カテゴリー<span class="text-danger">(※)</span></p>
                            @foreach ($categoryForRadioButton as $index => $categoryName)
                                <div class="form-check form-check-inline @error('category_id') is-invalid @enderror">
                                    <input class="form-check-input @error('category_id') is-invalid @enderror" type="radio" name="category_id" id="category{{ $index }}" 
                                        value="{{ $index }}" {{ old('category_id') == $index ? 'checked': '' }} {{ $article->category_id == $index ? 'checked' : '' }}
                                    >
                                    <label class="form-check-label" for="category{{ $index }}">{{ $categoryName }}</label>
                                </div>                        
                            @endforeach
                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="summary">記事概要<span class="text-danger">(※)</span></label>
                            <textarea class="form-control @error('summary') is-invalid @enderror" id="summary" name="summary" placeholder="記事概要" rows="6" required>{{ old('summary') ?? $article->summary }}</textarea>
                            <small id="url" class="form-text text-muted">30文字以上で入力してください。</small>
                            @error('summary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="url">記事URL<span class="text-danger">(※)</span></label>
                            <input type="url" class="form-control @error('url') is-invalid @enderror" id="url" name="url" placeholder="記事URL" value="{{ old('url') ?? $article->url }}" required>
                            <small id="url" class="form-text text-muted">Qiitaの記事のURLを入力してください。</small>
                            @error('url')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>                        
                        <button type="submit" class="btn btn-block btn-success col-md-4 mx-auto py-2 mt-5">
                            編集する
                        </button>
                        <a class='btn btn-block btn-secondary text-white col-md-4 mx-auto py-2  mb-4' href="{{ route('index') }}">戻る</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection