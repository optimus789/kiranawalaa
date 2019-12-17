
@extends('layouts.master')

@section('title')
    Inventory
@endsection

@section('content')

<div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Inventroy List</h4>
              @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
              @endif
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary text-center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Rate</th>
                    <th>Product Image</th>
                    <th>Tax</th>
                    <th>Stock</th>             
                    <th>EDIT</th>
                    <th>DELETE</th>
                  </thead>
                  <tbody class="text-center">
                    @foreach ($items as $row)                  
                    <tr>
                      <td>{{ $row->id }}</td>
                      <td>{{ $row->title }}</td>
                      <td>{{ $row->description }}</td>
                      <td>{{ $row->category }}</td>
                      <td>{{ $row->rate }}</td>
                      <td class="text-center"><img  style="width:50px;" src="{{Storage::url($row->imgurl)}}" alt=""></td>
                      <td>{{ $row->tax }}</td>
                      <td>{{ $row->stock }}&nbsp;{{ $row->units }}</td>
                      

                          @if (($row->usertype == 'su') && (Auth::user()->usertype == 'admin'))
                          <td>
                              -
                          </td> 
                          <td>
                              -
                          </td> 
                          @else
                          <td>
                              <a href="/role-edit/{{ $row->id }}" class="btn btn-success disabled">EDIT</a>
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
