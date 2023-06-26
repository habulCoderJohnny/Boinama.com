// // Cross Sell Modal Starts
// $(document).on('click', '.crosssell-btn', function(e) {
//     e.preventDefault();
    
//     // console.log('clicked');

//     let href = $(this).data('cs_href');
    
//     $("#crossSellModal").modal('show');
    
//     $('.submit-loader').show();
    
    
//     $("#crossProducts").load(href, function() {
//         $('#crossSellModal .modal-content').attr('style', '');
//         // $('#crossSellModal').on('shown.bs.modal', function (e) {
        
//             // trending item  slider
//             var $trending_slider = $('.trending-item-slider');
//             $trending_slider.owlCarousel({
//                 items: 4,
//                 autoplay: false,
//                 margin: 10,
//                 loop: false,
//                 dots: true,
//                 nav: true,
//                 center: false,
//                 stagePadding: 10,
//                 autoplayHoverPause: true,
//                 navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
//                 smartSpeed: 800,
//                 responsive: {
//                     0: {
//                         items: 2,
//                     },
//                     414: {
//                         items: 2,
//                     },
//                     768: {
//                         items: 2,
//                     },
//                     992: {
//                         items: 3
//                     },
//                     1200: {
//                         items: 3
//                     }
//                 }
//             });          
//         // });

//     });
    
// $('.submit-loader').hide();
// $(this).prev(".hidden-add-to-cart").trigger('click');
    
// });
// // Cross Sell Modal Ends


// $(document).on('click', '.hidden-add-to-cart', function(e){

//     e.preventDefault();
 
//      href = $(this).data('href') + '?color='+$(this).attr('rel')+'&size='+$(this).attr('rel1');
  
    
//     console.log(href);
    
//     setTimeout(function() {
      
      
//         $.get(href, function( data ) {

//           if(data == 'digital') {
//             toastr.error(langg.already_cart);
//           }
//           else if(data == 0) {
//             toastr.error(langg.out_stock);
//             }
//           else {
            
//             $("#cart-count").html(data[0]);
            
//             $("#cart-items").load(mainurl+'/carts/view');
            
//             toastr.success(langg.add_cart);
          
//           }
//        });
//     }, 1000);

    
// });