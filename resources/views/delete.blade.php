@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                @if(isset($failed))
                  <div class="panel-heading">Failed to delete server!</div>
                  <div class="panel-body">
                    <hr />
                    <div class="alert alert-danger">
                      Server failed to be deleted, Cannot find server with id <code>{{$failed}}</code>.
                    </div>
                    <a href="http://{{ $_SERVER['SERVER_NAME']}}" class="btn btn-default btn-lg" style="margin-left:40%;margin-top:20px;"><span class="glyphicon glyphicon-home"></span> Back to home.</a>
                @elseif(isset($success))
                      <div class="panel-heading">Server deleted successfully!</div>
                      <div class="panel-body">
                        <hr />
                        <div class="alert alert-success">
                          Server has been deleted successfully! Congratulations.
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
