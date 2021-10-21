<?php
/**
 * @package Check Input
 * @link    ''
 * @author  Zaqueu Alves <zaqueu.alves01@gmail.com>
 * @license http://www.gnu.org/licenses/gpl-3.0.html
 * @version 1.0
 */
 namespace application\libraries\CheckInput;
 
class CheckInput
{    
    /**
     * params
     *
     * @var mixed
     */
    private $params;    
    /**
     * name
     *
     * @var mixed
     */
    private $name;    
    /**
     * type
     *
     * @var mixed
     */
    private $type;    
    /**
     * value
     *
     * @var mixed
     */
    private $value;    
    /**
     * check
     *
     * @var mixed
     */
    private $check;
    
    /**
     * __construct
     *
     * @param  array $params
     * @param  string $name
     * @param  string $type
     * @return void
     */
    public function __construct($params = null, $name = null, $type = null)
    {
        $this->params = $params;
        $this->name = $name;
        $this->type = $type;
        $this->checkParams();
    }
    
    /**
     * getCheck
     *
     * @return bol
     */
    public function getCheck()
    {
        return $this->check;
    }
    
    /**
     * checkEmpty
     *
     * @return bol
     */
    private function checkEmpty()
    {
        if (empty($this->value)) {
            return $this->check = false;
        }

        return $this->check = true;
    }
    
    /**
     * checkType
     *
     * @return bol
     */
    private function checkType()
    {
        if ($this->type != gettype($this->value)) {
            return $this->check = false;
        }

        $this->checkEmpty();
    }
    
    /**
     * checkName
     *
     * @return bol
     */
    private function checkName()
    {
        if (!isset($this->params[$this->name])) {
            return $this->check = false;
        } 

        $this->value = $this->params[$this->name];

        $this->checkType();
    }
    
    /**
     * checkParams
     *
     * @return bol
     */
    private function checkParams()
    {
        if (empty($this->params)) {
            return $this->check = false;
        }

        $this->checkName();
    }
}
?>