<?php
/**
 * 数据库连接
 * author caowei
 */
class DWDData_Db extends dbObject
{
    public $returnType           = 'Array';

    public $pageLimit            = 10;

    public $startPage            = 1;

    public $defaultOffset        = 0;

    const  FIELD_COMMON_TYPE     = 0;

    public function __construct()
    {
        $config      = Yaf\Registry::get("config");
        $db          = MysqliDb::getInstance();
        if (!$db) {
            $db      = new MysqliDb($config->database->config->toArray());
        }
        parent::__construct();
    }

    public function getTableName()
    {
        return $this->dbTable;
    }

    public function _initConditions($conditions)
    {
        foreach ($conditions as $condition) {
            switch ($condition['op']) {
                case 'IN':
                case 'in':
                case 'NOT IN':
                case 'not in':
                case 'BETWEEN':
                case 'between':
                case 'NOT BETWEEN':
                case 'not between':
                    if (isset($condition['cond']) &&  ($condition['cond'] == 'or' || $condition['cond'] == 'OR')) {
                        $this->orWhere($condition['field'], $condition['values'], $condition['op']);
                    } else {
                        $this->where($condition['field'], $condition['values'], $condition['op']);
                    }
                     
                    break;
                case '>=':
                case '>':
                case '<=':
                case '<':
                case '<=>':
                case '!=':
                    if (isset($condition['cond']) &&  ($condition['cond'] == 'or' || $condition['cond'] == 'OR')) {
                        $this->orWhere($condition['field'], $condition['value'], $condition['op']);
                    } else {
                        $this->where($condition['field'], $condition['value'], $condition['op']);
                    }
                    break;
                case '=':
                case 'eq':
                case 'EQ':
                    if (isset($condition['cond']) &&  ($condition['cond'] == 'or' || $condition['cond'] == 'OR')) {
                        $this->orWhere($condition['field'], $condition['value']);
                    } else {
                        $this->where($condition['field'], $condition['value']);
                    }
                    break;
                case 'col_eq':
                case 'COL_EQ':
                    if (isset($condition['cond']) &&  ($condition['cond'] == 'or' || $condition['cond'] == 'OR')) {
                        $this->orWhere($condition['field'] . ' = ' . $condition['value']);
                    } else {
                        $this->where($condition['field'] . ' = ' . $condition['value']);
                    }
                    break;
                case 'is':
                case 'IS':
                    $this->where($condition['field'] . ' IS ' . $condition['value']);
                    break;
                case 'is not':
                case 'IS NOT':
                    $this->where($condition['field'] . ' IS NOT ' . $condition['value']);
                    break;
                case 'join':
                case 'JOIN':
                    $this->join($condition['modelName'], $condition['joinKey'], $condition['joinType']);
                    break;
                case 'group':
                case 'GROUP':
                    $this->groupBy($condition['field']);
                    break;
                case 'ORDER BY':
                case 'order by':
                    $this->orderBy($condition['field'], $condition['type']);
                    break;
                case 'custom_join':
                case 'CUSTOM_JOIN':
                    $joinStr =  $condition['joinLKey'] . " = " . $condition['joinRKey'];
                    $this->getDB()->join($condition['joinTable'], $joinStr, $condition['joinType']);
                    break;
                case 'like':
                case 'LIKE':
                    $this->where($condition['field'], array( 'LIKE' => $condition['value'] ));
                    break;
                default:
                    break;
            }
        }
    }

    /**
     * 重置对象属性
     */
    public function insertEntity($data)
    {
        $this->getDB()->reset();
        $this->data = array();

        foreach ($data as $column => $value) {
            $this->{$column}       = $value;
        }

        return $this->insert();
    }

    /**
     * 根据条件获取列表
     */
    public function getListByConditions($conditions, $option = array(), $fields = array('id'))
    {
        self::_initConditions($conditions);
        $res                  = array();

        if (isset($option['needPagination']) && true == $option['needPagination']) {
            $this->pageLimit  = isset($option['limit'])   ? intval($option['limit'])   : $this->pageLimit;
            $pageNum          = isset($option['pageNum']) ? intval($option['pageNum']) : $this->startPage;
            $res['list']      = $this->paginate($pageNum, $fields);
            $res['totalPage'] = $this->totalPages;
            $res['totalCnt']  = intval($this->totalCount);
        } elseif (isset($option['nextId']) && isset($option['limit'])) {
            $rowNums       = isset($option['limit']) ? intval($option['limit']) : $this->pageLimit;
            $res['list']   = $this->get($rowNums, $fields);
        } else {
            $rowNums          = array( );
            $rowNums[0]       = isset($option['offset']) ? intval($option['offset']) : $this->defaultOffset;
            $rowNums[1]       = isset($option['limit'])  ? intval($option['limit'])  : $this->pageLimit;
            $res['list']      = $this->get($rowNums, $fields);
        }

        if (null == $res['list']) {
            $res['list']      = array();
        }
        return $res;
    }

    /**
     * 根据条件获取列表数量
     */
    public function getListCntByConditions($conditions)
    {
        self::_initConditions($conditions);

        return $this->count();
    }

    public function startTransaction()
    {
        self::getDB()->startTransaction();
    }

    public function commit()
    {
        self::getDB()->commit();
    }

    public function rollback()
    {
        self::getDB()->rollback();
    }
}
