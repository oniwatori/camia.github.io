<h2>Login to system</h2>
<form id="login-form" method="post">
    <div class="alert">
        <?=$this->error?>
    </div>
    <div class="input">
        <input type="text" name="User[username]" placeholder="Username" />
    </div>
    <div class="input">
        <input type="password" name="User[password]" placeholder="Password" />
    </div>
    <div class="input">   
        <input type="submit" value="Login" />
    </div>
</form>