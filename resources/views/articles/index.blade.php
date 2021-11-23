@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="card">
        <div class="card-header with-border">
            <a href="{{ route('articles.create')}}" class="btn btn-success mb-2" id="btn-new">ADD</a>
            <h2 class="box-title text-center">List Of Positions</h2>
        </div> 
        <div class="card-body">
            <table  class="table table-hover ">
                <thead>
                    <th></th>
                    <th> Title</th>
                    <th> Description</th>
                    <th>Action</th> 
                </thead> 
                <tbody id="table-main">
                    @php($count=1)
                    @php($amonut=0)
                    @foreach($articles as $article)
                        <tr>
                            <td>{{$count++}}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->description }}</td>
                            <td>
                                <div class="btn-group">
                                 <a href="{{ route('articles.edit', $article->id)}}" class="btn btn-info">Edit</a>
                                 <a href="{{ route('articles.delete', $article->id)}}" class="btn btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
  </div>
@endsection