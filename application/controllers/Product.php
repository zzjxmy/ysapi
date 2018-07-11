<?php
/**
 * @name ProductController
 * @author cway
 * @desc 默认控制器
 * @see http://www.php.net/manual/en/class.yaf-controller-abstract.php
 */
class ProductController extends DWDData_Base
{
    public $actions = array(
                        'addproduct'          => 'actions/Product/AddProduct.php',
                        'addproducttag'       => 'actions/Product/AddProductTag.php',
                        'productlist'         => 'actions/Product/ProductList.php',
                        'skulist'              => 'actions/Product/SkuList.php',
                        'productinfo'          => 'actions/Product/ProductInfo.php',
                        'productattributes'   => 'actions/Product/ProductAttributes.php',
                        'productdetail'          => 'actions/Product/ProductDetail.php',
                        'updateproduct'          => 'actions/Product/UpdateProduct.php',
                        'productsinfo'        => 'actions/Product/ProductsInfo.php',
                        'productonline'       => 'actions/Product/ProductOnline.php',
                        'productoffline'      => 'actions/Product/ProductOffline.php',
                        'updatemainsku'       => 'actions/Product/UpdateMainSku.php',
                        'setproductspriority' => 'actions/Product/SetProductsPriority.php',
                        'productsearch'       => 'actions/Product/ProductSearch.php',
                        'productssearch'      => 'actions/Product/ProductsSearch.php',
                        'simpleupdateproduct' => 'actions/Product/SimpleUpdateProduct.php',
                        'getproducttags'      => 'actions/Product/GetProductTags.php',
                        'delproducttag'       => 'actions/Product/DelProductTag.php',
                        'indexselectedlist'   => 'actions/Product/IndexSelectedList.php',
                        'updateindexselected' => 'actions/Product/UpdateIndexSelected.php',
                        'updateeditorcomments'    => 'actions/Product/UpdateEditorComments.php',
                        'editorcommentslist'    => 'actions/Product/EditorCommentsList.php',
                        'editorcomments'    => 'actions/Product/EditorComments.php',
                        'setselectedproductspriority' => 'actions/Product/SetSelectedProductsPriority.php',
                        'checkproductsourcetype' => 'actions/Product/CheckProductSourceType.php',
                        'productselectedinfo'    => 'actions/Product/ProductSelectedInfo.php',
                        'productextinfo'      => 'actions/Product/ProductExtInfo.php',
                        'productsextinfo'     => 'actions/Product/ProductsExtInfo.php',
                        'tosearchengineproductlist' => 'actions/Product/ToSearchEngineProductList.php',
  );
}
