<select class="form-select form-select-sm" name="filterByJobId" id="filterByJobId">
    <option value="">@lang('formSearchUser.job')</option>
    @foreach ($jobs as $job)
    <option value="{{ $job->id }}" @if ($job->id == $filterByJobId) selected @endif>
        {{ $job->name }}
    </option>
    @endforeach
</select>