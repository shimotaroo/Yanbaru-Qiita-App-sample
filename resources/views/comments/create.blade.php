@extends('layouts.app')

@section('title', 'コメント投稿')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">        
            <div class="card mb-5">
                <div class="card-header">
                    <h3 class="text-center my-2"><i class="fas fa-comments mr-2"></i>コメント投稿</h3>
                </div>
                <form action="{{ route('comments.store', $article) }}" method="POST">
                    @csrf
                    <div class="card-body col-md-8 mx-auto">
                        <div class="form-group mb-4">
                            <textarea name="comment" class="form-control @error('comment') is-invalid @enderror" placeholder="ここにコメントを入力してください。" rows="6" required>{{ old('comment') }}</textarea>
                            <small class="form-text text-muted">入力必須です。</small>
                            <small class="form-text text-muted">150文字以内で入力してください。</small>
                            @error('comment')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-block btn-success col-md-4 mx-auto py-2 mt-5">
                            コメントする
                        </button>
                        <a class='btn btn-block btn-secondary text-white col-md-4 mx-auto py-2  mb-4' href="{{ route('articles.show', $article) }}">戻る</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection