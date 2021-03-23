@csrf
<div class="col-12">
    <div class="form-group">
        <label for="category_id"><b>Tipo:</b></label>
        <select class="form-control" name="category_id">
            <option value=""></option>
            @foreach ($categories as $category)
            <option value="{{$category->id}}"
                {{old('category_id',$link->category_id)==$category->id ? ' selected': ''}}>
                {{$category->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="title"><b>Título:</b></label>
        <input type="text" class="form-control" name="title" id="title" value="{{old('title',$link->title)}}">
    </div>
    <div class="form-group">
        <label for="price"><b>Precio:</b></label>
        <input type="text" class="form-control" name="price" id="price" @if($link->price!=0 or old($link->price)!=null)
        value="{{old('price',number_format($link->price,0,",","."))}}" @else value="" @endif>
    </div>
    <div class="form-group">
        <label for="url"><b>Url:</b></label>
        <input type="text" class="form-control" name="url" id="url" value="{{old('url',$link->url)}}">
    </div>
    <div class="form-group">
        <label for="city_id"><b>Provincia:</b></label>
        <select class="form-control" name="city_id">
            <option value=""></option>
            @foreach ($cities as $city)
            <option value="{{$city->id}}" {{old('city_id',$link->city_id)==$city->id ? ' selected': ''}}>
                {{$city->name}}</option>
            @endforeach
        </select>
    </div>
</div>