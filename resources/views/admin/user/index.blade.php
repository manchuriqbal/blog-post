@extends('admin.layouts.layout')

@section('title', 'Users Profile')

@section('page_name', 'Users Profile')


@section('content')
    <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Profile Picture</th>
                      <th scope="col">Full Name</th>
                      <th scope="col">User Name</th>
                      <th scope="col">Email</th>
                      <th scope="col">Phone</th>
                      <th scope="col">User Role</th>
                      <th scope="col">View</th>
                    </tr>
                  </thead>
                  <tbody>

                      @foreach ($users as $user)
                    <tr>
                        <td >{{$user->id}}</td>
                        <td>
                            <img width="60px" height="60px" src="{{ $user->getAvatar() }}" alt="" class="img-fluid rounded-circle">
                        </td>
                        <td>{{$user->fullName()}} </td>
                        <td>{{$user->username}}</td>
                        <td> {{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        @if ($user->role->name == 'admin')
                            <td class="text-success">Admin</td>
                        @elseif ($user->role->name == 'author')
                            <td class="text-warning">Author</td>
                        @elseif ($user->role->name == 'user')
                            <td class="text-info">User</td>
                        @endif
                            <td>
                                <a href="{{route('users.show', $user->id)}}" class="btn btn-outline-primary btn-sm d-flex align-items-center justify-content-center" >
                                    <i class="fa fa-eye"></i> View
                                </a>
                            </td>
                            @endforeach
                        </tr>
                  </tbody>
            </table>
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {{$users->links()}}
            </div>
        </div>
    </section>

@endsection
