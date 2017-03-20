var BuisnessSafe = {
  nav_active: 'nav_link_0',
  nav_active_class: 'nav_link_active',
  text_active: 'bs_text_0',
  toggleNavMenu: function(el, el_id) {
	  if(!el || !el_id) return false;
	  if(this.nav_active) {
	    removeClass(this.nav_active, this.nav_active_class); 
	  }
    addClass(el, this.nav_active_class);
    this.nav_active = el_id;
  },
  toggleText: function(el_id) {
    if(this.text_active == 'bs_text_0' && el_id == 'nav_link_1') {
      hide('bs_text_0');
      show('bs_text_1');
	    this.text_active = 'bs_text_1';
    } else if(this.text_active == 'bs_text_1' && el_id == 'nav_link_0') {
      show('bs_text_0');
      hide('bs_text_1');
	  this.text_active = 'bs_text_0';
    }  
  }
}
function toggleTextBlock(el, el_id) {
  BuisnessSafe.toggleNavMenu(el, el_id);
  BuisnessSafe.toggleText(el_id);
}
setTimeout("ToTop.init()",10);