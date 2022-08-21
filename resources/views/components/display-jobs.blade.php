<span>
    @foreach ($jobs as $job)
    {{ $job->name }}

    @if ($jobs->last() !== $job) - @endif

    @endforeach
</span>