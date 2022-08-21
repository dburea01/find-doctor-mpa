<form class="row row-cols-lg-auto g-3 align-items-center mb-3" action="/users">
    <div class="col-12">
        <label class="visually-hidden" for="search">@lang('formSearchUser.search')</label>
        <input type="text" class="form-control form-control-sm" id="search" name="search" value="{{ $search }}"
            placeholder="@lang('formSearchUser.search')">
    </div>

    <div class="col-12">
        <label class="visually-hidden" for="cityName">@lang('formSearchUser.city')</label>
        <input class="form-control form-control-sm" id="cityName" name="cityName" value="{{ $cityName }}" type="text"
            placeholder="@lang('formSearchUser.city')">
        <input type="hidden" id="filterByCityId" name="filterByCityId" value="{{ $filterByCityId }}">
    </div>

    <div class="col-12">
        <x-select-job :filterByJobId="$filterByJobId" />
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary btn-sm">@lang('formSearchUser.submit')</button>
    </div>

    @section('additional_js')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        $(document).ready(function(){

    $( "#cityName" ).autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "api/v1/cities?country_id=FR",
                data: {
                    search : request.term
                },
                dataType: "json",
                success: function(data){
                    
                    var resp = $.map(data.data,function(obj){
                        
                        return {
                            value:obj.name+' ('+obj.zip_code+')',
                            id:obj.id
                        }
                    })
                    response(resp);
                }
            });
        },
        minLength: 2,
        select: function (event, ui) {
            $('#filterByCityId').val(ui.item.id)
        }
    });

});
    </script>
    @endsection
</form>