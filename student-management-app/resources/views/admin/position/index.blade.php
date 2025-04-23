@extends('../../layouts.app')

@section('title','position-list')

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
        <div class="container mt-3">
            


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
                            <h5 class="card-header">All Position List</h5>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="col-sm-2 pl-0">
                                                    <p class="text-right">
                                                        <button  class="btn btn-space btn-primary btn-outline-secondary"><a href="{{route('create-position')}}" style="color: #953af1">Crete New</a></button>
                                                        
                                                    </p>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Position</th>
                                            <th scope="col"  class="text-center">Action</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($positions))
                                          
                                        @foreach ($positions as $position )
                                        <tr>
                                            <th scope="row" >{{$loop->iteration}}</th>
                                            <td >{{$position->id}}</td>
                                            <td>{{$position->name}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-success btn-outline-success"> <a href="{{route('edit-position',$position->id)}}" style="color: rgb(31, 7, 244);"><i class="fas fa-pencil-alt px-2" ></i><span >|</span> EDIT</a></button>
                                               
                                           
                                            
                                            </td>
                                           
                                            <td>
                                                <button class="btn btn-danger btn-outline-danger btn-rounded "><a href="{{route('delete-position',$position->id)}}"  style="color: rgb(142, 38, 247)";><i class="fas fa-trash-alt px-1" ></i><span>|</span> DELETE</a></button>
                                            </td>
                                        </tr>
                                            
                                        @endforeach
                                        @endif
                                        
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td>@if ($positions->hasPages())
                                                <ul class="pagination">
                                                    {{-- Previous Page Link --}}
                                                    @if ($positions->onFirstPage())
                                                        <li class="disabled"><span>&laquo;</span></li>
                                                    @else
                                                        <li><a href="{{ $positions->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                                                    @endif
            
                                                    {{-- Pagination Elements --}}
                                                    @foreach ($positions->getUrlRange(1,$positions->lastPage()) as $page => $url)
                                                        @if ($page == $positions->currentPage())
                                                            <li class="active"><span>{{ $page }}</span></li>
                                                        @else
                                                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                                                        @endif
                                                    @endforeach
            
                                                    {{-- Next Page Link --}}
                                                    @if ($positions->hasMorePages())
                                                        <li><a href="{{ $positions->nextPageUrl() }}" rel="next">&raquo;</a></li>
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
{{-- popup using cdn --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
{{-- <style>
    ul.pagination {
        list-style: none;
        padding: 0;
        display: flex;
    }
    ul.pagination li {
        margin: 0 5px;
    }
    ul.pagination li a,
    ul.pagination li span {
        padding: 6px 12px;
        text-decoration: none;
        border: 1px solid #ddd;
        border-radius: 4px;
        color: #007bff;
    }
    ul.pagination li.active span {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }
    ul.pagination li.disabled span {
        color: #ccc;
        pointer-events: none;
    }
    </style> --}}
    