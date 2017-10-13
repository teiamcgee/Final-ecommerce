$("#form").validate();
// Validating form on contact page using jQuery plugin
$(document).ready(function(){
  $('.banner').slick({
    // Slick slide show
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 1000,
  });
});

function itemAdded() {
  // forms returns a collection of the form elements within the current document.
  var item = document.forms['quantity-form'] ['quantity'].value;
  alert("You have added " + item + " to your cart");
}
