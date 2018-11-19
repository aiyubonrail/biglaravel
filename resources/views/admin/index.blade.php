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
                   
                    <a href='menuz' class="btn btn-primary form-control" style="padding: 5px;margin-right:10px;width:30% "> Create Menu</a>                
                    
                    <a href='submenu'  class="btn btn-primary form-control"  style="padding: 5px;margin-right:10px;width:30% "> Create Submenu</a>

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
    </table>
          </div>
            <!--Card content-->
              




   
<div id="addsuperuser" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">Tambah Superuser
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
              <div class="card">
 {!! Form::open(array( 'class' => 'card-body', 'route' => 'super.register')) !!}

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-12 mb-2">

                  <!--firstName-->
                  <div class="md-form ">
                    <label for="firstName" class="">Nama Lengkap</label>
                    <input type="text" id="name" class="form-control" name="name">
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
               
                <!--Grid column-->

              </div>
                 <div class="row">

                <!--Grid column-->
                <input type="hidden" name="id" value="{{ Auth::user()->id }}"> </input>

                <!--Grid column-->
                <div class="col-md-12 mb-2">
                  <div class="md-form">
                    <label for="firstName" class="">Username</label>
                     <input type="text" id="password" class="form-control" required="true" name="username">
                  </div>

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->

          

         

           
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>

            </form>
            <!--Card content-->
             </div>
                </div>
            </div>
        </div>
    </div>



<!-- edit modal-->

                </div>
            </div>
        </div>
    </div>
</div>

        <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

@endsection
