@extends('layouts.app')

@section('title','product')


@section('content')

<div class="dashboard-wrapper">

    <div class="container-fluid  dashboard-content">
        {{-- @if(session('success'))
            <script>
             alert("{{ session('success') }}");
            </script>
        @endif --}}
        {{-- @if(Session::has('success'))
        <p class="alert alert-info"> Update successfull! </p>
        @endif --}}


        {{-- Popup form when create, update,delete --}}
        <div class="container mt-3">
            
            {{-- dispay error popup form if name in category is already --}}
            @if(session('error'))
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: '{{ session('error') }}',
                            confirmButtonText: 'OK'
                        });
                    });
                </script>
            @endif

            {{-- form popup  when  create  update delete success --}}
            @if(session('success'))
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: '{{ session('success') }}',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    // Optional form in popup
                    html: `
                        <form id="followup-form" class="mt-3">
                            @csrf
                            <div class="form-group">
                                 <label for="feedback">Any feedback?</label>
                                 <textarea class="form-control" id="feedback" rows="3"></textarea>
                            </div>
                        </form>
                    `,
                    showCancelButton: true,
                    cancelButtonText: 'Close',
                    preConfirm: () => {
                        const feedback = document.getElementById('feedback').value;
                        // You can submit this feedback via AJAX if needed
                        return { feedback: feedback }
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Handle form submission
                        console.log('Feedback:', result.value.feedback);
                    }
                });
            </script>
            @endif


        
            <!-- Your table or content here -->
        </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Product</h5>
                            {{-- Input search and button --}}

                            <form action="{{route('filter-product')}}" method="GET">
                                <div class="form-group card-body">
                                    
                                    <div class="input-group mb-3">
                                        
                                        <select name="category_id" onchange="this.form.submit()" id="" class="form-select form-control form-select-lg  px-2 mr-2 w-15" aria-label="Default select example">
                                            <option value="">All Category</option>

                                            @foreach ($categories as $category )
                                                <option value="{{$category->id}}" {{request('category_id')==$category->id ? 'selected': ''}}>
                                                        {{$category->name}}
                                                </option>
                                            @endforeach

                                            {{-- <option value="">Hot</option>
                                            <option value="">Drink</option>
                                            <option value="">Tea</option> --}}
                                    </select>
                                            <input type="text" class="form-control" name="search" autofocus placeholder="search by name" >

                                        
                                                

                                            
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary ml-2">SEARCH</button>
                                            </div>
                                    
                                        
                                    </div>

                                </div>
                            </form>

                            {{-- end input search --}}
                        </div>  
                    </div>  
          {{-- table search by name --}}
            @if (isset($search)) 
                    <div class="row">
                        
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                               
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">ID</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($status_searchs as $status_search)
                                           
                                               
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$status_search->id}}</td>
                                                <td>{{$status_search->name}}</td>
                                                <td class="text-center">
                                                     <a href="{{route('edit-status',$status_search->id)}}" style="color: rgb(31, 7, 244)"><i class="fas fa-pencil-alt px-2" ></i><span >|</span> EDIT</a>                                                 
                                                                                              
                                                </td>
                                               
                                                <td>
                                                    <a href="{{route('delete-status',$status_search->id)}}"  style="color: rgb(248, 6, 6)";><i class="fas fa-trash-alt px-2" ></i><span>|</span> DELETE</a>
                                                </td>
                                               
                                            </tr>
                                                
                                           
                                            

                                            @empty
                                                <tr>
                                                    <td> Not Found </td>
                                                </tr>
                                            @endforelse
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                @endif

            <!--- All User list  ---->                        
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="col-sm-2 pl-0">
                                                    <p class="text-right">
                                                        <button  class="btn btn-space btn-primary"><a href="{{route('create-product')}}" style="color: #fff">Crete New</a></button>
                                                        
                                                    </p>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr class="bg-info ">
                                            <th scope="col" >NO</th>
                                            <th>PHOTO</th>
                                            <th scope="col">PRODUCT TYPE</th>
                                            <th scope="col">PRODUCT NAME</th>
                                            <th scope="col">PRICE</th>
                                            <th scope="col">DESCRIPTION</th>
                                            <th scope="col"  class="text-center" colspan="2">ACTION</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody class="text-primary text-uppercase">
                                        @if(isset($products))
                                          {{-- @dd($products) --}}
                                        @foreach ($products as $product )
                                        <tr>
                                            <th scope="row" class="text-danger" >{{$loop->iteration}}</th>
                                            <td>
                                                @if(!empty($product->photo))
                                                <img  style="border-radius:10px ; filter: drop-shadow(10px 5px 0.75rem rgb(123, 121, 121));" src="{{ asset('product_image/' . $product->photo) }}" alt="Article Image" width="50" height="50" style="border-radius: 10px; object-fit: cover;">
                                            @else
                                                <span>No image</span>
                                            @endif

                                            </td>
                                            <td>{{$product->category->name}}</td>
                                            <td>{{$product->name}}</td>
                                            <td><span>$</span>{{$product->price}}</td>

                                            <td >{{$product->description}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-success" style="border-radius: 5px"> <a href="{{route('edit-product',$product->id)}}" style="color: rgb(31, 7, 244)"><i class="fas fa-pencil-alt px-2" ></i><span >|</span> EDIT</a></button>
                                               
                                           
                                            
                                            </td>
                                           
                                            <td>
                                                <button class="btn btn-danger" style="border-radius: 5px"><a href=""  style="color: rgb(249, 245, 245)";><i class="fas fa-trash-alt px-2" ></i><span>|</span> DELETE</a></button>
                                            </td>
                                        </tr>
                                            
                                        @endforeach
                                        @endif
                                        
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>@if ($products->hasPages())
                                                {{-- use style from public/admin/assetss/css/style.css--}}
                                                <ul class="pagination">
                                                    {{-- Previous Page Link --}}
                                                    @if ($products->onFirstPage())
                                                        <li class="disabled"><span>&laquo;</span></li>
                                                    @else
                                                        <li><a href="{{ $products->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                                                    @endif
            
                                                    {{-- Pagination Elements --}}
                                                    @foreach ($products->getUrlRange(1,$products->lastPage()) as $page => $url)
                                                        @if ($page == $products->currentPage())
                                                            <li class="active"><span>{{ $page }}</span></li>
                                                        @else
                                                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                                                        @endif
                                                    @endforeach
            
                                                    {{-- Next Page Link --}}
                                                    @if ($products->hasMorePages())
                                                        <li><a href="{{ $products->nextPageUrl() }}" rel="next">&raquo;</a></li>
                                                    @else
                                                        <li class="disabled"><span>&raquo;</span></li>
                                                    @endif
                                                </ul>
                                                @endif  </td>  
                                        </tr>
                                    </tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
    </div>
</div>
    
@endsection
{{-- link cdn use popup form --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>