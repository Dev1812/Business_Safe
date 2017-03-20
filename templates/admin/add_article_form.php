<div id="admin">
  <div class="admin_wrap">
    <div class="add_article">
      <div class="admin_title">Создание статьи</div>
      <div class="admin_body">
        <?php
          if((isset($add_article) && !empty($add_article)) || is_array($add_article)) {
            if(!empty($add_article['err_msg']) || !empty($add_article['text'])) {
        ?>
          <div class="form_msg"><?=!empty($add_article['err_msg']) ? $add_article['err_msg'] : $add_article['text'];?></div>
        <?php
            }
          }
        ?>
        <FORM action="/admin?act=add_article" method="POST">
          <div class="label">Заголовок</div>
          <div class="input_wrap">
            <input type="text" class="text_field" name="article_title" placeholder="Введите заголовок" autofocus="on">
          </div>
          <div class="label">Текст</div>
          <div class="input_wrap">
            <TEXTAREA class="text_field" name="article_text" placeholder="Введите текст" style="height:57px;"></TEXTAREA>
          </div>
          <div onclick="toggle('tab');" style="padding:4px 0 7px;cursor:pointer;color:#808080;">
            Для создания статей предусмотрены специальные теги<br>
            <span style="border-bottom:1px soflid #808080;">посмотреть теги >></span>
          </div>


          <div id="tab" style="display:none;">
            <b>&lt;text_block&gt;</b> - блок-абзац для отделения блоков текста<br>
            <b>&lt;!text_block&gt;</b> - конец блока-абзаца<br>
            <b>&lt;br&gt;</b> - отступ<br>
            <b>&lt;b&gt;</b> - крупный шрифт<br>
            <b>&lt;!b&gt;</b> - конец крупного шрифта<br>
            <b>&lt;ul&gt;</b> - маркированный список<br>
            <b>&lt;!ul&gt;</b> - конец маркированного списка<br>
            <b>&lt;li&gt;</b> - элемент маркированого списка<br>
            <b>&lt;!li&gt;</b> - конец элемента маркированого списка<br>            
          </div>

          <div class="input_wrap">
            <input type="submit" class="submit button" name="article_submit">
          </div>
        </FORM>
      </div>
    </div>
  </div>
</div>
<link rel="stylesheet" type="text/css" href="/css/admin.css?1">