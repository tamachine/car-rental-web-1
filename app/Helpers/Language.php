<?php

namespace App\Helpers;

use App\Models\Translation;

class Language
{        
    /**
     * Get the avaiable languages
     *
     * @return array
     */
    public static function availableLanguages()
    {
        return config('languages');
    }

    /**
     * Get the code languages
     *
     * @return array
     */
    public static function availableCodes()
    {
        return array_keys(config('languages'));
    }

    /**
     * Check if code is one of the available locale codes
     * 
     * @return boolean
     */
    public static function isAvailableCode($code) 
    {
        return in_array($code, self::availableCodes());
    }

    /**
     * Get the fallback code language
     *
     * @return string
     */
    public static function defaultCode()
    {
        return config('app.fallback_locale');
    }

    /**
     * Get the language codes excluding the default one
     *
     * @return array
     */
    public static function alternativeCodes()
    {
        $availableCodes = self::availableCodes();
        $defaultCode = self::defaultCode();

        if (($key = array_search($defaultCode, $availableCodes)) !== false) {
            unset($availableCodes[$key]);
        }

        return $availableCodes;
    }

    /**
     * Checks if the user is accessing with an available language prefix
     * @return boolean
     */
    public static function accessingWithPrefixCode() {
        return in_array(self::getCurrentPrefix(), self::availableCodes());
    }

    /**
     * Get the language session
     *
     * @return string
     */
    public static function getSession()
    {                
        if(self::accessingWithPrefixCode()) {
            self::setSession(self::getCurrentPrefix());    
        } 

        // app()->make(ApplyPreferredLanguageToLanguageSession::class); don't needed anymore as the mcnamara localization supports it
        
        if(request()->session()->has(self::getSessionName())){
            return request()->session()->get(self::getSessionName());
        }
    }

    /**
    * Returns all the translations that correspond to a language route file (lang/en/routes, lang/es/routes ...)
    *
    * @return array
    */
    public static function getTranslatedRoutes($locale) {
        return Translation::getTranslationsForGroup($locale, 'routes');
    }

    /**
     * Returns the route current prefix without the slash
     * 
     * @return string
     */
    protected static function getCurrentPrefix() {
        $currentPrefix = request()->route()->getPrefix();        

        return !empty($currentPrefix) ? ltrim($currentPrefix,"/") : self::defaultCode();
    }

    protected static function getSessionName() {
        return 'locale';
    }

    /**
     * Set the language session
     *     
     */
    public static function setSession($value)
    {
        session([self::getSessionName() => $value]);
    }

     /**
     * Set language in session
     *     
     */
    public static function setLanguageInSession($code)
    {
        if(in_array($code, self::availableCodes())) {
            self::setSession($code);            
        }
    }
}
