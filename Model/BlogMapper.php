<?php

namespace Model;

use Core\MyORM\AbstractMapper;
use Core\MyORM\DatabaseAdapterInterface;
use Core\MyORM\Proxy\CollectionProxy;

class BlogMapper extends AbstractMapper {

    protected $_commentMapper;
    protected $_entityTable = 'blogs';
    protected $_entityClass = 'BlogModel';

    /**
     * BlogMapper constructor.
     * @param DatabaseAdapterInterface $adapter
     * @param CommentMapper $_commentMapper
     */
    public function __construct(DatabaseAdapterInterface $adapter, CommentMapper $_commentMapper)
    {
        $this->_commentMapper = $_commentMapper;
        parent::__construct($adapter);
    }


    public function delete($id, $col = 'id')
    {
        parent::delete($id, $col);
        $this->_commentMapper->delete($id, 'blog_id');
    }

    protected function _createEntity(array $data)
    {
        $entry = new $this->_entityClass(array(
            'id' => isset($data['id']) ? $data['id'] : null,
            'title' => $data['title'],
            'content' => $data['content'],
            'comments' => new CollectionProxy($this->_commentMapper, "entry_id = {$data['id']}"),
            'date_created' => time(),
            'date_modified' => time()
        ));

        return $entry;
    }
}