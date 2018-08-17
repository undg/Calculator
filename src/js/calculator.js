/* exported calculator */
/* global dbg, testSelectors */
var calculator = {
  init: function(){
    "use strict"
    dbg("It.calculator.init()")

    // I can forEach it, but with only 2 elements readability is better.
    testSelectors(this.elements.btn)
    testSelectors(this.elements.display)
  },
  elements: {
    btn: {
      // Selecting elements by [class] or [id] is risky.
      // Someone can remove it while working with css and html
      // [data] is a signal that JS have to do some work here
      // Plus [data] can have a [value], what is super useful
      num      : document.querySelectorAll('[data-num]'),
      operator : document.querySelectorAll('[data-operator]'),
      ac       : document.querySelectorAll('[data-ac]'),
      save     : document.querySelectorAll('[data-save]')
    },
    display:{
      top    : document.querySelectorAll('[data-display]'),
      bottom : document.querySelectorAll('[data-display]')
    }
  }
}
