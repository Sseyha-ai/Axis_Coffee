
{{-- @dd($rows->all(),$rows->position_f->name) --}}


@section('title','update-user')


<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('admin/assets/vendor/fonts/circular-std/style.css" rel="stylesheet')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->

<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <form class="splash-container" method="POST" action="{{ route('update-user',$rows->id) }}">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Update User Form</h3>
                <p>Please enter your user information.</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    {{-- <input class="form-control form-control-lg" type="text" name="nick" required="" placeholder="Username" autocomplete="off"> --}}

                    <input id="name" type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ $rows->name ?? old('name') }}" required autocomplete="name" autofocus required="" placeholder="Username">

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
                <div class="form-group">
                    {{-- <input class="form-control form-control-lg" type="email" name="email" required="" placeholder="E-mail" autocomplete="off"> --}}

                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ $rows->email ?? old('email') }}" required autocomplete="email" required="" placeholder="E-mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                {{-- <div class="form-group">
                    <input class="form-control form-control-lg" id="pass1" type="password" required="" placeholder="Password"> --

                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" required="" placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div class="form-group">
                     <input class="form-control form-control-lg" required="" placeholder="Confirm"> 
                    <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password" required="" placeholder="Confirm">
                </div> --}}
                <div class=" mb-3  ">
                    <label for="disabledSelect" class="form-label  ">Position</label>
                    <select id="position" class="form-select form-control"  name="position">
                      {{-- <option >Disabled select</option> --}}
                      <option value="">--Please Select--</option>
                      @foreach ($positions as $position)
                     
                       <option value="{{$position->id}}" {{$rows->position_id == $position->id ?'selected': ''}}>{{ucfirst($position->name)}}</option>
                      
                     
                    
                     
                      @endforeach
                     
                      
                      
                    </select>
                   
                  </div>
                <div class=" mb-3  ">
                    <label for="disabledSelect" class="form-label  ">Status</label>
                    <select id="status" class="form-select form-control"name="status"  >
                      {{-- <option >Disabled select</option> --}}
                      <option value="">--Please Select--</option>
                      @foreach ($statuss as $status )
                    <option value="{{$status->id}}"{{$rows->status_id ==  $status->id? 'selected':''}}>{{ucfirst($status->name)}}</option>
                      @endforeach
                    </select>
                    
                  </div>
               
                {{-- <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox"><span class="custom-control-label">By creating an account, you agree the <a href="#">terms and conditions</a></span>
                    </label>
                </div> --}}
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Update</button>
                </div>
               
                {{-- <div class="form-group row pt-0">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                        <button class="btn btn-block btn-social btn-facebook " type="button">Facebook</button>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <button class="btn  btn-block btn-social btn-twitter" type="button">Twitter</button>
                    </div>
                </div> --}}
                {{-- <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" ><a href="{{ route('user-list')}}" style="color: #fff">Back</a></button>
                </div> --}}
            </div>
            <div class="card-footer bg-white">
                <p>Back to  <a href="{{route('user-list')}}" class="text-secondary">All User</a></p>
            </div>
            
        </div>
    </form>
    
</body>

 
</html>




