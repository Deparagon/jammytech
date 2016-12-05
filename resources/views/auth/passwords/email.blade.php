@extends('externallayout')

@section('pagetitle')
 Email | Tutorago
@endsection
<!-- Main Content -->
@section('externalcontent')
<section class="top-faq">
    

</section>


<section class="password-recovered" id="form1-3">
    <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <ul class="list-login-register">
                   <li>
                     <i class="fa fa-archive"> </i> 
                     <span> Tutorago provides opportunity for students to learn from the best</span>
                </li>

                <li>
                     <i class="fa fa-anchor"> </i> 
                     <span> Over 500 courses available and new courses added everyday</span>
                </li>



            </ul>



            </div>
            <div class="col-sm-6 login-bg">
              
                        <div class="mbr-header mbr-header--center mbr-header--std-padding">
                            <h2 class="mbr-header__text">PASSWORD RECOVERY</h2>
                        </div>

                                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-envelope"></i> Send Password Reset Link
                                </button>
                            </div>
                        </div>
                    </form>
                
            </div>
        </div>
    </div>
</section>

@stop
