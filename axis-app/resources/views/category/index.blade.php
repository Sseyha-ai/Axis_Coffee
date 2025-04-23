@extends('layouts.app')

@section('title','category-list')

@section('content')
<div class="dashboard-wrapper">

    <div class="container-fluid  dashboard-content">
        
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
                            <h5 class="card-header">All Category List</h5>
                            
                            {{-- Input search and button --}}

                            <form action="{{route('category-list')}}" method="GET">
                                <div class="form-group card-body">
                                    
                                    <div class="input-group mb-3">
                                        
                                            <input type="text" class="form-control" name="search" autofocus placeholder="Search by name" >
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary btn-outline ml-2">SEARCH</button>
                                            </div>
                                    
                                        
                                    </div>

                                </div>
                            </form>

                            {{-- end input search --}}



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
                                                                @forelse ($category_searchs as $category_search)
                                                            
                                                                
                                                                <tr>
                                                                    <th scope="row">{{$loop->iteration}}</th>
                                                                    <td>{{$category_search->id}}</td>
                                                                    <td>{{$category_search->name}}</td>
                                                                    <td class="text-center">
                                                                        <a href="{{route('edit-category',$category_search->id)}}" style="color: rgb(31, 7, 244)"><i class="fas fa-pencil-alt px-2" ></i><span >|</span> EDIT</a>                                                 
                                                                                                                
                                                                    </td>
                                                                
                                                                    <td>
                                                                        <a href="{{route('delete-category',$category_search->id)}}"  style="color: rgb(248, 6, 6)";><i class="fas fa-trash-alt px-2" ></i><span>|</span> DELETE</a>
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


                            {{-- fetch all data in category list --}}
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="col-sm-2 pl-0">
                                                    <p class="text-right">
                                                        <button  class="btn btn-space btn-primary btn-outline-secondary"><a href="{{route('create-category')}}" style="color: #953af1">Crete New</a></button>
                                                        
                                                    </p>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr class="bg-info text-light">
                                            <th scope="col" class="text-light">NO</th>
                                            <th scope="col" class="text-light">IMAGE</th>

                                            <th scope="col" class="text-light">ID</th>
                                            <th scope="col" class="text-light">CATEGORY</th>
                                            <th scope="col"  class="text-center text-light text-center" colspan="2">ACTION</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($categories))
                                          
                                        @foreach ($categories as $category )
                                        <tr>
                                            <th scope="row" >{{$loop->iteration}}</th>
                                            <td>
                                                @if(!empty($category->photo))
                                                    <img  style="border-radius:10px ; filter: drop-shadow(10px 5px 0.75rem rgb(123, 121, 121));" src="{{ asset('category_image/' . $category->photo) }}" alt="Article Image" width="50" height="50" style="border-radius: 10px; object-fit: cover;">
                                                @else
                                                    <span>No image</span>
                                                @endif
                                            </td>
                                            <td >{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-success btn-outline-success"> <a href="{{route('edit-category',$category->id)}}" style="color: rgb(31, 7, 244);"><i class="fas fa-pencil-alt px-2" ></i><span >|</span> EDIT</a></button>
                                               
                                           
                                            
                                            </td>
                                           
                                            <td>
                                                <button class="btn btn-danger btn-outline-danger  "><a href="{{route('delete-category',$category->id)}}"  style="color: rgb(142, 38, 247)";><i class="fas fa-trash-alt px-1" ></i><span>|</span> DELETE</a></button>
                                            </td>
                                        </tr>
                                            
                                        @endforeach
                                        @endif
                                        
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>@if ($categories->hasPages())
                                                {{-- use style from public/admin/assetss/css/style.css--}}
                                                <ul class="pagination">
                                                    {{-- Previous Page Link --}}
                                                    @if ($categories->onFirstPage())
                                                        <li class="disabled"><span>&laquo;</span></li>
                                                    @else
                                                        <li><a href="{{ $categories->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                                                    @endif
            
                                                    {{-- Pagination Elements --}}
                                                    @foreach ($categories->getUrlRange(1,$categories->lastPage()) as $page => $url)
                                                        @if ($page == $categories->currentPage())
                                                            <li class="active"><span>{{ $page }}</span></li>
                                                        @else
                                                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                                                        @endif
                                                    @endforeach
            
                                                    {{-- Next Page Link --}}
                                                    @if ($categories->hasMorePages())
                                                        <li><a href="{{ $categories->nextPageUrl() }}" rel="next">&raquo;</a></li>
                                                    @else
                                                        <li class="disabled"><span>&raquo;</span></li>
                                                    @endif
                                                </ul>
                                                @endif  </td>  
                                        </tr>
                                    </tfoot>
                                </table>
                               

                                {{-- <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center">
                                      <li class="page-item ">
                                        <a class="page-link" href="{{ $positions->previousPageUrl() }}" rel="prev" tabindex="-1" >Previous</a>
                                      </li>
                                      <li class="page-item"><a class="page-link" href="#">1</a></li>
                                      <li class="page-item"><a class="page-link" href="#">2</a></li>
                                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                                      <li class="page-item">
                                        <a class="page-link" href="{{$positions->nextPageUrl()}}" rel="next">Next</a>
                                      </li>
                                    </ul>
                                </nav> --}}

                                <!-- Custom Pagination -->
                                                                                                                         

                            </div>
                        </div>
                    </div>
    </div>
</div>


@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
