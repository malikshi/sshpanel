@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Account Setting</div>
                <div class="panel-body">
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <h3>CHANGE EMAIL</h3>
                          @if(isset($mailfailed))
                            <div class="alert alert-danger">
                              Failed to change email to <b>{{$mailfailed}}<b />
                            </div>
                          @elseif(isset($mailsuccess))
                            <div class="alert alert-success">
                              Change email successfully, Congratulations.
                            </div>
                          @elseif(isset($passworderror))
                          <div class="alert alert-danger">
                            Failed, Wrong password!
                          </div>
                          @endif
                          <form method="post" action="accounts">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <label for="oldmail">New Email</label>
                            <input type="text" name="newmail" class="form-control" value="">
                            <label for="confpass">Password Confirmation</label>
                            <input type="password" name="confpass" class="form-control" value="">
                            <br />
                            <button type="submit" name="btn-change-pass" class="btn btn-success">Change!</button>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <h3>CHANGE USERNAME</h3>
                          @if(isset($usererror))
                            <div class="alert alert-danger">
                              Failed to change username to {{$usererror}}
                            </div>
                          @elseif(isset($usersuccess))
                            <div class="alert alert-success">
                              Successfully change username, Congratulations.
                            </div>
                          @elseif(isset($passerror))
                            <div class="alert alert-danger">
                              Failed, Wrong Password!
                            </div>
                          @endif
                            <form method="post" action="accounts">
                              <input type="hidden" name="_token" value="{{csrf_token()}}">
                              <label for="oldmail">New Username</label>
                              <input type="text" name="newname" class="form-control" value="">
                              <label for="confpass">Password Confirmation</label>
                              <input type="password" name="confpass" class="form-control" value="">
                              <br />
                              <button type="submit" name="btn-change-pass" class="btn btn-success">Change!</button>
                            </form>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <h3>CHANGE PASSWORD</h3>
                            @if(isset($passerror))
                              <div class="alert alert-danger">
                                Failed to change password for user <b>{{Auth::user()->name}}</b>.
                              </div>
                            @elseif(isset($passsukses))
                              <div class="alert alert-success">
                                Successfully change password, Congratulations.
                              </div>
                            @elseif(isset($failedpass))
                              <div class="alert alert-danger">
                                Failed, Wrong password!
                              </div>
                            @endif
                              <form method="post" action="accounts">
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <label for="oldmail">New Password</label>
                                <input type="password" name="newpass" class="form-control" value="">
                                <label for="confpass">Password Confirmation</label>
                                <input type="password" name="confpass" class="form-control" value="">
                                <br />
                                <button type="submit" name="btn-change-pass" class="btn btn-success">Change!</button>
                              </form>
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
