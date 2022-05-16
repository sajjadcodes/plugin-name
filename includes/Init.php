<?php

/**
 * @package Starter-plugin
 * @author Sajad Hussain <sajjadcodes@gmail.com>
 * 
 */

namespace Inc;
use Inc\Base\Enqueue;
final class Init
{


    public static function getIncludes() 
    {
        
        // require_once  plugin_dir_path( __FILE__ ) . 'Base/TextDomainLoader.php';
        require_once plugin_dir_path( __FILE__ ) . 'IncEnqueue.php';
        

    }
    public static function getClasses()
    {
        
        return [
            Base\Enqueue::class,
            // Base\TextDomainLoader::class,
            
        ];
    }

    public static function registerServices()
    {

        foreach ( self::getClasses() as $class ) {

            $service = self::instantiate( $class );
            if(method_exists($service, 'register')) {
                $service->register();
            }
        
        }
    }

    private static function instantiate( $class) 
    {
        $service = new  $class();
        return $service;
    
    }
}