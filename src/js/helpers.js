// My everyday snippets

/* exported dbg, testSelectors */
function dbg(){
  "use strict"
  var isDebug = parseInt(window.localStorage.getItem('debug'))
  if(isDebug){
    console.log.apply(null, arguments)
  } 
  // turn it on in your browser by
  // setting debug item in your local storage 
  // window.localStorage.setItem('debug',1) 
} 
function testSelectors(selectors){
  "use strict"
  Object.keys(selectors).forEach(function(item){
    if(selectors[item].length === 0){ console.error("css class missing for: " + "selectors."+item) }
  })
} 

