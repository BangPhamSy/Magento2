<?php
namespace Magenest\Movie\Ui\Component\Listing\DataProvider;

use Magenest\Movie\Model\ResourceModel\MagenestMovie\CollectionFactory;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @var array
     */
    protected $_loadedData;

    public function __construct(
        $name, $primaryFieldName, $requestFieldName,
        CollectionFactory $employeeCollectionFactory, array $meta = [], array $data = [])
    {
        $this->collection = $employeeCollectionFactory->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $employee) {
            $this->_loadedData[$employee->getMovieId()] = $employee->getData();

        }
        return $this->_loadedData;
    }
}