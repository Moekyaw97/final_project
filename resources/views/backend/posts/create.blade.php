@extends('backendtemplate')
@extends('layouts.app')
@section('title','PostCreate')

@section('content')
  <h1>Post Create</h1>
  {{-- Error --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  {{-- Form --}}
  <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="InputDepartment">Categories:</label>
      <select name="category_id" class="form-control">
        <optgroup label="Choose Categories">
          @foreach($categories as $row)
          <option value="{{$row->id}}">{{$row->name}}</option>
          @endforeach
        </optgroup>
      </select>
    </div>

    <div class="form-group">
      <label for="InputTitle">Title:</label>
      <input type="text" name="title" class="form-control" id="InputTitle">
    </div>

    <div class="form-group">
      <label for="InputPhoto">Photo:</label>
      <input type="file" name="photo" class="form-control-file" id="InputPhoto">
    </div>

    <div class="form-group">
      <label for="summernote">Content:</label>
      <textarea class="form-control" name="content" id="summernote"></textarea>
 
    </div>


    <button type="submit" class="btn btn-primary">Create</button>
  </form>
@endsection

@section('script')
  <script type="text/javascript" name="content">
    $('#summernote').summernote({
      placeholder: 'Your Content Here!',
      tabsize: 2,
      height: 200
    });
  </script>
@endsection
