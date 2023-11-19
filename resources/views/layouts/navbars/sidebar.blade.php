<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">{{ trans('FDS') }}</a>
            <a href="#" class="simple-text logo-normal">{{ trans('Fraud Detection') }}</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'dashboard') class="active " @endif>
                <a href="{{ route('welcome') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ trans('Dashboard') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
