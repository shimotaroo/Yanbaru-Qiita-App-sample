@extends('layouts.app')

@section('title', '記事詳細')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @if (session('flashMsg'))
            {{-- フラッシュメッセージ --}}
                <div class="text-center col-md-6 mx-auto mb-4 py-2 bg-success text-white flash_message">
                    {{ session('flashMsg') }}
                </div>
            @endif
            {{-- フラッシュメッセージ --}}

            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2"><i class="fas fa-file-code mr-2"></i>記事詳細</h3>
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
                            @auth
                                <a href="{{ route('comments.create', $article) }}" class='btn btn-success text-white col-md-4 py-2 mx-1 mb-4'><i class="far fa-comment mr-1"></i>コメント</a>
                            @endauth
                            @if ($article->user_id === Auth::id())
                                <a  href="{{ route('articles.edit', $article) }}" class="btn btn-success text-white col-md-3 py-2 mx-1 mb-4"><i class="far fa-edit mr-1"></i>編集</a>
                                <form action="{{ route('articles.destroy', $article) }}" method="POST" class="col-md-3 p-0 row mx-1" id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger text-white col-12 py-2 mb-4" id="delete-btn" data-delete-target="記事"><i class="far fa-trash-alt mr-1"></i>削除</button>                                
                                </form>              
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="text-center mb-4"><i class="fas fa-comments mr-2"></i>コメント（ {{$comments->count()}}件 ）</h3>
            <div class="mb-5">
                @if (!$comments->isEmpty())
                @foreach ($comments as $comment)
                    <div class="card mx-auto mb-2">
                        <div class="card-body d-flex">
                            <div class="col-md-3 text-center my-2">
                                {{ $comment->name }}
                            </div>
                            <div class="col-md-8">
                                <p class="bg-light m-0 p-2">{!! nl2br(e($comment->pivot->comment)) !!}</p>
                            </div>
                            @if ($comment->id === Auth::id())
                                <form action="{{ route('comments.destroy', $comment->pivot->id) }}" method="POST" class="col-md-1 p-0 row mx-1 position-relative align-items-center" id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger text-white col-12 position-absolute top-0 end-0" id="delete-btn" data-delete-target="コメント"><i class="far fa-trash-alt mr-1"></i></button>                                
                                </form>              
                            @endif
                        </div>
                    </div>
                @endforeach
                @else
                    <div class="text-center mt-4">
                        <p class="mb-4">コメントはありません。</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection