<form action="{{route('index')}}">
    <div class="row">
        <div class="col-12 form-inline d-flex justify-content-end">
            <div class="form-group">
                <input type="search" name="search" value="{{request('search')}}" class="form-control filtros-input"
                    placeholder="Buscar...">
            </div>
            <div class="form-group ml-2">
                <select name="category_id" class="form-control filtros-select-tipo">
                    <option value="">Tipo</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{request('category_id')==$category->id ? 'selected': ''}}>
                        {{$category->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group ml-2">
                <select name="city_id" class="form-control filtros-select">
                    <option value="">Provincia</option>
                    @foreach ($cities as $city)
                    <option value="{{$city->id}}" {{request('city_id')==$city->id ? 'selected': ''}}>
                        {{$city->name}}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group ml-2">
                <button type="submit" class="d-flex justify-content-end btn btn-md btn-primary">Filtrar</button>
            </div>
        </div>
    </div>
</form>