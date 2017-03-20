function toggleSystemInfo(el_status, el) {
  if(!el_status) return false;
  if(el_status == 'show') {
    show('system_info_hide');
    hide('system_info_show');
    show('system_info');
  } else if(el_status == 'hide') {
    show('system_info_show');
    hide('system_info_hide');
    hide('system_info');
  }
}
function setSystemInfo() {
  ge('brower_name').innerHTML = navigator.appName || 'Netscape';
  ge('oc').innerHTML = navigator.platform  || 'Linux';
  ge('system_lang').innerHTML = navigator.language || 'ru';
  ge('display_width').innerHTML = screen.width || 0;
  ge('display_height').innerHTML = screen.height || 0;
  ge('screen_resolution').innerHTML = screen.pixelDepth || '0x0';
}
setTimeout('setSystemInfo()', 10);