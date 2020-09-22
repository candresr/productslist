<!DOCTYPE html>
<html>
<head>
    <title>Lista de Productos</title>
    <link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
        }
    </style>
</head>
<body>
    @if(session('status'))
        <div id="inmo-alert" class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>{{Session::get('msg')}}</strong>
        </div>
    @endif
    <h2>Lista de Productos</h2>
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="con-automatica-tab" data-toggle="tab" href="#Automatica" role="tab" aria-controls="Automatica" aria-selected="true">Listado de Productos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="con-grupos-tab" data-toggle="tab" href="#Grupos" role="tab" aria-controls="Grupos" aria-selected="false">Conexion API</a>
    </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="Automatica" role="tabpanel" aria-labelledby="con-automatica-tab">
            <div id="table_data">
                <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">File</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $product)
                        <tr>
                        <th scope="row">{{$product->id}}</th>
                        <td>{{$product->name}}/td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->file}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            {!! $data->links() !!}
            </div>
            </div>
        </div>
        <div class="tab-pane fade" id="Grupos" role="tabpanel" aria-labelledby="con-grupos-tab">

        <form class="form-horizontal"  action="{{ route('conexion-form') }}" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="url">URL:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="url" name="url" placeholder="Enter url">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="usuario">Usuario:</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Enter usuario">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
                </div>
            </div>
 
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-info" value="Submit Button">
                </div>
            </div>
        </form> 
        </div>
    </div>
   
</body>
</html>
<script>
$(document).ready(function(){
 $("svg").remove();
 $("p").remove();
 $("span").remove(".relative");
 $(document).on('click', '.pagination a', function(event){
  event.preventDefault(); 

  var page = $(this).attr('href').split('page=')[1];
  fetch_data(page);
 });

 function fetch_data(page)
 {
  $.ajax({
   url:"/pagination/fetch_data?page="+page,
   success:function(data)
   {
    $("svg").removeClass("w-5 h-5");
    $('#table').html(data);
   }
  });
 }
 
});
</script>