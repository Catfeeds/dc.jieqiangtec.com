_onPageLoaded(function(){var c=_q(".topSearch");if(c){var b=_q("div p input[type=text]",c),f=b.parentNode,g=f.parentNode,a=parseInt(MData(c,"indent"));g.addEventListener("click",function(d){if(d.target.nodeName.toLowerCase()=="div"){b.focus()}},false);f.addEventListener("click",function(d){b.focus()},false);b.addEventListener("focus",function(d){_addClass(c,"focus");e(d)});b.addEventListener("blur",function(d){_removeClass(c,"focus");e(d)});document.addEventListener("touchmove",function(h){var i=h.target,d=true;while(i.parentNode){if(i.className.indexOf("topSearch")>-1){d=false;break}i=i.parentNode}if(d){_q(".topSearch input[type=text]").blur();e()}});function e(d){if(!_env.ios){return}if(d&&d.type&&d.type=="focus"){window.ts_itv1=setInterval(function(){_forEach(".topSearch",function(h){h.style.position="absolute";h.style.top=_q("body").scrollTop+"px"})},50)}else{clearInterval(window.ts_itv1);_forEach(".topSearch",function(h){h.style.position="fixed";h.style.top=0})}}}_fixedStyleHook(true);_resizeHandler();window.addEventListener("resize",_resizeHandler)});function _resizeHandler(h){if(_env.ios){if(!"_oldPW1" in window){window._oldPW1=window.innerWidth}if(window._oldPW1==window.innerWidth){return}else{window._oldPW1=window.innerWidth}}var d=window.innerWidth,c=_q("body"),b=d-parseInt(_getRealStyle(c,"paddingLeft"))-parseInt(_getRealStyle(c,"paddingRight"));c.style.width=b+"px";c=null;var g=_q(".topSearch");if(g){var f=_q("div p input[type=text]",g),a=parseInt(MData(g,"indent"));g.style.width=d+"px";f.style.width=(window.innerWidth-a)+"px"}};