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
                    <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#addsuperuser" style="padding: 5px;margin-right:10px;width:30% "> Create Super User</button>
                   
                    <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#addMenu" style="padding: 5px;margin-right:10px;width:30% "> Create Menu</button>                
                    
                    <button type="button" class="btn btn-primary form-control" data-toggle="modal" data-target="#addsubMenu" style="padding: 5px;margin-right:10px;width:30% "> Create Submenu</button>

<p /><p />

                    <div class="col-md-12 mb-4"><h3 style="font-weight: bold;padding: 5px"> Daftar Menu</b></h3>

          <!--Card-->
          <div class="card">
              <?php foreach ($data['menu'] as $key => $value) {
                  # code...
                var_dump($value);
              }

              ?>
               <table class="table table-striped custab">
    <thead>
        <tr>
            <th>ID</th>
            <th>Menu</th>
            <th>Submenu</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>@foreach($data['menu'] as $key => $value)
            <tr>
                <td>{{ $value['id'] }}</td>
                <td>{{ $value ['menu'] }}</td>
                <td>{{ $value['submenu'] }}</td>
                <td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
            </tr>
            @endforeach
    </table>
          </div>
            <!--Card content-->
              
<div id="addMenu" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">Tambah Menu
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
              <div class="card">

            <!--Card content-->
               {!! Form::open(array( 'class' => 'card-body', 'route' => 'addmenu')) !!}

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-12 mb-2">

                  <!--firstName-->
                  <div class="md-form ">
                    <input type="numeric" class="form-control" name="kode_menu">
                    <label for="kode_menu" class="">Kode_menu</label>
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-12 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                    <input type="text" id="menu" class="form-control" name="menu">
                    <label for="menu" class="">Nama Menu</label>
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
              <button class="btn btn-primary btn-lg btn-block" type="submit">Tambah</button>

            </form></div>
                </div>
            </div>
        </div>
    </div>
<!-- sub menu --->
<div id="addsubMenu" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">Tambah Sub Menu
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
              <div class="card">

            <!--Card content-->
               {!! Form::open(array( 'class' => 'card-body', 'route' => 'addsubmenu')) !!}

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-12 mb-2">

                  <!--firstName-->
                  <div class="col-md-12 mb-4">

                  <label for="country">Menu</label>                    

                  <select class="custom-select d-block w-100" id="menu" required name="kode_menu">
                    @foreach($data['menu'] as $key =>$value)
                       <option value=" {{ $value['kode_menu']}} "> {{$value['menu']}}
                        @endforeach
                  </select>
                  <div class="invalid-feedback">
                    Silahkan Pilih Menu.
                  </div>

                </div>
                 
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-12 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                    <input type="text" id="submenu" class="form-control" name="submenu">
                    <label for="submenu" class="">Nama Sub Menu</label>
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
              <button class="btn btn-primary btn-lg btn-block" type="submit">Tambah</button>

            </form></div>
                </div>
            </div>
        </div>
    </div>

<div id="addsuperuser" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">Tambah Superuser
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
              <div class="card">
 {!! Form::open(array( 'class' => 'card-body', 'route' => 'addsuperuser')) !!}

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--firstName-->
                  <div class="md-form ">
                    <input type="text" id="firstName" class="form-control" name="kode_menu">
                    <label for="firstName" class="">Nama Lengkap</label>
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                    <input type="text" id="lastName" class="form-control" name="lastname">
                    <label for="lastName" class="">Username</label>
                  </div>

                </div>
                <!--Grid column-->

              </div>
                 <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--firstName-->
                  <div class="md-form ">
                    <input type="text" id="hp" class="form-control" required="true" name="hp">
                    <label for="Handphone" class="">username </label>
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                     <input type="text" id="email" class="form-control" required="true" name="email">
                      <label for="email" class="">password </label>
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
            <!--Card content-->
             </div>
                </div>
            </div>
        </div>
    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
