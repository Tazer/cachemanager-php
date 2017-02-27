<?php
namespace Tazer\CacheManager;
 use phpFastCache\EventManager;
use phpFastCache\CacheManager;
use phpFastCache\Core\phpFastCache;


class Cache
{

    public function __construct(){
// Setup File Path on your config files
CacheManager::setDefaultConfig([
  "path" => sys_get_temp_dir(),
]);
/**
* Bind the event callback
*/
EventManager::getInstance()->onCacheGetItem(function($itemPool,$item){
    $item->set('[Intefered by Event] ' . $item->get());
});    
    }

    public function sayHallo()
    {
// In your class, function, you can call the Cache
$InstanceCache = CacheManager::getInstance('files');
// OR $InstanceCache = CacheManager::getInstance() <-- open examples/global.setup.php to see more
/**
 * Try to get $products from Caching First
 * product_page is "identity keyword";
 */
$key = "product_page";
$CachedString = $InstanceCache->getItem($key);
if (is_null($CachedString->get())) {
    //$CachedString = "Files Cache --> Cache Enabled --> Well done !";
    // Write products to Cache in 10 minutes with same keyword
    $CachedString->set("Files Cache --> Cache Enabled --> Well done !");
    $InstanceCache->save($CachedString);
    echo "FIRST LOAD // WROTE OBJECT TO CACHE // RELOAD THE PAGE AND SEE // ";
    echo $CachedString->get();
} else {
    echo "READ FROM CACHE // ";
    echo $CachedString->getExpirationDate()->format(\Datetime::W3C);
    echo $CachedString->get();
}
        return 'Hallo!';
    }
}