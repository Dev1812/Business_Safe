<div id="admin">
  <div class="admin_wrap">
    <div class="admin_title">Вход в Админ-панель</div>
    <div class="admin_body">
      
      <?php
        if((isset($login) && !empty($login)) || is_array($login)) {
          if($login['err'] == true) {
          	if($login['err_msg']) {
      ?>
        <div class="form_msg"><?=$login['err_msg'];?></div>
      <?php
          	}
          }
        }
      ?>
      <FORM action="/admin" method="POST">
        <div class="label">Ваш логин</div>
        <div class="input_wrap">
          <input type="text" class="text_field" name="admin_email" placeholder="Введите логин" autofocus="on">
        </div>
        <div class="label">Ваш пароль</div>
        <div class="input_wrap">
          <input type="text" class="text_field" name="admin_password" placeholder="Введите пароль">
        </div>
        <div class="input_wrap">
          <input type="submit" class="submit button" name="admin_submit" value="Отправить">
        </div>
      </FORM>
    </div>
  </div>
</div>
<link rel="stylesheet" type="text/css" href="/css/admin.css?1">