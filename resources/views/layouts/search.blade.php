{{-- 検索 --}}
<form action="{{ route('articles.search') }}">
    <div class="col-md-6 mx-auto mb-5">
        <div class="row">
            <p class="col-md-4 text-md-right">{{ __('Term') }}</p>
            <div class="col-md-6">
                <select name="term" id="term" class="mr-2">
                    @foreach (config('const') as $index => $termNumber)
                        <option value="{{ $termNumber }}" @if(old('term', $inputTerm ?? '') == $index) selected @endif>{{ $termNumber }}</option>
                    @endforeach
                </select>
                期生
            </div>
        </div>
        <div class="row">
            <p class="col-md-4 text-md-right">{{ __('Category') }}</p>
            <div class="col-md-6">
                <select name="category">
                    <option></option>
                    @foreach ($categoryForSelectBox as $select)
                        <option value="{{ $select }}" @if(old('category', $inputCategory ?? '') == $select) selected @endif>{{ $select }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <p class="col-md-4 text-md-right">{{ __('Free Word') }}</p>
            <div class="col-md-6">
                <input type="text" name="word" value="{{ $inputWord ?? '' }}">
            </div>
        </div>
        <button type="submit" class="btn btn-block btn-success col-md-4 mx-auto py-2 mt-3">
            検索する
        </button>
    </div>
</form>