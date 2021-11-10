@extends('layout.index')
@section('title','product')
@section('content')
    <div id="accordion" style="width: 800px">
        <h5>Danh mục sản phẩm</h5>
        <a href="{{route('category.add')}}" class="btn btn-success mb-2"><i class="fas fa-plus-circle"></i></a>
    </div>
        <div class="dd" id="nestable" style="margin-left: 20px;">
            <ol class="dd-list">
                {{showCategory($categories)}}
            </ol>
        </div>

{{--    <?php--}}
{{--    function showCategories($categories, $parent_id = '', $char = 0)--}}
{{--    {--}}
{{--        foreach ($categories as $key => $item) {--}}
{{--            $hidden = '';--}}
{{--            if ($parent_id == '') {--}}
{{--                $hidden = 'show';--}}
{{--            }--}}
{{--            // Nếu là chuyên mục con thì hiển thị--}}
{{--            if ($item->parent_id == $parent_id) {--}}
{{--                echo '--}}
{{--               <div  id="collapse-' . $parent_id . '"--}}
{{--                 class="alert alert-info collapse ' . $hidden . '"--}}
{{--                 data-toggle="collapse"--}}
{{--                  data-target="#collapse-' . $item->id . '"--}}
{{--                   aria-expanded="true"--}}
{{--                    aria-controls="collapseOne"--}}
{{--                     style="margin-left: ' . $char . 'px">--}}
{{--                       <input type="checkbox"--}}
{{--                        id="master-' . $item->id . '"--}}
{{--                         class="sub_chk-' . $parent_id . ' checkbox_category"--}}
{{--                           onclick="setId(' . $item->id . ')"--}}
{{--                            data-id="' . $item->id . '">--}}

{{--                     <span> ' . $item->name . '</span>--}}
{{--<div style="float: right">--}}
{{--<a class="btn btn-sm btn-danger" href="' . $item->id . '/deleteCate">Xóa</a>--}}
{{--<a class="btn btn-sm btn-warning" href="' . $item->id . '/editCate">Sửa</a>--}}
{{--</div>--}}
{{--        </div>--}}
{{--               ';--}}
{{--                // Xóa chuyên mục đã lặp--}}
{{--                unset($categories[$key]);--}}

{{--                // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp--}}
{{--                showCategories($categories, $item->id, $char + 30);--}}
{{--            }--}}
{{--        }--}}
{{--    }--}}
{{--    ?>--}}







<!--[if lt IE 7]> <html lang="en" class="lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>    <html lang="en" class="lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>    <html lang="en" class="lt-ie9"> <![endif]-->
<!--[if IE 9]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <title>Nestable</title>
    <style type="text/css">

        .cf:after { visibility: hidden; display: block; font-size: 0; content: " "; clear: both; height: 0; }
        * html .cf { zoom: 1; }
        *:first-child+html .cf { zoom: 1; }

        html { margin: 0; padding: 0; }
        body { font-size: 100%; margin: 0; padding: 1.75em; font-family: 'Helvetica Neue', Arial, sans-serif; }

        h1 { font-size: 1.75em; margin: 0 0 0.6em 0; }

        a { color: #2996cc; }
        a:hover { text-decoration: none; }

        p { line-height: 1.5em; }
        .small { color: #666; font-size: 0.875em; }
        .large { font-size: 1.25em; }

        /**
         * Nestable
         */

        .dd { position: relative; display: block; margin: 0; padding: 0; max-width: 600px; list-style: none; font-size: 13px; line-height: 20px; }

        .dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
        .dd-list .dd-list { padding-left: 30px; }
        .dd-collapsed .dd-list { display: none; }

        .dd-item,
        .dd-empty,
        .dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 20px; }

        .dd-handle { display: block; height: 30px; margin: 5px 0; padding: 5px 10px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
            background: #fafafa;
            background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
            background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
            background:         linear-gradient(top, #fafafa 0%, #eee 100%);
            -webkit-border-radius: 3px;
            border-radius: 3px;
            box-sizing: border-box; -moz-box-sizing: border-box;
        }
        .dd-handle:hover { color: #2ea8e5; background: #fff; }

        .dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 25px; height: 20px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
        .dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
        .dd-item > button[data-action="collapse"]:before { content: '-'; }

        .dd-placeholder,
        .dd-empty { margin: 5px 0; padding: 0; min-height: 30px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
        .dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;
            background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
            linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
            background-size: 60px 60px;
            background-position: 0 0, 30px 30px;
        }

        .dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
        .dd-dragel > .dd-item .dd-handle { margin-top: 0; }
        .dd-dragel .dd-handle {
            -webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
            box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
        }

        /**
         * Nestable Extras
         */

        .nestable-lists { display: block; clear: both; padding: 30px 0; width: 100%; border: 0; border-top: 2px solid #ddd; border-bottom: 2px solid #ddd; }

        #nestable-menu { padding: 0; margin: 20px 0; }

        #nestable-output,
        #nestable2-output { width: 100%; height: 7em; font-size: 0.75em; line-height: 1.333333em; font-family: Consolas, monospace; padding: 5px; box-sizing: border-box; -moz-box-sizing: border-box; }

        #nestable2 .dd-handle {
            color: #fff;
            border: 1px solid #999;
            background: #bbb;
            background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
            background:    -moz-linear-gradient(top, #bbb 0%, #999 100%);
            background:         linear-gradient(top, #bbb 0%, #999 100%);
        }
        #nestable2 .dd-handle:hover { background: #bbb; }
        #nestable2 .dd-item > button:before { color: #fff; }

        @media only screen and (min-width: 700px) {

            .dd { float: left; width: 48%; }
            .dd + .dd { margin-left: 2%; }

        }

        .dd-hover > .dd-handle { background: #2ea8e5 !important; }

        /**
         * Nestable Draggable Handles
         */

        .dd3-content { display: block; height: 30px; margin: 5px 0; padding: 5px 10px 5px 40px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
            background: #fafafa;
            background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
            background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
            background:         linear-gradient(top, #fafafa 0%, #eee 100%);
            -webkit-border-radius: 3px;
            border-radius: 3px;
            box-sizing: border-box; -moz-box-sizing: border-box;
        }
        .dd3-content:hover { color: #2ea8e5; background: #fff; }

        .dd-dragel > .dd3-item > .dd3-content { margin: 0; }

        .dd3-item > button { margin-left: 30px; }

        .dd3-handle { position: absolute; margin: 0; left: 0; top: 0; cursor: pointer; width: 30px; text-indent: 100%; white-space: nowrap; overflow: hidden;
            border: 1px solid #aaa;
            background: #ddd;
            background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
            background:    -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
            background:         linear-gradient(top, #ddd 0%, #bbb 100%);
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .dd3-handle:before { content: '≡'; display: block; position: absolute; left: 0; top: 3px; width: 100%; text-align: center; text-indent: 0; color: #fff; font-size: 20px; font-weight: normal; }
        .dd3-handle:hover { background: #ddd; }

        /**
         * Socialite
         */

        .socialite { display: block; float: left; height: 35px; }

    </style>
</head>
<body>



{{--<menu id="nestable-menu">--}}
{{--    <button type="button" data-action="expand-all">Expand All</button>--}}
{{--    <button type="button" data-action="collapse-all">Collapse All</button>--}}
{{--</menu>--}}

<?php
function showCategory($categories, $parent_id = '')
{
    foreach ($categories as $key => $item) {
        // Nếu là chuyên mục con thì hiển thị
        if ($item->parent_id == $parent_id) {
            // Xử lý hiển thị chuyên mục
            echo '<li class="dd-item" data-id="' . $item->id . '">
                 <div class="dd-handle" ><input type="checkbox"
                        id="master-' . $item->id . '"
                         class="sub_chk-' . $parent_id . ' checkbox_category"
                           onclick="setId(' . $item->id . ')"
                            onmousedown="disabledEventPropagation(event)"
                            data-id="' . $item->id . '"
                            style="margin-right:10px">' . $item->name . '
                    <div style="float: right" onmousedown="disabledEventPropagation(event)">
                        <a class="btn btn-sm btn-danger" href="/danh-muc-san-pham/' . $item->id . '/destroy">Xóa</a>
                        <a class="btn btn-sm btn-warning" href="/danh-muc-san-pham/' . $item->id . '/edit">Sửa</a>
                    </div>
                 </div>';
        }
    }
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="../../../../public/jquery.nestable.js"></script>

<script>
    function disabledEventPropagation(event)
    {
        if (event.stopPropagation){
            event.stopPropagation();
        }
        else if(window.event){
            window.event.cancelBubble=true;
        }
    }
    $(document).ready(function () {
        var updateOutput = function (e) {
            var list = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
            } else {
                output.val('JSON browser support required for this demo.');
            }
            $.ajax({
                method: "POST",
                url: "/update-list",
                data: {
                    list: list.nestable('serialize'),
                    "_token": "{{ csrf_token() }}",
                }
            }).fail(function(jqXHR, textStatus, errorThrown){
                alert("Unable to save new list order: " + errorThrown);
            });
        };
        // activate Nestable for list 1
        $('#nestable').nestable({
            group: 1
        })
            .on('change', updateOutput);

        console.log()
        updateOutput($('#nestable').data('output', $('#nestable-output')));
        // updateOutput($('#nestable2').data('output', $('#nestable2-output')));
        $('#nestable-menu').on('click', function (e) {
            var target = $(e.target),
                action = target.data('action');
            if (action === 'expand-all') {
                $('.dd').nestable('expandAll');
            }
            if (action === 'collapse-all') {
                $('.dd').nestable('collapseAll');
            }
        });

        $('#nestable3').nestable();

    });
</script>



<!-- jquery -->
<script>

    $(document).ready(function()
    {

        var updateOutput = function(e)
        {
            var list   = e.length ? e : $(e.target),
                output = list.data('output');
            if (window.JSON) {
                output.val(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
            } else {
                output.val('JSON browser support required for this demo.');
            }
        };

        // activate Nestable for list 1
        $('#nestable').nestable({
            group: 1
        })
            .on('change', updateOutput);

        // activate Nestable for list 2
        $('#nestable2').nestable({
            group: 1
        })
            .on('change', updateOutput);

        // output initial serialised data
        updateOutput($('#nestable').data('output', $('#nestable-output')));
        updateOutput($('#nestable2').data('output', $('#nestable2-output')));

        $('#nestable-menu').on('click', function(e)
        {
            var target = $(e.target),
                action = target.data('action');
            if (action === 'expand-all') {
                $('.dd').nestable('expandAll');
            }
            if (action === 'collapse-all') {
                $('.dd').nestable('collapseAll');
            }
        });

        $('#nestable3').nestable();

    });
    (function($, window, document, undefined)
    {
        var hasTouch = 'ontouchstart' in document;

        /**
         * Detect CSS pointer-events property
         * events are normally disabled on the dragging element to avoid conflicts
         * https://github.com/ausi/Feature-detection-technique-for-pointer-events/blob/master/modernizr-pointerevents.js
         */
        var hasPointerEvents = (function()
        {
            var el    = document.createElement('div'),
                docEl = document.documentElement;
            if (!('pointerEvents' in el.style)) {
                return false;
            }
            el.style.pointerEvents = 'auto';
            el.style.pointerEvents = 'x';
            docEl.appendChild(el);
            var supports = window.getComputedStyle && window.getComputedStyle(el, '').pointerEvents === 'auto';
            docEl.removeChild(el);
            return !!supports;
        })();

        var defaults = {
            listNodeName    : 'ol',
            itemNodeName    : 'li',
            rootClass       : 'dd',
            listClass       : 'dd-list',
            itemClass       : 'dd-item',
            dragClass       : 'dd-dragel',
            handleClass     : 'dd-handle',
            collapsedClass  : 'dd-collapsed',
            placeClass      : 'dd-placeholder',
            noDragClass     : 'dd-nodrag',
            emptyClass      : 'dd-empty',
            expandBtnHTML   : '<button data-action="expand" type="button">Expand</button>',
            collapseBtnHTML : '<button data-action="collapse" type="button">Collapse</button>',
            group           : 0,
            maxDepth        : 5,
            threshold       : 20
        };

        function Plugin(element, options)
        {
            this.w  = $(document);
            this.el = $(element);
            this.options = $.extend({}, defaults, options);
            this.init();
        }

        Plugin.prototype = {

            init: function()
            {
                var list = this;

                list.reset();

                list.el.data('nestable-group', this.options.group);

                list.placeEl = $('<div class="' + list.options.placeClass + '"/>');

                $.each(this.el.find(list.options.itemNodeName), function(k, el) {
                    list.setParent($(el));
                });

                list.el.on('click', 'button', function(e) {
                    if (list.dragEl) {
                        return;
                    }
                    var target = $(e.currentTarget),
                        action = target.data('action'),
                        item   = target.parent(list.options.itemNodeName);
                    if (action === 'collapse') {
                        list.collapseItem(item);
                    }
                    if (action === 'expand') {
                        list.expandItem(item);
                    }
                });

                var onStartEvent = function(e)
                {
                    var handle = $(e.target);
                    if (!handle.hasClass(list.options.handleClass)) {
                        if (handle.closest('.' + list.options.noDragClass).length) {
                            return;
                        }
                        handle = handle.closest('.' + list.options.handleClass);
                    }

                    if (!handle.length || list.dragEl) {
                        return;
                    }

                    list.isTouch = /^touch/.test(e.type);
                    if (list.isTouch && e.touches.length !== 1) {
                        return;
                    }

                    e.preventDefault();
                    list.dragStart(e.touches ? e.touches[0] : e);
                };

                var onMoveEvent = function(e)
                {
                    if (list.dragEl) {
                        e.preventDefault();
                        list.dragMove(e.touches ? e.touches[0] : e);
                    }
                };

                var onEndEvent = function(e)
                {
                    if (list.dragEl) {
                        e.preventDefault();
                        list.dragStop(e.touches ? e.touches[0] : e);
                    }
                };

                if (hasTouch) {
                    list.el[0].addEventListener('touchstart', onStartEvent, false);
                    window.addEventListener('touchmove', onMoveEvent, false);
                    window.addEventListener('touchend', onEndEvent, false);
                    window.addEventListener('touchcancel', onEndEvent, false);
                }

                list.el.on('mousedown', onStartEvent);
                list.w.on('mousemove', onMoveEvent);
                list.w.on('mouseup', onEndEvent);

            },

            serialize: function()
            {
                var data,
                    depth = 0,
                    list  = this;
                step  = function(level, depth)
                {
                    var array = [ ],
                        items = level.children(list.options.itemNodeName);
                    items.each(function()
                    {
                        var li   = $(this),
                            item = $.extend({}, li.data()),
                            sub  = li.children(list.options.listNodeName);
                        if (sub.length) {
                            item.children = step(sub, depth + 1);
                        }
                        array.push(item);
                    });
                    return array;
                };
                data = step(list.el.find(list.options.listNodeName).first(), depth);
                return data;
            },

            serialise: function()
            {
                return this.serialize();
            },

            reset: function()
            {
                this.mouse = {
                    offsetX   : 0,
                    offsetY   : 0,
                    startX    : 0,
                    startY    : 0,
                    lastX     : 0,
                    lastY     : 0,
                    nowX      : 0,
                    nowY      : 0,
                    distX     : 0,
                    distY     : 0,
                    dirAx     : 0,
                    dirX      : 0,
                    dirY      : 0,
                    lastDirX  : 0,
                    lastDirY  : 0,
                    distAxX   : 0,
                    distAxY   : 0
                };
                this.isTouch    = false;
                this.moving     = false;
                this.dragEl     = null;
                this.dragRootEl = null;
                this.dragDepth  = 0;
                this.hasNewRoot = false;
                this.pointEl    = null;
            },

            expandItem: function(li)
            {
                li.removeClass(this.options.collapsedClass);
                li.children('[data-action="expand"]').hide();
                li.children('[data-action="collapse"]').show();
                li.children(this.options.listNodeName).show();
            },

            collapseItem: function(li)
            {
                var lists = li.children(this.options.listNodeName);
                if (lists.length) {
                    li.addClass(this.options.collapsedClass);
                    li.children('[data-action="collapse"]').hide();
                    li.children('[data-action="expand"]').show();
                    li.children(this.options.listNodeName).hide();
                }
            },

            expandAll: function()
            {
                var list = this;
                list.el.find(list.options.itemNodeName).each(function() {
                    list.expandItem($(this));
                });
            },

            collapseAll: function()
            {
                var list = this;
                list.el.find(list.options.itemNodeName).each(function() {
                    list.collapseItem($(this));
                });
            },

            setParent: function(li)
            {
                if (li.children(this.options.listNodeName).length) {
                    li.prepend($(this.options.expandBtnHTML));
                    li.prepend($(this.options.collapseBtnHTML));
                }
                li.children('[data-action="expand"]').hide();
            },

            unsetParent: function(li)
            {
                li.removeClass(this.options.collapsedClass);
                li.children('[data-action]').remove();
                li.children(this.options.listNodeName).remove();
            },

            dragStart: function(e)
            {
                var mouse    = this.mouse,
                    target   = $(e.target),
                    dragItem = target.closest(this.options.itemNodeName);

                this.placeEl.css('height', dragItem.height());

                mouse.offsetX = e.offsetX !== undefined ? e.offsetX : e.pageX - target.offset().left;
                mouse.offsetY = e.offsetY !== undefined ? e.offsetY : e.pageY - target.offset().top;
                mouse.startX = mouse.lastX = e.pageX;
                mouse.startY = mouse.lastY = e.pageY;

                this.dragRootEl = this.el;

                this.dragEl = $(document.createElement(this.options.listNodeName)).addClass(this.options.listClass + ' ' + this.options.dragClass);
                this.dragEl.css('width', dragItem.width());

                dragItem.after(this.placeEl);
                dragItem[0].parentNode.removeChild(dragItem[0]);
                dragItem.appendTo(this.dragEl);

                $(document.body).append(this.dragEl);
                this.dragEl.css({
                    'left' : e.pageX - mouse.offsetX,
                    'top'  : e.pageY - mouse.offsetY
                });
                // total depth of dragging item
                var i, depth,
                    items = this.dragEl.find(this.options.itemNodeName);
                for (i = 0; i < items.length; i++) {
                    depth = $(items[i]).parents(this.options.listNodeName).length;
                    if (depth > this.dragDepth) {
                        this.dragDepth = depth;
                    }
                }
            },

            dragStop: function(e)
            {
                var el = this.dragEl.children(this.options.itemNodeName).first();
                el[0].parentNode.removeChild(el[0]);
                this.placeEl.replaceWith(el);

                this.dragEl.remove();
                this.el.trigger('change');
                if (this.hasNewRoot) {
                    this.dragRootEl.trigger('change');
                }
                this.reset();
            },

            dragMove: function(e)
            {
                var list, parent, prev, next, depth,
                    opt   = this.options,
                    mouse = this.mouse;

                this.dragEl.css({
                    'left' : e.pageX - mouse.offsetX,
                    'top'  : e.pageY - mouse.offsetY
                });

                // mouse position last events
                mouse.lastX = mouse.nowX;
                mouse.lastY = mouse.nowY;
                // mouse position this events
                mouse.nowX  = e.pageX;
                mouse.nowY  = e.pageY;
                // distance mouse moved between events
                mouse.distX = mouse.nowX - mouse.lastX;
                mouse.distY = mouse.nowY - mouse.lastY;
                // direction mouse was moving
                mouse.lastDirX = mouse.dirX;
                mouse.lastDirY = mouse.dirY;
                // direction mouse is now moving (on both axis)
                mouse.dirX = mouse.distX === 0 ? 0 : mouse.distX > 0 ? 1 : -1;
                mouse.dirY = mouse.distY === 0 ? 0 : mouse.distY > 0 ? 1 : -1;
                // axis mouse is now moving on
                var newAx   = Math.abs(mouse.distX) > Math.abs(mouse.distY) ? 1 : 0;

                // do nothing on first move
                if (!mouse.moving) {
                    mouse.dirAx  = newAx;
                    mouse.moving = true;
                    return;
                }

                // calc distance moved on this axis (and direction)
                if (mouse.dirAx !== newAx) {
                    mouse.distAxX = 0;
                    mouse.distAxY = 0;
                } else {
                    mouse.distAxX += Math.abs(mouse.distX);
                    if (mouse.dirX !== 0 && mouse.dirX !== mouse.lastDirX) {
                        mouse.distAxX = 0;
                    }
                    mouse.distAxY += Math.abs(mouse.distY);
                    if (mouse.dirY !== 0 && mouse.dirY !== mouse.lastDirY) {
                        mouse.distAxY = 0;
                    }
                }
                mouse.dirAx = newAx;

                /**
                 * move horizontal
                 */
                if (mouse.dirAx && mouse.distAxX >= opt.threshold) {
                    // reset move distance on x-axis for new phase
                    mouse.distAxX = 0;
                    prev = this.placeEl.prev(opt.itemNodeName);
                    // increase horizontal level if previous sibling exists and is not collapsed
                    if (mouse.distX > 0 && prev.length && !prev.hasClass(opt.collapsedClass)) {
                        // cannot increase level when item above is collapsed
                        list = prev.find(opt.listNodeName).last();
                        // check if depth limit has reached
                        depth = this.placeEl.parents(opt.listNodeName).length;
                        if (depth + this.dragDepth <= opt.maxDepth) {
                            // create new sub-level if one doesn't exist
                            if (!list.length) {
                                list = $('<' + opt.listNodeName + '/>').addClass(opt.listClass);
                                list.append(this.placeEl);
                                prev.append(list);
                                this.setParent(prev);
                            } else {
                                // else append to next level up
                                list = prev.children(opt.listNodeName).last();
                                list.append(this.placeEl);
                            }
                        }
                    }
                    // decrease horizontal level
                    if (mouse.distX < 0) {
                        // we can't decrease a level if an item preceeds the current one
                        next = this.placeEl.next(opt.itemNodeName);
                        if (!next.length) {
                            parent = this.placeEl.parent();
                            this.placeEl.closest(opt.itemNodeName).after(this.placeEl);
                            if (!parent.children().length) {
                                this.unsetParent(parent.parent());
                            }
                        }
                    }
                }

                var isEmpty = false;

                // find list item under cursor
                if (!hasPointerEvents) {
                    this.dragEl[0].style.visibility = 'hidden';
                }
                this.pointEl = $(document.elementFromPoint(e.pageX - document.body.scrollLeft, e.pageY - (window.pageYOffset || document.documentElement.scrollTop)));
                if (!hasPointerEvents) {
                    this.dragEl[0].style.visibility = 'visible';
                }
                if (this.pointEl.hasClass(opt.handleClass)) {
                    this.pointEl = this.pointEl.parent(opt.itemNodeName);
                }
                if (this.pointEl.hasClass(opt.emptyClass)) {
                    isEmpty = true;
                }
                else if (!this.pointEl.length || !this.pointEl.hasClass(opt.itemClass)) {
                    return;
                }

                // find parent list of item under cursor
                var pointElRoot = this.pointEl.closest('.' + opt.rootClass),
                    isNewRoot   = this.dragRootEl.data('nestable-id') !== pointElRoot.data('nestable-id');

                /**
                 * move vertical
                 */
                if (!mouse.dirAx || isNewRoot || isEmpty) {
                    // check if groups match if dragging over new root
                    if (isNewRoot && opt.group !== pointElRoot.data('nestable-group')) {
                        return;
                    }
                    // check depth limit
                    depth = this.dragDepth - 1 + this.pointEl.parents(opt.listNodeName).length;
                    if (depth > opt.maxDepth) {
                        return;
                    }
                    var before = e.pageY < (this.pointEl.offset().top + this.pointEl.height() / 2);
                    parent = this.placeEl.parent();
                    // if empty create new list to replace empty placeholder
                    if (isEmpty) {
                        list = $(document.createElement(opt.listNodeName)).addClass(opt.listClass);
                        list.append(this.placeEl);
                        this.pointEl.replaceWith(list);
                    }
                    else if (before) {
                        this.pointEl.before(this.placeEl);
                    }
                    else {
                        this.pointEl.after(this.placeEl);
                    }
                    if (!parent.children().length) {
                        this.unsetParent(parent.parent());
                    }
                    if (!this.dragRootEl.find(opt.itemNodeName).length) {
                        this.dragRootEl.append('<div class="' + opt.emptyClass + '"/>');
                    }
                    // parent root list has changed
                    if (isNewRoot) {
                        this.dragRootEl = pointElRoot;
                        this.hasNewRoot = this.el[0] !== this.dragRootEl[0];
                    }
                }
            }

        };

        $.fn.nestable = function(params)
        {
            var lists  = this,
                retval = this;

            lists.each(function()
            {
                var plugin = $(this).data("nestable");

                if (!plugin) {
                    $(this).data("nestable", new Plugin(this, params));
                    $(this).data("nestable-id", new Date().getTime());
                } else {
                    if (typeof params === 'string' && typeof plugin[params] === 'function') {
                        retval = plugin[params]();
                    }
                }
            });

            return retval || lists;
        };

    })(window.jQuery || window.Zepto, window, document);
</script>
</body>
</html>
@endsection
