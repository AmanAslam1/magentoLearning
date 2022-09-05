<?php

namespace Mage4\UserInquiry\Model;

use Magento\Framework\Api\DataObjectHelper;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\StateException;
use Magento\Framework\Exception\ValidatorException;
use Magento\Framework\Exception\NoSuchEntityException;
use Mage4\UserInquiry\Api\DataRepositoryInterface;
use Mage4\UserInquiry\Api\Data\DataInterface;
use Mage4\UserInquiry\Api\Data\DataInterfaceFactory;
use Mage4\UserInquiry\Model\ResourceModel\Data as ResourceData;
use Mage4\UserInquiry\Model\ResourceModel\Data\CollectionFactory as DataCollectionFactory;
use Magento\Framework\Model\AbstractModel;

class DataRepository implements DataRepositoryInterface
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
     * @var DataCollectionFactory
     */
    protected $dataCollectionFactory;

    /**
     * @var DataInterfaceFactory
     */
    protected $dataInterfaceFactory;

    /**
     * @var DataObjectHelper
     */
    protected $dataObjectHelper;

    public function __construct(
        ResourceData $resource,
        DataCollectionFactory $dataCollectionFactory,
        DataInterfaceFactory $dataInterfaceFactory,
        DataObjectHelper $dataObjectHelper
    ) {
        $this->resource = $resource;
        $this->dataCollectionFactory = $dataCollectionFactory;
        $this->dataInterfaceFactory = $dataInterfaceFactory;
        $this->dataObjectHelper = $dataObjectHelper;
    }

    /**
     * @param DataInterface $data
     * @return DataInterface
     * @throws CouldNotSaveException
     */
    public function save(DataInterface $data)
    {
        try {
            /** @var DataInterface|AbstractModel $data */
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
            /** @var DataInterface|AbstractModel $data */
            $data = $this->dataInterfaceFactory->create();
            $this->resource->load($data, $Id);
            if (!$data->getId()) {
                throw new NoSuchEntityException(__('Requested data doesn\'t exist'));
            }
            $this->instances[$Id] = $data;
        }
        return $this->instances[$Id];
    }

    /**
     * @param DataInterface $data
     * @return bool
     * @throws CouldNotSaveException
     * @throws StateException
     */
    public function delete(DataInterface $data)
    {
        /** @var DataInterface|AbstractModel $data */
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
