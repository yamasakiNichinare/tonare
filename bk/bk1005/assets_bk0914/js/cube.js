window.onload = function(){

    var settings = {
        interval : 12000, // cube繧貞�縺咎俣髫�
        dur : 50000, //     cube縺梧戟邯壹☆繧区凾髢�
        windowWidth : $(window).width(),
        windowHeight : $(window).height()
    }

    // cube縺ｮ譛邨ゅせ繧ｿ繧､繝ｫ險ｭ螳�
    var styleFor = {
        height : 40, // cube縺ｮ鬮倥＆
        width : 40, // cube縺ｮ蟷�
        'border-width' : 10 // cube縺ｮ鄂ｫ邱壼ｹ�
    }

    // cube縺ｮ蛻晄悄繧ｹ繧ｿ繧､繝ｫ險ｭ螳�
    var styleInit = {
        position:'absolute',
        'z-index' : 1,
        display : 'inline-block',
        border : 'solid 4px #eaeaea',
        height : 8,
        width : 8,
        adj : 0
    }

    var cube = {
        init : function(){
            $('#snow')
                .wrapInner('<div style="position:relative;z-index:2"></div>')
                .append('<div style="position:absolute;top:0;left:0;z-index:10" id="cube-area"></div>');

            $('#cube-area').css({
                height : settings.windowHeight,
                width : settings.windowWidth
            });

            styleInit.adj = styleFor['border-width'] + styleFor['width'];
        },
        add : function(){
            var initX = cube.getRandomX();
            var initY = cube.getRandomY();

            var endX = cube.getRandomX();
            var endY = cube.getRandomY();

            styleFor.left = endX;
            styleFor.top = endY;

            $('#cube-area').append($('<div class="block"><img src="assets/images/top/sakura.png"></div>')
                                   .css(styleInit) // end init
                                   .css({
                top : initY,
                left : initX,
            })
                                   .animate(styleFor,{
                easing : 'linear',
                duration : settings.dur,
                complete : function(){
                    $(this).fadeOut(100,function(){
                        $(this).remove();
                    });
                }
            }
                                           )
                                  );
        },
        getRandomX : function(){
            return Math.floor( Math.random() * settings.windowWidth - styleInit.adj);
        },
        getRandomY : function(){
            return Math.floor( Math.random() * settings.windowHeight );
        }
    }


    // execute
    cube.init();
    setInterval(function(){
        cube.add();
    },settings.interval);
}
