@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Buy SSH Accounts</div>
                <div class="panel-body">
                  @if(isset($cnt))
                    <h3 style="text-align : center !important;">NO SERVERS FOUND</h3>
                  @else
                    @foreach($lists as $list)
                    <a href="{{url('buy/' . $list->key)}}" style="text-decoration:none !important;" class="link-action">
                      <div class="col-md-4">
                        <div class="panel panel-default">
                          <div class="panel-body">

                            <b>IP : {{$list->ip}}</b>
                            <hr />
                            <b>Location : {{$list->location}}</b>
                            <hr />
                            <b>Service : {{strtoupper($list->service)}}</b>
                            <hr />
                            <b>Ports : {{$list->port}}</b>
                            <hr />
                            <div class="title">{{strtoupper($list->name)}} | BUY</div>
                          </div>
                        </div>
                      </div>
                    </a>
                    @endforeach
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
