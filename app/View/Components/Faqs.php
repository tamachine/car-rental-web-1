<?php

namespace App\View\Components;

use App\Interfaces\FaqCategoryRepositoryInterface;
use Illuminate\View\Component;
use App\Models\FaqCategory;
use App\Interfaces\FaqRepositoryInterface;

class Faqs extends Component
{

    const NUM_FAQS = 5; //num of max faqs per category when view all button is shown

    /**
     * If true, all faqs without the View all button wil be shown.
     * If false, only NUM_FAQS responses by category will be shown
     *
     * @var string
     */
    public $allFaqs;

     /**    
     *
     * @var string
     */
    public $isFaqsPage;

    protected $faqRepository;

    protected $faqCategoryRepository;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(FaqRepositoryInterface $faqRepository, FaqCategoryRepositoryInterface $faqCategoryRepository, bool $allFaqs = false, $isFaqsPage = false)
    {
        $this->faqRepository = $faqRepository;
        $this->faqCategoryRepository = $faqCategoryRepository;

        $this->allFaqs = $allFaqs;
        $this->isFaqsPage = $isFaqsPage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {               
        return view(
            'components.faqs', 
            [
                'faqs' =>  $this->faqRepository->all(),
                'categories' => $this->faqCategoryRepository->all(),
                'showViewAllButton' => !$this->allFaqs,
                'take' => $this->allFaqs ? null : self::NUM_FAQS,
            ]
        );
    }
        
}
