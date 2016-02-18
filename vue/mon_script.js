$(document).ready(function() { 
   
    $('#body_verif').ready(function() {
        $.ajax({
            url: 'https://graph.facebook.com/596447807049170?fields=posts&access_token=1671896086356419|_8gk-2_y1-Bs1yns04E-ms4tkhI',
            dataType: 'json',
            success: function(json) {
                    for(var i = 0;i<json.posts.data.length; i++){
                        //test si data[i].message n'est aps du type undefined
                        if(json.posts.data[i].message){
                        var message = json.posts.data[i].message;
                        var hashword = message.match(/\s#[^\s]*|^#[^\s]*/gi);
                         $('#list_plutoto_fb').append("<div><div class=\"jumbotron\" style=\"background:#E6E6E6; \"><div class=\"row\"><div class=\"col-md-8\"><p class=\"lead\">"+json.posts.data[i].message+"<span class=\"glyphicon glyphicon-arrow-right\"></span></p></div><div class=\"col-md-4\"><p class=\"lead\">"+hashword+"</p></div><div class=\"col-md-2\"><span class=\"glyphicon glyphicon-saved\"><input type=checkbox name=options[] value="+json.posts.data[i].message.replace("'" , "")+"></span></div></div></div></div>");
                        }
                    }   
            }
        });    
        return false;
    }); 
});