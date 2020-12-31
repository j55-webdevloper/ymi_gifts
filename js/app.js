$(document).ready(function() {
    
    // Animate on Scroll Initialization
    AOS.init({
        duration: 1000,
        mirror: true
    });

    setTimeout(function() {
        if(window.location.href.indexOf("success") > -1){
            window.location.href = 'https://www.ymicollection.com/';
        }
        else{
            console.log('nacos');
        }
    }, 3000);

});