<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .fake-sel{
        display: none;
        }

        .fake-sel-wrap{
        display: inline-block;
        position: relative;
        height: 46px;
        }

        .fake-sel-wrap ul{
        margin: 0;
        padding: 0;
        list-style: none;
        border: 1px solid #ddd;
        position: absolute;
        top: 0;
        left: 0;
        font-family: Arial;
        font-size: 14px;
        width: 100%;
        height: 100%;
        overflow: hidden;
        cursor: default;
        background-color: white;
        }

        .fake-sel-wrap ul li{
        padding: 3px;
        line-height: 1em;
        display: flex;
        align-items: center;
        }


        .fake-sel-wrap ul li:nth-child(1){
        border-bottom: 1px solid #ddd;
        }

        .fake-sel-wrap ul li.ativo{
        background-color: blue;
        color: white;
        }

        .fake-sel-wrap ul li:not(:nth-child(1)):not(.ativo):hover{
        background-color: #ddd;
        }


        .fake-sel-wrap ul.ativo{
        overflow: auto;
        height: auto;
        }

        .fake-sel-wrap ul li img{
        width: 40px;
        height: 40px;
        margin-right: 10px;
        }

        /* ESTE É O CSS DA SETINHA */
        .fake-sel-wrap ul li:nth-child(1)::after{
        content: '';
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 6px 5px 0 5px;
        border-color: #000000 transparent transparent transparent;
        margin-left: auto;
        }
    </style>
</head>
<body>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<select class="fake-sel">
    <option>Prima</option>
    <option>Piana</option>
    <option>Legno1 foo foo</option>
</select>


<script>
    $(function(){
    
        var sels = $(".fake-sel");
    
        var imgs_ = [
            [
                'https://www.cleverfiles.com/howto/wp-content/uploads/2016/08/mini.jpg',
                'https://oc2.ocstatic.com/images/logo_small.png',
                'https://upload.wikimedia.org/wikipedia/commons/3/3a/Cat03.jpg'
            ]
        ];
    
        sels.each(function(x){
    
            var $t = $(this);
    
            var opts_ = '', first;
    
            $t.find("option").each(function(i){
    
                if(i == 0){
                first = "<li><img src='"+ imgs_[x][i] +"'>"+ $(this).text() +"</li>";
                }
                opts_ += "<li"+ (i == 0 ? " class='ativo'" : '') +"><img src='"+ imgs_[x][i] +"'>"+ $(this).text() +"</li>";
            });
    
            $t
            .wrap("<div class='fake-sel-wrap'></div>")
            .hide()
            .parent()
            .css("width", $t.outerWidth()+60)
            .append("<ul>"+ first+opts_ +"</ul>")
            .find("ul")
            .on("click", function(e){
                e.stopPropagation();
                $(this).toggleClass("ativo");
            })
            .find("li:not(:first)")
            .on("click", function(){
                $(this)
                .addClass("ativo")
                .siblings()
                .removeClass("ativo")
                .parent()
                .find("li:first")
                .html($(this).html());
    
                $t.val($(this).text());
    
            });
        });
    
        $(document).on("click", function(){
            $(".fake-sel-wrap ul").removeClass("ativo");
        });
    
    });
    </script>
</body>
</html>