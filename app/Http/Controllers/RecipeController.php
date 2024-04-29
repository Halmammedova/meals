<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Duration;
use App\Models\Level;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'nullable|string|max:30',
            'user' => 'nullable|integer|min:1',
            'category' => 'nullable|integer|min:1',
            'categoryName' => 'nullable|integer|min:1',
            'levels' => 'nullable|array|min:0',
            'levels.*' => 'nullable|integer|min:1',
            'durations' => 'nullable|array|min:0',
            'durations.*' => 'nullable|integer|min:1',
            'minKcal' => 'nullable|numeric|min:0',
            'maxKcal' => 'nullable|numeric|min:0',
            'sortBy' => 'nullable|in:newToOld,lowToHigh,highToLow',
        ]);
        $f_q = $request->has('q') ? $request->q : null;
        $f_user = $request->has('user') ? $request->user : null;
        $f_category = $request->has('category') ? $request->category : null;
        $f_categoryName = $request->has('categoryName') ? $request->categoryName : null;
        $f_levels = $request->has('levels') ? $request->levels : [];
        $f_durations = $request->has('durations') ? $request->durations : [];
        $f_minKcal = $request->has('minKcal') ? $request->minKcal : null;
        $f_maxKcal = $request->has('maxKcal') ? $request->maxKcal : null;
        $f_sortBy = $request->has('sortBy') ? $request->sortBy : null;

        $objs = Recipe::when(isset($f_q), function ($query) use ($f_q) {
            return $query->where(function ($query) use ($f_q) {
                $query->where('title', 'like', '%' . $f_q . '%')
                    ->orWhere('body', 'like', '%' . $f_q . '%');
            });
        })
            ->when(isset($f_user), function ($query) use ($f_user) {
                return $query->where('user_id', $f_user);
            })
            ->when(isset($f_category), function ($query) use ($f_category) {
                return $query->where('category_id', $f_category);
            })
            ->when(isset($f_categoryName), function ($query) use ($f_categoryName) {
                return $query->where('category_name_id', $f_categoryName);
            })
            ->when(count($f_levels) > 0, function ($query) use ($f_levels) {
                return $query->whereIn('level_id', $f_levels);
            })
            ->when(count($f_durations) > 0, function ($query) use ($f_durations) {
                return $query->whereIn('duration_id', $f_durations);
            })
            ->when(isset($f_minKcal), function ($query) use ($f_minKcal) {
                return $query->where('kcal', '>=', $f_minKcal);
            })
            ->when(isset($f_maxKcal), function ($query) use ($f_maxKcal) {
                return $query->where('kcal', '<=', $f_maxKcal);
            })
            ->with('user', 'category', 'categoryName', 'level')
            ->when(isset($f_sortBy), function ($query) use ($f_sortBy) {
                if ($f_sortBy == 'lowToHigh') {
                    return $query->orderBy('kcal');
                } elseif ($f_sortBy == 'highToLow') {
                    return $query->orderBy('kcal', 'desc');
                } else {
                    return $query->orderBy('id', 'desc');
                }
            }, function ($query) {
                return $query->orderBy('id', 'desc'); // desc => Z-A, asc => A-Z
            })
            ->paginate(6)
            ->withQueryString();

        $users = User::withCount('recipes')
            ->orderBy('name')
            ->get();
        $categories = Category::with('categoryNames')
            ->withCount('recipes')
            ->orderBy('name')
            ->get();
        $levels = Level::withCount('recipes')
            ->orderBy('name')
            ->get();
        $durations = Duration::withCount('recipes')
            ->orderBy('id', 'asc')
            ->get();

        return view('recipe.index')
            ->with([
                'objs' => $objs,
                'users' => $users,
                'categories' => $categories,
                'levels' => $levels,
                'durations' => $durations,
                'f_q' => $f_q,
                'f_user' => $f_user,
                'f_category' => $f_category,
                'f_categoryName' => $f_categoryName,
                'f_levels' => $f_levels,
                'f_durations' => $f_durations,
                'f_minKcal' => $f_minKcal,
                'f_maxKcal' => $f_maxKcal,
                'f_sortBy' => $f_sortBy,
            ]);
    }


    public function show($id)
    {
        $obj = Recipe::findOrFail($id);

        return view('recipe.show')
            ->with([
                'obj' => $obj,
            ]);
    }
}
