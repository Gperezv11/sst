<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel">Modal 1</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <nav class="navbar">
            <div class="container-fluid">
                <a class="navbar-brand"></a>
                
                    <input class="form-control me-10" type="search" placeholder="Buscar por..." aria-label="Buscar por..." name="buscarNombre">
                    <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                    
                    <!-- @if($param == '1')
                        @include('POS.busquedaComanda')    
                    @endif  -->
            </div>
        </nav>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">Open second modal</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">Modal 2</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="d-flex" >
            <div class="list-group">
                @foreach($buscarProducto as $comanda)
                <a href="{{route('comanda.index', $comanda->id ) }}" class="list-group-item list-group-item-action" aria-current="true" name="seleccion">{{$comanda->nombre}}</a>
                @endforeach
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button>
      </div>
    </div>
  </div>
</div>
<a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a>





