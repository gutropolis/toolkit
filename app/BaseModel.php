<?php 
namespace Gutropolis;

use Illuminate\Database\Eloquent\Model;

 

 abstract class BaseModel extends Model {

    
	/**
     * Create a conversation slug.
     *
     * @param  string $title
     * @return string
     */
    public static function makeSlug($title, $hash = FALSE)
    {
         
        $slug = str_slug($title);
        
        if(!$slug || $hash)
            $slug .=  ($hash) ? '-'.getHashCode() : getHashCode();

        $count = self::whereRaw("slug = '{$slug}'")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }
}

?>