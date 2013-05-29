$(document).ready(function() {
$('.sign-in-box').hide();	
$('.menu-root').hide();
$('.nav-menu').css("overflow","visible");
      $('.nav-menu').mouseover(function(){
$('.menu-root').show();
}); 

  $('.menu-root').mouseout(function(){  
  $('.menu-root').hide();

}); 
  $('.nav-menu').mouseout(function(){
  $('.menu-root').hide();
}); 

$('.ab-category-gird-view').click(function() {
$('.ab-product-box').css("float","left");
$('.price-box').css('float','none');
$('.ab-category-gird-view').css("background-color","#f1f1f1");
$('.ab-category-list-view').css("background-color","#fff");
$('.ab-product-box-in').css("width","158px");
$('.ab-product-box-in').css("height","170px");
$('.ab-product-box').css("float","left");
$('.ab-product-box').css("padding"," 20px 10px");
$('.ab-product-box').css("height","auto");
$('.ab-product-name').css("text-align","center");
$('.full-box-a').css("height","170px");
$('.full-box-a').css("width","168px");
$('.ab-product-box').css("border","none");
$('.ab-product-price').css("text-align","center");
});

$('.ab-category-list-view').click(function() {
$('.ab-product-box').css("float","none");
$('.ab-product-price').css("text-align","left");
$('.ab-category-list-view').css("background-color","#f1f1f1");
$('.ab-category-gird-view').css("background-color","#fff");
$('.ab-product-box').css("width","auto");
$('.ab-product-box').css("height","115px");
$('.ab-product-box').css("padding","10px");
$('.ab-product-box-in').css("width","auto");
$('.ab-product-box-in').css("height","105px");
$('.ab-product-image').css("width","150px");
$('.ab-product-image').css("float","left");
$('.ab-product-name').css("text-align","left");
$('.ab-product-image').css("margin-right","15px");
$('.full-box-a').css("height","105px");
$('.full-box-a').css("width","730px");
$('.ab-product-box').css("border-bottom","1px dotted #ccc");


 });

$('.sign-in-tab').click(function() {

$('.sign-in-box').show();
$('.sign-in-tab').css("overflow","visible");
$('.sign-in-tab').css("border-bottom","none");
   });
   
 
});
