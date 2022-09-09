<?php

namespace Mage4\Banner\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\StateException;
use Magento\Framework\Exception\ValidatorException;
use Magento\Framework\Exception\NoSuchEntityException;
use Mage4\Banner\Api\SliderRepositoryInterface;
use Mage4\Banner\Api\Slider\SliderInterface;
use Mage4\Banner\Api\Slider\SliderInterfaceFactory;
use Mage4\Banner\Model\ResourceModel\Slider as ResourceData;
use Mage4\Banner\Model\ResourceModel\Slider\CollectionFactory as SliderCollectionFactory;
use Magento\Framework\Model\AbstractModel;

class SliderRepository implements SliderRepositoryInterface
{
    /**
     * @var array
     */
    protected $instances = [];

    /**
     * @var ResourceData
     */
    protected $resource;

    /**
     * @var SliderCollectionFactory
     */
    protected $sliderCollectionFactory;

    /**
     * @var SliderInterfaceFactory
     */
    protected $sliderInterfaceFactory;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    public function __construct(
        ResourceData $resource,
        SliderCollectionFactory $sliderCollectionFactory,
        SliderInterfaceFactory $sliderInterfaceFactory,
        DataObjectHelper $dataObjectHelper
    ) {
        $this->resource = $resource;
        $this->sliderCollectionFactory = $sliderCollectionFactory;
        $this->sliderInterfaceFactory = $sliderInterfaceFactory;
        $this->dataObjectHelper = $dataObjectHelper;
    }

    /**
     * @param SliderInterface $data
     * @return SliderInterface
     * @throws CouldNotSaveException
     */
    public function save(SliderInterface $data)
    {
        try {
            /** @var SliderInterface|AbstractModel $data */
            $this->resource->save($data);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__(
                'Could not save the data: %1',
                $exception->getMessage()
            ));
        }
        return $data;
    }

    /**
     * Get data record
     *
     * @param $Id
     * @return mixed
     * @throws NoSuchEntityException
     */
    public function getById($Id)
    {
        if (!isset($this->instances[$Id])) {
            /** @var SliderInterface|AbstractModel $data */
            $data = $this->sliderInterfaceFactory->create();
            $this->resource->load($data, $Id);
            if (!$data->getId()) {
                throw new NoSuchEntityException(__('Requested data doesn\'t exist'));
            }
            $this->instances[$Id] = $data;
        }
        return $this->instances[$Id];
    }

    /**
     * @param SliderInterface $data
     * @return bool
     * @throws CouldNotSaveException
     * @throws StateException
     */
    public function delete(SliderInterface $data)
    {
        /** @var SliderInterface|AbstractModel $data */
        $id = $data->getId();
        try {
            unset($this->instances[$id]);
            $this->resource->delete($data);
        } catch (ValidatorException $e) {
            throw new CouldNotSaveException(__($e->getMessage()));
        } catch (\Exception $e) {
            throw new StateException(
                __('Unable to remove data %1', $id)
            );
        }
        unset($this->instances[$id]);
        return true;
    }

    /**
     * @param $Id
     * @return bool
     */
    public function deleteById($Id)
    {
        $data = $this->getById($Id);
        return $this->delete($data);
    }
}
