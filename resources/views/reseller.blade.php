@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">LIST RESELLER</div>
                <div class="panel-body">
                  @if(isset($noresellers))
                    <h3 style="text-align:center !important;">NO RESELLER FOUND</h3>
                  @elseif(isset($resellers))
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
                              <a class="btn btn-info btn-xs" href="{{url('/edit/reseller/' . $reseller->id)}}" data-toggle="tooltip" data-placement="top" title="Edit Reseller Details"><span class="glyphicon glyphicon-pencil ssh-list"></span></a>
                              <a class="btn btn-danger btn-xs" href="{{url('/delete/reseller/' . $reseller->id)}}" data-toggle="tooltip" data-placement="top" title="Delete Reseller"><span class="glyphicon glyphicon-trash ssh-list"></span></a>
                              <a class="btn btn-warning btn-xs" href="{{url('/usertopup/' . $reseller->id)}}" data-toggle="tooltip" data-placement="top" title="TopUp This Reseller"><span class="glyphicon glyphicon-usd ssh-list"></span></a>
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
