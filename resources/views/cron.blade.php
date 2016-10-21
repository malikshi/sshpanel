@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                    @if(isset($noconnect))
                      <div class="panel-heading">Failed! Can't connec to server!</div>
                      <div class="panel-body">
                        <hr />
                        <div class="alert alert-danger">
                          Server failed, Can't connect to server.
                        </div>
                        <a href="http://{{ $_SERVER['SERVER_NAME']}}" class="btn btn-default btn-lg" style="margin-left:40%;margin-top:20px;"><span class="glyphicon glyphicon-home"></span> Back to home.</a>

                    @elseif(isset($data))
                  <div class="panel-heading">Cron Success!</div>
                  <div class="panel-body">
                    <h3 style="text-align:center !important;">LIST SSH ACCOUNTS EXPIRED & DELETED</h3>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>On Server</th>
                              <th>Reseller</th>
                              <th>Created On</th>
                              <th>Expired On</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($data as $user)
                            <tr>
                              <td>{{$user->name}}</td>
                              <td>{{$user->on_server}}</td>
                              <td>{{$user->reseller}}</td>
                              <td>{{$user->created_at}}</td>
                              <td>{{$user->expired_on}}</td>
                              <td>
                                <label class="label label-danger">deleted!</label>
                              </td>
                            </tr>
                          @endforeach
                          </tbody>
                        </table>
                      </div>
                    @endif

                    <hr />
                    <p style="text-align : center !important;"><b>Copyright &copy; <a href="https://github.com/rizalio/sshpanel">Rizal Fakhri</a> & &#x3C;/&#x3E; with <span class="glyphicon glyphicon-heart"></span> on Cengkareng.</b></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
