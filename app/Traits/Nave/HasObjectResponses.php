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
use App\Models\Location;
use App\Models\Page;

/**
 * Trait to have all the processObjectResponses together so we can use them in different locations
 */
trait HasObjectResponses {

    public function processBlogTagResponse($data): array {
        $response = [];

        foreach($data as $blogTag) {
            $response[] = $this->processSingleBlogTagResponse($blogTag);
        }
        
        return $response;
    }   
    
    public function processSingleBlogTagResponse(array $blogTag): BlogTag {
        $blogTagObject = ArrayHelper::mapArrayToObject($blogTag, BlogTag::class);

        $blogTagObject->color = ArrayHelper::mapArrayToObject($blogTag['color'], BlogTagColor::class); 
        
        return $blogTagObject;       
    }

    public function processBlogPostResponse($data): array {
        $response = [];

        foreach($data as $blogPost) {
            $response[] = $this->processSingleBlogPostResponse($blogPost);
        }
        
        return $response;
    }    

    public function processPageResponse($data): array {
        $response = [];

        foreach($data as $page) {
            $response[] = $this->processSinglePageResponse($page);
        }
        
        return $response;
    } 
    
    public function processSinglePageResponse(array $page): Page {
        return ArrayHelper::mapArrayToObject($page, Page::class);         
    }


    public function processSingleBlogPostResponse(array $blogPost): BlogPost {
       
        $blogPostObject = ArrayHelper::mapArrayToObject($blogPost, BlogPost::class);

        if(isset($blogPost['author'])) $blogPostObject->author =        $this->processSingleBlogAuthorResponse($blogPost['author']);
        if(isset($blogPost['category'])) $blogPostObject->category =    $this->processSingleBlogCategoryResponse($blogPost['category']);
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

    public function processSingleBlogCategoryResponse(array $blogCategory): BlogCategory {
        $blogCategory = ArrayHelper::mapArrayToObject($blogCategory, BlogCategory::class); 

        $blogCategory->setUrl(route('blog.search.category', ['blog_category_slug' => $blogCategory->slug]));
      
        return $blogCategory;    
    }

    public function processSeoSchemaResponse(array $data): array {
        $seoSchemas = [];

        foreach($data as $schema ) {
            $seoSchema = ArrayHelper::mapArrayToObject($schema, SeoSchema::class);

            $seoSchemas[] = $seoSchema;
        }   
        
        return $seoSchemas;
    }

    public function processSeoConfiguration($data) {
        $seoConfiguration = ArrayHelper::mapArrayToObject($data, SeoConfiguration::class);

        if(isset($data['seoSchemas'])) $seoConfiguration->seoSchemas = $this->processSeoSchemaResponse($data['seoSchemas']);

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

    protected function processLocationResponse($data): array {
        $response = [];

        foreach($data as $location) {
            $locationObject = ArrayHelper::mapArrayToObject($location, Location::class);     
            
            $locationObject->getFeaturedImageModelImageInstance = ArrayHelper::mapArrayToObject($location['getFeaturedImageModelImageInstance'], Image::class);   
            
            $response[] = $locationObject;
        }
        
        return $response;
    }
}