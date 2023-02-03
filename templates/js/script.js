document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.modal');
    var instances = M.Modal.init(elems);
  });

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems);
  });

  document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems);
  });
  
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.carousel');
    var instances = M.Carousel.init(elems,{
      fullWidth: true,
      indicators: true
    });
  
  });


  document.addEventListener('changeicon', function() {
    var icon = document.getElementById('add');
    if (icon.innerHTML!=('add')){
        icon.addEventListener('click',() => icon.innerHTML = "add" )
    }else{
        icon.addEventListener('click',() => icon.innerHTML = "remomve" )
    }
  });

  $(document).ready(function(){
    $('.collapsible').collapsible();
  });