function hideAnimation(tweet)
{
    console.log($(tweet).prev());
    if(tweet.innerHTML == 'Hide') {
        $(tweet).prev().animate({
            opacity: 0.25,
        }, 500, function() {
            tweet.innerHTML = 'Show';
        });
    } else {
        $(tweet).prev().animate({
            opacity: 1,
        }, 500, function() {
            tweet.innerHTML = 'Hide';
        });
    }
} 