@extends('adminlayout')


@section('pagetitle')
 Add Bank | Add Bank Account
@endsection

@section('dashbreadcumb')
<div class="row"> 
  <div class="col-sm-12"> 
    <ol class="breadcrumb">
  <li><a href="{{ '/admin/dashboard' }}">Home</a></li>
  <li><a href="#">Bank Account</a></li>
</ol>
   </div>
</div>

@stop

@section('innercontent')

@if (count($errors))

@foreach($errors->all() as $error)
{{ TTools::naError($error) }} 

@endforeach

@endif

@if (session()->has('createdbank'))

    {{ TTools::naSuccess(session('createdbank')) }} 

   @endif

<section class="all-trans">
<div class="panel panel-dbluebar">
<div class="panel-heading"> 
<h4 class="panel-title"> Contacts </h4>
</div>
<div class="table-responsive">
   <table class="table table-stripped table-bordered">
      <thead>
        <th> ID</th> <th>Fullname</th> <th> Phone</th> <th> Email</th>  <th>Message</th> 
      </thead>
<tbody>
   @if (isset($contacts))
   @if (count($contacts) >0)

   @foreach($contacts as $contact)
     <tr>
     <td> {{ $contact->id }} </td>  <td> {{ $contact->fullname }} </td> <td>{{ $contact->phone }}</td> <td>{{ $contact->email }}</td> <td> {{ $contact->message }}</td>  
   </tr>
   @endforeach

@else
<tr> <td colspan="7"> No Contact found  </td></tr>
   @endif

   @else
   <tr> <td colspan="7">No Contact Found  </td></tr>

   @endif
  


</tbody>

   </table>
</div>
</div>
</section>


@stop

