<?php

namespace Heptacom\Shopware\Util\Subscriber;

use Enlight_Event_EventArgs;
use Shopware_Controllers_Api_Addresses;
use Shopware_Controllers_Api_Articles;
use Shopware_Controllers_Api_Caches;
use Shopware_Controllers_Api_Categories;
use Shopware_Controllers_Api_Countries;
use Shopware_Controllers_Api_CustomerGroups;
use Shopware_Controllers_Api_Customers;
use Shopware_Controllers_Api_CustomerStreams;
use Shopware_Controllers_Api_Error;
use Shopware_Controllers_Api_GenerateArticleImages;
use Shopware_Controllers_Api_Manufacturers;
use Shopware_Controllers_Api_Media;
use Shopware_Controllers_Api_Orders;
use Shopware_Controllers_Api_PropertyGroups;
use Shopware_Controllers_Api_Rest;
use Shopware_Controllers_Api_Shops;
use Shopware_Controllers_Api_Translations;
use Shopware_Controllers_Api_Users;
use Shopware_Controllers_Api_Variants;
use Shopware_Controllers_Api_Version;

/**
 * @method void beforeVersionIndexAction(Shopware_Controllers_Api_Version $controller)
 * @method void afterVersionIndexAction(Shopware_Controllers_Api_Version $controller)
 * @method void beforeAddressesIndexAction(Shopware_Controllers_Api_Addresses $controller)
 * @method void afterAddressesIndexAction(Shopware_Controllers_Api_Addresses $controller)
 * @method void beforeAddressesGetAction(Shopware_Controllers_Api_Addresses $controller)
 * @method void afterAddressesGetAction(Shopware_Controllers_Api_Addresses $controller)
 * @method void beforeAddressesPostAction(Shopware_Controllers_Api_Addresses $controller)
 * @method void afterAddressesPostAction(Shopware_Controllers_Api_Addresses $controller)
 * @method void beforeAddressesPutAction(Shopware_Controllers_Api_Addresses $controller)
 * @method void afterAddressesPutAction(Shopware_Controllers_Api_Addresses $controller)
 * @method void beforeAddressesDeleteAction(Shopware_Controllers_Api_Addresses $controller)
 * @method void afterAddressesDeleteAction(Shopware_Controllers_Api_Addresses $controller)
 * @method void beforeCustomersIndexAction(Shopware_Controllers_Api_Customers $controller)
 * @method void afterCustomersIndexAction(Shopware_Controllers_Api_Customers $controller)
 * @method void beforeCustomersGetAction(Shopware_Controllers_Api_Customers $controller)
 * @method void afterCustomersGetAction(Shopware_Controllers_Api_Customers $controller)
 * @method void beforeCustomersPostAction(Shopware_Controllers_Api_Customers $controller)
 * @method void afterCustomersPostAction(Shopware_Controllers_Api_Customers $controller)
 * @method void beforeCustomersPutAction(Shopware_Controllers_Api_Customers $controller)
 * @method void afterCustomersPutAction(Shopware_Controllers_Api_Customers $controller)
 * @method void beforeCustomersDeleteAction(Shopware_Controllers_Api_Customers $controller)
 * @method void afterCustomersDeleteAction(Shopware_Controllers_Api_Customers $controller)
 * @method void beforeArticlesIndexAction(Shopware_Controllers_Api_Articles $controller)
 * @method void afterArticlesIndexAction(Shopware_Controllers_Api_Articles $controller)
 * @method void beforeArticlesGetAction(Shopware_Controllers_Api_Articles $controller)
 * @method void afterArticlesGetAction(Shopware_Controllers_Api_Articles $controller)
 * @method void beforeArticlesPostAction(Shopware_Controllers_Api_Articles $controller)
 * @method void afterArticlesPostAction(Shopware_Controllers_Api_Articles $controller)
 * @method void beforeArticlesPutAction(Shopware_Controllers_Api_Articles $controller)
 * @method void afterArticlesPutAction(Shopware_Controllers_Api_Articles $controller)
 * @method void beforeArticlesDeleteAction(Shopware_Controllers_Api_Articles $controller)
 * @method void afterArticlesDeleteAction(Shopware_Controllers_Api_Articles $controller)
 * @method void beforeManufacturersIndexAction(Shopware_Controllers_Api_Manufacturers $controller)
 * @method void afterManufacturersIndexAction(Shopware_Controllers_Api_Manufacturers $controller)
 * @method void beforeManufacturersGetAction(Shopware_Controllers_Api_Manufacturers $controller)
 * @method void afterManufacturersGetAction(Shopware_Controllers_Api_Manufacturers $controller)
 * @method void beforeManufacturersPostAction(Shopware_Controllers_Api_Manufacturers $controller)
 * @method void afterManufacturersPostAction(Shopware_Controllers_Api_Manufacturers $controller)
 * @method void beforeManufacturersPutAction(Shopware_Controllers_Api_Manufacturers $controller)
 * @method void afterManufacturersPutAction(Shopware_Controllers_Api_Manufacturers $controller)
 * @method void beforeManufacturersDeleteAction(Shopware_Controllers_Api_Manufacturers $controller)
 * @method void afterManufacturersDeleteAction(Shopware_Controllers_Api_Manufacturers $controller)
 * @method void beforeOrdersIndexAction(Shopware_Controllers_Api_Orders $controller)
 * @method void afterOrdersIndexAction(Shopware_Controllers_Api_Orders $controller)
 * @method void beforeOrdersGetAction(Shopware_Controllers_Api_Orders $controller)
 * @method void afterOrdersGetAction(Shopware_Controllers_Api_Orders $controller)
 * @method void beforeOrdersPostAction(Shopware_Controllers_Api_Orders $controller)
 * @method void afterOrdersPostAction(Shopware_Controllers_Api_Orders $controller)
 * @method void beforeOrdersPutAction(Shopware_Controllers_Api_Orders $controller)
 * @method void afterOrdersPutAction(Shopware_Controllers_Api_Orders $controller)
 * @method void beforeCachesIndexAction(Shopware_Controllers_Api_Caches $controller)
 * @method void afterCachesIndexAction(Shopware_Controllers_Api_Caches $controller)
 * @method void beforeCachesGetAction(Shopware_Controllers_Api_Caches $controller)
 * @method void afterCachesGetAction(Shopware_Controllers_Api_Caches $controller)
 * @method void beforeCachesPostAction(Shopware_Controllers_Api_Caches $controller)
 * @method void afterCachesPostAction(Shopware_Controllers_Api_Caches $controller)
 * @method void beforeCachesPutAction(Shopware_Controllers_Api_Caches $controller)
 * @method void afterCachesPutAction(Shopware_Controllers_Api_Caches $controller)
 * @method void beforeCachesDeleteAction(Shopware_Controllers_Api_Caches $controller)
 * @method void afterCachesDeleteAction(Shopware_Controllers_Api_Caches $controller)
 * @method void beforeCustomerGroupsIndexAction(Shopware_Controllers_Api_CustomerGroups $controller)
 * @method void afterCustomerGroupsIndexAction(Shopware_Controllers_Api_CustomerGroups $controller)
 * @method void beforeCustomerGroupsGetAction(Shopware_Controllers_Api_CustomerGroups $controller)
 * @method void afterCustomerGroupsGetAction(Shopware_Controllers_Api_CustomerGroups $controller)
 * @method void beforeCustomerGroupsPostAction(Shopware_Controllers_Api_CustomerGroups $controller)
 * @method void afterCustomerGroupsPostAction(Shopware_Controllers_Api_CustomerGroups $controller)
 * @method void beforeCustomerGroupsPutAction(Shopware_Controllers_Api_CustomerGroups $controller)
 * @method void afterCustomerGroupsPutAction(Shopware_Controllers_Api_CustomerGroups $controller)
 * @method void beforeCustomerGroupsDeleteAction(Shopware_Controllers_Api_CustomerGroups $controller)
 * @method void afterCustomerGroupsDeleteAction(Shopware_Controllers_Api_CustomerGroups $controller)
 * @method void beforeShopsIndexAction(Shopware_Controllers_Api_Shops $controller)
 * @method void afterShopsIndexAction(Shopware_Controllers_Api_Shops $controller)
 * @method void beforeShopsGetAction(Shopware_Controllers_Api_Shops $controller)
 * @method void afterShopsGetAction(Shopware_Controllers_Api_Shops $controller)
 * @method void beforeShopsPostAction(Shopware_Controllers_Api_Shops $controller)
 * @method void afterShopsPostAction(Shopware_Controllers_Api_Shops $controller)
 * @method void beforeShopsPutAction(Shopware_Controllers_Api_Shops $controller)
 * @method void afterShopsPutAction(Shopware_Controllers_Api_Shops $controller)
 * @method void beforeShopsDeleteAction(Shopware_Controllers_Api_Shops $controller)
 * @method void afterShopsDeleteAction(Shopware_Controllers_Api_Shops $controller)
 * @method void beforeUsersIndexAction(Shopware_Controllers_Api_Users $controller)
 * @method void afterUsersIndexAction(Shopware_Controllers_Api_Users $controller)
 * @method void beforeUsersGetAction(Shopware_Controllers_Api_Users $controller)
 * @method void afterUsersGetAction(Shopware_Controllers_Api_Users $controller)
 * @method void beforeUsersPostAction(Shopware_Controllers_Api_Users $controller)
 * @method void afterUsersPostAction(Shopware_Controllers_Api_Users $controller)
 * @method void beforeUsersPutAction(Shopware_Controllers_Api_Users $controller)
 * @method void afterUsersPutAction(Shopware_Controllers_Api_Users $controller)
 * @method void beforeUsersDeleteAction(Shopware_Controllers_Api_Users $controller)
 * @method void afterUsersDeleteAction(Shopware_Controllers_Api_Users $controller)
 * @method void beforeErrorInvalidAction(Shopware_Controllers_Api_Error $controller)
 * @method void afterErrorInvalidAction(Shopware_Controllers_Api_Error $controller)
 * @method void beforeErrorNoAuthAction(Shopware_Controllers_Api_Error $controller)
 * @method void afterErrorNoAuthAction(Shopware_Controllers_Api_Error $controller)
 * @method void beforeErrorErrorAction(Shopware_Controllers_Api_Error $controller)
 * @method void afterErrorErrorAction(Shopware_Controllers_Api_Error $controller)
 * @method void beforePropertyGroupsIndexAction(Shopware_Controllers_Api_PropertyGroups $controller)
 * @method void afterPropertyGroupsIndexAction(Shopware_Controllers_Api_PropertyGroups $controller)
 * @method void beforePropertyGroupsGetAction(Shopware_Controllers_Api_PropertyGroups $controller)
 * @method void afterPropertyGroupsGetAction(Shopware_Controllers_Api_PropertyGroups $controller)
 * @method void beforePropertyGroupsPostAction(Shopware_Controllers_Api_PropertyGroups $controller)
 * @method void afterPropertyGroupsPostAction(Shopware_Controllers_Api_PropertyGroups $controller)
 * @method void beforePropertyGroupsPutAction(Shopware_Controllers_Api_PropertyGroups $controller)
 * @method void afterPropertyGroupsPutAction(Shopware_Controllers_Api_PropertyGroups $controller)
 * @method void beforePropertyGroupsDeleteAction(Shopware_Controllers_Api_PropertyGroups $controller)
 * @method void afterPropertyGroupsDeleteAction(Shopware_Controllers_Api_PropertyGroups $controller)
 * @method void beforeVariantsIndexAction(Shopware_Controllers_Api_Variants $controller)
 * @method void afterVariantsIndexAction(Shopware_Controllers_Api_Variants $controller)
 * @method void beforeVariantsGetAction(Shopware_Controllers_Api_Variants $controller)
 * @method void afterVariantsGetAction(Shopware_Controllers_Api_Variants $controller)
 * @method void beforeVariantsPostAction(Shopware_Controllers_Api_Variants $controller)
 * @method void afterVariantsPostAction(Shopware_Controllers_Api_Variants $controller)
 * @method void beforeVariantsPutAction(Shopware_Controllers_Api_Variants $controller)
 * @method void afterVariantsPutAction(Shopware_Controllers_Api_Variants $controller)
 * @method void beforeVariantsDeleteAction(Shopware_Controllers_Api_Variants $controller)
 * @method void afterVariantsDeleteAction(Shopware_Controllers_Api_Variants $controller)
 * @method void beforeTranslationsIndexAction(Shopware_Controllers_Api_Translations $controller)
 * @method void afterTranslationsIndexAction(Shopware_Controllers_Api_Translations $controller)
 * @method void beforeTranslationsPostAction(Shopware_Controllers_Api_Translations $controller)
 * @method void afterTranslationsPostAction(Shopware_Controllers_Api_Translations $controller)
 * @method void beforeTranslationsPutAction(Shopware_Controllers_Api_Translations $controller)
 * @method void afterTranslationsPutAction(Shopware_Controllers_Api_Translations $controller)
 * @method void beforeTranslationsDeleteAction(Shopware_Controllers_Api_Translations $controller)
 * @method void afterTranslationsDeleteAction(Shopware_Controllers_Api_Translations $controller)
 * @method void beforeMediaIndexAction(Shopware_Controllers_Api_Media $controller)
 * @method void afterMediaIndexAction(Shopware_Controllers_Api_Media $controller)
 * @method void beforeMediaGetAction(Shopware_Controllers_Api_Media $controller)
 * @method void afterMediaGetAction(Shopware_Controllers_Api_Media $controller)
 * @method void beforeMediaPostAction(Shopware_Controllers_Api_Media $controller)
 * @method void afterMediaPostAction(Shopware_Controllers_Api_Media $controller)
 * @method void beforeMediaPutAction(Shopware_Controllers_Api_Media $controller)
 * @method void afterMediaPutAction(Shopware_Controllers_Api_Media $controller)
 * @method void beforeMediaDeleteAction(Shopware_Controllers_Api_Media $controller)
 * @method void afterMediaDeleteAction(Shopware_Controllers_Api_Media $controller)
 * @method void beforeRestBatchAction(Shopware_Controllers_Api_Rest $controller)
 * @method void afterRestBatchAction(Shopware_Controllers_Api_Rest $controller)
 * @method void beforeRestBatchDeleteAction(Shopware_Controllers_Api_Rest $controller)
 * @method void afterRestBatchDeleteAction(Shopware_Controllers_Api_Rest $controller)
 * @method void beforeCountriesIndexAction(Shopware_Controllers_Api_Countries $controller)
 * @method void afterCountriesIndexAction(Shopware_Controllers_Api_Countries $controller)
 * @method void beforeCountriesGetAction(Shopware_Controllers_Api_Countries $controller)
 * @method void afterCountriesGetAction(Shopware_Controllers_Api_Countries $controller)
 * @method void beforeCountriesPostAction(Shopware_Controllers_Api_Countries $controller)
 * @method void afterCountriesPostAction(Shopware_Controllers_Api_Countries $controller)
 * @method void beforeCountriesPutAction(Shopware_Controllers_Api_Countries $controller)
 * @method void afterCountriesPutAction(Shopware_Controllers_Api_Countries $controller)
 * @method void beforeCountriesDeleteAction(Shopware_Controllers_Api_Countries $controller)
 * @method void afterCountriesDeleteAction(Shopware_Controllers_Api_Countries $controller)
 * @method void beforeCustomerStreamsIndexAction(Shopware_Controllers_Api_CustomerStreams $controller)
 * @method void afterCustomerStreamsIndexAction(Shopware_Controllers_Api_CustomerStreams $controller)
 * @method void beforeCustomerStreamsGetAction(Shopware_Controllers_Api_CustomerStreams $controller)
 * @method void afterCustomerStreamsGetAction(Shopware_Controllers_Api_CustomerStreams $controller)
 * @method void beforeCustomerStreamsPostAction(Shopware_Controllers_Api_CustomerStreams $controller)
 * @method void afterCustomerStreamsPostAction(Shopware_Controllers_Api_CustomerStreams $controller)
 * @method void beforeCustomerStreamsPutAction(Shopware_Controllers_Api_CustomerStreams $controller)
 * @method void afterCustomerStreamsPutAction(Shopware_Controllers_Api_CustomerStreams $controller)
 * @method void beforeCustomerStreamsDeleteAction(Shopware_Controllers_Api_CustomerStreams $controller)
 * @method void afterCustomerStreamsDeleteAction(Shopware_Controllers_Api_CustomerStreams $controller)
 * @method void beforeCategoriesIndexAction(Shopware_Controllers_Api_Categories $controller)
 * @method void afterCategoriesIndexAction(Shopware_Controllers_Api_Categories $controller)
 * @method void beforeCategoriesGetAction(Shopware_Controllers_Api_Categories $controller)
 * @method void afterCategoriesGetAction(Shopware_Controllers_Api_Categories $controller)
 * @method void beforeCategoriesPostAction(Shopware_Controllers_Api_Categories $controller)
 * @method void afterCategoriesPostAction(Shopware_Controllers_Api_Categories $controller)
 * @method void beforeCategoriesPutAction(Shopware_Controllers_Api_Categories $controller)
 * @method void afterCategoriesPutAction(Shopware_Controllers_Api_Categories $controller)
 * @method void beforeCategoriesDeleteAction(Shopware_Controllers_Api_Categories $controller)
 * @method void afterCategoriesDeleteAction(Shopware_Controllers_Api_Categories $controller)
 * @method void beforeGenerateArticleImagesPutAction(Shopware_Controllers_Api_GenerateArticleImages $controller)
 * @method void afterGenerateArticleImagesPutAction(Shopware_Controllers_Api_GenerateArticleImages $controller)
 * @method void beforeGenerateArticleImagesBatchAction(Shopware_Controllers_Api_GenerateArticleImages $controller)
 * @method void afterGenerateArticleImagesBatchAction(Shopware_Controllers_Api_GenerateArticleImages $controller)
 * @method void beforeGenerateArticleImagesBatchDeleteAction(Shopware_Controllers_Api_GenerateArticleImages $controller)
 * @method void afterGenerateArticleImagesBatchDeleteAction(Shopware_Controllers_Api_GenerateArticleImages $controller)
 */
trait RestApiSubscriberRouter
{
    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Api' => 'routeApiRequestToFunction',
            'Enlight_Controller_Action_PreDispatch_Api' => 'routeApiRequestToFunction',
        ];
    }

    /**
     * @param Enlight_Event_EventArgs $args
     */
    public function routeApiRequestToFunction(Enlight_Event_EventArgs $args)
    {
        /** @var Shopware_Controllers_Api_Articles $controller */
        $controller = $args->get('subject');

        switch (true) {
            case strpos($args->getName(), 'Enlight_Controller_Action_PreDispatch') === 0:
                $position = 'before';
                break;
            case strpos($args->getName(), 'Enlight_Controller_Action_PostDispatch') === 0:
            default:
                $position = 'after';
                break;
        }

        $functionName = $this->generateApiRequestFunctionName(
            $controller->Request()->getControllerName(),
            $controller->Request()->getActionName(),
            $position
        );

        if (method_exists($this, $functionName)) {
            $this->$functionName($controller);
        }
    }

    /**
     * @param string $controllerName
     * @param string $action
     * @param string $position
     * @return string
     */
    public function generateApiRequestFunctionName($controllerName, $action, $position)
    {
        return $position . ucfirst($controllerName) . ucfirst($action) . 'Action';
    }
}

