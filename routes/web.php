<?php

//use Illuminate\Support\Facades\Route;
//
///*
//|--------------------------------------------------------------------------
//| Web Routes
//|--------------------------------------------------------------------------
//|
//| Here is where you can register web routes for your application. These
//| routes are loaded by the RouteServiceProvider within a group which
//| contains the "web" middleware group. Now create something great!
//|
//*/
//
//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/','EcommeceController@index')->name('/');
Route::get('contact-us','EcommeceController@contactus')->name('contact-us');
Route::post('message-send','EcommeceController@messagesend')->name('message-send');
//    our-product
Route::get('/our-product/{id}',[
    'uses'  =>'EcommeceController@ourproduct',
    'as'    =>'our-product'
]);
Route::get('/all-categorys/{id}',[
    'uses'  =>'EcommeceController@allcategorys',
    'as'    =>'all-categorys'
]);
Route::get('/our-brand-product/{id}',[
    'uses'  =>'EcommeceController@ourbrandproduct',
    'as'    =>'our-brand-product'
]);
Route::get('/our-latest-product',[
    'uses'  =>'EcommeceController@ourlatestproduct',
    'as'    =>'our-latest-product'
]);
Route::get('/our-primium-product',[
    'uses'  =>'EcommeceController@ourprimiumproduct',
    'as'    =>'our-primium-product'
]);
Route::get('/product-details/{id}',[
    'uses'  =>'EcommeceController@productdetails',
    'as'    =>'product-details'
]);
Route::get('/menu/{id}',[
    'uses'      =>'EcommeceController@productPage',
    'as'        =>'menu',
]);
Route::get('/brand-product/{id}',[
    'uses'      =>'EcommeceController@productBrand',
    'as'        =>'brand-product',
]);
//=================== search ==============
Route::post('/search',[
    'uses'      =>'EcommeceController@search',
    'as'        =>'search',
]);
//======================Login==============
Route::get('/customer-login',[
    'uses'  =>'EcommeceController@customerlogin',
    'as'    =>'customer-login'
]);
Route::post('/new-customer',[
    'uses'      =>'EcommeceController@saveCustomer',
    'as'        =>'new-customer',
]);
Route::post('/customer-login',[
    'uses'      =>'EcommeceController@customerLoginCheck',
    'as'        =>'customer-login',
]);
Route::get('/customer-logout',[
    'uses'      =>'EcommeceController@customerLogout',
    'as'        =>'customer-logout',
]);

//===============WishList===========
Route::get('/wish-list',[
    'uses'      =>'EcommeceController@wishlist',
    'as'        =>'wish-list',
]);
Route::post('/new-wish-list',[
    'uses'      =>'EcommeceController@newwishlist',
    'as'        =>'new-wish-list',
]);
Route::get('/wish-list-remove/{id}',[
    'uses'      =>'EcommeceController@removeWishList',
    'as'        =>'wish-list-remove',
]);
//===================Cart==============
Route::post('/cart-add',[
    'uses'      =>'CartController@cartAdd',
    'as'        =>'cart-add',
]);

Route::get('/show-cart',[
    'uses'      =>'CartController@showCart',
    'as'        =>'show-cart',
]);

Route::post('/cart-update',[
    'uses'      =>'CartController@cartupdate',
    'as'        =>'cart-update',
]);

Route::get('/cart-remove/{id}',[
    'uses'      =>'CartController@removeCart',
    'as'        =>'cart-remove',
]);

Route::get('/cart-increment/(rowId}','CartController@cartIncrement');
Route::get('/cart-decrement/(rowId}','CartController@cartDecrement');


//===================Check out ==============
Route::get('/checkout',[
    'uses'      =>'CheckoutController@index',
    'as'        =>'checkout',
]);
//===================shipping ==============
Route::post('/shipping',[
    'uses'      =>'CheckoutController@saveShipping',
    'as'        =>'shipping',
]);

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);


Route::group(['middleware'=>'auth'],function (){

    Route::get('/home', 'HomeController@index')->name('home');

    //.....role and permission
    Route::get('/roles','RolesController@roles')->name('roles');
    Route::get('/manage-roles','RolesController@manageroles')->name('manage-roles');
    Route::post('/add-roles','RolesController@addroles')->name('add-roles');
    Route::get('/edit-roles/{id}','RolesController@editroles');
    Route::post('/update-roles','RolesController@updateroles')->name('update-roles');
    Route::get('/delete-roles/{id}','RolesController@deleteroles')->name('delete-roles');
    //.....end role and permission..
    //....Users....
    Route::get('/users','UsersController@users')->name('users');
    Route::post('/add-users','UsersController@addusers')->name('add-users');
    Route::get('/manage-users','UsersController@manageusers')->name('manage-users');
    Route::get('/edit-users/{id}','UsersController@editusers')->name('edit-users');
    Route::post('/update-users','UsersController@updateusers')->name('update-users');
    Route::get('/delete-users/{id}','UsersController@deleteusers')->name('delete-users');
    //end Users....

    // department start //
    Route::get('/department', [
        'uses' => 'DepartmentController@index',
        'as' => 'department',
    ]);
    Route::post('/department', [
        'uses' => 'DepartmentController@saveDepartment',
        'as' => 'department',
    ]);
    Route::get('/department-status/{id}', [
        'uses' => 'DepartmentController@statusDepartment',
        'as' => 'department-status',
    ]);
    Route::get('/edit-department/{id}', [
        'uses' => 'DepartmentController@editDepartment',
        'as' => 'edit-department',
    ]);
    Route::post('/update-department', [
        'uses' => 'DepartmentController@updateDepartment',
        'as' => 'update-department',
    ]);
    Route::get('/delete-department/{id}', [
        'uses' => 'DepartmentController@deleteDepartment',
        'as' => 'delete-department',
    ]);
    //    Start Category

    Route::get('/add-category', [
        'uses'          =>'CategoryController@index',
        'as'            =>'add-category',
    ]);
    Route::post('/new-category', [
        'uses'          =>'CategoryController@saveCategory',
        'as'            =>'new-category',
    ]);
    Route::get('/published-category/{id}',[
        'uses'  =>'CategoryController@publishedCategory',
        'as'    =>'published-category'
    ]);

    Route::get('/unpublished-category/{id}',[
        'uses'  =>'CategoryController@unpublishedCategory',
        'as'    =>'unpublished-category'
    ]);
    Route::get('/edit-category/{id}',[
        'uses'  =>'CategoryController@editCategory',
        'as'    =>'edit-category'
    ]);
    Route::post('update-category',[
        'uses'  =>'CategoryController@updateCategory',
        'as'    =>'update-category'
    ]);

    Route::get('/delete-category/{id}',[
        'uses'  =>'CategoryController@deleteCategory',
        'as'    =>'delete-category'
    ]);

//    End Category

//    Start sub category
    Route::get('/sub-category',[
        'uses'      =>'SubCategoryController@index',
        'as'        =>'sub-category',
    ]);
    Route::post('/new-sub-category', [
        'uses'          =>'SubCategoryController@saveSubCategory',
        'as'            =>'new-sub-category',
    ]);
    Route::get('/manage-sub-category',[
        'uses'  =>'SubCategoryController@manageSubCategory',
        'as'    =>'manage-sub-category',
    ]);
    Route::get('/published-sub-category/{id}',[
        'uses'  =>'SubCategoryController@publishedSubCategory',
        'as'    =>'published-sub-category'
    ]);

    Route::get('/unpublished-sub-category/{id}',[
        'uses'  =>'SubCategoryController@unpublishedSubCategory',
        'as'    =>'unpublished-sub-category'
    ]);
    Route::get('/edit-sub-category/{id}',[
        'uses'  =>'SubCategoryController@editSubCategory',
        'as'    =>'edit-sub-category'
    ]);
    Route::post('/update-sub-category', [
        'uses'          =>'SubCategoryController@updateSubCategory',
        'as'            =>'update-sub-category',
    ]);

    Route::get('/delete-sub-category/{id}',[
        'uses'  =>'SubCategoryController@deleteSubCategory',
        'as'    =>'delete-sub-category'
    ]);

//    End sub category
    //----------Start brands Module----------
    Route::get('/add-brand', [
        'uses'          =>'BrandController@index',
        'as'            =>'add-brand',
    ]);
    Route::post('/new-brand', [
        'uses'          =>'BrandController@saveBrand',
        'as'            =>'new-brand',
    ]);
    Route::post('/update-brand', [
        'uses'          =>'BrandController@updatebrand',
        'as'            =>'update-brand',
    ]);
    Route::get('/manage-brand',[
        'uses'  =>'BrandController@manageBrand',
        'as'    =>'manage-brand',
    ]);
    Route::get('/edit-brand/{id}',[
        'uses'  =>'BrandController@editbrand',
        'as'    =>'edit-brand'
    ]);
    Route::get('/published-brand/{id}',[
        'uses'  =>'BrandController@publishedBrand',
        'as'    =>'published-brand'
    ]);

    Route::get('/unpublished-brand/{id}',[
        'uses'  =>'BrandController@unpublishedBrand',
        'as'    =>'unpublished-brand'
    ]);

    Route::get('/delete-brand/{id}',[
        'uses'  =>'BrandController@deleteBrand',
        'as'    =>'delete-brand'
    ]);

//----------End brands Module----------
    //----------Start Supplier Module----------
    Route::get('/add-supplier', [
        'uses'          =>'SupplierController@index',
        'as'            =>'add-supplier',
    ]);
    Route::post('/new-supplier', [
        'uses'          =>'SupplierController@saveSupplier',
        'as'            =>'new-supplier',
    ]);
    Route::get('/manage-supplier',[
        'uses'  =>'SupplierController@manageSupplier',
        'as'    =>'manage-supplier',
    ]);
    Route::get('/published-supplier/{id}',[
        'uses'  =>'SupplierController@publishedSupplier',
        'as'    =>'published-supplier'
    ]);

    Route::get('/unpublished-supplier/{id}',[
        'uses'  =>'SupplierController@unpublishedSupplier',
        'as'    =>'unpublished-supplier'
    ]);

    Route::get('/delete-supplier/{id}',[
        'uses'  =>'SupplierController@deleteSupplier',
        'as'    =>'delete-supplier'
    ]);

//----------End Supplier Module----------
    //----------Start Products Module----------
    Route::get('/add-product', [
        'uses'          =>'ProductController@addProduct',
        'as'            =>'add-product',
    ]);
    Route::post('/new-product', [
        'uses'          =>'ProductController@saveProduct',
        'as'            =>'new-product',
    ]);
    Route::get('/select-sub-category/{id}',[
        'uses'  =>'ProductController@selectSubCategoryByCategoryId',
        'as'    =>'select-sub-category'
    ]);
    Route::get('/manage-product',[
        'uses'  =>'ProductController@manageProduct',
        'as'    =>'manage-product',
    ]);
    Route::get('/edit-product/{id}',[
        'uses'  =>'ProductController@editProductInfo',
        'as'    =>'edit-product'
    ]);
    Route::get('/view-product/{id}',[
        'uses'  =>'ProductController@viewProductInfo',
        'as'    =>'view-product'
    ]);
    Route::post('/update-product',[
        'uses'  =>'ProductController@updateProductInfo',
        'as'    =>'update-product'
    ]);
    Route::get('/published-product/{id}',[
        'uses'  =>'ProductController@publishedProductInfo',
        'as'    =>'published-product'
    ]);

    Route::get('/unpublished-product/{id}',[
        'uses'  =>'ProductController@unpublishedProductInfo',
        'as'    =>'unpublished-product'
    ]);
    Route::get('/delete-product/{id}',[
        'uses'  =>'ProductController@deleteProductInfo',
        'as'    =>'delete-product'
    ]);
//----------End Products Module----------

    // Author start //
    Route::get('/author', [
        'uses' => 'AuthorController@index',
        'as' => 'author',
    ]);
    Route::post('/author', [
        'uses' => 'AuthorController@saveAuthor',
        'as' => 'author',
    ]);
    Route::get('/edit-author/{id}', [
        'uses' => 'AuthorController@editAuthor',
        'as' => 'edit-author',
    ]);
    Route::post('/update-author', [
        'uses' => 'AuthorController@updateAuthor',
        'as' => 'update-author',
    ]);
    Route::get('/delete-author/{id}', [
        'uses' => 'AuthorController@deleteAuthor',
        'as' => 'delete-author',
    ]);
    //===================Order==============
    Route::get('/manage-order',[
        'uses'      =>'OrderController@manageOrder',
        'as'        =>'manage-order',
    ]);

    Route::get('/pending-order',[
        'uses'      =>'OrderController@pendingOrder',
        'as'        =>'pending-order',
    ]);
    Route::get('/success-order',[
        'uses'      =>'OrderController@successOrder',
        'as'        =>'success-order',
    ]);
    Route::get('/cancel-order',[
        'uses'      =>'OrderController@cancelOrder',
        'as'        =>'cancel-order',
    ]);

    Route::get('/view-order/{id}',[
        'uses'      =>'OrderController@viewOrderDetails',
        'as'        =>'view-order',
    ]);
    Route::get('/edit-order/{id}',[
        'uses'      =>'OrderController@editOrder',
        'as'        =>'edit-order',
    ]);
    Route::post('/update-order',[
        'uses'      =>'OrderController@updateOrder',
        'as'        =>'update-order',
    ]);
    Route::get('/view-order-invoice/{id}',[
        'uses'      =>'OrderController@viewOrderInvoice',
        'as'        =>'view-order-invoice',
    ]);
    Route::get('/delete-order/{id}',[
        'uses'      =>'OrderController@deleteOrder',
        'as'        =>'delete-order',
    ]);
    Route::get('/order-detail/{id}',[
        'uses'      =>'OrderController@adminViewOrderInvoice',
        'as'        =>'order-detail',
    ]);
//    ==============marquee=============

    Route::get('/published-marquee/{id}',[
        'uses'      =>'MarqueeController@publishedmarquee',
        'as'        =>'published-marquee',
    ]);
    Route::get('/unpublished-marquee/{id}',[
        'uses'      =>'MarqueeController@unpublishedmarquee',
        'as'        =>'unpublished-marquee',
    ]);
    Route::get('/edit-marquee/{id}',[
        'uses'      =>'MarqueeController@editmarquee',
        'as'        =>'edit-marquee',
    ]);
    Route::get('/delete-marquee/{id}',[
        'uses'      =>'MarqueeController@deletemarquee',
        'as'        =>'delete-marquee',
    ]);
    Route::get('/marquee',[
        'uses'      =>'MarqueeController@marquee',
        'as'        =>'marquee',
    ]);
    Route::post('/new-marquee',[
        'uses'      =>'MarqueeController@newmarquee',
        'as'        =>'new-marquee',
    ]);
    Route::post('/update-marquee',[
        'uses'      =>'MarqueeController@updatemarquee',
        'as'        =>'update-marquee',
    ]);

    //     -----------------ADD SLIDER START-----------------
    Route::get('/add-slider', [
        'uses' => 'SliderController@addSlider',
        'as'   => 'add-slider',
    ]);
    Route::post('/new-slider',[
        'uses'  =>'SliderController@saveSlider',
        'as'    =>'new-slider',
    ]);


    Route::get('/view-slider/{id}',[
        'uses'  =>'SliderController@viewSlider',
        'as'    =>'view-slider'
    ]);

    Route::get('/edit-slider/{id}',[
        'uses'  =>'SliderController@editSlider',
        'as'    =>'edit-slider'
    ]);

    Route::post('/update-slider',[
        'uses'  =>'SliderController@updateSlider',
        'as'    =>'update-slider'
    ]);

    Route::get('/published-slider/{id}',[
        'uses'  =>'SliderController@publishedSlider',
        'as'    =>'published-slider'
    ]);

    Route::get('/unpublished-slider/{id}',[
        'uses'  =>'SliderController@unpublishedSlider',
        'as'    =>'unpublished-slider'
    ]);

    Route::get('/delete-slider/{id}',[
        'uses'  =>'SliderController@deleteSlider',
        'as'    =>'delete-slider'
    ]);
//     -----------------ADD SLIDER END-------------------

    //===================Logo ==============
    Route::get('/add-logo', [
        'uses' => 'LogoController@addLogo',
        'as' => 'add-logo',
    ]);
    Route::post('/new-logo', [
        'uses' => 'LogoController@saveLogo',
        'as' => 'new-logo',
    ]);
    Route::get('/view-logo/{id}', [
        'uses' => 'LogoController@viewLogo',
        'as' => 'view-logo'
    ]);

    Route::get('/edit-logo/{id}', [
        'uses' => 'LogoController@editLogo',
        'as' => 'edit-logo'
    ]);

    Route::post('/update-logo', [
        'uses' => 'LogoController@updateLogo',
        'as' => 'update-logo'
    ]);

    Route::get('/published-logo/{id}', [
        'uses' => 'LogoController@publishedLogo',
        'as' => 'published-logo'
    ]);

    Route::get('/unpublished-logo/{id}', [
        'uses' => 'LogoController@unpublishedLogo',
        'as' => 'unpublished-logo'
    ]);

    Route::get('/delete-logo/{id}', [
        'uses' => 'LogoController@deleteLogo',
        'as' => 'delete-logo'
    ]);

    //===================Contact ==============
    Route::get('/add-contact', [
        'uses' => 'ContactController@addContact',
        'as' => 'add-contact',
    ]);
    Route::post('/new-contact', [
        'uses' => 'ContactController@saveContact',
        'as' => 'new-contact',
    ]);
    Route::get('/view-contact/{id}', [
        'uses' => 'ContactController@viewContact',
        'as' => 'view-contact'
    ]);

    Route::get('/edit-contact/{id}', [
        'uses' => 'ContactController@editContact',
        'as' => 'edit-contact'
    ]);

    Route::post('/update-contact', [
        'uses' => 'ContactController@updateContact',
        'as' => 'update-contact'
    ]);

    Route::get('/published-contact/{id}', [
        'uses' => 'ContactController@publishedContact',
        'as' => 'published-contact'
    ]);

    Route::get('/unpublished-contact/{id}', [
        'uses' => 'ContactController@unpublishedContact',
        'as' => 'unpublished-contact'
    ]);

    Route::get('/delete-contact/{id}', [
        'uses' => 'ContactController@deleteContact',
        'as' => 'delete-contact'
    ]);
    Route::get('/see-massage', [
        'uses' => 'ContactController@seemassage',
        'as' => 'see-massage'
    ]);
    //===================Sells Report==============
    Route::get('/sells-report',[
        'uses'      =>'OrderController@sellsReport',
        'as'        =>'sells-report',
    ]);
    Route::get('/daily-sells-report',[
        'uses'      =>'OrderController@dailySellsReport',
        'as'        =>'daily-sells-report',
    ]);
    Route::get('/weekly-sells-report',[
        'uses'      =>'OrderController@weeklySellsReport',
        'as'        =>'weekly-sells-report',
    ]);
    Route::get('/monthly-sells-report',[
        'uses'      =>'OrderController@monthlySellsReport',
        'as'        =>'monthly-sells-report',
    ]);
    Route::post('/search-order-date',[
        'uses'  =>'OrderController@searchOrderDate',
        'as'    =>'search-order-date',
    ]);

//..............galler.............


    Route::get('/add-gallery', [
        'uses' => 'GalleryController@addGallery',
        'as' => 'add-gallery',
    ]);
    Route::post('/new-gallery', [
        'uses' => 'GalleryController@saveGallery',
        'as' => 'new-gallery',
    ]);

    Route::get('/manage-gallery', [
        'uses' => 'GalleryController@manageGallery',
        'as' => 'manage-gallery',
    ]);

    Route::get('/edit-gallery/{id}', [
        'uses' => 'GalleryController@editGallery',
        'as' => 'edit-gallery'
    ]);

    Route::post('/update-gallery', [
        'uses' => 'GalleryController@updateGallery',
        'as' => 'update-gallery'
    ]);

    Route::get('/published-gallery/{id}', [
        'uses' => 'GalleryController@publishedGallery',
        'as' => 'published-gallery'
    ]);

    Route::get('/unpublished-gallery/{id}', [
        'uses' => 'GalleryController@unpublishedGallery',
        'as' => 'unpublished-gallery'
    ]);

    Route::get('/delete-gallery/{id}', [
        'uses' => 'GalleryController@deleteGallery',
        'as' => 'delete-gallery'
    ]);
//     -----------------ADD Gallery END-------------------


});




