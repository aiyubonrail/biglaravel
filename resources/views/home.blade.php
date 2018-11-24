@extends('layouts.app')

@section('content')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


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
                   
                    <a href='#' class="btn btn-primary form-control" data-toggle="modal" data-target="#loginsuperuser" style="padding: 5px;margin-right:10px;width:30% "> Login Super User</a>                
                    
                    <a href="menuz"  class="btn btn-primary form-control"   style="padding: 5px;margin-right:10px;width:15% "> + Menu</a>

                     <a href="submenu"  class="btn btn-primary form-control"  style="padding: 5px;margin-right:10px;width:15% "> + SubMenu</a>


<p /><p />     

                    <div class="col-md-12 mb-4"><h3 style="font-weight: bold;padding: 5px"> Daftar Menu</b></h3>


          <!--Card-->
          <div class="card">
             
               <table class="table table-striped custab">
    <thead>
        <tr>
            <th>ID</th>
            <th>Menu</th>
            <th>Submenu</th>
        </tr>
    </thead>@foreach($data['submenu'] as $key => $value)
            <tr>
                <td> 
                    {{ $value->id }}</td>
                <td>
                            {{ $value->menu }}

                </td>
                <td>{{ $value->submenu }}</td>
               
            </tr>
            @endforeach
    </table><div class="text-center"> 
       {{ $data['submenu']->links() }}
</div>
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
                    <input type="numeric" class="form-control" name="menu_id">
                    <label for="menu_id" class="">Kode_menu</label>
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
                <div class="col-md-12 mb-2">

                  <!--firstName-->
                  <div class="md-form ">
                    <input type="text" id="firstName" class="form-control" name="name">
                    <label for="name" class="">Nama Lengkap</label>
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-12 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                    <input type="text" id="lastName" class="form-control" name="username">
                    <label for="lastName" class="">Username</label>
                  </div>

                </div>
                <!--Grid column-->
              <div class="col-md-12 mb-2">
                 <!--lastName-->
                  <div class="md-form">
                    <input type="hidden" id="id_admin" class="form-control" name="id" value="{{ Auth::user()->id }}">
                  </div>

                </div>
              </div>
                 <div class="row">

           


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


    <div id="loginsuperuser" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">Login Superuser
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
              <div class="card">
 {!! Form::open(array( 'class' => 'card-body', 'route' => 'super.login.submit')) !!}

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-12 mb-2">

                  <!--firstName-->
                  <div class="md-form ">
                    <input type="text" id="username" class="form-control" name="username">
                    <label for="name" class="">Username</label>
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-12 mb-2">

                  <!--lastName-->
                  <div class="md-form">
                    <input type="text" id="password" class="form-control" name="password">
                    <label for="lastName" class="">Password</label>
                  </div>

                </div>
                <!--Grid column-->
              <div class="col-md-12 mb-2">
                 <!--lastName-->
                  <div class="md-form">
                    <input type="hidden" id="id_admin" class="form-control" name="id" value="{{ Auth::user()->id }}">
                  </div>

                </div>
              </div>
                 <div class="row">

           


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
              <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

            </form>
            <!--Card content-->
             </div>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="hapusmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Hapus Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h3>Apakah Anda yakin ingin menghapus?</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger">Ya</button>
      </div>
    </div>
  </div>
</div><!--edit modal-->


<!-- edit modal-->

                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
 $(document).on('click', '.show-modal', function() {
            $('.modal-title').text('Edit Menu');
            $('#id_show').val($(this).data('id'));
            $('#menu_show').val($(this).data('menu'));
            $('#submenu_show').val($(this).data('submenu'));
            $('#bmenu_id_show').val($(this).data('menu_id'));

            $('#editModal').modal('show');
        });

 $('#editformsubmenu').submit(function(e){
    e.preventDefault();
    $.ajax({
        url:'/addsubmenu',
        type:'post',
        data:$('#editformsubmenu').serialize(),
        success:function(){
            //whatever you wanna do after the form is successfully submitted
        }
    });
});
 $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: 'menu/edit/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_show").val(),
                    'menu': $('#menu_show').val(),
                    'submenu': $('#submenu_show').val(),
                    'idmenu' : $('#menu_id_show').val(),

                },
                success: function(data) {
                    $('.errorTitle').addClass('hidden');
                    $('.errorContent').addClass('hidden');
                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);
                       
                    } 
                }
            });
        });

    </script>
        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

@endsection
