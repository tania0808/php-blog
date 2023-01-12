<?php

class Model extends Database
{
    public $errors = [];

    public function where($column, $value, $orderby = 'desc')
    {
        $column = addslashes($column);
        $query = "SELECT * FROM $this->table WHERE $column = :value ORDER BY id $orderby";

        return $this->query($query, [
            'value' => $value
        ]);
    }

    public function insert($data)
    {
        $keys = array_keys($data);
        $columns = implode(', ', $keys);
        $values = implode(', :', $keys);
        $query = "INSERT INTO $this->table ($columns) VALUES (:$values)";
        return $this->query($query, $data);
    }

    public function update($id,$column,$data){
        $str = "";
        show($data);
        foreach ($data as $key => $value){
            $str .= $key . '=:' . $key . ',';
        }
        $data['id'] = $id;
        $str = trim($str, ',');
        $query = "UPDATE $this->table SET $str WHERE $column = :id";
        echo $query;
        return $this->query($query, $data);
    }

    public function delete($column, $value){
        $query = "DELETE FROM $this->table WHERE $column = :value";

        return $this->query($query, [
            'value'=>$value
        ]);
    }



}