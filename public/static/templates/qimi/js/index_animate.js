define(/* 'animate', */function animate(load,exports){require=load;load=load.async;
  function load_deps(){
    return $.Deferred(function(p){
      load([ 'animate.css', 'inview.js' ], p.resolve )
    })
  }
  var inviewEvent = 'inview'
  var scrollEvent = exports.scrollEvent = 'scroll'
  var animationDataKey = 'animation'
  var default_animation = 'fadeInUp'
  var $window = $('window')
  /**
   * @param {JQuery} inviewElement 
   * @param {string|[string,string,number][]} animation 
   * @param {number} interval
   */
  function Animate(inviewElement,animation,interval){
    inviewElement = $(inviewElement)
    if(!inviewElement.length){
      // throw new Error(inviewElement.selector+' is not exist.')
    }
    interval = interval || 0.3
    animation = animation || default_animation
    var animationElems = $()
    /**
     * @param {JQuery} elems 
     * @param {string} animation 
     */
    function push(elems,animation,children_interval){
      elems = elems.filter(':visible')/* .filter(':not(:empty)') */
      children_interval = children_interval || interval
      function delay(){
        return elems.index(this) * children_interval + 's'
      }
      elems.addClass('met_hidden')
      .css({
        animationDelay:delay,
        webkitAnimationDelay:delay
      })
      .data(animationDataKey,animation)
      animationElems = animationElems.add(elems)
    }
    switch (true) {
      case $.isArray(animation):
        $.each(animation,function(index,arr){
          var selector = arr[0]
          var animation = arr[1] || default_animation
          var animationElem = inviewElement.find(selector)
          if(!animationElem.length){
            animationElem = $(selector)
          }
          push(animationElem,animation,arr[2])
        })
        break
      case typeof animation === 'string':
        push(inviewElement,animation)
        break
      default:
        break
    }
    $.when(
      $.Deferred(function(p){ animationElems.length ? p.resolve() : p.reject() })
    )
    .then( load_deps )
    .then(function(){
      inviewElement.one(inviewEvent,function(){
        animationElems.removeClass('met_hidden').addClass('animated')
        .addClass(function(){
          return $(this).data(animationDataKey)
        })
      })
    })
    .then(function(){
      if(exports.lock){
        return
      }
      $window.trigger(scrollEvent)
    })
    return Animate
  }
  exports.Animate = Animate
  exports.lock = false

  //index animation
  Animate('.index_about',[
    ['.index_about .main>*','fadeInUp' ],
    ['.index_about .others a','fadeInRight']
  ])
  Animate('.index_product .item','fadeInUp')
  //使用方式


  Animate($('.product_list ul').filter(':not(.clone)').first().find('li'), 'fadeInUp')
  Animate('.about_txt','fadeInRight')
  Animate('.message_bai', 'fadeInUp')
  Animate('.qimi_index_product','fadeInLeft')
  Animate('.tem_index_about','fadeInRight')
  Animate(".aboutus", 'fadeInUp')
  Animate(".tem_index_case", 'fadeInUp')
})