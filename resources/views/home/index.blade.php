@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
    <div class="container py-4">
        <div>
            <div class="h3 text-success text-center  mb-4">
                Type of meals
            </div>
            <div class="row g-4">
                @foreach($categories as $category)
                    <div class="col g-3">
                        <div class="border bg-success rounded p-2">
                            <div class="h5 text-center">
                                <a href="{{ route('recipes.index', ['category' => $category->id]) }}"
                                   class="link-light stretched-link text-decoration-none">
                                    {{ $category->name }}
                                </a>
                                <span class="badge rounded-pill">
                                    {{ $category->recipes_count }}
                                </span>
                                @if($category->image)

                                @else
                                    <img src="{{ asset('img/type-' . $category->id . '.jpg') }}" alt="" class="img-fluid rounded-3">
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
