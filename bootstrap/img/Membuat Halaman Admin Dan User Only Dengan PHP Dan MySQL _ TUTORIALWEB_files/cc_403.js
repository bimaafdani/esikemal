(function(){var n="0.1.34",t,a="undefined",e=25,r=parseInt(1e3/e),o=t,i={"function":!0,object:!0},s={DEBUG_MODE:!1,counterID:"403",instanceID:"externalConf###Instanceid"},u=function(n){return typeof n!==a},c="HISTATS_CANVAS_DEBUG_ON";s.DEBUG_MODE=u(window[c])&&1==window[c];var l=function(){return s.instanceID},f="_HistatsCounterGraphics_",d,h=function(){return f+s.counterID},p=function(n){return!("string"!=typeof n||""==n)},v=function(){try{s.DEBUG_MODE&&u(console)&&console.log.apply(this,arguments)}catch(n){}},b=function(a,e){var i=a||{};try{var c=function(n){var t="autostart";return"undefined"!=typeof n[t]&&n[t]===!0},l={ANIMATION_RUNNING_STATUS:!0,ANIMATION_STARTED:!1,AUTOSTART:c(i),_STOPPED:!1,INSTANCE_ID:"-"+parseInt(1e4*Math.random())},f=function(){return l.INSTANCE_ID},p=100,b=1,m=function(){return e.document},g=function(n){return u(n)&&!!m().getElementById(n)},A=function(n){o=e.setTimeout(n,r)},w=e.requestAnimationFrame||e.webkitRequestAnimationFrame||e.mozRequestAnimationFrame||e.msRequestAnimationFrame||e.oRequestAnimationFrame||A,E=e["Date"]||{},I=function(n,t){for(var a in n)t.hasOwnProperty(a)&&(t[a]=n[a])};i.getInstanceID=f;var F=h();i.IS_HISTATS_CANVAS=!0,i.globalObjectName=F,i.$window=e;var y=function(n){return g(n)?m().getElementById(n):t},C={w:0,h:0,yBase:0,xBase:0,hasShadow:!1,hasLabel:!1,shadowOffsetX:2,shadowOffsetY:2,shadowBlur:1,doMouseOverOut:1},N={msLastFrameDrawn:0,msPerFrame:r,frameCounter:0,isInAnimationTransition:!1,animation_duration_inFrames:20,waitframesBetweenTwoAnimations:80,framesBetweenTwoAnimations:100,currentLoopFrame:0,autoTriggerTextChange_onFrame:t,customization:{}},T={domCanvasObject:null,canvas2dContext:null,canvasProperties:C},B=function(){var n={},a=n.hasOwnProperty,e=0,r=0,o={blockMessages:!1,recordMessages:!1,messageLog:[],printMessages:!1,messagePassedCount:0,subscribersCount:0,topicsCount:0,_topics:n},i=function(t){return a.call(n,t)},s=function(t){return o.printMessages&&console.log(f(),"addTopic",t),r++,o.topicsCount++,r>50&&v(f(),"Lot of topics registered!",t),n[t]=[]},u=function(t){return n[t]},c=function(t,a,r){o.printMessages&&console.log(f(),"subscribe",t,a,r),o.recordMessages&&o.messageLog.push(["subscribe",t,a,r]),r=r||p,i(t)||s(t);var c=u(t).push({callback:a,priority:a})-1;return e++,o.subscribersCount++,e>50&&v(f(),"Lot of topics registered!",t),{remove:function(){delete n[t][c]}}},l=function(n,t){var a="no-topic-found";n!=a&&d(a,{topic:n,info:t})},d=function(a,e){return o.messagePassedCount++,o.printMessages&&console.log(f(),"publish",a,e),o.recordMessages&&o.messageLog.push(["publish",a,e]),o.blockMessages?void 0:i(a)?(n[a].slice().sort(function(n,t){return n.priority-t.priority}).forEach(function(n){n.callback(e!=t?e:{})}),void 0):(l(a,e),void 0)},h=function(n,t){w(function(){d(n,t)})};return{subscribe:c,publish:d,publishAsync:h,debugObj:o}}(),S=function(){return s.counterID},M=function(){var n="siteId";return i[n]=i[n]||0},x=function(){var n="main_div_name";return i[n]||"histats_counter_"+M()+"_"+S()},O=[],k=function(){return d=x(),d},D=function(){return k()+"_canvas"},L=function(){return"http://www.histats.com/viewstats/?sid="+M()+"&ccid="+S()},G=function(){e.location=L()},q=function(){if(1==T.canvasProperties.doMouseOverOut){var n=_().canvasProperties;n.yBase=2,n.xBase=2,n.shadowOffsetX=0,n.shadowOffsetY=0}_().domCanvasObject.style.cursor="pointer"},R=function(){if(1==T.canvasProperties.doMouseOverOut){var n=_().canvasProperties;n.yBase=0,n.xBase=0,n.shadowOffsetX=2,n.shadowOffsetY=2}},V=function(){var n=_(),t=n.canvasProperties,a=n.canvas2dContext;a.shadowOffsetX=t.shadowOffsetX,a.shadowOffsetY=t.shadowOffsetY,a.shadowBlur=t.shadowBlur,a.shadowColor="rgba(0,0,0,0.2)"},H=function(){return y(k())},P=function(){var n=!!H();return n},U=function(){try{if(!P())return B.publish("error",{msg:"validateDomcontainer not found"}),void 0;var n=H(),t=_().canvasProperties,a='<canvas id="'+D()+'" width="'+t.w+'" height="'+t.h+'" ></canvas>',r='<a href="'+L()+'" target="_blank">'+a+"</a>";n.innerHTML=r,_().domCanvasObject=y(D());var o=_().domCanvasObject;_().canvas2dContext=o.getContext("2d"),"addEventListener"in e?(o.addEventListener("mouseover",function(){q()}),o.addEventListener("mouseout",function(){R()})):o.onclick=function(){G()}}catch(i){v(f(),"drawCanvas",i)}},Q=function(){try{if(l.ANIMATION_STARTED)return;if(l._STOPPED)return;B.publish("draw-callback-requested-reconfiguration",{}),B.publish("starting_pre",{context:i}),l.ANIMATION_STARTED=!0,B.publish("started",{context:i}),B.publish("drawcanvas_pre",{context:i}),U(),B.publish("drawcanvas_post",{context:i}),Z(),B.publish("animationLoop_started",{context:i})}catch(n){v(f(),"startNow",n,n.message)}},K=function(n,t,a){t.addEventListener?t.addEventListener(n,a,!1):t.attachEvent?t.attachEvent("on"+n,a):t[n]=a},Y=function(){try{B.publish("appendedStart",{context:i,type:"animFrame"}),w(Q)}catch(n){v(f(),"startAsap",n.message,n)}},j=function(n,t){O.push({name:n,callback:t})},z=function(){},J=function(){O.forEach(function(n){n.callback(i.getCanvas2dContext(),N,_())})},X=function(){u(o)&&e.clearTimeout(o)},Z=function(){l._STOPPED||w(function(){tn(J),l.ANIMATION_RUNNING_STATUS&&Z()})};B.subscribe("setAnimationProperties",function(n){I(n,N)}),B.subscribe("draw-callback-publish-reconfiguration",function(n){try{n.canvasCallbacks.forEach(function(n){O.push({name:n.name,callback:n.cb,priority:n.priority})}),O=O.slice().sort(function(n,t){return n.priority-t.priority})}catch(t){v(f(),"animationLoop",t.message,t)}}),B.subscribe("configuration-changed",function(n){O=[],B.publish("draw-callback-requested-reconfiguration",{})});var W=function(n){var t=n!=l.ANIMATION_RUNNING_STATUS;return t&&(0==l.ANIMATION_RUNNING_STATUS&&1==n,1==l.ANIMATION_RUNNING_STATUS&&0==n&&X(),l.ANIMATION_RUNNING_STATUS=n),t},_=function(){return T},$=function(){var n=!1;0==N.frameCounter&&B.publish("FIRST-FRAME",{});var t=E.now(),a=t-N.msLastFrameDrawn;if(a>N.msPerFrame){var e=a%N.msPerFrame;N.msLastFrameDrawn=t-e,n=!0}return n},nn=function(){if(!(N.animation_duration_inFrames<1)){var n=N.animation_duration_inFrames+N.waitframesBetweenTwoAnimations;N.currentLoopFrame=N.frameCounter%n;var t=0==N.currentLoopFrame,a=N.currentLoopFrame>=N.animation_duration_inFrames;t&&(N.isInAnimationTransition=!0,B.publish("drawing-triggered-animation-start",N)),a&&N.isInAnimationTransition&&(N.isInAnimationTransition=!1,B.publish("drawing-triggered-animation-end",N))}},tn=function(n){var t=$();t&&(N.frameCounter++,nn(),n())},an=function(n){return n(i.getCanvas2dContext())},en=function(){var n=17,t=2,a=1,e=_().canvasProperties,r=0;e.hasShadow&&(r=r+t+a),e.hasLabel&&(e.h=e.h+n),e.w=e.w+r,e.h=e.h+r},rn=function(n){I(n,_().canvasProperties),en()};B.subscribe("setCanvasProperties",rn,10);var on=function(){i.onCanvas2dContext(function(n){var t=_().canvasProperties;n.clearRect(0,0,t.w,t.h),t.hasShadow&&V()})};B.subscribe("clear-canvas-rectangle",on,10);var sn=function(n,t){_().hasShadow&&(n.shadowOffsetX=0,n.shadowOffsetY=0,n.shadowBlur=0,n.shadowColor="transparent")},un=function(n,a){a.autoTriggerTextChange_onFrame!==t&&a.currentLoopFrame==a.autoTriggerTextChange_onFrame&&B.publish("drawing-change-text",{})},cn=function(n){B.publish("draw-callback-publish-reconfiguration",{canvasCallbacks:[{cb:sn,priority:14,name:"stopApplyingShadowOnCanvas"},{cb:un,priority:5,name:"autoUpdateText"}]})};B.subscribe("draw-callback-requested-reconfiguration",cn,15),i.__CODE_VERSION=n,i.getCanvasObject=_,i.getCanvas2dContext=function(){return _().canvas2dContext},i.onCanvas2dContext=an,i.getXYCanvas=function(){return{x:_().canvasProperties.xBase,y:_().canvasProperties.yBase}},i.addDrawCallback=j,i.getCanvasProperties=function(){return _().canvasProperties},i.setCanvasProperties=function(n){for(var t in n)n.hasOwnProperty(t)&&(T.canvasProperties[t]=n[t])},i.updateCanvasProperties=function(n){i.setCanvasProperties(n(_().canvasProperties))},i.getAnimationFrames=function(){return N.frameCounter},i.getAnimationControl=function(){return N},i.setAnimationControl=function(n){for(var t in n)n.hasOwnProperty(t)&&(N[t]=n[t])},i.start=Y,i.changeRunningStatus=W,i.getRunningStatus=function(){return l.ANIMATION_RUNNING_STATUS},i.eventBus=B,i.getDebugMode=function(){return s.DEBUG_MODE},function(){var n=this;n.IS_HISTATS_CANVAS||(n={});var a=n.statsText={},e={xBase:0,yBase:0},r=function(){return e},o=function(){var t=n.getXYCanvas();return e.xBase=t.x,e.yBase=t.y,e},i=[],s={stats_values:[],indexStatToShow:0,drawValueCallback:t,drawValueCallbackWithValue:t,drawMetricCallback:t},u=25,c=0,l=function(){return c%u==1},f=function(n){i=n};n.eventBus.subscribe("set-textbox-style",function(t){i=t,n.eventBus.publish("configuration-changed",{})}),n.eventBus.subscribe("canvas-drawValueFunction",function(n){"undefined"!=typeof n["transformationFunction"]&&(s.drawValueCallback=n["transformationFunction"])});function d(n,t,a,e){n=(n+"").replace(/[^0-9+\-Ee.]/g,"");var r=isFinite(+n)?+n:0,o=isFinite(+t)?Math.abs(t):0,i="undefined"==typeof e?",":e,s="undefined"==typeof a?".":a,u="",c=function(n,t){var a=Math.pow(10,t);return""+(Math.round(n*a)/a).toFixed(t)};return u=(o?c(r,o):""+Math.round(r)).split("."),u[0].length>3&&(u[0]=u[0].replace(/\B(?=(?:\d{3})+(?!\d))/g,i)),(u[1]||"").length<o&&(u[1]=u[1]||"",u[1]+=new Array(o-u[1].length+1).join("0")),u.join(s)}var h=function(a){if(s.stats_values=a,s.drawValueCallback!=t){var e=a[0].value;s.drawValueCallbackWithValue=s.drawValueCallback(e)}n.eventBus.publish("configuration-changed",{})},p=function(){return s.stats_values},v=function(n){if(n===s.stats_values)return!1;if(typeof n==typeof[])for(var t in n)if(n.hasOwnProperty(t)&&typeof n[t]!=typeof{})return!1;return!0},b=function(){return n.globalObjectName+"_setValues"},m=function(){if(l()){var t=b();if("undefined"!=typeof n.$window&&"undefined"!=typeof n.$window[t]){var a=n.$window[t];v(a)&&h(a)}}},g=function(n){return(""+n).match(/^\s*[0-9]+\s*$/)?d(n,0,""," "):n},A=function(t,a){return function(e){e.shadowColor="transparent",e.font=t.name.font,e.textAlign=t.name.align,e.fillStyle=t.name.color,e.fillText(a.name,t.name.x+r().xBase,t.name.y+r().yBase),e.font=t.value.font,e.textAlign=t.value.align,e.fillStyle=t.value.color;var o=a.value;try{o=g(a.value)}catch(i){n.debug(i)}e.fillText(o,t.value.x+r().xBase,t.value.y+r().yBase)}},w=function(){s.indexStatToShow+=i.length,s.indexStatToShow>=s.stats_values.length&&(s.indexStatToShow=0)},E=!1;n.eventBus.subscribe("draw-hideText",function(n){E=!0},11),n.eventBus.subscribe("draw-unHideText",function(n){E=!1},11);var I=function(n){if(!E){var t,a,e=s.indexStatToShow,r=p(),o=r.length;r.length>i.length&&(o=i.length);for(var u=0;o>u&&(e>=r.length&&(e=0),r[e]);u++)t=i[u],a=r[e],A(t,a)(n),e++}},F=function(n,a){return c++,m(),o(),s.drawValueCallbackWithValue!=t?(s.drawValueCallbackWithValue(n),void 0):(I(n),void 0)},y=function(t){n.eventBus.publish("draw-callback-publish-reconfiguration",{canvasCallbacks:[{cb:F,priority:15,name:"show_stats_draw"}]})};n.eventBus.subscribe("draw-callback-requested-reconfiguration",y,11);var C=n.eventBus.subscribe("drawing-change-text",w,10);a.draw=F,a.setBoxes=f,a.setValues=h}.call(i),function(){var n=this;n.IS_HISTATS_CANVAS||(n={});var a={main:"",source:t,loaded:!1};a.main="data:image/png;base64,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";var e=function(t){var e=a.source=new Image;e.onload=function(){a.loaded=!0,n.eventBus.publish("background-image-loaded",a),n.eventBus.publish("configuration-changed",{})},e.src=a.main};n.eventBus.subscribe("FIRST-FRAME",e,5),n.image_base64_src=a}.call(i),function(){var n=this;n.IS_HISTATS_CANVAS||(n={});var a=n.counter={};a.ID="403",a.properties={w:116,h:76,hasShadow:!0};var e=!1,r={backgroundImageObject:t},o={animation_duration_inFrames:20,autoTriggerTextChange_onFrame:10,waitframesBetweenTwoAnimations:110},i=[{name:{x:6,y:15,align:"left",color:"#ffcc00",font:"11px Arial"},value:{x:108,y:15,align:"right",color:"#ffcc00",font:"11px Arial"}},{name:{x:6,y:33,align:"left",color:"#ffffff",font:"11px Arial"},value:{x:108,y:33,align:"right",color:"#ffffff",font:"11px Arial"}},{name:{x:6,y:50,align:"left",color:"#ffcc00",font:"11px Arial"},value:{x:108,y:50,align:"right",color:"#ffcc00",font:"11px Arial"}},{name:{x:6,y:69,align:"left",color:"#ffffff",font:"11px Arial"},value:{x:108,y:69,align:"right",color:"#ffffff",font:"11px Arial"}}];n.eventBus.publish("set-textbox-style",i),n.eventBus.publish("setCanvasProperties",a.properties),n.eventBus.publish("setAnimationProperties",o);var s={alpha:{movementsPerFrame:1,min:0,max:100,cur:0}},u=function(n){var t=s;t.alpha.movementsPerFrame=(s.alpha.max-s.alpha.min)/(o.animation_duration_inFrames/2)};u(o.animation_duration_inFrames);var c=function(n){var t=n,a=0;if(!t.isInAnimationTransition)return a;var e=t.currentLoopFrame<t.animation_duration_inFrames/2,r=!e;return e&&(a=1),r&&(a=-1),a},l=function(n,t){var a=s,e=c(t);0==e?a.alpha.cur=a.alpha.min:f(n,e)},f=function(t,a){var e=s,o=n.getXYCanvas(),i=e.alpha.movementsPerFrame*a;e.alpha.cur=Math.max(Math.min(e.alpha.cur+i,e.alpha.max),e.alpha.min),t.save(),t.globalAlpha=e.alpha.cur/100,t.drawImage(r.backgroundImageObject.source,o.x,o.y),t.restore()},d=function(t,a){n.eventBus.publish("clear-canvas-rectangle",{});var e=n.getXYCanvas();t.drawImage(r.backgroundImageObject.source,e.x,e.y)},h=function(a){r.backgroundImageObject!=t&&n.eventBus.publish("draw-callback-publish-reconfiguration",{canvasCallbacks:[{cb:d,priority:10,name:"drawBackground"},{cb:l,priority:19,name:"drawAnimation"}]})};return n.eventBus.subscribe("draw-callback-requested-reconfiguration",h,13),n.eventBus.subscribe("background-image-loaded",function(n){r.backgroundImageObject=n},13),n}.call(i),l.AUTOSTART&&i.start()}catch(ln){}return i},m="base.js",g=window,A="_DEBUG_HISTATSCANVAS_RETURN_BUILDER";_value_RETURN_BUILDER=u(window[A])&&window[A]===!0,window[h()]=b,window["histats_canvascounters_"+m]=b}).call(this);