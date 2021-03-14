{{-- 検索 --}}
<form action="{{ route('searchArticles') }}" method="GET">
    {{ csrf_field() }}
    <div class="col-md-6 mx-auto mb-5">
        <div class="row">
            <p class="col-md-4 text-md-right">{{ __('Term') }}</p>
            <div class="col-md-6">
                <select name="term" id="term" class="mr-2">
                    <option></option>
                    @foreach (config('const') as $index => $termNumber)
                        <option value="{{ $termNumber }}" @if(old('term', $selectTerm ?? '') == $index) selected @endif>{{ $termNumber }}</option>
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
                    @foreach ($categoryForSelects as $select)
                        <option value="{{ $select }}" @if(old('category', $selectCategory ?? '') == $select) selected @endif>{{ $select }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <p class="col-md-4 text-md-right">{{ __('Free Word') }}</p>
            <div class="col-md-6">
                <input type="text" name="word" value="{{ $selectWord ?? '' }}">
            </div>
        </div>
        <button type="submit" class="btn btn-block btn-success col-md-4 mx-auto py-2 mt-3">
            検索する
        </button>
    </div>
</form>