
(function ($) {

    const colours = ["rgb(245, 183, 177)", "rgb(246, 221, 204)", "rgb(252, 243, 207)", 
                     "rgb(171, 235, 198)", "rgb(174, 214, 241)", "rgb(210, 180, 222)"];

    change_colour = $(".change_colour");
    change_colour.css('background-color', colours[0]);

    setInterval(function () {
        current_colour = change_colour.css('background-color');
        for(let i = 0; i < colours.length; i++){
            if(current_colour == colours[i]){
                change_colour.css('background-color', colours[i+1]);
            }
        }
    }, 1000);    
    

  })(jQuery);

