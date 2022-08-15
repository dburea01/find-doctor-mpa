<form class="row row-cols-lg-auto g-3 align-items-center" action="/users">
    <div class="col-12">
        <label class="visually-hidden" for="search">@lang('formSearchUser.query')</label>
        <input type="text" class="form-control" id="search" name="search" value="{{ $search }}"
            placeholder=@lang('formSearchUser.query')>
    </div>

    <div class=" col-12">
        <label class="visually-hidden" for="city">@lang('formSearchUser.city')</label>
        <input type="text" class="form-control" id="city" name="city" value="{{ $city }}"
            placeholder=@lang('formSearchUser.city')>
    </div>


    <div class="col-12">
        <button type="submit" class="btn btn-primary">@lang('formSearchUser.submit')</button>
    </div>
</form>