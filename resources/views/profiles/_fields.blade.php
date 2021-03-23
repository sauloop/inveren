@csrf
<div class="form-group">
    <label for="company_name">Empresa:</label>
    <input type="text" class="form-control" name="company_name" id="company_name"
        value="{{old('company_name',$profile->company_name)}}">
</div>
<div class="form-group">
    <label for="address">Dirección:</label>
    <input type="text" class="form-control" name="address" id="address" value="{{old('address',$profile->address)}}">
</div>
<div class="form-group">
    <label for="phone">Teléfono:</label>
    <input type="text" class="form-control" name="phone" id="phone" value="{{old('phone',$profile->phone)}}">
</div>
<div class="form-group">
    <label for="city_id">Provincia:</label>
    <select class="form-control" name="city_id">
        <option value=""></option>
        @foreach ($cities as $city)
        <option value="{{$city->id}}" {{old('city_id',$profile->city_id)==$city->id ? ' selected': ''}}>
            {{$city->name}}</option>
        @endforeach
    </select>
</div>
<input name="filled" type="hidden" value="1">