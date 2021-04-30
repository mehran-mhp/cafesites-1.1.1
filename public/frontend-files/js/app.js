function more_text() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more-text");
    var btnText = document.getElementById("myBtn");
  
    if (dots.style.display === "none") {
      dots.style.display = "inline";
      btnText.innerHTML = " بیشتر "  + '<i class="fa fa-chevron-down"></i>'; 
      moreText.style.display = "none";
    } else {
      dots.style.display = "none";
      btnText.innerHTML = " کمتر " + '<i class="fa fa-chevron-up"></i>'; 
      moreText.style.display = "inline";
    }
  }
