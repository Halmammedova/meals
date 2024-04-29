<div class="position-fixed">
    <form action="{{ url()->current() }}" method="get">

        <div class="mb-3">
            <label for="user" class="form-label fw-semibold">User</label>
            <select class="form-select p-3" id="user" name="user">
                <option value>-</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $f_user ? 'selected':'' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label fw-semibold">Type of meal</label>
            <select class="form-select p-3" id="category" name="category">
                <option value>-</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $f_category ? 'selected':'' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="categoryName" class="form-label fw-semibold">Name of meal</label>
            <select class="form-select p-3" id="categoryName" name="categoryName">
                <option value>-</option>
                @foreach($categories as $category)
                    @foreach($category->categoryNames as $categoryName)
                        <option value="{{ $categoryName->id }}" {{ $categoryName->id == $f_categoryName ? 'selected':'' }}>
                        {{ $categoryName->name }}
                        </option>
                    @endforeach
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="levels" class="form-label fw-semibold">Difficulty Level</label>
            <select class="form-select p-3" id="levels" name="levels[]" multiple size="3">
                @foreach($levels as $level)
                    <option value="{{ $level->id }}" {{ in_array($level->id, $f_levels) ? 'selected':'' }}>
                        {{ $level->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="row g-2 mb-3">
            <div class="col">
                <label for="minKcal" class="form-label fw-semibold">Min Kcal</label>
                <input type="number" class="form-control" id="minKcal" name="minKcal" value="{{ $f_minKcal ?: '' }}">
            </div>
            <div class="col">
                <label for="maxKcal" class="form-label fw-semibold">Max Kcal</label>
                <input type="number" class="form-control" id="maxKcal" name="maxKcal" value="{{ $f_maxKcal ?: '' }}">
            </div>
        </div>

        <div class="mb-3">
            <label for="sortBy" class="form-label fw-semibold">Sort By</label>
            <select class="form-select" id="sortBy" name="sortBy">
                <option value {{ 'newToOld' == $f_sortBy ? 'selected':'' }}>
                    New To Old
                </option>
                <option value="lowToHigh" {{ 'lowToHigh' == $f_sortBy ? 'selected':'' }}>
                    Low To High
                </option>
                <option value="highToLow" {{ 'highToLow' == $f_sortBy ? 'selected':'' }}>
                    High To Low
                </option>
            </select>
        </div>

        <div class="row g-2">
            <div class="col">
                <button type="submit" class="btn btn-success w-100">Filter</button>
            </div>
            <div class="col">
                <a href="{{ url()->current() }}" class="btn btn-dark w-100">Clear</a>
            </div>
        </div>

    </form>
</div>
