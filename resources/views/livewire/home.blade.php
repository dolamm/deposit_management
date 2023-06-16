<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="w-80 h-80">
                <canvas id="chart-bien-dong-so-du"></canvas>
            </div>
        </div>
        <div class="col-4">
            <div class="w-80 h-80">
                <canvas id="chart-tai-san"></canvas>
            </div>
        </div>
    </div>
    <script type="module" src="{{Vite::asset('resources/js/chart/AccountHistory.js')}}"></script>
    <script type="module" src="{{Vite::asset('resources/js/chart/TotalTaiSan.js')}}"></script>
</div>