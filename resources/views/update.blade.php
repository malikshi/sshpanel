@extends('layouts.app')

  @section('content')
  <div class="container">
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
              <div class="panel panel-default">
                    @if (isset($data))
                      <div class="panel-heading">Editing Server</div>
                      <div class="panel-body">
                        <div ng-app="">
                          <div class="col-md-6">
                            <h3>EDITING SERVER ON {{$data[0]->ip}}</h3>
                            @if(isset($success))
                              <div class="alert alert-success">
                                Server updated successfully!, Congratulations.
                              </div>
                            @elseif(isset($failed))
                              <div class="alert alert-danger">
                                Server with IP Address <code>{{$exists}}</code> has been exists
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

                            <form method="post" action="/server/{{$data[0]->id}}/edit">
                              <input type="hidden" ng-model="" name="_token" value="{{csrf_token()}}">
                              <input type="hidden" ng-model="" name="id" value="{{$data[0]->id}}">
                              <label for="servername">Server Name</label>
                              <input type="text" ng-model="servername" name="servername" class="form-control" value="{{$data[0]->name}}">
                              <label for="serverip">Server IP Address</label>
                              <input type="text" ng-model="serverip" name="serverip" class="form-control" value="{{$data[0]->ip}}">
                              <label for="serverip">Server Host (ex: <code>server1.sshpanel.com</code>)</label>
                              <input type="text" ng-model="serverhost" name="serverhost" class="form-control" value="{{$data[0]->host}}">
                              <label for="serveruser">Server Username (root)</label>
                              <input type="text" ng-model="serveruser" name="serveruser" class="form-control" value="{{$data[0]->user}}">
                              <label for="serverpass">Server Password</label>
                              <input type="password" ng-model="serverpass" name="serverpass" class="form-control" value="{{$data[0]->password}}">
                              <label for="serverloc">Server Location (ex : Indonesia/USA/SG)</label>
                              <input type="text" ng-model="serverloc" name="serverloc" class="form-control" value="{{$data[0]->location}}">
                              <label for="serverservice">Server Service (such : SSH/VPN)</label>
                              <input type="text" ng-model="serverservice" name="serverservice" class="form-control" value="{{$data[0]->service}}">
                              <label for="serverport">Server Ports (ex: 22/80/443. PS : add multiple ports delimite by (,) coma)</label>
                              <input type="text" ng-model="serverports" name="serverports" class="form-control" value="{{$data[0]->port}}">
                              <label for="serverprices">Server Prices (ex: 1000, 10000, 200000 <b>Is not money curency)</label>
                              <input type="text" ng-model="serverprices" name="serverprices" class="form-control" value="{{$data[0]->prices}}">
                              <br />
                              <button type="submit" name="button" class="btn btn-success">Add Server!</button>
                            </form>
                          </div>
                          <div class="col-md-6">
                            <div class="panel panel-default">
                              <div class="panel-body">
                                <h3>TIPS BEFORE EDITING SERVER</h3>
                                <ul>
                                  <li>you are EDITING SERVER</li>
                                  <li>if input blank you will get error messages</li>
                                  <li>you can get old value if you inspect element the form input</li>
                                  <li>you should be FILL again all form</li>
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
                                      <b>Prices : @{{serverprices}}</b>
                                      <hr />
                                      <div class="title" style="text-transform:uppercase !important;">@{{servername}} | BUY</div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                    @elseif(isset($notfound))
                      <div class="panel-heading">Not Found!</div>
                      <div class="panel-body">
                        <div class="alert alert-danger">
                          Failed to editing server, No server with id <code>{{$notfound}}</code>
                        </div>
                        <a href="http://{{ $_SERVER['SERVER_NAME']}}" class="btn btn-default btn-lg" style="margin-left:40%;margin-top:20px;"><span class="glyphicon glyphicon-home"></span> Back to home.</a>
                    @endif
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
