@extends('sale.layout')


 
@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h2>Sales Department Dashboard Page</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 mt-1 mr-1">
                    <div class="float-right">
                        <a class="btn btn-success" href="{{ route('sale.create') }}"> Create New Post</a>
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-lg-12">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                </div>
                <div class="col-lg-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>Job Highlight</th>
                            <th>Job Description</th>
                            <th>Qualification</th>
                            <th>Competencies</th>
                            <th>Technical Skills</th>
                            <th>Additional Highlight</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($sales as $sale)
                        <tr>
                            
                            <td>{{ \Str::limit($sale->jobhigh, 50) }}</td>
                            <td>{{ \Str::limit($sale->jobdesc, 50) }}}</td>
                            <td>{{ \Str::limit ($sale->qualification, 50) }}</td>
                            <td>{{ \Str::limit($sale->competencies, 50) }}</td>
                            <td>{{ \Str::limit($sale->techskill, 50) }}</td>
                            <td>{{ \Str::limit($sale->additional, 50) }}</td>
                            <td>
                                <form action="{{ route('sale.destroy',$sale->id) }}" method="POST">
                   
                                    <a class="btn btn-info" href="{{ route('sale.show',$sale->id) }}">Show</a>
                
                                    <a class="btn btn-primary" href="{{ route('sale.edit',$sale->id) }}">Edit</a>
                   
                                    @csrf
                                    @method('DELETE')
                      
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {!! $sales->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection