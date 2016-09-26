@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">TopUp Reseller</div>
                <div class="panel-body">
                  <div class="col-md-6">
                    <h3>TOPUP RESELLER</h3>
                    @if(isset($topupsuccess))
                      <div class="alert alert-success">
                        Successfully TopUp reseller with name <b><code>{{$topupsuccess['success'][0]->name}}</b></code> with <b><code>{{$topupsuccess['amount']}}</b></code> of amount.
                      </div>
                    @elseif(isset($topupfailed))
                      <div class="alert alert-danger">
                        Failed, Please try again later
                      </div>
                    @elseif($errors->has())
                      <div class="alert alert-danger">
                        Please fix the following error
                        <ul>
                          @foreach($errors->all() as $error)
                          <li>{{$error}}</li>
                          @endforeach
                        </ul>
                      </div>
                    @endif
                    <form method="post" action="/usertopup/finish">
                      <label for="amount">Amount To TopUped</label>
                      <input type="text" name="amount" class="form-control" value="">
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <input type="hidden" name="_id" value="{{@$id['id']}}">
                      <br />
                      <button type="submit" class="btn btn-success" name="button">TopUp!</button>
                    </form>
                  </div>
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <h3>TIPS BEFORE TOPUP RESELLER</h3>
                        <ul>
                          <li>TopUp reseller is mean about adding some balance to reseller account</li>
                          <li>balance is not money currency, is only some amount</li>
                          <li>you can unlimited topuping reseller whatever you want</li>
                          <li>Thanks for using SSHPANEL</li>
                        </ul>
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
