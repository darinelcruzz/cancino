<div>
    @if ($points[$num] > 0)
        <div class="col-md-6">
            <div class="clearfix">
                <span class="pull-left"><b>Vendido {{ fnumber($sales[$num]) }}</b></span>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-red" style="width: {{ $sales[$num] * 100 / $points[$num] }}%;"></div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="clearfix">
                <span class="pull-left"><b>Negro {{ fnumber($points[$num]) }}</b></span>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-black" style="width: {{ ($sales[$num] - $points[$num]) * 100 / ($stars[$num] - $points[$num]) }}%;"></div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="clearfix">
                <span class="pull-left"><b>Estrella {{ fnumber($stars[$num]) }}</b></span>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-green" style="width: {{ ($sales[$num] - $stars[$num]) * 100 / ($goldens[$num] - $stars[$num]) }}%;"></div>
            </div>
        </div>
        <div class="col-md-2">
            <div class="clearfix">
                <span class="pull-left"><b>Dorada {{ fnumber($goldens[$num]) }}</b></span>
            </div>
            <div class="progress">
                <div class="progress-bar progress-bar-yellow" style="width: {{ $sales[$num] - $goldens[$num] }}%;"></div>
            </div>
        </div>
    @endif
</div>
