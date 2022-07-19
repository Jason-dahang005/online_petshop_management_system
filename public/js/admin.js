// OPEN && CLOSE ADMIN MODAL START =============

// COUPON
window.addEventListener('OpenCouponModal', function(){
  $('#OpenCouponModal').find('span').html('');
  $('#OpenCouponModal').find('form')[0].reset();
  $('#OpenCouponModal').modal('show');
});

window.addEventListener('CloseCouponModal', function(){
  $('#OpenCouponModal').find('span').html('');
  $('#OpenCouponModal').find('form')[0].reset();
  $('#OpenCouponModal').modal('hide');
  toastr.success("Coupon Added Successfully!");
});

// HOME SLIDER HOME
window.addEventListener('OpenHomeSliderModal', function(){
  $('.OpenHomeSliderModal').find('span').html('');
  $('.OpenHomeSliderModal').find('form')[0].reset();
  $('.OpenHomeSliderModal').modal('show');
});

window.addEventListener('CloseHomeSliderModal', function(){
  $('#OpenHomeSliderModal').find('span').html('');
  $('#OpenHomeSliderModal').find('form')[0].reset();
  $('#OpenHomeSliderModal').modal('hide');
  toastr.success("Slider Added Successfully!");
});

// RECEIVED DELIVERY UPDATE
window.addEventListener('ReceivedModal', function(){
  alert('hello');
})

// DELIVERY STATUS UPDATE
window.addEventListener('OpenDeliveryStatusModal', function(){
  $('#OpenDeliveryStatusModal').modal('show');
});

window.addEventListener('CloseDeliveryStatusModal', function(){
  $('#OpenDeliveryStatusModal').modal('hide');
});

// ORDER DETAILS SHOW
window.addEventListener('OpenOrderDetailsModal', function(){
  $('#OpenOrderDetailsModal').modal('show');
})

// ORDER STATUS UPDATE
window.addEventListener('OpenUpdateOrderStatusModal', function(){
  $('#OpenUpdateOrderStatusModal').modal('show');
});

window.addEventListener('CloseUpdateOrderStatusModal', function(){
  $('#OpenUpdateOrderStatusModal').modal('hide');
  toastr.success("Order Approved Successfully!");
})

// DELIVERY USER STORE
window.addEventListener('OpenAddUserModal', function(){
  $('#OpenAddUserModal').find('span').html('');
  $('#OpenAddUserModal').find('form')[0].reset();
  $('#OpenAddUserModal').modal('show');
});

window.addEventListener('CloseAddUserhModal', function(){
  $('#OpenAddUserModal').find('span').html('');
  $('#OpenAddUserModal').find('form')[0].reset();
  $('#OpenAddUserModal').modal('hide');
  toastr.success("User Added Successfully!");
});

// GOLDFISH STORE
window.addEventListener('OpenGoldfishModal', function(){
  $('#OpenGoldfishModal').find('span').html('');
  $('#OpenGoldfishModal').find('form')[0].reset();
  $('#OpenGoldfishModal').modal('show');
});

window.addEventListener('CloseGoldfishModal', function(){
  $('#OpenGoldfishModal').find('span').html('');
  $('#OpenGoldfishModal').find('form')[0].reset();
  $('#OpenGoldfishModal').modal('hide');
  toastr.success("Goldfish Added Successfully!");
});

// GOLDFISH UPDATE
window.addEventListener('OpenEditGoldfishModal', function(){
  $('#OpenEditGoldfishModal').find('span').html('');
  $('#OpenEditGoldfishModal').modal('show');
});

window.addEventListener('CloseEditGoldfishModal', function(){
  $('#OpenEditGoldfishModal').find('span').html('');
  $('#OpenEditGoldfishModal').find('form')[0].reset();
  $('#OpenEditGoldfishModal').modal('hide');
  toastr.success("Goldfish Updated Successfully!");
});

// GOLDFISH VIEW
window.addEventListener('OpenViewGoldfishModal', function(){
  $('#OpenViewGoldfishModal').find('span').html('');
  $('#OpenViewGoldfishModal').modal('show');
});

window.addEventListener('CloseViewGoldfishModal', function(){
  $('#OpenViewGoldfishModal').find('span').html('');
  $('#OpenViewGoldfishModal').find('form')[0].reset();
  $('#OpenViewGoldfishModal').modal('hide');
});

// PRODUCT CATEGORY STORE
window.addEventListener('OpenProductCategoryModal', function(){
  $('#OpenProductCategoryModal').find('span').html('');
  $('#OpenProductCategoryModal').find('form')[0].reset();
  $('#OpenProductCategoryModal').modal('show');
});

window.addEventListener('CloseProductCategoryModal', function(){
  $('#OpenProductCategoryModal').find('span').html('');
  $('#OpenProductCategoryModal').find('form')[0].reset();
  $('#OpenProductCategoryModal').modal('hide');
  toastr.success("Product Category Added Successfully!");
});

// PRODUCT CATEGORY UPDATE
window.addEventListener('OpenEditProductCategoryModal', function(event){
  $('#OpenEditProductCategoryModal').find('span').html('');
  $('#OpenEditProductCategoryModal').modal('show');
});

window.addEventListener('CloseEditProductCategoryModal', function(event){
  $('#OpenEditProductCategoryModal').find('span').html('');
  $('#OpenEditProductCategoryModal').find('form')[0].reset();
  $('#OpenEditProductCategoryModal').modal('hide');
  toastr.success("Product Category Updated Successfully!");
});

//PRODUCT STORE
window.addEventListener('OpenAddProductModal', function(){
  $('#AddNewProductModal').find('span').html('');
  $('#AddNewProductModal').find('form')[0].reset();
  $('#AddNewProductModal').modal('show');
});

window.addEventListener('CloseAddProductModal', function(){
  $('#AddNewProductModal').find('span').html('');
  $('#AddNewProductModal').find('form')[0].reset();
  $('#AddNewProductModal').modal('hide');
  toastr.success("Product Added Successfully!");
});

//PRODUCT UPDATE
window.addEventListener('OpenEditProductModal', function(){
  $('#OpenEditProductModal').find('span').html('');
  $('#OpenEditProductModal').modal('show');
});

window.addEventListener('CloseEditProductModal', function(){
  $('#OpenEditProductModal').find('span').html('');
  $('#OpenEditProductModal').find('form')[0].reset();
  $('#OpenEditProductModal').modal('hide');
  toastr.success("Product Added Successfully!");
});

//PRODUCT VIEW
window.addEventListener('OpenViewProductModal', function(){
  $('#OpenViewProductModal').find('span').html('');
  $('#OpenViewProductModal').modal('show');
});

window.addEventListener('CloseViewProductModal', function(){
  $('#OpenViewProductModal').find('span').html('');
  $('#OpenViewProductModal').find('form')[0].reset();
  $('#OpenViewProductModal').modal('hide');
});

// OPEN && CLOSE ADMIN MODAL CLOSE =============

// ====== D A T A T A B L E 

// DATATABLE FOR PRODUCT CATEGORY START
// $('#product_category_table').DataTable({
//   "paging": true,
//   "lengthChange": true,
//   "searching": true,
//   "ordering": true,
//   "info": true,
//   "autoWidth": true,
//   "responsive": true,
// });

// DATATABLE FOR PRODUCT CATEGORY END