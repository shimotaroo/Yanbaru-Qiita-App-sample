@extends('layouts.app')

@section('title', 'マイページ')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- フラッシュメッセージ --}}
            @if (session('flashMsg'))
                <div class="text-center col-md-6 mx-auto mb-4 py-2 bg-success text-white flash_message">
                    {{ session('flashMsg') }}
                </div>
            @endif
            {{-- フラッシュメッセージ --}}
        
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2"><i class="fas fa-user mr-2"></i>マイページ</h3>
                </div>

                <div class="card-body col-md-8 mx-auto">
                    <div class="card-body">
                        <div class="row mb-2">
                            <p class="col-md-4 text-md-right">{{ __('Name') }}</p>
                            <p class="col-md-6">
                                {{ $user->name }}
                            </p>
                        </div>
                        <div class="row mb-2">
                            <p class="col-md-4 text-md-right">{{ __('Term') }}</p>
                            <p class="col-md-6">
                                {{ $user->term }}期生
                            </p>
                        </div>
                        <div class="row mb-2">
                            <p class="col-md-4 text-md-right">{{ __('Email') }}</p>
                            <p class="col-md-6">
                                {{ $user->email }}
                            </p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('index') }}" class='btn btn-secondary text-white col-md-3 py-2 mx-1 mb-4'>戻る</a>
                            @if ($user->id === Auth::id())
                                <a  href="{{ route('user.edit', $user) }}" class="btn btn-success text-white col-md-3 py-2 mx-1 mb-4">編集</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="text-center mb-3">自分の投稿</h3>
            @foreach ($articles as $article)
                <div class="card mb-5">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-user-edit mr-3"></i>{{ __('DateTime') }}：{{ $article->created_at->format('Y-m-d') }}
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
                        <form method="GET" action="{{ route('index') }}">
                            <div class="row">
                                <a href="{{ route('articles.show', $article->id) }}" class="btn btn-success text-white col-md-4 mx-auto">詳細を見る</a>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection