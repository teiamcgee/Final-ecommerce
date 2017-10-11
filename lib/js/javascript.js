$("#form").validate;
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

$(".addedItem").hide();
// hiding added message on product detail page
var addedItem = 0;
// counter for cart items
$("#addbtn").click(function(e) {
  e.preventDefault();
  // when the buy button is clicked
  var cartItem  = $('select').val();
  // Add the value of the select option
  addedItem += parseInt(cartItem);
  $(".cartNumber").text(addedItem);
  // Display the number in the cart div
    $(".addedItem").show();
    // show the added cart message
});
