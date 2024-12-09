@extends('admin.layouts.layout')

@section('title', 'Admin Roles')

@section('page_name')
<a class="btn btn-info" href="{{route('roles.create')}}">Add Roles</a>
@endsection

@section('content')
    <section class="no-padding-top no-padding-bottom">
        <div class="container-fluid">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                      <th scope="col">Id</th>
                      <th scope="col">Role Name</th>
                      <th scope="col">Edit</th>
                      <th scope="col">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($roles as $role)
                        <tr>
                            <td>{{$role->id}} </td>

                            <td>{{ucfirst($role->name)}}</td>

                            <td>
                                <a href="" class="btn btn-info">
                                    <i class="fa fa-edit"></i>Edit
                                </a>
                            </td>
                            <td>
                                <a href="" class="btn btn-primary">
                                    <i class="fa fa-trash"></i></i>Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                  </tbody>
            </table>
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">

            </div>
        </div>
    </section>

@endsection
