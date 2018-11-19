<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.jpg') }}">

    <!-- CSFR token for ajax call -->
    <meta name="_token" content="{{ csrf_token() }}"/>

    <title>Manage Sub Menu</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    {{-- <link rel="styleeheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}

    <!-- icheck checkboxes -->
    <link rel="stylesheet" href="{{ asset('icheck/square/yellow.css') }}">
    {{-- <link rel="stylesheet" href="https://raw.githubusercontent.com/fronteed/icheck/1.x/skins/square/yellow.css"> --}}

    <!-- toastr notifications -->
    {{-- <link rel="stylesheet" href="{{ asset('toastr/toastr.min.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">


    <!-- Font Awesome -->
    {{-- <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .panel-heading {
            padding: 0;
        }
        .panel-heading ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        .panel-heading li {
            float: left;
            border-right:1px solid #bbb;
            display: block;
            padding: 14px 16px;
            text-align: center;
        }
        .panel-heading li:last-child:hover {
            background-color: #ccc;
        }
        .panel-heading li:last-child {
            border-right: none;
        }
        .panel-heading li a:hover {
            text-decoration: none;
        }
        .table.table-bordered tbody td {
            vertical-align: baseline;
        }
    </style>

</head>

<body>
    <div class="col-md-8 col-md-offset-2">
        <h2 class="text-center">Manage Sub Menu</h2>
        <br />
        <div class="panel panel-default">
            <div class="panel-heading">
                <ul>
                    <li><i class="fa fa-file-text-o"></i>Semua Submenu</li>
                    <a href="#" class="add-modal"><li>Tambah Submenu</li></a>
                </ul>
            </div>
        <?php           $id = \App\SubMenu::orderBy('id','desc')->limit(1)->get();

        ?>
            
            <div class="panel-body">                            
               

                    <table class="table table-striped table-bordered table-hover" id="postTable" style="visibility: hidden;">
                        <thead>
                            <tr>
                                <th valign="middle">#</th>
                                <th>Id Menu</th>
                                <th>Submenu</th>
                                <th>Menu</th>
                                <th>Last updated</th>
                                <th>Actions</th>
                            </tr>
                            {{ csrf_field() }}
                        </thead>
                        <tbody>
                             @foreach($submenu as $indexKey => $post)
                                <tr class="item{{$post->id}} ">
                                    <td class="col1">{{ $indexKey+1 }}</td>
                                    <td>{{$post->menu_id}}</td>
                                    <td>
                                        {{App\SubMenu::getExcerpt($post->submenu)}}
                                    </td>
                                    <td class="text-center">{{$post->menu}}</td>
                                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->updated_at)->diffForHumans() }}</td>
                                    <td>
                                        <button class="show-modal btn btn-success" data-id="{{$post->id}}" data-menu="{{$post->menu}}" data-submenu="{{$post->submenu}}">
                                        <span class="glyphicon glyphicon-eye-open"></span> Show</button>
                                        <button class="edit-modal btn btn-info" data-id="{{$post->id}}" data-menu="{{$post->menu}}" data-menu_id="{{$post->menu_id}}" data-submenu="{{$post->submenu}}">
                                        <span class="glyphicon glyphicon-edit"></span> Edit</button>
                                        <button class="delete-modal btn btn-danger" data-id="{{$post->id}}" data-menu="{{$post->menu}}" data-submenu="{{$post->submenu}}">
                                        <span class="glyphicon glyphicon-trash"></span> Delete</button>
                                    </td>
                                </tr>
                           
                            @endforeach
                        </tbody>
                    </table>
                
            </div><!-- /.panel-body -->
        </div><!-- /.panel panel-default -->
    </div><!-- /.col-md-8 -->

    <!-- Modal form to add a post -->
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                          <?php $menu = \App\Menuz::orderBy('menu_id','desc')->get(); 
                            

                          ?>
                            <div class="form-group">
                            <label class="control-label col-sm-2" for="menu">Menu:</label>
                            <div class="col-sm-10">
                                <select type="text" class="form-control" id="menu_add" autofocus>
                                    @foreach($menu as $kmn => $vmn )
                                    <option value="{{ $vmn->menu_id }}"> {{ $vmn->menu}} </option>
                                    @endforeach
                                </select>
                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="title">Submenu:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="submenu_add" autofocus>
                                <small>Min: 2, Max: 32, only text</small>
                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type='hidden' class="form-control" id="content_add" value="{{  $id[0]->id+1 }}"></input>
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
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

    <!-- Modal form to show a post -->
    <div id="showModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Menu">Menu:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="menu_show" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="submenu">Submenu:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="submenu_show" cols="40" rows="5" disabled></textarea>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal form to edit a form -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_edit" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="menu">Menu:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="menu_edit" autofocus disabled>
                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                       <div class="form-group">
                            <div class="col-sm-10">
                                <input type="hidden" class="form-control" id="menu_id_edit" autofocus disabled>
                                <p class="errorTitle text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="submenu">Submenu: </label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" id="submenu_edit" cols="40" rows="5"></input>
                                <p class="errorContent text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                            <span class='glyphicon glyphicon-check'></span> Edit
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal form to delete a form -->
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Are you sure you want to delete the following post?</h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_delete" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="menu">Menu:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="menu_delete" disabled>
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="control-label col-sm-2" for="menu">Submenu:</label>
                            <div class="col-sm-10">
                                <input type="name" class="form-control" id="submenu_delete" disabled>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                            <span id="" class='glyphicon glyphicon-trash'></span> Delete
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            <span class='glyphicon glyphicon-remove'></span> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    {{-- <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <!-- Bootstrap JavaScript -->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.1/js/bootstrap.min.js"></script>

    <!-- toastr notifications -->
    {{-- <script type="text/javascript" src="{{ asset('toastr/toastr.min.js') }}"></script> --}}
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <!-- icheck checkboxes -->
    <script type="text/javascript" src="{{ asset('icheck/icheck.min.js') }}"></script>

    <!-- Delay table load until everything else is loaded -->
    <script>
        $(window).load(function(){
            $('#postTable').removeAttr('style');
        })
    </script>



    <!-- AJAX CRUD operations -->
    <script type="text/javascript">
        // add a new post
        $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Tambah Submenu');
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: 'submenu',
                data: {
                    '_token': $('input[name=_token]').val(),
                    'menu': $('#menu_add').val(),
                    'submenu': $('#submenu_add').val()
                },
                success: function(data) {
                    $('.errorTitle').addClass('hidden');
                    $('.errorContent').addClass('hidden');
                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);
                        if (data.errors.menu) {
                            $('.errorTitle').removeClass('hidden');
                            $('.errorTitle').text(data.errors.menu);
                        }
                        if (data.errors.content) {
                            $('.errorContent').removeClass('hidden');
                            $('.errorContent').text(data.errors.menu);
                        }
                    } else {
                        toastr.success('Submenu Berhasil ditambah!', 'Success Alert', {timeOut: 5000});
                        $('#postTable').
                        prepend("<tr class='item" + data.id + "'><td class='col1'>" + data.id + "</td><td>" + data.menu_id + "</td><td>" + data.submenu + "</td><td class='text-center'>" + data.menu_id + "</td><td>Just now!</td><td><button class='show-modal btn btn-success' data-id='" + data.id + "' data-menu='" + data.menu + "' data-submenu='" + data.submenu + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-submenu_add='" + data.submenu + "' data-content='" + data.submenu + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.menu + "' data-content='" + data.menu + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                        
                        $('.col1').each(function (index) {
                            $(this).html(index+1);
                        });
                    }
                },
            });
        });
        // Show a post
        $(document).on('click', '.show-modal', function() {
            $('.modal-title').text('Show');
            $('#id_show').val($(this).data('id'));
            $('#menu_show').val($(this).data('menu'));
            $('#submenu_show').val($(this).data('submenu'));
            $('#showModal').modal('show');
        });
        // Edit a post
        $(document).on('click', '.edit-modal', function() {
            $('.modal-title').text('Edit');
            $('#id_edit').val($(this).data('id'));
            $('#menu_edit').val($(this).data('menu'));
            $('#menu_id_edit').val($(this).data('menu_id'));
            $('#submenu_edit').val($(this).data('submenu'));
            id = $('#id_edit').val();
            $('#editModal').modal('show');
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: 'submenu/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'menu': $('#menu_id_edit').val(),
                    'submenu': $('#submenu_edit').val()
                },
                success: function(data) {
                    $('.errorTitle').addClass('hidden');
                    $('.errorContent').addClass('hidden');
                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);
                        if (data.errors.title) {
                            $('.errorTitle').removeClass('hidden');
                            $('.errorTitle').text(data.errors.title);
                        }
                        if (data.errors.content) {
                            $('.errorContent').removeClass('hidden');
                            $('.errorContent').text(data.errors.content);
                        }
                    } else {
                        toastr.success('Submenu Berhasil diupdate', 'Success Alert', {timeOut: 5000});
                        $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td class='col1'>" + data.id + "</td><td>" + data.menu_id + "</td><td>" + data.submenu + "</td><td class='text-center'>" + data.menu_id + "</td><td>Just now!</td><td><button class='show-modal btn btn-success' data-id='" + data.id + "' data-menu='" + data.menu + "' data-submenu='" + data.submenu + "'><span class='glyphicon glyphicon-eye-open'></span> Show</button> <button class='edit-modal btn btn-info' data-id='" + data.id + "' data-submenu_add='" + data.submenu + "' data-content='" + data.submenu + "'><span class='glyphicon glyphicon-edit'></span> Edit</button> <button class='delete-modal btn btn-danger' data-id='" + data.id + "' data-title='" + data.menu + "' data-content='" + data.menu + "'><span class='glyphicon glyphicon-trash'></span> Delete</button></td></tr>");
                        
                        $('.col1').each(function (index) {
                            $(this).html(index+1);
                        });
                    }
                }
            });
        });
        
        // delete a post
        $(document).on('click', '.delete-modal', function() {
            $('.modal-title').text('Delete');
            $('#id_delete').val($(this).data('id'));
            $('#submenu_delete').val($(this).data('submenu'));
            $('#menu_delete').val($(this).data('menu'));

            $('#deleteModal').modal('show');
            id = $('#id_delete').val();
        });
        $('.modal-footer').on('click', '.delete', function() {
            $.ajax({
                type: 'DELETE',
                url: 'submenu/' + id,
                data: {
                    '_token': $('input[name=_token]').val(),
                },
                success: function(data) {
                    toastr.success('Submenu Berhasil dihapus!', 'Success Alert', {timeOut: 5000});
                    $('.item' + data['id']).remove();
                    $('.col1').each(function (index) {
                        $(this).html(index+1);
                    });
                }
            });
        });
    </script>

</body>
</html>