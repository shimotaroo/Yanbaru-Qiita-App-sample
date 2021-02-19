@extends('layouts.app')

@section('title', '記事詳細')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5">
                <div class="card-header">
                    <h2 class="text-center my-2"><i class="fas fa-file-code mr-2"></i>記事詳細</h2>
                </div>

                <div class="card-body col-md-8 mx-auto">
                    <div class="card-body">
                        <div class="row mb-2">
                            <p class="col-md-4 text-md-right">{{ __('Name') }}</p>
                            <p class="col-md-6">
                                {{ $article->user->name }}
                            </p>
                        </div>
                        <div class="row mb-2">
                            <p class="col-md-4 text-md-right">{{ __('Term') }}</p>
                            <p class="col-md-6">
                                {{ $article->user->term }}期生
                            </p>
                        </div>
                        <div class="row mb-2">
                            <p class="col-md-4 text-md-right">{{ __('Title') }}</p>
                            <p class="col-md-6">
                                {{ $article->title }}
                            </p>
                        </div>
                        <div class="row mb-2">
                            <p class="col-md-4 text-md-right">{{ __('Category') }}</p>
                            <p class="col-md-6">
                                {{ $article->category->name }}
                            </p>
                        </div>
                        <div class="row mb-2">
                            <p class="col-md-4 text-md-right">{{ __('Summary') }}</p>
                            <p class="col-md-6">
                                {{ $article->summary }}
                            </p>
                        </div>
                        <div class="row mb-2">
                            <p class="col-md-4 text-md-right">{{ __('URL') }}</p>
                            <p class="col-md-6">
                                <a href="{{ $article->url }}" target="_blank">{{ $article->url }}</a>
                            </p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('index') }}" class='btn btn-secondary text-white col-md-3 py-2 mx-1 mb-4'>戻る</a>
                            @if ($article->user_id === Auth::id())
                                <a  href="{{ route('articles.edit', $article) }}" class="btn btn-success text-white col-md-3 py-2 mx-1 mb-4">編集</a>                    
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection