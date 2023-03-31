@extends('layouts.bootstrap')
@section('title')
Category Page
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3>Category Data</h3>
            </div>
            <div class="card-body table-responsive">
                @include('alert.success')
                <a href="{{ route('category.create') }}" class="btn btn-primary">Create</a>
                <hr>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Thumbnail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($category as $row)
                        <tr>
                            <td>
                                {{ $loop->iteration + ($category->perPage() * ($category->currentPage() -1) ) }}
                            </td>
                            <td>
                                {{ $row-> name }}
                            </td>
                            <td>
                                <img alt="" class="img-thumbnail" src="{{ asset('uploads/'.$row->thumbnail) }}"
                                    width="150px">
                            </td>
                            <td>-</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{ $category->links() }}
            </div>
        </div>
    </div>
</div>
@endsection