<div class="filter">
    <div class="mt-2"><h2 class="filter-heading">Stream</h2></div>
    <div class="filter-area  bg-white">
        <div class="input-group mb-2">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Stream">
        </div>
        <div class="fix-20">
            @foreach($stream as $s => $st)
                <div class="form-check" style="margin-bottom: 1px;">
                    <input class="form-check-input searchcheck" type="checkbox" data-name="{{$st->name}}" value="{{$st->name}}" id="stream_{{$s}}">
                    <label class="form-check-label" for="stream_{{$s}}">
                        {{$st->name}}
                    </label>
                </div>
            @endforeach
        </div>
    </div>

    <div class="mt-2"><h2 class="filter-heading">Sub Stream</h2></div>
    <div class="filter-area  bg-white">
        <div class="input-group mb-2">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Sub Stream">
        </div>
        <div class="fix-20">

            <div class="form-check" style="margin-bottom: 1px;">
                <input class="form-check-input searchcheck" data-name="Mechanical Engineering" type="checkbox" value="Mechanical Engineering" id="stream_0">
                <label class="form-check-label" for="stream_0">
                    Mechanical Engineering
                </label>
            </div>

        </div>
    </div>
    <div class="mt-2"><h2 class="filter-heading">State</h2></div>
    <div class="filter-area  bg-white">
        <div class="input-group mb-2">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
            <input type="text" class="form-control" placeholder="State">
        </div>
        <div class="fix-20">
            @foreach($state as $s => $si)
                <div class="form-check" style="margin-bottom: 1px;">
                    <input class="form-check-input searchcheck" type="checkbox" data-name="{{$si->name}}" value="{{$si->id}}" id="state_{{$s}}">
                    <label class="form-check-label" for="state_{{$s}}">
                        {{ucfirst($si->name)}}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mt-2"><h2 class="filter-heading">City</h2></div>
    <div class="filter-area  bg-white">
        <div class="input-group mb-2">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
            <input type="text" class="form-control" placeholder="City">
        </div>
        <div class="fix-20">
            @foreach($city as $c => $ci)
                <div class="form-check" style="margin-bottom: 1px;">
                    <input class="form-check-input searchcheck" type="checkbox" data-name="{{$ci[0]->name}}" value="{{$ci[0]->id}}" id="city_{{$c}}">
                    <label class="form-check-label" for="city{{$c}}">
                        {{ucfirst($ci[0]->name)}}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mt-2"><h2 class="filter-heading">Program Type</h2></div>
    <div class="filter-area  bg-white">
        <div class="input-group mb-2">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Program Type">
        </div>
        <div class="fix-20">
            @foreach($ptype as $p => $pi)
                <div class="form-check" style="margin-bottom: 1px;">
                    <input class="form-check-input searchcheck" type="checkbox" data-name="{{$pi->program_type == 0 ? "Part Time": "Full Time"}}" value=" {{$pi->program_type}}" id="ptype_{{$p}}">
                    <label class="form-check-label" for="ptype_{{$p}}">
                        {{$pi->program_type == 0 ? "Part Time": "Full Time"}}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <div class="mt-2"><h2 class="filter-heading">Course Duration</h2></div>
    <div class="filter-area  bg-white">
        <div class="input-group mb-2">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Course Duration">
        </div>
        <div class="fix-20">
            @foreach($courseD as $cd => $vald)
                <div class="form-check" style="margin-bottom: 1px;">
                    <input class="form-check-input searchcheck" type="checkbox" data-name="{{$vald->year}} Years" value=" {{$vald->year}}" id="coursed_{{$cd}}">
                    <label class="form-check-label" for="coursed_{{$cd}}">
                        {{$vald->year}} Years
                    </label>
                </div>
            @endforeach
        </div>
    </div>
</div>
