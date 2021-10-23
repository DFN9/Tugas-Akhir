var obj = document.querySelectorAll(".thumbs");
var preview = document.querySelector("#preview");
obj.forEach(function(im) {
  im.addEventListener("click", function() {
    var imobj = new Image();
    var closebtn = document.createElement("div");
    closebtn.innerHTML = "&times";
    closebtn.classList.add("closebtn");
    closebtn.onclick = function() {
      preview.innerHTML = "";
      preview.style.display = "none";
    }
    imobj.src = this.href;
    imobj.classList.add("beau-img");
    preview.appendChild(closebtn);
    preview.appendChild(imobj);
    preview.style.display = "block";
  });
});   