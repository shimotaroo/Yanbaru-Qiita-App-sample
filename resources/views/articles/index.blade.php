@extends('layouts.app')

@section('title', '記事一覧')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            {{-- フラッシュメッセージ --}}
            @if (session('flashMsg'))
                <div class="text-center col-md-6 mx-auto mb-4 py-2 bg-success text-white flash_message">
                    {{ session('flashMsg') }}
                </div>
            @endif
            {{-- フラッシュメッセージ --}}

            @include('layouts.search')

            {{-- 記事が登録されている場合 --}}
            @if (!$articles->isEmpty())
            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-6">
                        <div class="card mb-5">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div class="font-weight-bold">
                                    <i class="fas fa-user-edit mr-2"></i>{{ $article->user->name }}
                                </div>
                                <div class="d-flex justify-content-around">
                                    @if ($article->user_id === Auth::id())
                                        <a href="{{ route('articles.edit', $article) }}" class="btn btn-secondary rounded-pill ml-auto mr-2"><i class="far fa-edit mr-1"></i>編集</a>
                                        <form action="{{ route('articles.destroy', $article) }}" method="POST" id="delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger rounded-pill ml-auto" id="delete-btn" data-delete-target="記事"><i class="far fa-trash-alt mr-1"></i>削除</button>                                
                                        </form>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <p class="col-md-4 text-md-right">{{ __('Term') }}</p>
                                    <p class="col-md-6">
                                        {{ $article->user->term }}期生
                                    </p>
                                </div>
                                <div class="row">
                                    <p class="col-md-4 text-md-right">{{ __('Title') }}</p>
                                    <p class="col-md-6">
                                        {{ $article->title }}
                                    </p>
                                </div>
                                <div class="row">
                                    <p class="col-md-4 text-md-right">{{ __('URL') }}</p>
                                    <p class="col-md-6">
                                        <a href="{{ $article->url }}" target="_blank">{{ $article->url }}</a>
                                    </p>
                                </div>
                                <div class="row">
                                    <p class="col-md-4 text-md-right">{{ __('DateTime') }}</p>
                                    <p class="col-md-6">
                                        {{ $article->created_at->format('Y-m-d') }}
                                    </p>
                                </div>
                                <form method="GET" action="{{ route('index') }}">
                                    <div class="row">
                                        <a href="{{ route('articles.show', $article) }}" class="btn btn-success text-white col-md-4 mx-auto">詳細を見る</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            {{-- 記事が登録されていない場合 --}}
            @else
                <div class="text-center mt-4">
                    <p class="mb-4">記事がありません。</p>
                    @auth
                        <a class='btn btn-block btn-success text-white col-md-3 mx-auto py-2  mb-4' href="{{ route('articles.create') }}"><i class="fas fa-pen mr-2"></i>投稿する</a>
                    @endauth
                </div>
            @endif
            <div class="col-md-4 mx-auto d-flex justify-content-center">
                {{ $articles->appends(request()->input())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection