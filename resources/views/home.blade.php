@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <div class="well well-sm hidden-sm hidden-xs" style="margin-left:80% !important;">
                    <b style="text-align:center !important;font-size:20px"> Balance : {{ $check->balance }}</b>
                  </div>
                  <div class="well well-sm hidden-lg visible-xs visible-md">
                    <b style="text-align:center !important;font-size:20px"> Balance : {{ $check->balance }}</b>
                  </div>
                    <hr>
                    @if($check->role == 0 )
                    <a href="{{url('/server')}}" style="text-decoration:none !important;" class="link-action">
                      <div class="col-md-3">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <span class="glyphicon glyphicon-tasks list-action"></span>
                            <hr>
                            <div class="title">List Server</div>
                          </div>
                        </div>
                      </div>
                    </a>
                    <a href="{{url('/buy')}}" style="text-decoration:none !important;" class="link-action">
                      <div class="col-md-3">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <span class="glyphicon glyphicon-shopping-cart list-action"></span>
                            <hr>
                            <div class="title">Buy SSH</div>
                          </div>
                        </div>
                      </div>
                    </a>
                    <a href="{{url('topup')}}" style="text-decoration:none !important;" class="link-action">
                      <div class="col-md-3">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <span class="glyphicon glyphicon-retweet list-action"></span>
                            <hr>
                            <div class="title">TopUp Balance</div>
                          </div>
                        </div>
                      </div>
                    </a>
                    <a href="{{url('/accounts')}}" style="text-decoration:none !important;" class="link-action">
                      <div class="col-md-3">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <span class="glyphicon glyphicon-user list-action"></span>
                            <hr>
                            <div class="title">Account</div>
                          </div>
                        </div>
                      </div>
                    </a>
                    @else
                    <h3 style="text-align:center">WELCOME TO SSHPANEL ADMIN PANEL</h3> <br />
                    <a href="{{url('/server')}}" style="text-decoration:none !important;" class="link-action">
                      <div class="col-md-3">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <span class="glyphicon glyphicon-tasks list-action"></span>
                            <hr>
                            <div class="title">List Server</div>
                          </div>
                        </div>
                      </div>
                    </a>
                    <a href="{{url('/buy')}}" style="text-decoration:none !important;" class="link-action">
                      <div class="col-md-3">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <span class="glyphicon glyphicon-shopping-cart list-action"></span>
                            <hr>
                            <div class="title">Buy SSH</div>
                          </div>
                        </div>
                      </div>
                    </a>
                    <a href="{{url('/addserver')}}" style="text-decoration:none !important;" class="link-action">
                      <div class="col-md-3">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <span class="glyphicon glyphicon-tint list-action"></span>
                            <hr>
                            <div class="title">Add Server</div>
                          </div>
                        </div>
                      </div>
                    </a>
                    <a href="{{url('/reseller')}}" style="text-decoration:none !important;" class="link-action">
                      <div class="col-md-3">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <span class="glyphicon glyphicon-list-alt list-action"></span>
                            <hr>
                            <div class="title">List Reseller</div>
                          </div>
                        </div>
                      </div>
                    </a>
                    <a href="{{url('/add')}}" style="text-decoration:none !important;" class="link-action">
                      <div class="col-md-3">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <span class="glyphicon glyphicon-plus list-action"></span>
                            <hr>
                            <div class="title">Add Reseller</div>
                          </div>
                        </div>
                      </div>
                    </a>
                    <a href="{{url('/setting')}}" style="text-decoration:none !important;" class="link-action">
                      <div class="col-md-3">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <span class="glyphicon glyphicon-cog list-action"></span>
                            <hr>
                            <div class="title">Setting</div>
                          </div>
                        </div>
                      </div>
                    </a>
                    <a href="{{url('accounts')}}" style="text-decoration:none !important;" class="link-action">
                      <div class="col-md-3">
                        <div class="panel panel-default">
                          <div class="panel-body">
                            <span class="glyphicon glyphicon-user list-action"></span>
                            <hr>
                            <div class="title">Accounts</div>
                          </div>
                        </div>
                      </div>
                    </a>
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
