@extends('usersite.layouts.layout')

@section('title', 'Authors')


@section('content')
<div class="col-md-8">
    <h1 class="text-center mb-4">All Authors</h1>

    <div class="row g-4">
        @foreach ($authors as $author)
        <div class="col-md-4">
            <div class="card">
                <a class="" href="{{route('user.author.view', $author->id)}}">

                    <img src="{{ $author->getAvatar() }}" alt="{{ $author->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">

                    <div class="card-body ">
                        <h5 class="card-title">
                            {{$author->fullName()}}
                        </h5>


                        <!-- Subcategories -->

                        <div class="mt-3">
                            <h6>Total Posts: {{$author->posts()->count()}}</h6>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
    </div>
</div>
@include('usersite.partial.sidebar')
@endsection
