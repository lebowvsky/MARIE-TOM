
// JQuery ici .....

$(function() {
  	


});



// Javascript ici .....

//  *************   Collage footer en bas   ************    //
function setFooter() {
    if (document.getElementById) {
        var windowHeight=getWindowHeight();
        if (windowHeight>0) {
            var contentHeight=document.getElementById('container').offsetHeight;
            var footerElement=document.getElementById('footer');
            var footerHeight=footerElement.offsetHeight;
        if (windowHeight-(contentHeight+footerHeight)>=0) {
            footerElement.style.position='relative';
            footerElement.style.top=
            (windowHeight-(contentHeight+footerHeight))+'px';
        }
        else {
            footerElement.style.position='static';
        }
       }
      }
}

window.onload = function() {
setFooter();
}
window.onresize = function() {
setFooter();
}

//  *********   Page active ******************* //

//  *********   Fleches du menu *************** //

var liElt = document.getElementsByClassName('panel');

for (var i=1; i<liElt.length; i++) {
    liElt[i].addEventListener("click", function(){
        this.getElementsByTagName('span')[0].classList.toggle("fa-caret-down");
        this.getElementsByTagName('span')[0].classList.toggle("fa-caret-up");
    });
}