@extends('../../layouts.app')

@section('title','users-list')
@section('content')
    

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">
        <!-- ============================================================== -->
        <!-- pageheader -->
        <!-- ============================================================== -->
        {{-- @if(Session::has('success'))
        <p class="alert alert-info">{{ Session::get('success') }}</p>
        @endif --}}
        {{-- Popup form --}}
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

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">All User</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Data User</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader -->
        <!-- ============================================================== -->
        <div class="row">
            <!-- ============================================================== -->
            <!-- basic table  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">All User</h5>
                    <form action="{{route('user-list')}}" method="GET">
                        <div class="form-group card-body">
                            
                            <div class="input-group mb-3">
                                
                                    <input type="text" class="form-control" name="search" autofocus placeholder="search by name" >
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">SEARCH</button>
                                    </div>
                            
                                
                            </div>

                        </div>
                    </form>

                    {{--  --}}

                    @if (isset($search)) 
                    <div class="row">
                        
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                               
                                <div class="card-body">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">User ID</th>
                                                <th scope="col">User Name</th>
                                                <th scope="col" colspan="2" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($user_searchs as $user_search)
                                           
                                               
                                            <tr>
                                                <th scope="row">{{$loop->iteration}}</th>
                                                <td>{{$user_search->id}}</td>
                                                <td>{{$user_search->name}}</td>
                                                <td class="text-center">
                                                     <a href="{{route('edit-user',$user_search->id)}}" style="color: rgb(31, 7, 244)"><i class="fas fa-pencil-alt px-2" ></i><span >|</span> EDIT</a>                                                 
                                                                                              
                                                </td>
                                               
                                                <td>
                                                    <a href="{{route('delete-user',$user_search->id)}}"  style="color: rgb(248, 6, 6)";><i class="fas fa-trash-alt px-2" ></i><span>|</span> DELETE</a>
                                                </td>
                                               
                                            </tr>
                                                
                                           
                                            

                                            @empty
                                                
                                            @endforelse
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                @endif



                    {{--  --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered first">
                                <thead>
                                    <tr>
                                        
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>ID</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th colspan='2' class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($users))
                                    @foreach ($users as $user )
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>IST000{{$user->id}}</td>
                                        <td>{{$user->position_f->name}}</td>
                                        <td>{{$user->status_f->name}}</td>
                                        <td class="text-center"><a href="{{route('edit-user',$user->id)}}"><i class="fas fa-pencil-alt" style="color: rgb(7, 154, 58)"></i></a>
                                           
                                            
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('delete-user',$user->id)}}"><i class="fas fa-trash-alt" style="color: rgb(244, 10, 10)"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                   
                                   @endif
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Emial</th>
                                        <th>ID</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th colspan='2' class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end basic table  -->
            <!-- ============================================================== -->
        </div>
        
        
    <!-- ============================================================== -->
    
</div>

@endsection
       
  
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    