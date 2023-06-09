@extends('layouts.bootstrap')
@section('title')
Create Resep
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-success">
            <div class="card-header">
                <h3>Create Resep</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('resep.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach($category as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <span class="error invalid-feedback">{{$errors->first('category_id')}}</span>
                        </div>


                        <div class="form-group">
                            <label for="user_id">Chef</label>
                            <select name="user_id" id="user_id" class="form-control">
                                @foreach($users as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endforeach
                            </select>
                            <span class="error invalid-feedback">{{$errors->first('user_id')}}</span>
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" value="{{ old('title') }}"
                                class="form-control {{ $errors->first('title') ? 'is-invalid':'' }}" name="title"
                                id="title" />
                            <span class="error invalid-feedback">{{$errors->first('title')}}</span>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description"
                                class="form-control {{ $errors->first('description') ? 'is-invalid':'' }}">
                                {{ old('description') }}
                            </textarea>
                            <span class="error invalid-feedback">{{$errors->first('description')}}</span>
                        </div>

                        <div class="form-group">
                            <label for="group">Group</label>
                            <input type="text" value="{{ old('group') }}"
                                class="form-control {{ $errors->first('group') ? 'is-invalid':'' }}" name="group"
                                id="group" />
                            <span class="error invalid-feedback">{{$errors->first('group')}}</span>
                        </div>

                        <div class="form-group">
                            <label for="kalori">Kalori</label>
                            <input type="text" value="{{ old('kalori') }}"
                                class="form-control {{ $errors->first('kalori') ? 'is-invalid':'' }}" name="kalori"
                                id="kalori" />
                            <span class="error invalid-feedback">{{$errors->first('kalori')}}</span>
                        </div>


                        <div class="form-group">
                            <label for="thumbnail">Thumbnail</label>
                            <input type="file" class="form-control {{  $errors->first('thumbnail') ? 'is-invalid':'' }}"
                                name="thumbnail" id="thumbnail">
                            <span class="error invalid-feedback">{{$errors->first('thumbnail')}}</span>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection