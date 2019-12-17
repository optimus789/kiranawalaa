
@extends('layouts.master')

@section('title')
    Registered Roles 
@endsection

@section('content')
    
<div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Registered Roles</h4>
              @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
              @endif
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Usertype</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                  </thead>
                  <tbody>
                    @foreach ($users as $row)                  
                    <tr>
                      <td>{{ $row->id }}</td>
                      <td>{{ $row->name }}</td>
                      <td>{{ $row->phone }}</td>
                      <td>{{ $row->address }}</td>
                      <td>{{ $row->email }}</td>
                      <td>{{ $row->usertype }}</td>

                          @if (($row->usertype == 'su') && (Auth::user()->usertype == 'admin'))
                          <td>
                              -
                          </td> 
                          <td>
                              -
                          </td> 
                          @else
                          <td>
                              <a href="/role-edit/{{ $row->id }}" class="btn btn-warning">EDIT</a>
                          </td>
                          <td>                          
                              <form action="/role-delete/{{ $row->id }}" method="post">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger">DELETE</button>
                              </form>
                            </td>
                          @endif

                          

                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection

@section('scripts')
    
@endsection
