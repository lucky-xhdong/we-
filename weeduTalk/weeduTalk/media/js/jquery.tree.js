/**
 * Created by xiaohong2 on 2015/3/16.
 */
/**
 * --------------------------------------------------------------------
 * jQuery tree plugin
 * Author: Scott Jehl, scott@filamentgroup.com
 * Copyright (c) 2009 Filament Group
 * licensed under MIT (filamentgroup.com/examples/mit-license.txt)
 * --------------------------------------------------------------------
 */
(function($){
    $.fn.tree = function(options){
        var settings = $.extend({
            expanded: ''
        }, options);

        return $(this).each(function(){
            if(!$(this).parents('.tree').length){
                //save reference to tree UL
                var tree = $(this);

                //add role and class of tree
                tree.attr('role','tree').addClass('tree');
                //set first node's tabindex to 0
                tree.find('a:eq(0)').attr('tabindex', 0);
                //set all others to -1
                tree.find('a:gt(0)').attr('tabindex', -1);
                //add group role and tree-group-collapsed class to all ul children
                tree.find('ul').attr('role','group').addClass('tree-group-collapsed');
                //add treeitem role to all li children
                tree.find('li').attr('role','treeitem');
                //find tree group parents

                //expanded at load
                tree.find('li:has(ul)')
                    .attr('aria-expanded', 'false')
                    .find('>a')
                    .addClass('tree-parent tree-parent-collapsed');


                //bind the custom events
                tree
                    .find(settings.expanded)
                    .attr('aria-expanded', 'true')
                    .find('>a')
                    .removeClass('tree-parent-collapsed')
                    .next()
                    .removeClass('tree-group-collapsed');

                tree
                    //expand a tree node
                    .bind('expand', function(event){
                        var target = $(event.target) || tree.find('a[tabindex=0]');
                        target.removeClass('tree-parent-collapsed');
                        target
                            .next()
                            .hide()
                            .removeClass('tree-group-collapsed')
                            .slideDown(150, function(){
                                $(this).removeAttr('style');
                                target.parent().attr('aria-expanded', 'true');
                            })
                    })
                    //collapse a tree node
                    .bind('collapse', function(event){
                        var target = $(event.target) || tree.find('a[tabindex=0]');
                        target.addClass('tree-parent-collapsed');
                        target
                            .next()
                            .slideUp(150, function(){
                                target.parent().attr('aria-expanded', 'false');
                                $(this).addClass('tree-group-collapsed').removeAttr('style');
                            })
                    })
                    .bind('toggle', function(event){
                        var target = $(event.target) || tree.find('a[tabindex=0]');
                        //check if target parent LI is collapsed
                        if(target.parent().is('[aria-expanded=false]')){
                            //call expand function on the target
                            target.trigger('expand');
                            //otherwise, parent must be expanded
                        }else {
                            //collapse the target
                            target.trigger('collapse');
                        }
                    })
                    //shift focus down one item
                    .bind('traverseDown', function(event){
                        var target = $(event.target) || tree.find('a[tabindex=0]');
                        var tparent = target.parent();
                        if(tparent.is('[aria-expanded=true]')){
                            target.next().find('a').eq(0).focus();
                        }else if(tparent.next().length) {
                            tparent.next().find('a').eq(0).focus();
                        }else {
                            tparent.parents('li').next().find('a').eq(0).focus();
                        }
                    })
                    //shift focus up one item
                    .bind('traverseUp',function(event){
                        var target = $(event.target) || tree.find('a[tabindex=0]');
                        var tparent = target.parent();
                        if(tparent.prev().length){
                            if(tparent.prev().is('[aria-expanded=true]')){
                                tparent.prev().find('li:visible:last a').eq(0).focus();
                            }else {
                                tparent.prev().find('a').eq(0).focus();
                            }
                        }else {
                            tparent.parents('li:eq(0)').find('a').eq(0).focus();
                        }
                    })
                //and now for the native events
                tree
                    .focus(function(event){
                        //deactivate previously active tree node, if one exists
                        tree.find('[tabindex=0]').attr('tabindex', '-1').removeClass('tree-item-active');
                        //assign 0 tabindex to focused item
                        $(event.target).attr('tabindex', '0').addClass('tree-item-active');
                        console.log($(event.target).html())
                    })
                    .click(function(event){
                        //save reference to event target
                        var target = $(event.target);
                        //check if target is a tree node
                        if(target.is('a.tree-parent')){
                            target.trigger('toggle');
                            target.eq(0).focus();
                            //return click event false because it's a tree node (folder)
                            return false;
                        }
                    })
                    .keydown(function(event){
                        var target = tree.find('a[tabindex=0]');
                        //check for arrow keys
                        if(event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40){
                            //if key is left arrow
                            if(event.keyCode == 37){
                                //if list is expanded
                                if(target.parent().is('[aria-expanded=true]')){
                                    target.trigger('collapse');
                                    //try traversing to parent
                                }else{
                                    target.parent('li:eq(1)').find('a').eq(0).focus();
                                }
                                //if key is right arrow
                            }
                            if(event.keyCode == 39){
                                //if list is collapsed
                                if(target.parent().is('[aria-expanded=false]')){
                                    target.trigger('expand');
                                    //try traversing to child
                                }else{
                                    target.parent('li:eq(0)').find('li a').eq(0).focus();
                                }
                                //if key is up arrow
                            }
                            if(event.keyCode == 38){
                                target.trigger('traverseUp');
                                //if key is down arrow
                            }
                            if(event.keyCode == 40){
                                target.trigger('traverseDown');
                            }
                            //return any of these keycodes false
                            return false;
                            //check if enter or space was pressed on a tree node
                        }else if((event.keyCode == 13 || event.keyCode == 32) && target.is('a.tree-parent')){
                            target.trigger('toggle');
                            //return click event false because it's a tree node (folder)
                            return false;
                        }
                    })
            }
        })
    }
})(jQuery);
