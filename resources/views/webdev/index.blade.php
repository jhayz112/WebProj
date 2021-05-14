@extends('webdev.layout')


 
@section('content')
    <div class="card mt-5">
        <div class="card-header">
            <h2>Web Development Dashboard Page</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12 mt-1 mr-1">
                    <div class="float-right">
                        <a class="btn btn-success" href="{{ route('webdev.create') }}"> Create New Post</a>
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
                        @foreach ($webdevs as $webdev)
                        <tr>
                            
                            <td>{{ \Str::limit($webdev->jobhigh, 50) }}</td>
                            <td>{{ \Str::limit($webdev->jobdesc, 50) }}}</td>
                            <td>{{ \Str::limit ($webdev->qualification, 50) }}</td>
                            <td>{{ \Str::limit($webdev->competencies, 50) }}</td>
                            <td>{{ \Str::limit($webdev->techskill, 50) }}</td>
                            <td>{{ \Str::limit($webdev->additional, 50) }}</td>
                            <td>
                                <form action="{{ route('webdev.destroy',$webdev->id) }}" method="POST">
                   
                                    <a class="btn btn-info" href="{{ route('webdev.show',$webdev->id) }}">Show</a>
                
                                    <a class="btn btn-primary" href="{{ route('webdev.edit',$webdev->id) }}">Edit</a>
                   
                                    @csrf
                                    @method('DELETE')
                      
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    {!! $webdevs->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection