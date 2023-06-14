<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div style="width: 600px; margin: auto;">
                    <canvas id="chart-bien-dong-so-du"></canvas>
                </div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
    <script type="module" src="{{Vite::asset('resources/js/chart/AccountHistory.js')}}"></script>
</div>