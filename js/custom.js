/*	 
	Applys when

		'bc.inview.on'
		'bc.inview.partial'
		'bc.inview.off' 

	is inview base constructor for extend

*/

+function ($) {

  function inviewMe_slickAutoPlay__on(ele){ 
    if( ele.attr('data-is-inview-once') ){
      ele.addClass('is-inview-once');
    }
    ele.find('[data-is-inview-once]').each(function(){
      $(this).addClass('is-inview-once'); 
    }); 
    
    
    if( !ele.hasClass('is-autoplay') ){ 
    	ele.addClass('is-autoplay');  
      ele.slick('play'); 
    } 
  }
  
  function inviewMe_slickAutoPlay__off(ele){ 
  	ele.removeClass('is-autoplay');
  	ele.slick('pause'); 
    if( !ele.hasClass('is-inview-once') ){   

    }   
  } 

  $('[data-is-inview="slickAutoPlay"]').on('bc.inview.on', function(){ 
    inviewMe_slickAutoPlay__on($(this)); 
  });
  $('[data-is-inview="slickAutoPlay"]').on('bc.inview.partial', function(){
    if($(this).attr('data-is-inview')!='detect-partial'){
      inviewMe_slickAutoPlay__on($(this));
    }  
  }); 
  $('[data-is-inview="slickAutoPlay"]').on('bc.inview.off', function(){ 
    inviewMe_slickAutoPlay__off($(this)); 
  }); 

}(jQuery);

+function(t){     

  var btn_line = $('.btn-line');
  btn_line.each(function(){
    if( !$(this).hasClass('js') ){
      $(this).addClass('js');
      $(this).prepend('<i>');
    }
  });

}(jQuery); 

!function(){var u,l,c,o={frameRate:50,animationTime:500,stepSize:100,pulseAlgorithm:!0,pulseScale:4,pulseNormalize:1,accelerationDelta:50,accelerationMax:3,keyboardSupport:!0,arrowScroll:50,touchpadSupport:!1,fixedBackground:!0,excluded:""},v=o,s=!1,d=!1,n={x:0,y:0},m=!1,f=document.documentElement,a=[],i=/^Mac/.test(navigator.platform),w={left:37,up:38,right:39,down:40,spacebar:32,pageup:33,pagedown:34,end:35,home:36},h={37:1,38:1,39:1,40:1};function p(){if(!m&&document.body){m=!0;var e=document.body,t=document.documentElement,o=window.innerHeight,n=e.scrollHeight;if(f=0<=document.compatMode.indexOf("CSS")?t:e,u=e,v.keyboardSupport&&N("keydown",S),top!=self)d=!0;else if(J&&o<n&&(e.offsetHeight<=o||t.offsetHeight<=o)){var r,a=document.createElement("div");a.style.cssText="position:absolute; z-index:-10000; top:0; left:0; right:0; height:"+f.scrollHeight+"px",document.body.appendChild(a),c=function(){r||(r=setTimeout(function(){s||(a.style.height="0",a.style.height=f.scrollHeight+"px",r=null)},500))},setTimeout(c,10),N("resize",c);if((l=new P(c)).observe(e,{attributes:!0,childList:!0,characterData:!1}),f.offsetHeight<=o){var i=document.createElement("div");i.style.clear="both",e.appendChild(i)}}v.fixedBackground||s||(e.style.backgroundAttachment="scroll",t.style.backgroundAttachment="scroll")}}var y=[],b=!1,r=Date.now();function g(m,f,w){if(function(e,t){e=0<e?1:-1,t=0<t?1:-1,n.x===e&&n.y===t||(n.x=e,n.y=t,y=[],r=0)}(f,w),1!=v.accelerationMax){var e=Date.now()-r;if(e<v.accelerationDelta){var t=(1+50/e)/2;1<t&&(t=Math.min(t,v.accelerationMax),f*=t,w*=t)}r=Date.now()}if(y.push({x:f,y:w,lastX:f<0?.99:-.99,lastY:w<0?.99:-.99,start:Date.now()}),!b){var h=m===document.body,p=function(e){for(var t,o=Date.now(),n=0,r=0,a=0;a<y.length;a++){var i=y[a],l=o-i.start,c=l>=v.animationTime,u=c?1:l/v.animationTime;v.pulseAlgorithm&&(u=V(u));var s=i.x*u-i.lastX>>0,d=i.y*u-i.lastY>>0;n+=s,r+=d,i.lastX+=s,i.lastY+=d,c&&(y.splice(a,1),a--)}h?window.scrollBy(n,r):(n&&(m.scrollLeft+=n),r&&(m.scrollTop+=r)),document.createEvent?(t=document.createEvent("HTMLEvents")).initEvent("smoothScrollCustomEvent",!0,!0):(t=document.createEventObject()).eventType="smoothScrollCustomEvent",t.eventName="smoothScrollCustomEvent",document.createEvent?window.dispatchEvent(t):window.fireEvent("on"+t.eventType,t),f||w||(y=[]),y.length?j(p,m,1e3/v.frameRate+1):b=!1};j(p,m,0),b=!0}}function e(e){m||p();var t=e.target;if(e.defaultPrevented||e.ctrlKey)return!0;if(Y(u,"embed")||Y(t,"embed")&&/\.pdf/i.test(t.src)||Y(u,"object")||t.shadowRoot)return!0;var o=-e.wheelDeltaX||e.deltaX||0,n=-e.wheelDeltaY||e.deltaY||0;i&&(e.wheelDeltaX&&A(e.wheelDeltaX,120)&&(o=e.wheelDeltaX/Math.abs(e.wheelDeltaX)*-120),e.wheelDeltaY&&A(e.wheelDeltaY,120)&&(n=e.wheelDeltaY/Math.abs(e.wheelDeltaY)*-120)),o||n||(n=-e.wheelDelta||0),1===e.deltaMode&&(o*=40,n*=40);var r=H(t);return r?!(v.touchpadSupport||!function(e){if(!e)return;a.length||(a=[e,e,e]);return e=Math.abs(e),a.push(e),a.shift(),clearTimeout(k),k=setTimeout(function(){try{localStorage.SS_deltaBuffer=a.join(",")}catch(e){}},1e3),!B(120)&&!B(100)}(n))||(1.2<Math.abs(o)&&(o*=v.stepSize/120),1.2<Math.abs(n)&&(n*=v.stepSize/120),g(r,o,n),e.preventDefault(),void T()):!d||!W||(Object.defineProperty(e,"target",{value:window.frameElement}),parent.wheel(e))}function S(e){var t=e.target,o=e.ctrlKey||e.altKey||e.metaKey||e.shiftKey&&e.keyCode!==w.spacebar;document.body.contains(u)||(u=document.activeElement);var n=/^(button|submit|radio|checkbox|file|color|image)$/i;if(e.defaultPrevented||/^(textarea|select|embed|object)$/i.test(t.nodeName)||Y(t,"input")&&!n.test(t.type)||Y(u,"video")||function(e){var t=e.target,o=!1;if(-1!=document.URL.indexOf("www.youtube.com/watch"))do{if(o=t.classList&&t.classList.contains("html5-video-controls"))break}while(t=t.parentNode);return o}(e)||t.isContentEditable||o)return!0;if((Y(t,"button")||Y(t,"input")&&n.test(t.type))&&e.keyCode===w.spacebar)return!0;if(Y(t,"input")&&"radio"==t.type&&h[e.keyCode])return!0;var r=0,a=0,i=H(u);if(!i)return!d||!W||parent.keydown(e);var l=i.clientHeight;switch(i==document.body&&(l=window.innerHeight),e.keyCode){case w.up:a=-v.arrowScroll;break;case w.down:a=v.arrowScroll;break;case w.spacebar:a=-(e.shiftKey?1:-1)*l*.9;break;case w.pageup:a=.9*-l;break;case w.pagedown:a=.9*l;break;case w.home:a=-i.scrollTop;break;case w.end:var c=i.scrollHeight-i.scrollTop-l;a=0<c?10+c:0;break;case w.left:r=-v.arrowScroll;break;case w.right:r=v.arrowScroll;break;default:return!0}g(i,r,a),e.preventDefault(),T()}function t(e){u=e.target}var x,E,k,D=(x=0,function(e){return e.uniqueID||(e.uniqueID=x++)}),M={};function T(){clearTimeout(E),E=setInterval(function(){M={}},1e3)}function C(e,t){for(var o=e.length;o--;)M[D(e[o])]=t;return t}function H(e){var t=[],o=document.body,n=f.scrollHeight;do{var r=M[D(e)];if(r)return C(t,r);if(t.push(e),n===e.scrollHeight){var a=L(f)&&L(o)||O(f);if(d&&z(f)||!d&&a)return C(t,R())}else if(z(e)&&O(e))return C(t,e)}while(e=e.parentElement)}function z(e){return e.clientHeight+10<e.scrollHeight}function L(e){return"hidden"!==getComputedStyle(e,"").getPropertyValue("overflow-y")}function O(e){var t=getComputedStyle(e,"").getPropertyValue("overflow-y");return"scroll"===t||"auto"===t}function N(e,t,o){var n=o||!1;window.addEventListener(e,t,n)}function X(e,t,o){var n=o||!1;window.removeEventListener(e,t,n)}function Y(e,t){return(e.nodeName||"").toLowerCase()===t.toLowerCase()}if(window.localStorage&&localStorage.SS_deltaBuffer)try{a=localStorage.SS_deltaBuffer.split(",")}catch(e){}function A(e,t){return Math.floor(e/t)==e/t}function B(e){return A(a[0],e)&&A(a[1],e)&&A(a[2],e)}var K,j=window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(e,t,o){window.setTimeout(e,o||1e3/60)},P=window.MutationObserver||window.WebKitMutationObserver||window.MozMutationObserver,R=function(){if(!K){var e=document.createElement("div");e.style.cssText="height:10000px;width:1px;",document.body.appendChild(e);var t=document.body.scrollTop;document.documentElement.scrollTop,window.scrollBy(0,3),K=document.body.scrollTop!=t?document.body:document.documentElement,window.scrollBy(0,-3),document.body.removeChild(e)}return K};function q(e){var t;return((e*=v.pulseScale)<1?e-(1-Math.exp(-e)):(e-=1,(t=Math.exp(-1))+(1-Math.exp(-e))*(1-t)))*v.pulseNormalize}function V(e){return 1<=e?1:e<=0?0:(1==v.pulseNormalize&&(v.pulseNormalize/=q(1)),q(e))}var F,I=window.navigator.userAgent,_=/Edge/.test(I),W=/chrome/i.test(I)&&!_,$=/safari/i.test(I)&&!_,U=/mobile/i.test(I),G=/Windows NT 6.1/i.test(I)&&/rv:11/i.test(I),J=$&&(/Version\/8/i.test(I)||/Version\/9/i.test(I)),Q=(W||$||G)&&!U;function Z(e){for(var t in e)o.hasOwnProperty(t)&&(v[t]=e[t])}"onwheel"in document.createElement("div")?F="wheel":"onmousewheel"in document.createElement("div")&&(F="mousewheel"),F&&Q&&(window.isSmoothScroll=!0,N(F,e,{passive:!1}),N("mousedown",t),N("load",p)),Z.destroy=function(){l&&l.disconnect(),X(F,e,{passive:!1}),X("mousedown",t),X("keydown",S),X("resize",c),X("load",p)},window.SmoothScrollOptions&&Z(window.SmoothScrollOptions),"function"==typeof define&&define.amd?define(function(){return Z}):"object"==typeof exports?module.exports=Z:window.SmoothScroll=Z}();