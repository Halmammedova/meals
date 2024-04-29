<div class="fw-semibold bg-white border rounded p-3">
    <div class="row g-2">
        <div class="col-12 text-end text-success fs-4">
            {{ $obj->title }}
        </div>
        <div class="col-3">
            @if($obj->image)

            @else
                <img src="{{ asset('img/meal-' . $obj->category_name_id . '.jpg') }}" alt="" class="img-fluid rounded-3">
            @endif
        </div>
        <div class="col-4 px-4">
            <div>
                <div class="text-truncate pt-3">
                    <span class="text-success">User:</span>
                    <span class="{{ isset($f_user) ? 'mark':'' }}">
                        {{ $obj->user->name }}
                    </span>
                </div>
                <div class="text-truncate py-2">
                    <span class="text-success">Type of meal:</span>
                    <span class="{{ isset($f_category) ? 'mark':'' }}">
                        {{ $obj->category->name }}
                    </span>
                </div>
                <div>
                    <span class="text-success">Difficulty Level:</span>
                    <span class="{{ count($f_levels) > 0 ? 'mark':'' }}">
                        {{ $obj->level->name }}
                    </span>
                </div>
                <div class="py-2">
                    <span class="text-success">Prep time in minutes:</span>
                    <span class="{{ count($f_durations) > 0 ? 'mark':'' }}">
                        {{ $obj->duration->name }}
                    </span>
                    <small>min</small>
                </div>
                <div>
                    <span class="text-success">Calorie:</span>
                    <span class="{{ (isset($f_minKcal) or isset($f_maxKcal)) ? 'mark':'' }}">{{ number_format($obj->kcal,) }} <small>kcal</small></span>
                </div>
                <div class="py-2">
                    <span class="text-success">Date:</span> {{ $obj->created_at->format('d.m.Y') }}
                </div>
            </div>
        </div>
        <div class="col-5 pt-3">
            <div class="text-success">Recipe:</div> 
            <div class="h5">
                {{ $obj->body }}
            </div>
        </div>
    </div>
</div>
