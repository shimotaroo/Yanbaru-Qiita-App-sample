{{-- 検索 --}}
<form action="{{ route('articles.search') }}">
    <div class="col-md-6 mx-auto mb-5">
        <div class="row">
            <p class="col-md-4 text-md-right">{{ __('Term') }}</p>
            <div class="col-md-6">
                <select name="term" id="term" class="mr-2 @error('term') is-invalid @enderror">
                    @foreach (config('const.term') as $term)
                        <option value="{{ $term }}" @if(old('term', $parametersForSearch['term'] ?? '') == $term) selected @endif>{{ $term }}</option>
                    @endforeach
                </select>
                @error('term')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                期生

            </div>
        </div>
        <div class="row">
            <p class="col-md-4 text-md-right">{{ __('Category') }}</p>
            <div class="col-md-6">
                <select name="category" class="@error('category') is-invalid @enderror">
                    <option></option>
                    @foreach ($categoryForSelectBox as $id => $categoryName)
                        <option value="{{ $id }}" @if(old('category', $parametersForSearch['category'] ?? '') == $id) selected @endif>{{ $categoryName }}</option>
                    @endforeach
                </select>
                @error('category')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row">
            <p class="col-md-4 text-md-right">{{ __('Free Word') }}</p>
            <div class="col-md-6">
                <input type="text" name="word" value="{{ $parametersForSearch['word'] ?? '' }}" class="@error('word') is-invalid @enderror">
                @error('word')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-block btn-success col-md-4 mx-auto py-2 mt-3">
            検索する
        </button>
    </div>
</form>