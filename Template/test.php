
<div class='containerBox'>
<div class='box'>
  <div class='box-form'>
    <div class='box-login-tab'></div>
    <div class='box-login-title'>
      <div class='i i-login'></div><h2>LOGIN</h2>
    </div>
    <div class='box-login'>
      <div class='fieldset-body' id='login_form'>
        <button onclick="openLoginInfo();" class='b b-form i i-more' title='Mais Informações'></button>
        	<p class='field'>
          <label for='user'>E-MAIL</label>
          <input type='text' id='user' name='user' title='Username' />
          <span id='valida' class='i i-warning'></span>
        </p>
      	  <p class='field'>
          <label for='pass'>PASSWORD</label>
          <input type='password' id='pass' name='pass' title='Password' />
          <span id='valida' class='i i-close'></span>
        </p>

          <label class='checkbox'>
            <input type='checkbox' value='TRUE' title='Keep me Signed in' /> Keep me Signed in
          </label>

        	<input type='submit' id='do_login' value='GET STARTED' title='Get Started' />
      </div>
    </div>
  </div>
</div>
