function ask() {
    if ($('#input').val().trim() === '') {
        $('#input').val('').attr('placeholder','Type something!').focus();
    }
    else {
        nelo.idle = 0;
        $('#body').removeClass('showImage');
        $('#dialogbox').fadeOut();
        $('#query input[type="submit"]').attr('disabled', 'disabled');
        $('#input').attr('disabled', 'disabled');
        
        if($('#input').val().toLowerCase().indexOf('guitar')>-1||
            $('#input').val().toLowerCase().indexOf('music')>-1||
            $('#input').val().toLowerCase().indexOf('song')>-1||
            $('#input').val().toLowerCase().indexOf('sing')>-1){
            nelo.guitar = true;
            playGuitar(true);
        }
        else{
            nelo.guitar = false;
            nelo.read = true;
            read(true);
        }
        $.ajax({
            url: 'api/wolframalpha.php',
            type: 'get',
            data: {
                input: $('#input').val().trim()
            },
            success: function(data) {
                nelo.guitar = false;
                var result = $(data).find('queryresult').eq(0);
                if (result.attr('success')==='true') {
                    
                    var graphic = $(data).find('pod[title="Image"] subpod img').eq(0).attr('src');
                    showImage(graphic);
                    
                    var node = $(data).find('pod:nth-child(2) subpod');
                    var response = node.find('img');
                    response = response?response:node.find('plaintext');
                    if (!response) {
                        node = $(data).find('pod:nth-child(1) subpod');
                        response = node.find('img');
                        response = response?response:node.find('plaintext');
                    }
                    if (!response) {
                        chat();
                    }
                    else {
                        var define = $('#input').val().toLowerCase().indexOf('defin')>-1||
                                $('#input').val().toLowerCase().indexOf('what')>-1;
                        if(((node.parent('pod').attr('title').indexOf('Definition')>-1)&&(!define))||
                            (node.parent('pod').attr('title').indexOf('Response')>-1)){
                            chat();
                        }
                        else{
                            var image = node.find('img').eq(0);
                            if (image) {
                                sayVisually(image);
                            }
                            else {
                                say(response);
                            }
                        }
                    }
                }
                else {
                    chat();
                }
            }
        });
    }
    return false;
}