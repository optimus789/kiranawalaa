
@extends('layouts.master')

@section('title')
    Inventory 
@endsection

@section('content')
    
<div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title"> Inventory <a href="/inv/create" class="btn btn-success float-right">+ Add Item</a></h4>
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
                    <th>Description</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Rate</th>
                    <th>Tax</th>
                    <th>Stock</th>
                    <th>EDIT</th>
                    <th>DELETE</th>
                  </thead>
                  <tbody class="text-center">
                    @foreach ($inv as $row)                  
                    <tr>
                      <td>{{ $row->id }}</td>
                      <td>{{ $row->title }}</td>
                      <td>{{ $row->description }}</td>
                      <td>{{ $row->category }}</td>
                      <td class="text-center"><img  style="width:60px;" src="{{ asset('storage/'.$row->image) }}" alt="image"></td>
                      <td>{{ $row->rate }}</td>
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
                              <a href="/inv-edit/{{ $row->id }}" class="btn btn-warning">EDIT</a>
                          </td>
                          <td>                          
                              <form action="/inv-delete/{{ $row->id }}" method="post">
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
