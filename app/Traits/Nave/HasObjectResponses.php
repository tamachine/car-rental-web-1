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

    protected function processBlogTagResponse($data): array {
        $response = [];

        foreach($data as $blogTag) {
            $blogTagObject = ArrayHelper::mapArrayToObject($blogTag, BlogTag::class);

            $blogTagObject->color = ArrayHelper::mapArrayToObject($blogTag['color'], BlogTagColor::class); 
            
            $response[] = $blogTagObject;
        }
        
        return $response;
    }    

    protected function processBlogPostResponse($data): array {
        $response = [];

        foreach($data as $blogPost) {
            $blogPostObject = ArrayHelper::mapArrayToObject($blogPost, BlogPost::class);

            $blogPostObject->author = ArrayHelper::mapArrayToObject($blogPost['author'], BlogAuthor::class); 
            $blogPostObject->category = ArrayHelper::mapArrayToObject($blogPost['category'], BlogCategory::class);
            $blogPostObject->tags = $this->processBlogTagResponse($blogPost['tags'], BlogTag::class);
            $blogPostObject->getFeaturedImageModelImageInstance      = ArrayHelper::mapArrayToObject($blogPost['getFeaturedImageModelImageInstance'], Image::class); 
            $blogPostObject->getFeaturedImageHoverModelImageInstance = ArrayHelper::mapArrayToObject($blogPost['getFeaturedImageHoverModelImageInstance'], Image::class);
            
            $response[] = $blogPostObject;
        }
        
        return $response;
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

    protected function processFaqResponse($data): array {
        $response = [];

        foreach($data as $faq) {
            $faqObject = ArrayHelper::mapArrayToObject($faq, Faq::class);     
            
            $faqObject->faqCategories = $this->processArrayToObject($faqObject->faqCategories, FaqCategory::class);
            
            $response[] = $faqObject;
        }
        
        return $response;
    }
}