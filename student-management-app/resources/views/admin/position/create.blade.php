
@extends('../../layouts.app')
@section('title','create-position')

@section('content')

<div class="dashboard-wrapper">
    <div class="container-fluid  dashboard-content">

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header">Create Position 
                    <button class="btn btn-space btn-success"><a href="{{route('position-list')}}" style="color: #fff">Back</a> </button>
                    
                </h5>
                
                <div class="card-body">
                    <form id="form" data-parsley-validate="" novalidate="" method="POST" action="{{route('store-position')}}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-3 col-lg-2 col-form-label text-right">Name</label>
                            <div class="col-9 col-lg-10">
                                <input id="name" type="text" required=""  placeholder="Position name" name="name" class="form-control">
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
                            </div> --}}
                            
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection