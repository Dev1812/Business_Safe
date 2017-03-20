var Articles = {
  getMore: function() {
    var offset = ge('offset');
    ajax.get({
      url: '/articles?act=a_get_more&offset='+offset.value,
      showProgress: function() {
        hide('load_more_text');
        show('load_more_upload');
      },
      hideProgress: function() {
        show('load_more_text');
        hide('load_more_upload');
      },
      success: function(obj) {
        if(obj.html) {
          var div = document.createElement('div');
          div.innerHTML = obj.html;
          ge('articles_wrap').appendChild(div);
        }
        if(!obj.has_more) {
          hide('load_more');
        }
        if(obj.offset) {
          offset.value = obj.offset;
        }
      }
    });
  }
}