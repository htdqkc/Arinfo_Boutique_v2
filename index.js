document.addEventListener("DOMContentLoaded", function(event) { 
    
    UpdatePannierCount();

});
function load(target, url) {
    var r = new XMLHttpRequest();
    r.open("GET", url, true);
    r.onreadystatechange = function () {
        if (r.readyState != 4 || r.status != 200) return;
        if(target == "none"){

        } else {
            target.innerHTML =  r.responseText;
        }
    };
    r.send();
}

function RemoveFromBasket(id) {
    load('none', 'data.php?display=RemoveBasket&id=' + id);
    document.getElementById('ItemId' + id).setAttribute ('style', 'display: none !important;');
    var slides = document.getElementsByClassName("Product");


    UpdatePannierCount();
    LoadPannier();
}

function getPos(el) {
    // yay readability
    for (var lx=0, ly=0;
         el != null;
         lx += el.offsetLeft, ly += el.offsetTop, el = el.offsetParent);
    return {x: lx,y: ly};
}
function difference(a, b) {
   if(a > b){
    return -Math.abs(a - b)-200;
   } else {
    return Math.abs(a - b);
   }
}

function AjoutPannier(id) {
    load('none', 'data.php?display=AddBasket&id=' + id);

    var posPannier = getPos(document.getElementById('pannierCount'))
    var posimg = getPos(document.getElementsByClassName("card-img-top")[id])
    console.log(posimg.y + '[]' + posPannier.y)

    toDirectX = difference(posimg.x, posPannier.x);
    toDirectY = difference(posimg.y, posPannier.y);

    document.getElementsByClassName("card-img-top")[id].animate([
        // keyframes

        { transform: 'translate(0px,0px)' },
        { transform: 'translate('+toDirectX+'px,'+toDirectY+'px)'},
        

      ], {
        // timing options
        duration: 1000,
        iterations: 1
      });

      document.getElementsByClassName("card-img-top")[id].animate([
        // keyframes
        { transform: 'scale(0.7)' },


      ], {
        // timing options
        duration: 1000,
        iterations: 1
      });

      document.getElementById("pannierCount").animate([
        // keyframes
        { color: 'green' },
        { fontWeight: 'bold' },


      ], {
        // timing options
        duration: 1000,
        iterations: 1
      });
    UpdatePannierCount();
}

function UpdatePannierCount() {
    load(document.getElementById('pannierCount'), 'data.php?display=PannierCount');
    PannierEnd();
}

function PannierEnd(){
  load(document.getElementById('pannierCountFinal'), 'data.php?display=PannierCountEnd');
}