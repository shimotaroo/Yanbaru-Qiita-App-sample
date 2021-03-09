@extends('layouts.app')

@section('title', 'パスワード編集')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">            
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2"><i class="fas fa-key mr-2"></i>パスワード編集</h3>
                </div>

                <div class="card-body">
                    <form action="" method="">
                        @csrf
                        <div class="form-group row">
                            <p class="col-md-12 text-center"><span class="text-danger">(※)</span>は入力必須項目です。</p>
                        </div>

                        <div class="form-group row">
                            <label for="cuurent_password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}<span class="text-danger">(※)</span></label>

                            <div class="col-md-6">
                                <input id="cuurent_password" type="text" class="form-control @error('cuurent_password') is-invalid @enderror" name="cuurent_password" value="" required autofocus placeholder="現在のパスワード">
                                @error('cuurent_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}<span class="text-danger">(※)</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="********">
                                <small>半角英数字8文字以上を入力してください。</small>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirm" class="col-md-4 col-form-label text-md-right">{{ __('Password Confirm') }}<span class="text-danger">(※)</span></label>

                            <div class="col-md-6">
                                <input id="password_confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="********">
                                <small>確認のためパスワードを再度入力してください。</small>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-block btn-success col-md-4 mx-auto py-2 mt-5">
                            更新する
                        </button>
                        <a class='btn btn-block btn-secondary text-white col-md-4 mx-auto py-2  mb-4' href="">戻る</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection