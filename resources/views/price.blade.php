@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">SSH Price Setting</div>
                <div class="panel-body">


                  <div class="col-md-6">
                    @if(isset($success))
                      <div class="alert alert-success">
                        Prices update successfully, Congratulations
                      </div>
                    @elseif(isset($failed))
                      <div class="alert alert-danger">
                        An error occured, Please try again later
                      </div>
                    @endif
                    <form method="post" action="/setting/price">
                      <label for="price">SSH Price</label>
                      <input type="text" name="price" class="form-control" value="" style="height : 50% !important;"><br />
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      <button type="submit" name="btn-update-prices" class="btn btn-success" value="">Update!</button>
                    </form>
                  </div>
                  <div class="col-md-6">
                    <div class="panel panel-default">
                      <div class="panel-body">
                        <h3 style="text-align center !important;">INFORMATION</h3>
                        <ul>
                          <li>Prices used to charge user balance</li>
                          <li>prices are not shaped currencies such as the dollar and others, only a nominal amount only</li>

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
