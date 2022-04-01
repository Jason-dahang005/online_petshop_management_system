// OPEN && CLOSE ADMIN MODAL START =============

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