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

        if(isset($blogPost['author'])) $blogPostObject->author =        $this->processSingleBlogAuthorResponse($blogPost['author']);
        if(isset($blogPost['category'])) $blogPostObject->category =    ArrayHelper::mapArrayToObject($blogPost['category'], BlogCategory::class);
        if(isset($blogPost['tags'])) $blogPostObject->tags =            $this->processBlogTagResponse($blogPost['tags'], BlogTag::class);
        if(isset($blogPost['getFeaturedImageModelImageInstance']))      $blogPostObject->getFeaturedImageModelImageInstance = ArrayHelper::mapArrayToObject($blogPost['getFeaturedImageModelImageInstance'], Image::class); 
        if(isset($blogPost['getFeaturedImageHoverModelImageInstance'])) $blogPostObject->getFeaturedImageHoverModelImageInstance = ArrayHelper::mapArrayToObject($blogPost['getFeaturedImageHoverModelImageInstance'], Image::class);
        if(isset($blogPost['prev_post'])) $blogPostObject->prev_post =  $this->processSingleBlogPostResponse($blogPost['prev_post']);
        if(isset($blogPost['next_post'])) $blogPostObject->next_post =  $this->processSingleBlogPostResponse($blogPost['next_post']);
        if(isset($blogPost['related_posts'])) $blogPostObject->related_posts = $this->processBlogPostResponse($blogPost['related_posts']);

        $blogPostObject->setUrl(route('blog.show', ['blog_post_slug' => $blogPostObject->slug]));
      
        return $blogPostObject;       
    }    

    public function processSingleBlogAuthorResponse(array $blogAuthor): BlogAuthor {
        $blogAuthor = ArrayHelper::mapArrayToObject($blogAuthor, BlogAuthor::class); 

        $blogAuthor->setUrl(route('blog.search.author', ['blog_author_slug' => $blogAuthor->slug]));
      
        return $blogAuthor;    
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