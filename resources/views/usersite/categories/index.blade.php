@extends('usersite.layouts.layout')

@section('title', 'Categories')

@section('content')
<div class="col-md-8">
    <h1 class="text-center mb-4">All Categories</h1>

    <div class="row g-4">
        @foreach ($categories as $category)
        <div class="col-md-4">
            <a href="{{route('user.categories.show', $category->id)}}">
            <div class="card">
                    <img src="{{ $category->thumbnail }}" alt="{{ $category->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ucfirst($category->name)}}
                    </h5>


                    <!-- Subcategories -->

                    <div class="mt-3">
                        <h6>Subcategories:</h6>
                        <ul class="list-unstyled">

                            <li>
                                <span class="" style="margin-left: 20px;">
                                    @if ($category->children && $category->children->isNotEmpty())
                                        @foreach ($category->children as $parentCategory)
                                            <i class="fas fa-list-alt"></i>
                                            <a href="{{$parentCategory->slug}}">{{$parentCategory->name}}</a>@if(!$loop->last), @endif
                                        @endforeach
                                    @else
                                        <i class="fas fa-list-alt"></i>
                                        <span>No Subcategory</span>
                                    @endif
                                </span>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>
             </a>

        </div>
        @endforeach
    </div>
</div>
@include('usersite.partial.sidebar')
@endsection
