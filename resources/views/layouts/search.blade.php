{{-- 検索 --}}
<form action="" method="GET">
    <div class="col-md-6 mx-auto mb-5">
        <div class="row">
            <p class="col-md-4 text-md-right">{{ __('Term') }}</p>
            <div class="col-md-6">
                {{-- TODO：仮で作っているので適宜変更してください --}}
                <select name="" id="" class="mr-2">
                    <option value=""></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
                期生
            </div>
        </div>
        <div class="row">
            <p class="col-md-4 text-md-right">{{ __('Category') }}</p>
            <div class="col-md-6">
                {{-- TODO：仮で作っているので適宜変更してください --}}
                <select name="" id="">
                    <option value=""></option>
                    <option value="1">laravel</option>
                    <option value="2">PHP</option>
                    <option value="3">Docker</option>
                    <option value="4">web基礎</option>
                </select>
            </div>
        </div>
        <div class="row">
            <p class="col-md-4 text-md-right">{{ __('Free Word') }}</p>
            <div class="col-md-6">
                {{-- TODO：仮で作っているので適宜変更してください --}}
                <input type="text">
            </div>
        </div>
        <button type="submit" class="btn btn-block btn-success col-md-4 mx-auto py-2 mt-3">
            検索する
        </button>
    </div>
</form>