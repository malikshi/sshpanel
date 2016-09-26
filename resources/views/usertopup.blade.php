@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Select Reseller To TopUped</div>
                <div class="panel-body">
                  @if(isset($noreseller))
                    <h3 style="text-align:center !important;">NO RESELLER FOUND</h3>
                  @else
                  <h3 style="text-align:center !important;">LIST RESELLER</h3>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Reseller Name</th>
                          <th>Reseller Email</th>
                          <th>Reseller Balance</th>
                          <th>reseller Join Date</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($resellers as $reseller)
                          <tr>
                            <td>{{$reseller->name}}</td>
                            <td>{{$reseller->email}}</td>
                            <td><label class="label label-danger"><b>{{$reseller->balance}}</b></label></td>
                            <td>{{$reseller->created_at}}</td>
                            <td>
                              <a class="btn btn-warning btn-xs" href="{{url('/usertopup/' . $reseller->id)}}" data-toggle="tooltip" data-placement="top" title="TopUp This User"><span class="glyphicon glyphicon-usd ssh-list"></span>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
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
