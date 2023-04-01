@extends('layouts.admin')
@section('title',$product->meta_title)
@section('content')
<div class="content-wrapper">
   <section class="content">
    <div class="card">
      <div class="card-header">
          <h6 class="d-inline">Edit {{$product->name}}</h6>
          <a href="{{url('admin/products')}}" class="btn btn-outline-primary btn-sm float-right">Back</a>
      </div>
      <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-warning">
              @foreach ($errors->all() as $error)
                  <div>{{$error}}</div>
              @endforeach
            </div>
        @endif


       <form action="{{url('admin/product/update/'.$product->id)}}" enctype="multipart/form-data" method="POST">
         @csrf
         @method('PUT')
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="seo-tags-tab" data-toggle="tab" data-target="#seo-tags" type="button" role="tab" aria-controls="seo-tags" aria-selected="false">SEO Tags</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="details-tab" data-toggle="tab" data-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">Details</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="product-image-tab" data-toggle="tab" data-target="#product-image" type="button" role="tab" aria-controls="product-image" aria-selected="false">Product Image</button>
          </li>
      </ul>
        {{-- tab contents --}}
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane border p-3 fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

              {{-- category --}}
              <div class="mb-3">
                  <label>
                    Select Category
                    <h2 class="text-danger d-inline">*</h2>
                  </label>
                <select 
                  name="category_id"
                  class="form-control my-2 @error('category_id') is-invalid @enderror"
                  value="{{old('category_id')}}"
                  required>
                 
                  @foreach ($categories as $category)
                      <option value="{{$category->id}}" {{$product->category_id == $category->id ? 'selected':'' }}>{{$category->name}}
                      </option>
                  @endforeach
                 </select> 
              </div>
              @error('category_id')
              <div class="alert alert-danger">
                {{ $message }}
              </div>
             @enderror
               {{-- name --}}
               <div class="mb-3">
                <label>Name 
                   <h2 class="text-danger d-inline">*</h2>
                </label>
                <input 
                type="text"
                name="name"
                value="{{$product->name}}"
                class="form-control  @error('name') is-invalid @enderror"
              
                required>
               </div>
               @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
                 @enderror
               {{-- slug --}}
               <div class="mb-3">
                <label>Slug</label>
                <input 
                type="text"
                name="slug"

                value="{{$product->slug}}"
                class="form-control  @error('slug') is-invalid @enderror"
                >
               </div>
                 @error('slug')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                 @enderror
                {{-- brand --}}
              <div class="mb-3">
                  <label>
                    Select Brand
                    <h2 class="text-danger d-inline">*</h2>
                  </label>
                <select 
                  name="brand"
                
                  class="form-control my-2 @error('brand_id')is-invalid @enderror"
                  required>
                  
                  @foreach ($brands as $brand)
                      <option value="{{$brand->id}}" {{$product->brand == $brand->id ? 'selected':'' }}>{{$brand->name}}</option>
                  @endforeach
                 </select>
              </div>
                 @error('brand_id')
                 <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                 @enderror
            {{-- small description --}}
            <div class="mb-3">
              <label>
                Small Description (500 Words)
              </label>
              <textarea 
              id="summernote"
              name="small_description"
              rows="4"
             
              class="form-control my-2 @error('small_description') is-invalid @enderror"
              >
              {{ $product->small_description }}
            </textarea>
            </div>
            @error('small_description')
            <div class="alert alert-danger">
              {{ $message }}
            </div>
           @enderror
            {{-- description --}}
            <div class="mb-3">
              <label>
                Description
                <h2 class="text-danger d-inline">*</h2>
              </label>
              <textarea 
              name="description"
              
              rows="4"
              class="form-control my-2 @error('description') is-invalid @enderror"
              required>
              {{ $product->description }}
            </textarea>
            </div>
          </div>
          @error('description')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
         @enderror
         {{-- seo section --}}
          <div class="tab-pane border p-3 fade" id="seo-tags" role="tabpanel" aria-labelledby="seo-tags-tab">
               {{-- meta title --}}
               <div class="mb-3">
                  <label >Meta Title</label>
                  <input 
                  type="text"
                  value="{{$product->meta_title}}"
                  name="meta_title"
                  class="form-control @error('meta_title') is-invalid @enderror"
                  >
                 </div>

                 @error('meta_title')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror
                 {{-- meta keywords --}}
                 <div class="mb-3">
                  <label>
                    Meta Keyword
                  </label>

                  <fieldset>
                    <input name='meta_keyword' placeholder='Keyword' value='{{$product->meta_keyword}}'>
                </fieldset>
                 </div>
                  {{-- <textarea 
                  name="meta_keyword"
                  
                  rows="4"
                  class="form-control my-2  @error('meta_keyword') is-invalid @enderror"
                  >
                  {{$product->meta_keyword}}
                </textarea>
                </div>
                @error('meta_keyword')
                    <div class="alert alert-danger">
                      {{ $message }}
                    </div>
                  @enderror --}}
                 {{-- meta description --}}
                 <div class="mb-3">
                  <label>
                    Meta Description
                  </label>
                  <textarea 
                  name="meta_description"
                  
                  rows="4"
                  class="form-control my-2 @error('meta_description') is-invalid @enderror"
                  >
                  {{$product->meta_description}}
                </textarea>
                </div>

          </div>
          @error('meta_description')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
         @enderror
            {{-- details section --}}
          <div class="tab-pane border p-3 fade" id="details" role="tabpanel" aria-labelledby="details-tab">

              <div class="row">
                  {{-- original price --}}
                  <div class="col-md-4">
                      <label>
                        Original Price
                        <h2 class="text-danger d-inline">*</h2>
                      </label>
                      <input 
                      type="number" 
                      value="{{$product->original_price}}"
                      name="original_price"
                      class="form-control @error('original_price') is-invalid @enderror"
                      required
                      >
                  </div>
                  @error('original_price')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                 @enderror
                  {{-- selling price --}}
                  <div class="col-md-4">
                      <label>
                        Selling Price
                        <h2 class="text-danger d-inline">*</h2>
                      </label>
                      <input 
                      type="number" 
                      value="{{$product->selling_price}}"
                      name="selling_price"
                      class="form-control @error('selling_price') is-invalid @enderror"
                      required
                      >
                  </div>
                  @error('selling_price')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                 @enderror
        
                 
                  {{-- quantity --}}
                  <div class="col-md-4">
                      <label>
                        Quantity
                        <h2 class="text-danger d-inline">*</h2>
                      </label>
                      <input 
                      type="number" 
                      name="quantity"
                      value="{{$product->quantity}}"
                      class="form-control @error('quantity') is-invalid @enderror"
                      required
                      >
                  </div>
                  @error('quantity')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                 @enderror
                 {{-- sizes --}}
                 <div class="col-md-12">
                  <label>
                   Sizes
                  </label>
                   <fieldset>
                    <input name='sizes' placeholder='Sizes' value="{{$product->sizes}}">
                  </fieldset>
                  @error('sizes')
                      <div class="alert alert-danger">
                        {{ $message }}
                      </div>
                    @enderror
                 </div>
                  {{-- trending --}}
                  <div class="col-md-3 my-2">
                      <label>Trending</label>
                      <input type="checkbox" 
                      {{$product->trending == '1' ? 'checked' : ''}} 
                      name="trending" 
                       
                      class="@error('trending') is-invalid @enderror"
                      style="width:20px; height:20px">
                  </div>
                  @error('trending')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                 @enderror
                  {{-- status --}}
                  <div class="col-md-3 my-2">

                      <label >Visibility</label>
                      <input type="checkbox" name="status"
                      {{$product->status == '1' ? 'checked' : ''}}
                      class="@error('status') is-invalid @enderror"
                      style="width:20px; height:20px">
                  </div>
                  @error('status')
                  <div class="alert alert-danger">
                    {{ $message }}
                  </div>
                 @enderror
              </div>
          </div>

          {{--  product-image section --}}
          <div class="tab-pane border p-3 fade" id="product-image" role="tabpanel" aria-labelledby="product-image-tab">
            <div class="my-3">
              <label> 
                Upload Product Images
                <h2 class="text-danger d-inline">*</h2>
              </label>
              <input 
              type="file"
              onchange="loadFiles(event)"
              name="image[]"
              
              multiple 
              class="form-control @error('image') is-invalid @enderror">
            </div>
            @error('image')
          <div class="alert alert-danger">
            {{ $message }}
          </div>
         @enderror
            {{-- showing image --}}
            <div class="my-3">
              @if ($product->productImages)
              <div class="row">

              
              @foreach ($product->productImages as $image)
                 <div class="col-2">
                  <img src="{{asset($image->image)}}" 
                   style="width: 80px; height:80px"
                  alt="product-image">
                  {{-- <button class="delete-product" data-id="{{ $image->id }}">Delete</button> --}}


                  
                  <a  href="{{route('deleteproduct.image',['id' => $image->id])}}"
                  class="btn btn-outline-danger btn-sm"
                  >Remove</a>
                  


                 </div>
              @endforeach
          </div>
                  @else
                  <p>No Image</p>
              @endif
             
            </div>

            {{-- preview image --}}
            <div class="my-3" id="previews">
              
            </div>
          </div>
      </div>
  
      <div>
        <button type="submit" class="btn btn-success float-right w-50">Update</button>
      </div>
      </form>
      
        </div>
  </div>
   </section>
</div>    



@endsection

@push('custom-scripts')
<script>
  
  $(document).ready(function() {
    // summernote
     $('#summernote').summernote();

      $('.delete-product').click(function() {
          var id = $(this).data('id');
          alert(id)
          if (confirm('Are you sure you want to delete this product?')) {
              $.ajax({
                  url: '/products/' + id,
                  type: 'DELETE',
                  data: {
                      '_token': $('meta[name="csrf-token"]').attr('content'),
                  },
                  success: function(data) {
                      alert(data.success);
                      location.reload();
                  }
              });
          }
      });
  });
  //tagify 
  (() => {
    // keyword
  var inputElm = document.querySelector('input[name=meta_keyword]')
  
  const mockAjax = (timeout => (RES, duration) => {
    clearTimeout(timeout); // abort last request
    return new Promise((resolve, reject) => timeout = setTimeout(resolve, duration || 0, RES))
  })()
  
  let tagify = new Tagify(inputElm)
  
  // tagify.on('edit:start', ({detail}) => tagify.setTagTextNode(detail.tag, detail.data.value))
  tagify.on('edit:updated', ({detail: {tagify}}) => {
      tagify.DOM.input.focus()
  });
  
  inputElm && inputElm.addEventListener('change', () => console.log("CHANGED!")  )
  //sizes
  var sizes = document.querySelector('input[name=sizes]')
  

  
  let tagifySizes = new Tagify(sizes)
  
  // tagify.on('edit:start', ({detail}) => tagify.setTagTextNode(detail.tag, detail.data.value))
  tagifySizes.on('edit:updated', ({detail: {tagifySizes}}) => {
    tagifySizes.DOM.input.focus()
  });
  
  sizes && sizes.addEventListener('change', () => console.log("CHANGED!")  )
  })()
</script>
@endpush

