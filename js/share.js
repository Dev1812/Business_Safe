/**
 * @author Issaev Timur
 * @date 15.03.2017
 *
 */
function createPopupWindow(url) {
  window.open(url,'','toolbar=0,status=0,width=626,height=436');
}
var Share = {
  share_url: null,
  share_title: null,
  share_text: null,
  share_img: null,
  init: function(share_url, share_title, share_text, share_img) {
    if(!share_url || !share_title) return false;
	  this.share_url = share_url;
	  this.share_title = share_title;
	  this.share_text = share_text || share_title;
	  this.share_img = share_img || '/images/icons/favicon_gray.ico';
  },
  vk: function() {
    url  = 'http://vk.com/share.php?';
    url += 'url='          + encodeURIComponent(this.share_url);
    url += '&title='       + encodeURIComponent(this.share_title);
    url += '&description=' + encodeURIComponent(this.share_text);
    url += '&image='       + encodeURIComponent(this.share_img);
    url += '&noparse=true';
    createPopupWindow(url);
  },
  ok: function() {
	  url  = 'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1';
    url += '&st.comments=' + encodeURIComponent(this.share_text);
    url += '&st._surl='    + encodeURIComponent(this.share_url);
    createPopupWindow(url);
  },
  fb: function() {
    url  = 'http://www.facebook.com/sharer.php?s=100';
    url += '&p[title]='     + encodeURIComponent(this.share_title);
    url += '&p[summary]='   + encodeURIComponent(this.share_text);
    url += '&p[url]='       + encodeURIComponent(this.share_url);
    url += '&p[images][0]=' + encodeURIComponent(this.share_img);
    createPopupWindow(url);
  },
  twitter: function() {
    url  = 'http://twitter.com/share?';
    url += 'text='      + encodeURIComponent(this.share_title);
    url += '&url='      + encodeURIComponent(this.share_url);
    url += '&counturl=' + encodeURIComponent(this.share_url);
    createPopupWindow(url);
  }
}