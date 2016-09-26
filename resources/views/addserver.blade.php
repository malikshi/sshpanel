@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Add SSH Server</div>
                <div class="panel-body">
                  <div ng-app="">
                    <div class="col-md-6">
                      <h3>ADD SSH SERVER</h3>
                      @if(isset($success))
                        <div class="alert alert-success">
                          Successfully added new server, Congratulations.
                        </div>
                      @elseif(isset($failed))
                        <div class="alert alert-danger">
                          Server with IP Address <code>{{$failed['serverip']}}</code> has been exists
                        </div>
                      @elseif($errors->has())
                        <div class="alert alert-danger">
                          Please review folowing error
                          <ul>
                          @foreach($errors->All() as $error)
                            <li>{{$error}}</li>
                          @endforeach
                          </ul>
                        </div>
                      @endif

                      <form method="post" action="/addserver">
                        <input type="hidden" ng-model="" name="_token" value="{{csrf_token()}}">
                        <label for="servername">Server Name</label>
                        <input type="text" ng-model="servername" name="servername" class="form-control" value="">
                        <label for="serverip">Server IP Address</label>
                        <input type="text" ng-model="serverip" name="serverip" class="form-control" value="">
                        <label for="serverip">Server Host (ex: <code>server1.sshpanel.com</code>)</label>
                        <input type="text" ng-model="serverhost" name="serverhost" class="form-control" value="">
                        <label for="serveruser">Server Username (root)</label>
                        <input type="text" ng-model="serveruser" name="serveruser" class="form-control" value="">
                        <label for="serverpass">Server Password</label>
                        <input type="password" ng-model="serverpass" name="serverpass" class="form-control" value="">
                        <label for="serverloc">Server Location (ex : Indonesia/USA/SG)</label>
                        <input type="text" ng-model="serverloc" name="serverloc" class="form-control" value="">
                        <label for="serverservice">Server Service (such : SSH/VPN)</label>
                        <input type="text" ng-model="serverservice" name="serverservice" class="form-control" value="">
                        <label for="serverport">Server Ports (ex: 22/80/443. PS : add multiple ports delimite by (,) coma)</label>
                        <input type="text" ng-model="serverports" name="serverports" class="form-control" value="">
                        <br />
                        <button type="submit" name="button" class="btn btn-success">Add Server!</button>
                      </form>
                    </div>
                    <div class="col-md-6">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <h3>TIPS BEFORE ADD SERVER</h3>
                          <ul>
                            <li>server is used to create SSH/VPN Account</li>
                            <li>you can add unlimited server to your sshpanel</li>
                            <li>default port to access SSH is 22, so I suggested to make port 22 is default to access server via SSH</li>
                            <li>reseller can add SSH Account to your server</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="panel panel-default">
                        <div class="panel-body">
                          <h3>SERVER PREVIEW</h3>
                          <div class="col-md-12">
                            <div class="panel panel-default">
                              <div class="panel-body">

                                <b>IP : @{{serverip}}</b>
                                <hr />
                                <b>Location : @{{serverloc}}</b>
                                <hr />
                                <b>Service : <b style="text-transform:uppercase !important;">@{{serverservice}}</b></b>
                                <hr />
                                <b>Ports : @{{serverports}}</b>
                                <hr />
                                <div class="title" style="text-transform:uppercase !important;">@{{servername}} | BUY</div>
                              </div>
                            </div>
                          </div>
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
