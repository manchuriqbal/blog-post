@extends('admin.layouts.layout')

@section('title', 'Tags')

@section('page_name')
<a class="btn btn-info" href="{{route('tags.create')}}">Add Tags</a>
@endsection

@section('content')
    <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Tag</th>
                      <th scope="col">Slug</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                        $serialNumber = ($tags->currentPage() - 1) * $tags->perPage();
                    @endphp
                        @foreach ($tags as $index => $tag)
                        <tr>
                            <td>{{ $serialNumber + $index + 1 }}</td>

                            <td>{{ucfirst($tag->name)}}</td>
                            <td>{{$tag->slug}}</td>

                            <td>
                                <a href="{{route('tags.edit', $tag->id)}}" class="btn btn-info">
                                    <i class="fa fa-edit"></i>Edit
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('tags.destroy', $tag->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this tag?');">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                  </tbody>
            </table>
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {{$tags->links()}}
            </div>
        </div>
    </section>

@endsection
