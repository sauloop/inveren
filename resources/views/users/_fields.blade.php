@csrf
<div class="col-12">
    <div class="form-group">
        <label for="name"><b>Nombre:</b></label>
        <input type="text" class="form-control" name="name" id="name" value="{{old('name',$user->name)}}">
    </div>
    <div class="form-group">
        <label for="email"><b>Correo:</b></label>
        <input type="text" class="form-control" name="email" id="email" value="{{old('email',$user->email)}}">
    </div>
    <div class="form-group">
        <label for="admin"><b>Rol:</b></label>
        <select class="form-control" name="admin" id="admin">
            <option value="0" {{$user->admin==0 ? ' selected': ''}}>Usuario</option>
            <option value="1" {{$user->admin==1 ? ' selected': ''}}>Administrador</option>
        </select>
    </div>
    <div class="form-group">
        <label for="company_name"><b>Empresa:</b></label>
        <input type="text" class="form-control" name="company_name" id="company_name"
            value="{{old('company_name',$user->profile->company_name)}}">
    </div>
    <div class="form-group">
        <label for="address"><b>Dirección:</b></label>
        <input type="text" class="form-control" name="address" id="address"
            value="{{old('address',$user->profile->address)}}">
    </div>
    <div class="form-group">
        <label for="phone"><b>Teléfono:</b></label>
        <input type="text" class="form-control" name="phone" id="phone" value="{{old('phone',$user->profile->phone)}}">
    </div>
    <div class="form-group">
        <label for="company"><b>Tipo usuario:</b></label>
        <select class="form-control" name="company" id="company">
            <option value="0" {{$user->company==0 ? ' selected': ''}}>Particular</option>
            <option value="1" {{$user->company==1 ? ' selected': ''}}>Empresa</option>
        </select>
    </div>
    <div class="form-group">
        <label for="filled"><b>Perfil:</b></label>
        <select class="form-control" name="filled" id="filled">
            <option value="0" {{$user->filled==0 ? ' selected': ''}}>Sin datos</option>
            <option value="1" {{$user->filled==1 ? ' selected': ''}}>Datos ingresados</option>
        </select>
    </div>
    <div class="form-group">
        <label for="trial"><b>Prueba:</b></label>
        <select class="form-control" name="trial" id="trial">
            <option value="0" {{$user->trial==0 ? ' selected': ''}}>Desactivada</option>
            <option value="1" {{$user->trial==1 ? ' selected': ''}}>En prueba</option>
        </select>
    </div>
    <div class="form-group">
        <label for="subscription"><b>Solicitud suscripción:</b></label>
        <select class="form-control" name="subscription" id="subscription">
            <option value="0" {{$user->subscription==0 ? ' selected': ''}}>No</option>
            <option value="1" {{$user->subscription==1 ? ' selected': ''}}>Solicitada</option>
        </select>
    </div>
    <div class="form-group">
        <label for="approved"><b>Aprobado:</b></label>
        <select class="form-control" name="approved" id="approved">
            <option value="0" {{$user->approved==0 ? ' selected': ''}}>No</option>
            <option value="1" {{$user->approved==1 ? ' selected': ''}}>Sí</option>
        </select>
    </div>
    <div class="form-group">
        <label for="subscription_end"><b>Fin suscripción:</b></label>
        <input type="text" class="form-control" name="subscription_end" id="subscription_end"
            value="{{old('subscription_end',$user->subscription_end)}}">
    </div>
</div>