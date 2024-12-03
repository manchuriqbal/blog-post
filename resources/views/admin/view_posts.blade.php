@extends('admin.layouts.layout')

@section('title', 'Products')

@section('page_name', 'All Products')

@section('page-css')
    <style>
        img{
            width: 80px;
            height: 50px;
        }
        .input-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }


        .no-padding-top {
            padding-top: 0;
        }

        .no-padding-bottom {
            padding-bottom: 0;
        }
        .table_dego {

            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .table_deg {
            text-align: center;

        }
        .body_con{
            margin-right: 20px;
            margin-left: 20px;
        }

        .table_head{
            margin-top: 5px;
            color: white;
            background-color: rgb(114, 114, 255);
        }
        .input_category {
            height: 40px;
            width: 400px;
            padding-bottom: 1px;
        }
    </style>
@endsection


@section('content')


    <div class="body_con">

        <form action="" method="post">
            @csrf
            <input class="input_category" type="text" name="search" >
            <input class="btn btn-secondary" type="submit" value="Search">
        </form>
        <div class="table_dego mt-4">
            <table class="table_deg table table-striped ">
                <thead>
                  <tr>
                    <th class="table_head" scope="col">Thumbnail</th>
                    <th class="table_head" scope="col">Title</th>
                    <th class="table_head" scope="col">Post</th>
                    <th class="table_head" scope="col">Author</th>
                    <th class="table_head">Status</th>
                    <th class="table_head">Category</th>
                    <th class="table_head">Action</th>
                  </tr>
                </thead>
                <tbody>

                @foreach ($posts as $post)

                    <tr>
                      <td>
                        <img width="100px" height="100px" src="{{ $post->getThumbnail() }}" alt="">
                      </td>
                      <td class="title">{{ substr($post->title, 0, 20) }}...</td>
                      <td>{{ substr($post->content, 0, 120) }}...</td>
                        <td>{{$post->author->fullName()}}</td>
                        @if ($post->status == 'published')
                        <td class="text-success">{{$post->status}}</td>
                        @elseif ($post->status == 'draft')
                        <td class="text-warning">{{$post->status}}</td>
                        @else
                        <td class="text-danger">{{$post->status}}</td>

                        @endif
                        <td>
                            @forelse ($post->categories as $category)
                                {{ $category->name }}
                            @empty
                                No categories
                            @endforelse
                        </td>
                        <td class="d-flex justify-content-center align-items-center">
                            <a class="btn btn-outline-primary btn-sm d-flex align-items-center justify-content-center" href="{{route('posts.show', $post->id)}}">
                                <i class="fa fa-eye"></i> View
                            </a>

                        </td>

                    </tr>

                    @endforeach

                </tbody>
              </table>
            </div>
            {{$posts->links()}}

            </div>
        </div>
@endsection
