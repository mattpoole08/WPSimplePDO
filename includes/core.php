<?php

namespace WPSimplePDO;

class Query{

    private $queryString;

    public $fields;
    public $type;

    // I may add query type as a parameter in the construct. Example Insert, SELECT, SELECT DISTINCT, DELETE,
    public function __construct()
    {
        $this->queryString = '';
        $this->fields = '';
    }

    public function select($table, $alias = NULL){

        $this->queryString .= 'SELECT';


        return $this;
    }

    public function select_distinct($table, $alias = NULL){
        return $this;
    }

    // TODO:: Add delete, insert, create etc.

    /** This one we will not be returning $this, but is used in the select statement and will be inserted as a string */
    public function add_field($table_alias, $field, $alias = NULL){
        $this->fields .= $field;
        if(!is_null($alias))
            $field = $field . '.' . $alias;

        $this->fields = $field;
        return $this->fields;
    }

    public function join($type, $table, $alias = NULL, $condition = NULL, $arguments = array()){
        return $this;
    }

    public function condition(){
        return $this;
    }

    public function groupBy(){
        return $this;
    }

    public function orderBy(){
        return $this;
    }

    public function limit(){
        return $this;
    }

    public function prepare(){
        return $this;
    }

    /**
     * Base method for shortcut queries like get_posttype, get_taxonomy, get_taxonomylist, get_post_id(),
     */
    public function get(){
        return $this;
    }

    // Add a process_query function elsewhere to do the prepareing of the query for the execute statement. Which may not be needed due to how we are building this.
    public function execute(){
        return $this->queryString;
    }


}