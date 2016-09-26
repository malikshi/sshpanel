@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add Reseller</div>
                <div class="panel-body">
                  <div class="col-md-6">
                    <h3>ADD RESELLER</h3>
                    @if(isset($success))
                      <div class="alert alert-success">
                        Reseller Added Successfully, Congratulations, Reseller details below :
                        <br />
                        Reseller Name : {{$success['resellername']}}<br />
                        Reseller Email : {{$success['reselleremail']}}<br />
                        Reseller Password : {{$success['resellerpassword']}}<br />
                        Reseller Balance : {{$success['resellerbalance']}}
                      </div>
                    @elseif($errors->has())
                      <div class="alert alert-danger">
                        An error detected, details below<br />
                        @foreach($errors->All() as $error)
                          <ul>
                            <li>{{$error}}</li>
                          </ul>
                        @endforeach
                      </div>
                    @elseif(isset($problem))
                      <div class="alert alert-danger">
                        Error, Please try again later
                      </div>
                    @endif
                    <form method="post" action="/add">
                      <label for="resellername">Reseller Name</label>
                      <input type="text" name="resellername" class="form-control" value="">
                      <label for="resellerpassword">Reseller Password</label>
                      <input type="password" name="resellerpassword" class="form-control" value="">
                      <label for="reselleremail">Reseller Email</label>
                      <input type="text" name="reselleremail" class="form-control" value="">
                      <label for="resellerbalance">Reseller Balance</label>
                      <input type="text" name="resellerbalance" class="form-control" value="">
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <br />
                      <button type="submit" class="btn btn-success">Add Reseller!</button>
                    </form>
                  </div>
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <h3>TIPS BEFORE ADDING RESELLER</h3>
                        <ul>
                          <li>reseller is never expired until you delete that's reseller</li>
                          <li>reseller balance is not like money currency, is only some amount value like 1000 or 20000 or 10000000 whatever you</li>
                          <li>reseller can adding SSH User based on their balance, if balance passed price of the SSH Account (he)(she) can make SSH User</li>
                          <li>Thanks for using SSHPANEL</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <hr />
                    <p style="text-align : center !important;"><b>Copyright &copy; <a href="https://github.com/rizalio/sshpanel">Rizal Fakhri</a> & &#x3C;/&#x3E; with <span class="glyphicon glyphicon-heart"></span> on Cengkareng.</b></p>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
