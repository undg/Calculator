/* exported calculator */
/* global dbg, testSelectors */
var calculator = {
  init: function(){
    'use strict'
    dbg('calculator.init()')

    this.createEvents()
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
      numbers   : document.querySelectorAll('[data-num]'),
      operators : document.querySelectorAll('[data-operator]'),
      ac        : document.querySelectorAll('[data-ac]'),
      save      : document.querySelectorAll('[data-save]')
    },
    display:{
      top    : document.querySelectorAll('[data-display="top"]'),
      bottom : document.querySelectorAll('[data-display="bottom"]')
    },
  },

  storage: {
    calculation: [],
    lastOperation: '',
  },

  createEvents: function(){
    'use strict'
    var that = this
    function createBtnsArr(arr, item){
      arr.push(item)
      return arr
    }

    var numArr = Object.values(this.elements.btn.numbers).reduce(createBtnsArr, [])
    testSelectors(numArr)
    numArr.forEach(function(item){
      var value = item.dataset.num
      item.addEventListener('click', function(e){
        e.preventDefault()
        that.renderDisplay(value, 'number')
      })
    })

    var operatorsArr = Object.values(this.elements.btn.operators).reduce(createBtnsArr, [])
    testSelectors(operatorsArr)
    operatorsArr.forEach(function(item){
      var value = item.dataset.operator
      item.addEventListener('click', function(e){
        e.preventDefault()
        that.renderDisplay(value, 'operator')
      })
    })

  },

  updateCalcArr: function(calcArr, value, type){
    'use strict'
    dbg('type:', type)
    var lastIdx = calcArr.length - 1
    if(type === 'operator'){
      if(calcArr.length === 0){
        this.storage.lastOperation = type
        return // break function as fast as it is possible
      }
      value = " " + value + " "
      if(this.storage.lastOperation === type){
        this.storage.lastOperation = type
        calcArr[lastIdx] = value
        return
      }
      this.storage.lastOperation = type
      calcArr.push(value)
      return
    }

    if(type === 'number'){
      // append digit, create number
      if(this.storage.lastOperation === type){
        calcArr[lastIdx] += value
        this.storage.lastOperation = type
        return
      }
      calcArr.push(value)
      this.storage.lastOperation = type
      return
    }

  },

  calcArrToStr: function(){

  },
  
  renderDisplay: function(value, type){
    'use strict'

    this.updateCalcArr(this.storage.calculation, value, type)
    dbg(this.storage.calculation)


    this.elements.display.top[0].textContent = this.storage.calculation
    this.elements.display.top[1].value = this.storage.calculation
  }

}
