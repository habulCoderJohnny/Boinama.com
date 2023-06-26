$(function ($) {
    "use strict";


    $(document).ready(function () {


// Adding Muliple Quantity Starts

var sizes = "";
var size_qty = "";
var size_price = "";
var size_key = "";
var colors = "";
var total = "";
var stock = $("#stock").val();
var keys = "";
var values = "";
var prices = "";

// Product Details Product Size Active Js Code
$(document).on('click', '.product-size .siz-list .box', function () {
    $('.qttotal').html($('.qttotal').attr('data'));
    var parent = $(this).parent();
     size_qty = $(this).find('.size_qty').val();
     size_price = $(this).find('.size_price').val();
     size_key = $(this).find('.size_key').val();
  sizes = $(this).find('.size').val();
  $('.hidden-add-to-cart').attr('rel1', sizes);
            $('.product-size .siz-list li').removeClass('active');
            parent.addClass('active');
     total = getAmount()+parseFloat(size_price);
     total = total.toFixed(2);
     stock = size_qty;

     var pos = $('#curr_pos').val();
     var sign = $('#curr_sign').val();
     if(pos == '0')
     {
     $('#sizeprice').html(sign+total);
     }
     else {
     $('#sizeprice').html(total+sign);
     }

});
        
        
$(document).on('click', '.cart-remove', function(){
    var $selector = $(this).data('class');
    $('.'+$selector).hide();
      $.get( $(this).data('href') , function( data ) {
          if (data == 0) {
              $('.cart-total').html('0.00');
              $('.main-total').html('0.00');
              $('.discount').html('0');
              $('.tax').html('0');
              $('#order_create_btn').attr('disabled',true)
            }
          else {
             
             $('.cart-quantity').html(data[1]);
             $('.cart-total').html(data[0]);
             $('.coupon-total').val(data[0]);
             $('.main-total').html(data[3]);
            }
      });
});
        
        
        
    $(document).on('click',"#coupon_submit_btn", function () {
        var val = $("#code").val();
        var total = $("#grandtotal").val();
            $.ajax({
                    type: "GET",
                    url:mainurl+"/admin/carts/coupon",
                    data:{code:val, total:total},
                    success:function(data){
                        if(data == 0)
                        {
                            $.notify("Coupon not found","error");
                            $("#code").val("");
                        }
                        else if(data == 2)
                        {
                            $.notify("Coupon allready exists","error");
                            $("#code").val("");
                        }
                        else
                        {
                            $.notify("Coupon added successfully","success");
                          $('#coupon_amount').val(data[2]);
                            $(".discount").html(data[4]);
                          $("#code").val("");
                          grandTotal();
                        }
                      }
              });
              return false;
    });
        
        
      // Quick View Section

    $(document).on('click', '.quick-view', function(){
        var $this = $("#quickview");
        $this.find('.modal-header').hide();
        $this.find('.modal-body').hide();
        $this.find('.modal-content').css('border','none');
          $('.submit-loader').show();
          $(".quick-view-modal").load($(this).data('href'),function(response, status, xhr){
            if(status == "success")
            $('.quick-zoom').on('load', function(){
            $('.submit-loader').hide();
                $this.find('.modal-header').show();
                $this.find('.modal-body').show();
                $this.find('.modal-content').css('border','1px solid #00000033');
      $('.quick-all-slider').owlCarousel({
          loop: true,
          dots: false,
          nav: true,
          navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
          margin: 0,
          autoplay: false,
          items: 4,
          autoplayTimeout: 6000,
          smartSpeed: 1000,
          responsive: {
              0: {
                  items: 4
              },
              768: {
                  items: 4
              }
          }
      });
    });
          });
  
                return false;
  
      });
  // Quick View Section Ends
    
        
        
        

// Product Details Attribute Code 
$(document).on('change','.product-attr',function(){

         var total = 0;
         total = getAmount()+getSizePrice();
         total = total.toFixed(2);
         var pos = $('#curr_pos').val();
         var sign = $('#curr_sign').val();
         if(pos == '0')
         {
         $('#sizeprice').html(sign+total);
         }
         else {
         $('#sizeprice').html(total+sign);
         }
});


function getSizePrice()
{

  var total = 0;
  if($('.product-size .siz-list li').length > 0)
  {
    total = parseFloat($('.product-size .siz-list li.active').find('.size_price').val());
  }

  return total;
}


function getAmount()
{
  var total = 0;
  var value = parseFloat($('#product_price').val());
  var datas = $(".product-attr:checked").map(function() {
     return $(this).data('price');
  }).get();

  var data;
  for (data in datas) {
    total += parseFloat(datas[data]);
  }
  total += value;
  return total;
}


    /*-----------------------------
        Cart Page Quantity
    -----------------------------*/
    $(document).on('click', '.qtminus', function () {
        var el = $(this);
      var $tselector = el.parent().parent().find('.qttotal');
      var min_qty = parseInt($('.qttotal').attr('data'));
        total = $($tselector).text();
        if (total > min_qty) {
            total--;
        }
        $($tselector).text(total);
    });

    $(document).on('click', '.qtplus', function () {
        var el = $(this);
        var $tselector = el.parent().parent().find('.qttotal');
        total = $($tselector).text();
        if(stock != "")
        {
            var stk = parseInt(stock);
              if(total < stk)
              {
                 total++;
                 $($tselector).text(total);
              }
        }
        else {
        total++;
        }

        $($tselector).text(total);
    });







// Adding Muliple Quantity Ends

// Add By ONE

      $(document).on("click", ".adding" , function(){
        var pid =  $(this).parent().parent().find('.prodid').val();
        var itemid =  $(this).parent().parent().find('.itemid').val();
        var size_qty = $(this).parent().parent().find('.size_qty').val();
        var size_price = $(this).parent().parent().find('.size_price').val();
        var stck = $("#stock"+itemid).val();
        var qty = $("#qty"+itemid).html();
        if(stck != "")
        {
        var stk = parseInt(stck);
          if(qty < stk)
          {
             qty++;
         $("#qty"+itemid).html(qty);
          }
        }
        else{
         qty++;
         $("#qty"+itemid).html(qty);
        }
            $.ajax({
                    type: "GET",
                    url:mainurl+"/admin/addbyone",
                    data:{id:pid,itemid:itemid,size_qty:size_qty,size_price:size_price},
                    success:function(data){
                        if(data == 0)
                        {
                        }
                        else
                        {
                        $(".discount").html($("#d-val").val());
                        $(".cart-total").html(data[0]);
                        $(".main-total").html(data[3]);
                        $(".coupon-total").val(data[3]);
                        $("#prc"+itemid).html(data[2]);
                        $("#prct"+itemid).html(data[4]);
                        $("#cqt"+itemid).html(data[1]);
                        $("#qty"+itemid).html(data[1]);
                        }
                      }
              });
       });

// Reduce By ONE

      $(document).on("click", ".reducing" , function(){
        
        $('.xloader').removeClass('d-none');


        var pid =  $(this).parent().parent().find('.prodid').val();
        var itemid =  $(this).parent().parent().find('.itemid').val();
        var size_qty = $(this).parent().parent().find('.size_qty').val();
        var size_price = $(this).parent().parent().find('.size_price').val();
        var stck = $("#stock" + itemid).val();
        var min_qty = parseInt($("#qty"+itemid).attr('data'));
        var qty = $("#qty"+itemid).html();
        qty--;
          if (qty < 1) {
              $("#qty" + itemid).html("1");
          }
          else {
              if (qty < min_qty) {
                  $("#qty" + itemid).html(min_qty);
              }
              else {
                  $("#qty" + itemid).html(qty);
                  $.ajax({
                      type: "GET",
                      url: mainurl + "/admin/reducebyone",
                      data: { id: pid, itemid: itemid, size_qty: size_qty, size_price: size_price },
                      success: function (data) {
                          $(".discount").html($("#d-val").val());
                          $(".cart-total").html(data[0]);
                          $(".main-total").html(data[3]);
                          $(".coupon-total").val(data[3]);
                          $("#prc" + itemid).html(data[2]);
                          $("#prct" + itemid).html(data[4]);
                          $("#cqt" + itemid).html(data[1]);
                          $("#qty" + itemid).html(data[1]);
                      }
                  });
              }
          }
          $('.xloader').addClass('d-none');
       });



// Cart Section Ends


});


});
