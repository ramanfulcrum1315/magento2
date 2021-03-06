<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Catalog\Controller\Product;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Core\App\Action\FormKeyValidator;
use Magento\Framework\Controller\Result;
use Magento\Framework\View\Result\PageFactory;

/**
 * Catalog compare controller
 *
 * @SuppressWarnings(PHPMD.LongVariable)
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class Compare extends \Magento\Framework\App\Action\Action
{
    /**
     * Customer id
     *
     * @var null|int
     */
    protected $_customerId = null;

    /**
     * Catalog session
     *
     * @var \Magento\Catalog\Model\Session
     */
    protected $_catalogSession;

    /**
     * Catalog product compare list
     *
     * @var \Magento\Catalog\Model\Product\Compare\ListCompare
     */
    protected $_catalogProductCompareList;

    /**
     * Customer visitor
     *
     * @var \Magento\Customer\Model\Visitor
     */
    protected $_customerVisitor;

    /**
     * Customer session
     *
     * @var \Magento\Customer\Model\Session
     */
    protected $_customerSession;

    /**
     * Item collection factory
     *
     * @var \Magento\Catalog\Model\Resource\Product\Compare\Item\CollectionFactory
     */
    protected $_itemCollectionFactory;

    /**
     * Compare item factory
     *
     * @var \Magento\Catalog\Model\Product\Compare\ItemFactory
     */
    protected $_compareItemFactory;

    /**
     * @var \Magento\Framework\Store\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @var FormKeyValidator
     */
    protected $_formKeyValidator;

    /**
     * @var Result\Redirect
     */
    protected $resultRedirectFactory;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * Constructor
     *
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Catalog\Model\Product\Compare\ItemFactory $compareItemFactory
     * @param \Magento\Catalog\Model\Resource\Product\Compare\Item\CollectionFactory $itemCollectionFactory
     * @param \Magento\Customer\Model\Session $customerSession
     * @param \Magento\Customer\Model\Visitor $customerVisitor
     * @param \Magento\Catalog\Model\Product\Compare\ListCompare $catalogProductCompareList
     * @param \Magento\Catalog\Model\Session $catalogSession
     * @param \Magento\Framework\Store\StoreManagerInterface $storeManager
     * @param FormKeyValidator $formKeyValidator
     * @param \Magento\Framework\Controller\Result\RedirectFactory $resultRedirectFactory
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     * @param ProductRepositoryInterface $productRepository
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Catalog\Model\Product\Compare\ItemFactory $compareItemFactory,
        \Magento\Catalog\Model\Resource\Product\Compare\Item\CollectionFactory $itemCollectionFactory,
        \Magento\Customer\Model\Session $customerSession,
        \Magento\Customer\Model\Visitor $customerVisitor,
        \Magento\Catalog\Model\Product\Compare\ListCompare $catalogProductCompareList,
        \Magento\Catalog\Model\Session $catalogSession,
        \Magento\Framework\Store\StoreManagerInterface $storeManager,
        FormKeyValidator $formKeyValidator,
        Result\RedirectFactory $resultRedirectFactory,
        PageFactory $resultPageFactory,
        ProductRepositoryInterface $productRepository
    ) {
        $this->_storeManager = $storeManager;
        $this->_compareItemFactory = $compareItemFactory;
        $this->_itemCollectionFactory = $itemCollectionFactory;
        $this->_customerSession = $customerSession;
        $this->_customerVisitor = $customerVisitor;
        $this->_catalogProductCompareList = $catalogProductCompareList;
        $this->_catalogSession = $catalogSession;
        $this->_formKeyValidator = $formKeyValidator;
        $this->resultRedirectFactory = $resultRedirectFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->productRepository = $productRepository;
        parent::__construct($context);
    }

    /**
     * Setter for customer id
     *
     * @param int $customerId
     * @return $this
     */
    public function setCustomerId($customerId)
    {
        $this->_customerId = $customerId;
        return $this;
    }
}
