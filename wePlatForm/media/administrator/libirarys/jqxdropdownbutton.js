/*
jQWidgets v4.1.2 (2016-Apr)
Copyright (c) 2011-2016 jQWidgets.
License: http://jqwidgets.com/license/
*/

(function(a){a.jqx.jqxWidget("jqxDropDownButton","",{});a.extend(a.jqx._jqxDropDownButton.prototype,{defineInstance:function(){var b={disabled:false,width:null,height:null,arrowSize:19,enableHover:true,openDelay:250,closeDelay:300,animationType:"default",enableBrowserBoundsDetection:false,dropDownHorizontalAlignment:"left",dropDownVerticalAlignment:"bottom",popupZIndex:20000,autoOpen:false,rtl:false,initContent:null,dropDownWidth:null,dropDownHeight:null,focusable:true,template:"default",touchMode:false,aria:{"aria-disabled":{name:"disabled",type:"boolean"}},events:["open","close","opening","closing"]};a.extend(true,this,b);return b},createInstance:function(j){var g=this;if(!g.width){g.width=200}if(!g.height){g.height=25}g.isanimating=false;g.setupInstance();var c=a("<div style='background-color: transparent; -webkit-appearance: none; outline: none; width:100%; height: 100%; padding: 0px; margin: 0px; border: 0px; position: relative;'><div id='dropDownButtonWrapper' style='outline: none; background-color: transparent; border: none; float: left; width:100%; height: 100%; position: relative;'><div id='dropDownButtonContent' unselectable='on' style='outline: none; background-color: transparent; border: none; float: left; position: relative;'/><div id='dropDownButtonArrow' unselectable='on'  style='background-color: transparent; border: none; float: right; position: relative;'><div unselectable='on'></div></div></div></div>");if(g.host.attr("tabindex")){c.attr("tabindex",g.host.attr("tabindex"));g.host.removeAttr("tabindex")}else{c.attr("tabindex",0)}if(!g.focusable){c.removeAttr("tabIndex")}a.jqx.aria(this);g.popupContent=g.host.children();g.host.attr("role","button");if(g.popupContent.length==0){g.popupContent=a("<div>"+g.host.text()+"</div>");g.popupContent.css("display","block");g.element.innerHTML=""}else{g.popupContent.detach()}var k=this;g.addHandler(g.host,"loadContent",function(e){k._arrange()});try{var f="dropDownButtonPopup"+g.element.id;var d=a(a.find("#"+f));if(d.length>0){d.remove()}a.jqx.aria(this,"aria-haspopup",true);a.jqx.aria(this,"aria-owns",f);var b=a("<div class='dropDownButton' style='overflow: hidden; left: -1000px; top: -1000px; position: absolute;' id='dropDownButtonPopup"+g.element.id+"'></div>");b.addClass(g.toThemeProperty("jqx-widget-content"));b.addClass(g.toThemeProperty("jqx-dropdownbutton-popup"));b.addClass(g.toThemeProperty("jqx-popup"));b.addClass(g.toThemeProperty("jqx-rc-all"));b.css("z-index",g.popupZIndex);if(a.jqx.browser.msie){b.addClass(g.toThemeProperty("jqx-noshadow"))}g.popupContent.appendTo(b);b.appendTo(document.body);g.container=b;g.container.css("visibility","hidden")}catch(h){}g.touch=a.jqx.mobile.isTouchDevice();g.dropDownButtonStructure=c;g.host.append(c);g.dropDownButtonWrapper=g.host.find("#dropDownButtonWrapper");g.firstDiv=g.dropDownButtonWrapper.parent();g.dropDownButtonArrow=g.host.find("#dropDownButtonArrow");g.arrow=a(g.dropDownButtonArrow.children()[0]);g.dropDownButtonContent=g.host.find("#dropDownButtonContent");g.dropDownButtonContent.addClass(g.toThemeProperty("jqx-dropdownlist-content"));g.dropDownButtonWrapper.addClass(g.toThemeProperty("jqx-disableselect"));if(g.rtl){g.dropDownButtonContent.addClass(g.toThemeProperty("jqx-rtl"))}var m=this;if(g.host.parents()){g.addHandler(g.host.parents(),"scroll.dropdownbutton"+g.element.id,function(e){var n=m.isOpened();if(n){m.close()}})}g.addHandler(g.dropDownButtonWrapper,"selectstart",function(){return false});g.dropDownButtonWrapper[0].id="dropDownButtonWrapper"+g.element.id;g.dropDownButtonArrow[0].id="dropDownButtonArrow"+g.element.id;g.dropDownButtonContent[0].id="dropDownButtonContent"+g.element.id;var m=this;g.propertyChangeMap.disabled=function(e,o,n,p){if(p){e.host.addClass(m.toThemeProperty("jqx-dropdownlist-state-disabled"));e.host.addClass(m.toThemeProperty("jqx-fill-state-disabled"));e.dropDownButtonContent.addClass(m.toThemeProperty("jqx-dropdownlist-content-disabled"))}else{e.host.removeClass(m.toThemeProperty("jqx-dropdownlist-state-disabled"));e.host.removeClass(m.toThemeProperty("jqx-fill-state-disabled"));e.dropDownButtonContent.removeClass(m.toThemeProperty("jqx-dropdownlist-content-disabled"))}a.jqx.aria(e,"aria-disabled",e.disabled)};if(g.disabled){g.host.addClass(g.toThemeProperty("jqx-dropdownlist-state-disabled"));g.host.addClass(g.toThemeProperty("jqx-fill-state-disabled"));g.dropDownButtonContent.addClass(g.toThemeProperty("jqx-dropdownlist-content-disabled"))}var i=g.toThemeProperty("jqx-rc-all")+" "+g.toThemeProperty("jqx-fill-state-normal")+" "+g.toThemeProperty("jqx-widget")+" "+g.toThemeProperty("jqx-widget-content")+" "+g.toThemeProperty("jqx-dropdownlist-state-normal");g.host.addClass(i);g.arrow.addClass(g.toThemeProperty("jqx-icon-arrow-down"));g.arrow.addClass(g.toThemeProperty("jqx-icon"));if(g.template){g.host.addClass(g.toThemeProperty("jqx-"+g.template))}g._setSize();g.render();if(a.jqx.browser.msie&&a.jqx.browser.version<8){g.container.css("display","none");if(g.host.parents(".jqx-window").length>0){var l=g.host.parents(".jqx-window").css("z-index");b.css("z-index",l+10);g.container.css("z-index",l+10)}}},setupInstance:function(){var c=this;var b={setContent:function(d){c.dropDownButtonContent.children().remove();c.dropDownButtonContent[0].innerHTML="";c.dropDownButtonContent.append(d)},val:function(d){if(arguments.length==0||typeof(d)=="object"){return c.dropDownButtonContent.text()}else{c.dropDownButtonContent.html(d)}},getContent:function(){if(c.dropDownButtonContent.children().length>0){return c.dropDownButtonContent.children()}return c.dropDownButtonContent.text()},_setSize:function(){if(c.width!=null&&c.width.toString().indexOf("px")!=-1){c.host[0].style.width=c.width}else{if(c.width!=undefined&&!isNaN(c.width)){c.host[0].style.width=parseInt(c.width)+"px"}}if(c.height!=null&&c.height.toString().indexOf("px")!=-1){c.host[0].style.height=c.height}else{if(c.height!=undefined&&!isNaN(c.height)){c.host[0].style.height=parseInt(c.height)+"px"}}var e=false;if(c.width!=null&&c.width.toString().indexOf("%")!=-1){e=true;c.host.width(c.width)}if(c.height!=null&&c.height.toString().indexOf("%")!=-1){e=true;c.host.height(c.height)}var d=this;if(e){c.refresh(false)}a.jqx.utilities.resize(c.host,function(){d._arrange()})},isOpened:function(){var e=this;var d=a.data(document.body,"openedJQXButton"+e.element.id);if(d!=null&&d==e.popupContent){return true}return false},focus:function(){try{c.host.focus()}catch(d){}},render:function(){c.removeHandlers();var d=this;var e=false;if(!c.touch){c.addHandler(c.host,"mouseenter",function(){if(!d.disabled&&d.enableHover){e=true;d.host.addClass(d.toThemeProperty("jqx-dropdownlist-state-hover"));d.arrow.addClass(d.toThemeProperty("jqx-icon-arrow-down-hover"));d.host.addClass(d.toThemeProperty("jqx-fill-state-hover"))}});c.addHandler(c.host,"mouseleave",function(){if(!d.disabled&&d.enableHover){d.host.removeClass(d.toThemeProperty("jqx-dropdownlist-state-hover"));d.host.removeClass(d.toThemeProperty("jqx-fill-state-hover"));d.arrow.removeClass(d.toThemeProperty("jqx-icon-arrow-down-hover"));e=false}})}if(d.autoOpen){c.addHandler(c.host,"mouseenter",function(){var f=d.isOpened();if(!f&&d.autoOpen){d.open();d.host.focus()}});c.addHandler(a(document),"mousemove."+d.element.id,function(i){var h=d.isOpened();if(h&&d.autoOpen){var m=d.host.coord();var l=m.top;var k=m.left;var j=d.container.coord();var f=j.left;var g=j.top;canClose=true;if(i.pageY>=l&&i.pageY<=l+d.host.height()){if(i.pageX>=k&&i.pageX<k+d.host.width()){canClose=false}}if(i.pageY>=g&&i.pageY<=g+d.container.height()){if(i.pageX>=f&&i.pageX<f+d.container.width()){canClose=false}}if(canClose){d.close()}}})}c.addHandler(c.dropDownButtonWrapper,"mousedown",function(g){if(!d.disabled){var f=d.container.css("visibility")=="visible";if(!d.isanimating){if(f){d.close();return false}else{d.open();if(!d.focusable){if(g.preventDefault){g.preventDefault()}}}}}});if(c.touch){c.addHandler(a(document),a.jqx.mobile.getTouchEventName("touchstart")+"."+c.element.id,d.closeOpenedDropDown,{me:this,popup:c.container,id:c.element.id})}c.addHandler(a(document),"mousedown."+c.element.id,d.closeOpenedDropDown,{me:this,popup:c.container,id:c.element.id});c.addHandler(c.host,"keydown",function(g){var f=d.container.css("visibility")=="visible";if(d.host.css("display")=="none"){return true}if(g.keyCode=="13"){if(!d.isanimating){if(f){d.close()}}}if(g.keyCode==115){if(!d.isanimating){if(!d.isOpened()){d.open()}else{if(d.isOpened()){d.close()}}}return false}if(g.altKey){if(d.host.css("display")=="block"){if(g.keyCode==38){if(d.isOpened()){d.close()}}else{if(g.keyCode==40){if(!d.isOpened()){d.open()}}}}}if(g.keyCode=="27"){if(!d.ishiding){d.close();if(d.tempSelectedIndex!=undefined){d.selectIndex(d.tempSelectedIndex)}}}});c.addHandler(c.firstDiv,"focus",function(){d.host.addClass(d.toThemeProperty("jqx-dropdownlist-state-focus"));d.host.addClass(d.toThemeProperty("jqx-fill-state-focus"))});c.addHandler(c.firstDiv,"blur",function(){d.host.removeClass(d.toThemeProperty("jqx-dropdownlist-state-focus"));d.host.removeClass(d.toThemeProperty("jqx-fill-state-focus"))})},removeHandlers:function(){var d=this;c.removeHandler(c.dropDownButtonWrapper,"mousedown");c.removeHandler(c.host,"keydown");c.removeHandler(c.firstDiv,"focus");c.removeHandler(c.firstDiv,"blur");c.removeHandler(c.host,"mouseenter");c.removeHandler(c.host,"mouseleave");if(c.autoOpen){c.removeHandler(c.host,"mouseenter");c.removeHandler(c.host,"mouseleave")}c.removeHandler(a(document),"mousemove."+d.element.id)},_findPos:function(e){while(e&&(e.type=="hidden"||e.nodeType!=1||a.expr.filters.hidden(e))){e=e.nextSibling}var d=a(e).coord(true);return[d.left,d.top]},testOffset:function(j,h,e){var i=j.outerWidth();var l=j.outerHeight();var k=a(window).width()+a(window).scrollLeft();var g=a(window).height()+a(window).scrollTop();if(h.left+i>k){if(i>c.host.width()){var f=c.host.coord().left;var d=i-c.host.width();h.left=f-d+2}}if(h.left<0){h.left=parseInt(c.host.coord().left)+"px"}h.top-=Math.min(h.top,(h.top+l>g&&g>l)?Math.abs(l+e+22):0);return h},_getBodyOffset:function(){var e=0;var d=0;if(a("body").css("border-top-width")!="0px"){e=parseInt(a("body").css("border-top-width"));if(isNaN(e)){e=0}}if(a("body").css("border-left-width")!="0px"){d=parseInt(a("body").css("border-left-width"));if(isNaN(d)){d=0}}return{left:d,top:e}},open:function(){a.jqx.aria(this,"aria-expanded",true);var k=this;var q=this;if((k.dropDownWidth==null||k.dropDownWidth=="auto")&&k.width!=null&&k.width.indexOf&&k.width.indexOf("%")!=-1){var s=k.host.width();k.container.width(parseInt(s))}q._raiseEvent("2");var e=k.popupContent;var h=a(window).scrollTop();var i=a(window).scrollLeft();var o=parseInt(k._findPos(k.host[0])[1])+parseInt(k.host.outerHeight())-1+"px";var g,r=parseInt(Math.round(k.host.coord(true).left));g=r+"px";var w=a.jqx.mobile.isSafariMobileBrowser()||a.jqx.mobile.isWindowsPhone();k.ishiding=false;k.tempSelectedIndex=k.selectedIndex;if((w!=null&&w)){g=a.jqx.mobile.getLeftPos(k.element);o=a.jqx.mobile.getTopPos(k.element)+parseInt(k.host.outerHeight());if(a("body").css("border-top-width")!="0px"){o=parseInt(o)-k._getBodyOffset().top+"px"}if(a("body").css("border-left-width")!="0px"){g=parseInt(g)-k._getBodyOffset().left+"px"}}e.stop();k.host.addClass(k.toThemeProperty("jqx-dropdownlist-state-selected"));k.host.addClass(k.toThemeProperty("jqx-fill-state-pressed"));k.arrow.addClass(k.toThemeProperty("jqx-icon-arrow-down-selected"));var j=false;if(a.jqx.browser.msie&&a.jqx.browser.version<8){j=true}if(j){k.container.css("display","block")}k.container.css("left",g);k.container.css("top",o);var f=true;var d=false;var v=function(){if(k.dropDownHorizontalAlignment=="right"||k.rtl){var x=k.container.width();var t=Math.abs(x-k.host.width());if(x>k.host.width()){k.container.css("left",parseInt(Math.round(r))-t+"px")}else{k.container.css("left",parseInt(Math.round(r))+t+"px")}}};v.call(this);if(k.dropDownVerticalAlignment=="top"){var u=e.height();d=true;k.container.height(e.outerHeight());e.addClass(this.toThemeProperty("jqx-popup-up"));var n=parseInt(k.host.outerHeight());var m=parseInt(o)-Math.abs(u+n);if(k.interval){clearInterval(k.interval)}k.interval=setInterval(function(){if(e.outerHeight()!=k.container.height()){k.container.height(e.outerHeight());var x=parseInt(o)-Math.abs(e.height()+n);k.container.css("top",x)}},50);e.css("top",23);k.container.css("top",m)}if(k.enableBrowserBoundsDetection){var l=k.testOffset(e,{left:parseInt(k.container.css("left")),top:parseInt(o)},parseInt(k.host.outerHeight()));if(parseInt(k.container.css("top"))!=l.top){d=true;k.container.height(e.outerHeight());e.css("top",23);if(k.interval){clearInterval(k.interval)}k.interval=setInterval(function(){if(e.outerHeight()!=q.container.height()){var t=q.testOffset(e,{left:parseInt(k.container.css("left")),top:parseInt(o)},parseInt(k.host.outerHeight()));k.container.css("top",t.top);k.container.height(e.outerHeight())}},50)}else{e.css("top",0)}k.container.css("top",l.top);if(parseInt(k.container.css("left"))!=l.left){k.container.css("left",l.left)}}if(k.animationType=="none"){k.container.css("visibility","visible");a.data(document.body,"openedJQXButtonParent",q);a.data(document.body,"openedJQXButton"+k.element.id,e);e.css("margin-top",0);e.css("opacity",1);k._raiseEvent("0");v.call(q)}else{k.container.css("visibility","visible");var p=e.outerHeight();q.isanimating=true;if(k.animationType=="fade"){e.css("margin-top",0);e.css("opacity",0);e.animate({opacity:1},k.openDelay,function(){a.data(document.body,"openedJQXButtonParent",q);a.data(document.body,"openedJQXButton"+q.element.id,e);q.ishiding=false;q.isanimating=false;q._raiseEvent("0")});v.call(q)}else{e.css("opacity",1);if(d){e.css("margin-top",p)}else{e.css("margin-top",-p)}v.call(q);if(d){e.animate({"margin-top":0},k.openDelay,function(){a.data(document.body,"openedJQXButtonParent",q);a.data(document.body,"openedJQXButton"+q.element.id,e);q.ishiding=false;q.isanimating=false;q._raiseEvent("0")})}else{e.animate({"margin-top":0},k.openDelay,function(){a.data(document.body,"openedJQXButtonParent",q);a.data(document.body,"openedJQXButton"+q.element.id,e);q.ishiding=false;q.isanimating=false;q._raiseEvent("0")})}}}if(!d){k.host.addClass(k.toThemeProperty("jqx-rc-b-expanded"));k.container.addClass(k.toThemeProperty("jqx-rc-t-expanded"))}else{k.host.addClass(k.toThemeProperty("jqx-rc-t-expanded"));k.container.addClass(k.toThemeProperty("jqx-rc-b-expanded"))}if(k.focusable){k.firstDiv.focus();setTimeout(function(){q.firstDiv.focus()},10)}k.container.addClass(k.toThemeProperty("jqx-fill-state-focus"));k.host.addClass(q.toThemeProperty("jqx-dropdownlist-state-focus"));k.host.addClass(q.toThemeProperty("jqx-fill-state-focus"))},close:function(){a.jqx.aria(this,"aria-expanded",false);var i=this;var g=i.popupContent;var f=i.container;var h=this;h._raiseEvent("3");var e=false;if(a.jqx.browser.msie&&a.jqx.browser.version<8){e=true}if(!i.isOpened()){return}a.data(document.body,"openedJQXButton"+i.element.id,null);if(i.animationType=="none"){i.container.css("visibility","hidden");if(e){i.container.css("display","none")}}else{if(!h.ishiding){h.isanimating=true;g.stop();var d=g.outerHeight();g.css("margin-top",0);var j=-d;if(parseInt(i.container.coord().top)<parseInt(i.host.coord().top)){j=d}if(i.animationType=="fade"){g.css({opacity:1});g.animate({opacity:0},i.closeDelay,function(){f.css("visibility","hidden");h.isanimating=false;h.ishiding=false;if(e){f.css("display","none")}})}else{g.animate({"margin-top":j},i.closeDelay,function(){f.css("visibility","hidden");h.isanimating=false;h.ishiding=false;if(e){f.css("display","none")}})}}}i.ishiding=true;i.host.removeClass(i.toThemeProperty("jqx-dropdownlist-state-selected"));i.host.removeClass(i.toThemeProperty("jqx-fill-state-pressed"));i.arrow.removeClass(i.toThemeProperty("jqx-icon-arrow-down-selected"));i.host.removeClass(i.toThemeProperty("jqx-rc-b-expanded"));i.container.removeClass(i.toThemeProperty("jqx-rc-t-expanded"));i.host.removeClass(i.toThemeProperty("jqx-rc-t-expanded"));i.container.removeClass(i.toThemeProperty("jqx-rc-b-expanded"));i.container.removeClass(i.toThemeProperty("jqx-fill-state-focus"));i.host.removeClass(i.toThemeProperty("jqx-dropdownlist-state-focus"));i.host.removeClass(i.toThemeProperty("jqx-fill-state-focus"));i._raiseEvent("1")},closeOpenedDropDown:function(g){var e=g.data.me;var d=a(g.target);if(a(g.target).ischildof(g.data.me.host)){return true}if(a(g.target).ischildof(g.data.me.popupContent)){return true}var h=e;var f=false;a.each(d.parents(),function(){if(this.className!="undefined"){if(this.className.indexOf&&this.className.indexOf("dropDownButton")!=-1){f=true;return false}if(this.className.indexOf&&this.className.indexOf("jqx-popup")!=-1){f=true;return false}}});if(!f){e.close()}return true},refresh:function(){c._arrange()},_arrange:function(){var i=this;var h=parseInt(i.host.width());var d=parseInt(i.host.height());var g=i.arrowSize;var f=i.arrowSize;var j=3;var e=h-f-2*j;if(e>0){i.dropDownButtonContent[0].style.width=e+"px"}i.dropDownButtonContent[0].style.height=parseInt(d)+"px";i.dropDownButtonContent[0].style.left="0px";i.dropDownButtonContent[0].style.top="0px";i.dropDownButtonArrow[0].style.width=parseInt(f)+"px";i.dropDownButtonArrow[0].style.height=parseInt(d)+"px";if(i.rtl){i.dropDownButtonArrow.css("float","left");i.dropDownButtonContent.css("float","right");i.dropDownButtonContent.css("left",-j)}if(i.dropDownWidth!=null){if(i.dropDownWidth.toString().indexOf("%")>=0){var h=(parseInt(i.dropDownWidth)*i.host.width())/100;i.container.width(h)}else{i.container.width(i.dropDownWidth)}}if(i.dropDownHeight!=null){i.container.height(i.dropDownHeight)}},destroy:function(){a.jqx.utilities.resize(this.host,null,true);var d=this;if(d.interval){clearInterval(d.interval)}d.removeHandler(d.dropDownButtonWrapper,"selectstart");d.removeHandler(d.dropDownButtonWrapper,"mousedown");d.removeHandler(d.host,"keydown");d.host.removeClass();d.removeHandler(a(document),"mousedown."+d.element.id,self.closeOpenedDropDown);d.host.remove();d.container.remove()},_raiseEvent:function(h,e){if(e==undefined){e={owner:null}}if(h==2&&!c.contentInitialized){if(c.initContent){c.initContent();c.contentInitialized=true}}var f=c.events[h];args=e;args.owner=this;var g=new a.Event(f);g.owner=this;if(h==2||h==3||h==4){g.args=e}var d=c.host.trigger(g);return d},resize:function(e,d){c.width=e;c.height=d;c._setSize();c._arrange()},propertiesChangedHandler:function(d,e,f){if(f.width&&f.height&&Object.keys(f).length==2){d._setSize();d._arrange();d.close()}},propertyChangedHandler:function(d,e,g,f){if(c.isInitialized==undefined||c.isInitialized==false){return}if(d.batchUpdate&&d.batchUpdate.width&&d.batchUpdate.height&&Object.keys(d.batchUpdate).length==2){return}if(e=="template"){d.host.removeClass(d.toThemeProperty("jqx-"+g+""));d.host.addClass(d.toThemeProperty("jqx-"+d.template+""))}if(e=="rtl"){if(f){d.dropDownButtonArrow.css("float","left");d.dropDownButtonContent.css("float","right")}else{d.dropDownButtonArrow.css("float","right");d.dropDownButtonContent.css("float","left")}}if(e=="autoOpen"){d.render()}if(e=="theme"&&f!=null){a.jqx.utilities.setTheme(g,f,d.host)}if(e=="width"||e=="height"){d._setSize();d._arrange()}}};a.extend(true,this,b)}})})(jqxBaseFramework);