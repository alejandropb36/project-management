@if(Auth::user()->image)
        <img src=" {{ route('user.avatar', ['filename' => Auth::user()->image])}} " alt="Avatar de usuario" >
@else
    <img src="https://www.assetworks.com/wp-content/uploads/2016/10/businessman.png">
@endif
