@extends('layouts.app')

@section('title', '記事一覧')

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

            @foreach ($articles as $article)
                <div class="card mb-5">
                    <div class="card-header"><i class="fas fa-user-edit mr-3"></i>{{ __('DateTime') }}：{{ $article->created_at->format('Y-m-d') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <p class="col-md-4 text-md-right">{{ __('Name') }}</p>
                            <p class="col-md-6">
                                {{ $article->user->name }}
                            </p>
                        </div>
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
                        <form method="GET" action="{{ route('index') }}">
                            <div class="row">
                                <button class="btn btn-success text-white col-md-4 mx-auto">
                                    詳細を見る
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection