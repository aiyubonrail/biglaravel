@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard                
</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#addMenu" style="padding: 5px;margin-right:10px;width:30% "> Create Super User</button>
                   
                    <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#addMenu" style="padding: 5px;margin-right:10px;width:30% "> Create Menu</button>                
                    
                    <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#addMenu" style="padding: 5px;margin-right:10px;width:30% "> Create Submenu</button>

<p /><p />

                    <div class="col-md-12 mb-4"><h3 style="font-weight: bold;padding: 5px"> Form Super User</b></h3>

          <!--Card-->
          <div class="card">

            <!--Card content-->
               {!! Form::open(array( 'class' => 'card-body')) !!}

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--firstName-->
                  <div class="md-form ">
                    <input type="text" id="firstName" class="form-control" name="kode_menu">
                    <label for="firstName" class="">Nama Depan</label>
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                    <input type="text" id="lastName" class="form-control" name="lastname">
                    <label for="lastName" class="">Nama Belakang</label>
                  </div>

                </div>
                <!--Grid column-->

              </div>
                 <div class="row">

                <!--Grid column-->
                <div class="col-md-4 mb-2">

                  <!--firstName-->
                  <div class="md-form ">
                    <input type="text" id="hp" class="form-control" required="true" name="hp">
                    <label for="Handphone" class="">Handphone </label>
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-8 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                     <input type="text" id="email" class="form-control" required="true" name="email">
                      <label for="email" class="">Email </label>
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

              <!--Username-->
              <!-- <div class="md-form input-group pl-0 mb-5">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">@</span>
                </div>
                <input type="text" class="form-control py-0" placeholder="Username" aria-describedby="basic-addon1">
              </div> -->

              <!--email-->
        

         
              <hr>

           
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>

            </form>


                </div>
            </div>
        </div>
    </div>
</div>
<div id="addMenu" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" action="{{ URL::to('/addmenu') }}" method="POST" >
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="title">Kode Menu:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="kode_menu_add" autofocus name="kode_menu">
                                <p class="errorKode_menu text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="menu">Nama Menu:</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="menu_add" cols="40" rows="5" name="menu"></input>
                                <small>Min: 2, Max: 128, only text</small>
                                <p class="errorMenu text-center alert alert-danger hidden"></p>
                            </div>
                        </div> <button class="col-md-12 form-control btn-danger" id="addcart" style="padding:4px">Beli </button>

                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success add" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-check'></span> Add
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
