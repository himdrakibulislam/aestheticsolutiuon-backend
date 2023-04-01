@extends('layouts.admin')
@section('title',$product->name)

{{-- @section('meta_description',$product->meta_description)
@section('meta_keyword',$product->meta_keyword) --}}

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{!!  substr($product->name,0,10) !!}...</h1>
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
           <form action="{{url('admin/product/'.$product->id.'/delete')}}" method="POST">
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

          <a href="{{url('admin/product/'.$product->id.'/edit')}}" class=" float-right mb-2">
            <i class="fas fa-pen"></i> Edit
          </a>
          @if ($product->status === 1)
          <div class="alert alert-danger alert-dismissible fade show w-50" role="alert">
            <strong>Product is hidden.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
              
          @endif
          <div class="row">
            
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{{$product->name}}</h3>
              
              <div class="col-12">
                @if (!$product->productImages->isEmpty())
                <img src="{{asset($product->productImages[0]->image)}}" class="product-image" alt="Product Image">
                @else
                <p class="text-center">No Image</p>
                @endif
              </div>
              <div class="col-12 product-image-thumbs">
               @if (!$product->productImages->isEmpty())
               @foreach ($product->productImages as $key => $image)
               <div class="product-image-thumb "><img src="{{asset($image->image)}}" alt="Product Image"></div>
               @endforeach
               @else
               <p class="text-center">No Image</p>

               @endif
                
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{{$product->name}}</h3>
              <p>{!!$product->small_description!!}</p>
              <h4><b>Quantity : </b>{{$product->quantity}} </h4>
              <hr>
              <h4>Available Colors</h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center active">
                  <input type="radio" name="color_option" id="color_option_a1" autocomplete="off" checked>
                  Green
                  <br>
                  <i class="fas fa-circle fa-2x text-green"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a2" autocomplete="off">
                  Blue
                  <br>
                  <i class="fas fa-circle fa-2x text-blue"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a3" autocomplete="off">
                  Purple
                  <br>
                  <i class="fas fa-circle fa-2x text-purple"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a4" autocomplete="off">
                  Red
                  <br>
                  <i class="fas fa-circle fa-2x text-red"></i>
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_a5" autocomplete="off">
                  Orange
                  <br>
                  <i class="fas fa-circle fa-2x text-orange"></i>
                </label>
              </div>

              <h4 class="mt-3">Size <small>Please select one</small></h4>
              <div class="btn-group btn-group-toggle" data-toggle="buttons">
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b1" autocomplete="off">
                  <span class="text-xl">S</span>
                  <br>
                  Small
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b2" autocomplete="off">
                  <span class="text-xl">M</span>
                  <br>
                  Medium
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b3" autocomplete="off">
                  <span class="text-xl">L</span>
                  <br>
                  Large
                </label>
                <label class="btn btn-default text-center">
                  <input type="radio" name="color_option" id="color_option_b4" autocomplete="off">
                  <span class="text-xl">XL</span>
                  <br>
                  Xtra-Large
                </label>
              </div>

              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                   Selling Price 
                   BDT {{$product->selling_price}}
                </h2>
                
                <s>Original Price BDT {{$product->original_price}}</s>
              </div>

              
             

            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>


                <a class="nav-item nav-link" id="product-seo-tab" data-toggle="tab" href="#product-seoinfo" role="tab" aria-controls="product-seoinfo" aria-selected="false">SEO INFO</a>

                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>

                
              
               
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{{$product->description}}</div>

              <div class="tab-pane fade" id="product-seoinfo" role="tabpanel" aria-labelledby="product-seoinfo-tab">  
              <div class="my-2">
              <small>Meta Title</small>  
              <p>{{$product->meta_title}}</p>
              </div>  
              <div class="my-2">
              <small>Meta Description</small>  
              <p>{{$product->meta_description}}</p>
              </div>  
              <div class="my-2">
              <small>Meta Keyword</small> 
              <fieldset>
                <input name='meta_keyword' placeholder='Keyword' value='{{$product->meta_keyword}}'>
            </fieldset> 
             
              </div>  

              </div>

              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> No Comment </div>

              <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> No rating</div>
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








