@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">SSH User Settings</div>
                <div class="panel-body">


                    @if(isset($cnt))
                      <h3 style="text-align:center">NO SSH ACCOUNT FOUND</h3>

                    @else
                    <h3 style="text-align:center !important;">LIST SSH ACCOUNTS</h3>
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>On Server</th>
                              <th>Reseller</th>
                              <th>Created On</th>
                              <th>Expired On</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($ssh as $user)
                            <tr>
                              <td>{{$user->name}}</td>
                              <td>{{$user->on_server}}</td>
                              <td>{{$user->reseller}}</td>
                              <td>{{$user->created_at}}</td>
                              <td>{{$user->expired_on}}</td>
                              <td>
                                <a class="btn btn-danger btn-xs" href="{{url('/setting/delete/ssh/' . $user->id)}}" data-toggle="tooltip" data-placement="top" title="Delete SSH Account"><span class="glyphicon glyphicon-trash ssh-list"></span></a>
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
