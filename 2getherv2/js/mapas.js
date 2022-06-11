function play() {
    var audio = new Audio('/recursos/bark.mp3');
    audio.volume = 0.03;
    audio.play();
  }

function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
}

function rickroll(url) {
    window.open(url, '_blank').focus();
  }