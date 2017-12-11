<?php


class DatabaseCommonManagerClass
{
    protected $db;
    protected $tableName;
    protected $queryResult;

    /**
     * DatabaseCommonManagerClass constructor.
     *
     * @param $dataBaseConnection
     * @param $tableName
     */
    function __construct($dataBaseConnection,$tableName){
        /** @var mysqli $dataBaseConnection */
        $this->db=$dataBaseConnection;
        $this->tableName=$tableName;
        $this->queryResult=null;
    }

    /**
     * @param $stringQuery
     */
    protected function query($stringQuery)
    {

            $this->queryResult=$this->db->query($stringQuery);
    }
    /**
     * @param $paramValues
     * @return array
     */
    protected function formatQueryResult($paramValues){
        $ret=[];
        $result=$this->queryResult;
        if($result!==null && $result->num_rows>0){
            $ctr=0;
            while ($row=$result->fetch_assoc()){
                for($i=0;$i<count($paramValues);$i++)
                    $ret[$ctr][$paramValues[$i]]=$row[$paramValues[$i]];
                $ctr+=1;
            }
        }
        return $ret;
    }

    /**
     * @return null
     */
    public function getLatestQueryResult(){
        return $this->queryResult;
    }

    /**
     *
     */
    public function close_connection(){
        $this->db->close();
    }

}