@extends('admin.layouts.layout')

@section('title', 'Category')

@section('page_name')
<a class="btn btn-info" href="{{route('category.create')}}">Add Category</a>
@endsection

@section('content')
    <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Thumbnail</th>
                      <th scope="col">Category Name</th>
                      <th scope="col">Category Slug</th>
                      <th scope="col">Parent Category</th> <!-- New column -->
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                      <th scope="col">View</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($categories as $category)
                        <tr>
                            <td >{{$category->id}}</td>
                            <td>
                                <img width="40px" height="40px" src="{{ $category->getThumbnail() }}" alt="">
                            </td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>

                            <!-- Show Parent Category Name -->
                            <td>
                                @if ($category->parent)
                                    {{ $category->parent->name }}
                                @else
                                    No Parent
                                @endif
                            </td>

                            <td>{{($category->active) == '0' ? "Inactive" : 'Active'}}</td>
                            <td class="d-flex align-items-center">
                                <a class="btn btn-info btn-sm mr-2" href="{{ route('category.edit', $category->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('category.delete', $category->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                            <td class="d-flex justify-content-center align-items-center">
                                <a class="btn btn-outline-primary btn-sm d-flex align-items-center justify-content-center" href="{{route('category.view', $category->id)}}">
                                    <i class="fa fa-eye"></i> View
                                </a>
                            </td>
                        </tr>
                      @endforeach
                  </tbody>
            </table>
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {{ $categories->links() }}
            </div>
        </div>
    </section>

@endsection
