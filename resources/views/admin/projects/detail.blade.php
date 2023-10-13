@extends('layouts.admin')
@section('title',$project->name)

{{-- @section('meta_description',$product->meta_description)
@section('meta_keyword',$product->meta_keyword) --}}

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{!!  substr($project->location,0,60) !!}...</h1>
          </div>
          <div class="col-sm-6">
            <a class="float-right" href="{{url('admin/products')}}">Back</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Product Delete Modal -->
    <div class="modal fade" id="deleteProduct" tabindex="-1" role="dialog" aria-labelledby="deleteProductTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">
              Delete Confirmation</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           Do you want to delete this product?
         
           <div class="modal-footer">
           <button type="button" class="btn btn-dark btn-sm w-25" data-dismiss="modal">No</button>
           <form action="{{url('admin/project/'.$project->id.'/delete')}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger btn-sm w-100">
           
              Yes</button>
           </form> 
           </div>
          </div>
          
        </div>
      </div>
    </div>
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
         
          <button type="button" class="float-right btn btn-danger  btn-sm ml-2 " data-toggle="modal" data-target="#deleteProduct">
            <i class="fas fa-trash"></i> Delete 
          </button>

          <a href="{{url('admin/project/'.$project->id.'/edit')}}" class=" float-right mb-2">
            <i class="fas fa-pen"></i> Edit
          </a>
          
          <div class="row">
            
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{{$project->location}}</h3>
              
              <div class="col-12">
                @if (!$project->projectImages->isEmpty())
                <img src="{{asset($project->projectImages[0]->image)}}" class="product-image" alt="Project Image">
                @else
                <p class="text-center">No Image</p>
                @endif
              </div>
              <div class="col-12 product-image-thumbs">
               @if (!$project->projectImages->isEmpty())
               @foreach ($project->projectImages as $key => $image)
               <div class="product-image-thumb "><img src="{{asset($image->image)}}" alt="Product Image"></div>
               @endforeach
               @else
               <p class="text-center">No Image</p>

               @endif
                
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{$project->location}}</h3>
              <p>{!!$project->description!!}</p>
            
          
             

              
              
             

            </div>
          </div>
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
@endsection
@push('custom-scripts')
<script>
    $(document).ready(function() {
      $('.product-image-thumb').on('click', function () {
        var $image_element = $(this).find('img')
        $('.product-image').prop('src', $image_element.attr('src'))
        $('.product-image-thumb.active').removeClass('active')
        $(this).addClass('active')
      })
    });

    (() => {
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

  })()
  </script>
@endpush








