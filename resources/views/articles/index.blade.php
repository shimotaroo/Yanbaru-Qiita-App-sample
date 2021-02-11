@extends('layouts.app')

@section('title', '記事一覧')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('DateTime') }}：2021/2/28</div>
                <div class="card-body">
                    <div class="row">
                        <p class="col-md-4 text-md-right">{{ __('Name') }}</p>
                        <p class="col-md-6">
                            やんばる太郎
                        </p>
                    </div>
                    <div class="row">
                        <p class="col-md-4 text-md-right">{{ __('Season') }}</p>
                        <p class="col-md-6">
                            4期生
                        </p>
                    </div>
                    <div class="row">
                        <p class="col-md-4 text-md-right">{{ __('Title') }}</p>
                        <p class="col-md-6">
                            Laravelの基礎
                        </p>
                    </div>
                    <div class="row">
                        <p class="col-md-4 text-md-right">{{ __('URL') }}</p>
                        <p class="col-md-6">
                            <a href="#">https://******************</a>
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
        </div>
    </div>
</div>
@endsection