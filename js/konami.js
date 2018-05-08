$(document).ready(function () {
    var k = [38, 38, 40, 40, 37, 39, 37, 39, 66, 65],
        n = 0;
    $(document).keydown(function (e) {
        if (e.keyCode === k[n++]) {
            if (n === k.length) {

                $("<link/>", {
                    rel: "stylesheet",
                    type: "text/css",
                    href: "./css/hg.css"
                }).appendTo("head");

                $('#first').attr("style","background-image: url('img/tenor.gif');");

                $('img').attr("src","img/tenor.gif");
                $('#about img').attr("style","width:100%");

                $('body').attr("style", "cursor: url('img/tenor-cursor.gif'), pointer;");

                var audio = new Audio('./ressources/secret.mp3');
                audio.play();

                n = 0;
                return false;
            }
        }
        else {
            n = 0;
        }
    });


});