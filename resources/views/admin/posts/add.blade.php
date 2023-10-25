@extends('layouts.admin')
@section('title', 'Add Post')
@section('content')
    <div class="content-wrapper">
        <div class="content">
            <div class="card">
                <div class="card-header">
                    <h6 class="d-inline">Add Post</h6>
                    <a href="{{ url('admin/materials') }}" class="btn btn-outline-primary btn-sm float-right">Back</a>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif


                    <form action="{{ url('admin/store-post') }}" enctype="multipart/form-data" method="POST">
                        @csrf

                        <img id="preview">

                      <div>
                        <label for="image">Image</label>
                        <input type="file" name="image" onchange="loadFile(event)" class="form-control mb-2 " required>
                      </div>

                        <select name="category_id" 
                        class="form-control my-4"
                        required>
                            <option value="">Select Category</option>
                            @foreach ($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>

                        <textarea name="description" id="summernote" cols="30" rows="10"></textarea>

                        <div>
                            <button type="submit" class="btn btn-success float-right">ADD POST </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection


@push('custom-scripts')
    <script>
        // summernote
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: "Description"
            });
        });
    </script>
@endpush
