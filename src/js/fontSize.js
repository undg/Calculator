// I need to use javascript to resize font size on display
// I can't know how long this line will by so can't do it in css
// I don't see a reason to use jquery here and make js heavier

/* exported fontSize */
/* global dbg */
var fontSize = {
  init: function(){
    'use strict'
    dbg('fontSize.init()')
    if(!this.elements.displayTop){
      console.warn('missing element elements.displayTop')
      return
    }
    if(!this.elements.displayBottom){
      console.warn('missing element elements.displayBottom')
      return
    }

    this.elements.display.forEach(function(el){this.reset(el)}.bind(this))
    this.elements.display.forEach(function(el){this.resizeText(el)}.bind(this))
  },

  elements: {
    display       : document.querySelectorAll('[data-fontSize]'),
    displayTop    : document.querySelectorAll('[data-fontSize]')[0],
    displayBottom : document.querySelectorAll('[data-fontSize]')[1]
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
    el.style.fontSize = fontSize + "px"
    this.resizeText(el)
  },

  reset: function(el){
    'use strict'
    el.style = ''
  }
  
}
