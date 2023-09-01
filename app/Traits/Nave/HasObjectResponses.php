<?php

namespace App\Traits\Nave;

use App\Models\BlogTag;
use App\Models\BlogTagColor;
use App\Models\BlogPost;
use App\Models\BlogAuthor;
use App\Models\BlogCategory;
use App\Models\Image;
use App\Models\SeoConfiguration;
use App\Models\SeoSchema;
use App\Models\Faq;
use App\Models\FaqCategory;

use App\Helpers\ArrayHelper;

/**
 * Trait to have all the processObjectResponses together so we can use them in different locations
 */
trait HasObjectResponses {

    public function processBlogTagResponse($data): array {
        $response = [];

        foreach($data as $blogTag) {
            $blogTagObject = ArrayHelper::mapArrayToObject($blogTag, BlogTag::class);

            $blogTagObject->color = ArrayHelper::mapArrayToObject($blogTag['color'], BlogTagColor::class); 
            
            $response[] = $blogTagObject;
        }
        
        return $response;
    }    

    public function processBlogPostResponse($data): array {
        $response = [];

        foreach($data as $blogPost) {
            $response[] = $this->processSingleBlogPostResponse($blogPost);
        }
        
        return $response;
    }    

    public function processSingleBlogPostResponse(array $blogPost): BlogPost {
       
        $blogPostObject = ArrayHelper::mapArrayToObject($blogPost, BlogPost::class);

        $blogPostObject->author = ArrayHelper::mapArrayToObject($blogPost['author'], BlogAuthor::class); 
        $blogPostObject->category = ArrayHelper::mapArrayToObject($blogPost['category'], BlogCategory::class);
        $blogPostObject->tags = $this->processBlogTagResponse($blogPost['tags'], BlogTag::class);
        $blogPostObject->getFeaturedImageModelImageInstance      = ArrayHelper::mapArrayToObject($blogPost['getFeaturedImageModelImageInstance'], Image::class); 
        $blogPostObject->getFeaturedImageHoverModelImageInstance = ArrayHelper::mapArrayToObject($blogPost['getFeaturedImageHoverModelImageInstance'], Image::class);
        
        return $blogPostObject;       
    }    

    public function processSeoConfiguration($data) {
        $seoConfiguration = ArrayHelper::mapArrayToObject($data, SeoConfiguration::class);

        $seoSchemas = [];

        foreach($data['seoSchemas'] as $schema ) {
            $seoSchema = ArrayHelper::mapArrayToObject($schema, SeoSchema::class);

            $seoSchemas[] = $seoSchema;
        }

        $seoConfiguration->seoSchemas = $seoSchemas;

        return $seoConfiguration;
    }

    public function processFaqResponse($data): array {
        $response = [];

        foreach($data as $faq) {
            $faqObject = ArrayHelper::mapArrayToObject($faq, Faq::class);     
            
            $faqObject->faqCategories = $this->processArrayToObjects($faqObject->faqCategories, FaqCategory::class);
            
            $response[] = $faqObject;
        }
        
        return $response;
    }

    public function processCurrenciesResponse($response) {                

        if(isset($response['currencies'])) {
            return $response['currencies']['data'];
        }

        return [];
    }
}