<div class="input-field">

    <input type="text" name="name" class="validate" value="{{ isset($usuario->name) ? $usuario->name : '' }}">
    <label for="">Nome</label>

</div>

<div class="input-field">

    <input type="text" name="email" class="validate" value="{{ isset($usuario->email) ? $usuario->email : '' }}">
    <label for="">E-mail</label>

</div>

<div class="input-field">

    <input type="password" name="password" value="" class="validate">
    <label for="">Senha</label>

</div>
