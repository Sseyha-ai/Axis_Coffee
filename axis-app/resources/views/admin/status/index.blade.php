@extends('layouts.app')

@section('title,status-list')
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
                            <h5 class="card-header">All Status List</h5>
                            {{-- Input search and button --}}

                            <form action="{{route('status-list')}}" method="GET">
                                <div class="form-group card-body">
                                    
                                    <div class="input-group mb-3">
                                        
                                            <input type="text" class="form-control" name="search" autofocus placeholder="search by name" >
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-primary">SEARCH</button>
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
                                                        <button  class="btn btn-space btn-primary"><a href="{{route('create-status')}}" style="color: #fff">Crete New</a></button>
                                                        
                                                    </p>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Status Name</th>
                                            <th scope="col"  class="text-center">Action</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($statuses))
                                          
                                        @foreach ($statuses as $status )
                                        <tr>
                                            <th scope="row" >{{$loop->iteration}}</th>
                                            <td >{{$status->id}}</td>
                                            <td>{{$status->name}}</td>
                                            <td class="text-center">
                                                <button class="btn btn-success" style="border-radius: 5px"> <a href="{{route('edit-status',$status->id)}}" style="color: rgb(31, 7, 244)"><i class="fas fa-pencil-alt px-2" ></i><span >|</span> EDIT</a></button>
                                               
                                           
                                            
                                            </td>
                                           
                                            <td>
                                                <button class="btn btn-danger" style="border-radius: 5px"><a href="{{route('delete-status',$status->id)}}"  style="color: rgb(249, 245, 245)";><i class="fas fa-trash-alt px-2" ></i><span>|</span> DELETE</a></button>
                                            </td>
                                        </tr>
                                            
                                        @endforeach
                                        @endif
                                        
                                       
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Add New</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
    </div>
</div>
@endsection
{{-- link popup form using cdn --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>