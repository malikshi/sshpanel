@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Create SSH Account</div>
                <div class="panel-body">
                  <div class="col-md-6">
                        <h3>CREATE SSH ACCOUNT</h3>
                        @if(isset($userexist))
                            <div class="alert alert-danger">
                              SSH User with username <code><b>{{$userexist}}</b></code> has been registered, Use another username
                            </div>
                        @elseif(isset($valid))
                            <div class="alert alert-success">
                              SSH Account created successfully, Account detail below this <br />
                              SSH USERNAME : {{$valid['sshuser']}}
                              <br />
                              SSH PASSWORD : {{$valid['sshpass']}}
                              <br />
                              SSH CREATE DATE : {{$valid['sshcreated']}}
                              <br />
                              SSH EXPIRE DATE : {{$valid['sshexpired']}}
                              <br />
                              ON SERVER : {{$valid['onserver']}}
                              <br />
                              SERVER IP : {{$valid['serverip']}}

                            </div>
                        @elseif(isset($error))
                            <div class="alert alert-danger">
                              An error occured, Please try again later
                            </div>
                        @elseif(isset($serverabort))
                            <div class="alert alert-danger">
                              Server error detected, Please try again later
                            </div>
                        @elseif(isset($balanceerror))
                            <div class="alert alert-danger">
                              Sorry, Your balance not enough to buy an SSH Account
                            </div>
                        @endif
                        <form method="post" action="/buy/{{$key}}">
                          <label for="sshname">SSH Username</label>
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <input type="hidden" name="_key" value="{{@$servers[0]->key}}">
                          <input type="text" name="sshname" class="form-control" value="">
                          <label for="sshpass">SSH Password</label>
                          <input type="password" name="sshpass" class="form-control" value="">
                          <label for="expired">SSH Expired Date</label>
                          <div class="input-group">
                            <input type="text" name="sshexpired" class="form-control" id="date" value="">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </div>
                          </div><br />
                          <button type="submit" name="btn-create-ssh" class="btn btn-success">Create!</button>
                          <br />
                        </form>
                    </div>
                    <div class="col-md-6">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <h3>TIPS BEFORE CREATE SSH</h3>
                          <ul>
                            <li>Make sure your balance is enough to buy an SSH Account</li>
                            <li>After buying, You can't refund balance</li>
                            <li>Your account is automaticly suspended after 30 day if not set expired date</li>
                            <li>And last, Thank you for using SSHPANEL</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <div class="well">
                            <b style="font-size:20px"> Balance : {{@Auth::user()->balance}}</b>
                          </div>
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
