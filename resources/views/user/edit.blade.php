@extends('layouts.app')

@section('title', 'ユーザー情報編集')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">            
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2"><i class="fas fa-user mr-2"></i>ユーザー情報編集</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('user.update', $user) }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <p class="col-md-12 text-center"><span class="text-danger">(※)</span>は入力必須項目です。</p>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}<span class="text-danger">(※)</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $user->name }}" required autocomplete="name" autofocus placeholder="やんばる太朗">
                                <small>Slack名を入力してください。</small>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Term') }}<span class="text-danger">(※)</span></label>

                            <div class="col-md-6">
                                <input id="email" type="number" class="form-control @error('term') is-invalid @enderror" name="term" value="{{ old('term') ?? $user->term }}" required autocomplete="term" placeholder="3" min="1">
                                <small>半角数字2桁以内で入力してください。</small>
                                @error('term')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}<span class="text-danger">(※)</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required autocomplete="email" placeholder="****@mail.com">
                                <small>今回は仮のメールアドレスを入力ください。</small>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-4">
                            <p class="col-md-4 text-md-right">{{ __('Password') }}</@>
                            <p class="col-md-6">
                                パスワードは変更できません
                            </p>
                        </div>

                        <button type="submit" class="btn btn-block btn-success col-md-4 mx-auto py-2 mt-5">
                            編集する
                        </button>
                        <a class='btn btn-block btn-secondary text-white col-md-4 mx-auto py-2  mb-4' href="{{ route('index') }}">戻る</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection