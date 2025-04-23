@extends('layouts.app')

@section('title','update-product')


@section('content')
    
<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Update Product 
                    <button class="btn btn-space btn-success"><a href="{{route('product-list')}}" style="color: #fff">Back</a> </button>
                    
                </h5>
                
                <div class="card-body">
                    <form id="form" data-parsley-validate="" novalidate="" method="POST" action="{{route('update-product',$rows->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-3 col-lg-2 col-form-label text-right"></label>
                            <div class="col-9 col-lg-10">
                                        <div>
                                            <label for="name" class=" col-form-label text-right">Name</label>
                                            <input id="name" type="text" required=""  placeholder="Product Name" name="name" class="form-control"  autofocus value="{{$rows->name}}">
                                        </div>
                                        
                                        <div>
                                            <label for="name" class="  col-form-label text-right">Category</label>
                                            
                                            <select name="category_id" id="category_id" class="form-select form-control form-select-lg  px-2  w-15">
                                                <option value="">--- Select Category ---</option>
                                                {{-- @dd(old('category_id',$product->category_id)) --}}
                                                @foreach ($categories as $category)
                                              
                                                    <option value="{{$category->id}}" {{ $rows->category_id == $category->id ? 'selected':'' }}>
                                                        {{ucfirst($category->name)}}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <label for="price" class=" col-form-label text-right">Price</label>
                                            <input id="price" type="text" required=""  placeholder="Price" name="price" class="form-control"  value="{{$rows->price}}" >
                                        </div>
                                        <div>
                                            <label for="descr" class=" col-form-label text-right">Description</label>
                                            <input id="description" type="text" required=""  placeholder="description" name="description" class="form-control"  value="{{$rows->description}}" >
                                        </div>
                            </div>
                            

                            <div class="form-group form-float">
                                <label  class="form-label " style="padding-left: 205 ;padding-top: 10px">Image</label>
                                <div class="input-group">
                                    @php
                                         if($rows->photo && $rows){
                                                        $image =  asset('product_image/' . $rows->photo); 
                                                    }else{
                                                        $image =asset('blank_image/No_Image.jpg');
                                                    }
            
                                                    $logo = asset($image ?? 'blank_image/No_Image.jpg');
                                        
                                    @endphp
                                    <div>
                                        <label class="form-label"></label>
                                    </div>
                                    <div style="width: 100px; height: 100px; position: relative;">
                                        <img class="profile" id="profile" name="photo" src="{{ $logo }}"  style="position:absolute; width:200px; height:200px;border-radius: 5px;left:200; padding: 10px; filter: drop-shadow(5px 10px 0.5rem gray)">
                                        <input type="file" class="form-control" name="profile" onchange="reload_image_by_id('profile')" style="position:absolute; width:200px; height:200px; top:0; left:200; opacity:0; ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 pl-0">
                            
                                <p class="text-right">
                                    
                                    <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                </p>
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                            <label for="inputPassword2" class="col-3 col-lg-2 col-form-label text-right">Password</label>
                            <div class="col-9 col-lg-10">
                                <input id="inputPassword2" type="password" required="" placeholder="Password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputWebSite" class="col-3 col-lg-2 col-form-label text-right">Web Site</label>
                            <div class="col-9 col-lg-10">
                                <input id="inputWebSite" type="url" required="" data-parsley-type="url" placeholder="URL" class="form-control">
                            </div>
                        </div>
                        <div class="row pt-2 pt-sm-5 mt-1">
                            <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                <label class="be-checkbox custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Remember me</span>
                                </label>
                            </div> 
                            
                        </div>--}}
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script type="text/javascript">
    function reload_image_by_id(img_id) {
        var selectedFile = event.target.files[0];
        var reader = new FileReader();
        var imgtag = document.getElementById(img_id);
        imgtag.title = selectedFile.name;
        reader.onload = function(event) {
            imgtag.src = event.target.result;
        };
        reader.readAsDataURL(selectedFile);
    }
</script>