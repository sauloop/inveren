<form action="{{route('users.index')}}">
    <div class="row">
        <div class="col-12 form-inline d-flex justify-content-end">
            <div class="form-group">
                <input type="text" name="id" value="{{request('id')}}" class="form-control filtros-input-listado"
                    placeholder="Id...">
            </div>
            <div class="form-group ml-2">
                <input type="search" name="search" value="{{request('search')}}"
                    class="form-control filtros-input-listado" placeholder="Nombre...">
            </div>
            <div class="form-group ml-2">
                <input type="search" name="email" value="{{request('email')}}"
                    class="form-control filtros-input-listado" placeholder="Correo...">
            </div>
            <div class="form-group ml-2">
                <select name="admin" id="admin" class="form-control filtros-select-tipo">
                    <option value="">Rol</option>
                    <option value="false" {{request('admin')=='false' ? 'selected': ''}}>Usuario
                    </option>
                    <option value=1 {{request('admin')==1 ? 'selected': ''}}>Administrador
                    </option>
                </select>
            </div>
            <div class="form-group ml-2">
                <button type="submit" class="btn btn-md btn-primary">Filtrar</button>
            </div>
        </div>
    </div>
</form>