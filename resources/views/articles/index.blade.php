@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="card">
        <div class="card-header with-border">
            <div class="row">
                <div class="col-md-6">                
                    <h2 class="box-title">List Of Positions</h2>
                </div>
                <div class="col-md-6 text-right">
                    <div class="row">
                        <div class="col-md-10 text-right">
                            <form method="GET" action="{{ route('articles.search') }}">
                                <div class="input-group">
                                    <input type="text" name="key" id="key" class="form-control" placeholder="Article Title">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary">SEARCH</button>
                                    </div>
                                </div>    
                            </form>                       
                        </div>
                        <div class="col-md-2 text-right">
                            <a href="{{ route('articles.create')}}" class="btn btn-success">ADD</a>
                        </div>
                    </div>                        
                </div>
            </div>
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
                                 <a href="{{ route('articles.edit', $article->id)}}" class="btn btn-primary">Edit</a>
                                 <a href="{{ route('articles.show', $article->id)}}" class="btn btn-info">View</a>
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