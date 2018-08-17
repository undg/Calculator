// I need to use javascript to resize font size on display__top
// I can't know how long this line will by so can't do it in css
// I don't see a reason to use jquery here and make js heavier

/* exported fontSize */
/* global dbg */
var fontSize = {
  init: function(){
    'use strict'
    dbg('It.fontSize.init()')
    if(!this.elements.displayTop){
      console.error('missing element elements.displayTop')
      return
    }

    this.reset()
    this.resizeText(this.elements.displayTop)
  },

  elements: {
    displayTop: document.querySelector('[data-fontSize]')
  },

  isOverflow: function(el){
    'use strict'
    return el.scrollHeight > el.clientHeight || el.scrollWidth > el.clientWidth;
  },

  resizeText: function(el){
    'use strict'
    if(!this.isOverflow(el)){
      dbg('not overflow')
      return
    }
    dbg('is overflow')

    var fontSize = parseInt(window.getComputedStyle(el, null)
                                  .getPropertyValue('font-size')) * 0.9
    this.elements.displayTop.style.fontSize = fontSize + "px"
    this.resizeText(el)
  },

  reset: function(){
    'use strict'
    this.elements.displayTop.style = ''
  }
  
}
