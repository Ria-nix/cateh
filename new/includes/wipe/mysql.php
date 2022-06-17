<?php

/**
 *! Warning
 *! This file contains a MySql class that provides useful functions for generating queries and their results.
 *! Connect after connecting files such as: "helper/const.php", "helper/funcs.php".
 */

namespace wipe\helper;

/**
 * @method  connect(string ...$data)
 * forming a connection.
 * @method  string select(string $table, string $output = '*', ?string $condition = null, ?int $limit = null)
 * forming an output query.
 * @method  string update(string $table, string $set, ?string $condition = null)
 * forming an update query.
 * @method  string delete(string $table, ?string $condition = null)
 * forming a delete query.
 * @method  query(string $query, object &$link, ?string $must = ERROR::UNKNOW)
 * query validation.
 * @method  fetch(int $type, string $query, object &$link, ?string $must = null, ?int $json = null)
 * forming the query result according to the required type.
 * @method  int numeric(string $query, object &$link)
 * forming the numerical value of the query result.
 * @method  updateSettings(object &$link)
 * update the number of actual data in the database.
 */
class MySQL
{
    const FETCH_ROW     = 0;
    const FETCH_ASSOC   = 1;
    const FETCH_MUL     = 2;

    static function connect(string ...$data)
    {
        if  (count($data) !== 4)    die(ERROR::CONNECTION);

        $it =@  \mysqli_connect($data[0], $data[1], $data[2], $data[3]) ??  die(ERROR::CONNECTION);
        $it->set_charset('utf8');

        return $it;
    }

    static function select(string $table, string $output = '*', ?string $condition = null, ?int $limit = null) :   string
    {
        return  strtr   (   'SELECT :output FROM :table :condition :limit',
                            [
                                ':output'       => $output,
                                ':table'        => $table,
                                ':condition'    => empty($condition) ? '' : 'WHERE '.$condition,
                                ':limit'        => $limit ? 'ORDER BY `id` DESC LIMIT '.$limit : ''
                            ]);
    }
    
    static function update(string $table, string $set, ?string $condition = null)  :   string
    {
        return  strtr   (   'UPDATE :table SET :set :condition',
                            [
                                ':table'        => $table,
                                ':set'          => $set,
                                ':condition'    => empty($condition) ? '' : 'WHERE '.$condition
                            ]);
    }

    static function delete(string $table, ?string $condition = null)   :   string
    {
        return  strtr   (   'DELETE FROM :table :condition',
                            [
                                ':table'        => $table,
                                ':condition'    => empty($condition) ? '' : 'WHERE '.$condition
                            ]);
    }

    static function insert(string $table, array $column, null|int|string ...$values)
    {
        if  (   CHECK::array(CHECK::ARRAY_ASSOC, $column) 
            ||  count($column) !== count($values)       )   die(ERROR::TEAPOT);

        return  strtr(  'INSERT INTO :table (:columns) VALUES (:values)',
                        [
                            ':table'    =>  $table,
                            ':columns'  =>  implode(',', $column),
                            ':values'   =>  implode(',', array_map(fn($e) => json_encode( $values[ $e ], JSON_UNESCAPED_UNICODE), range(0, count($column) - 1)))
                        ]);
    }

    static function join(string $table, object &$link, string $output = '*', ?string $condition = null, ?int $limit = null)
    {
        CHECK::full($table, $link, $output);

        $table  =  CHECK::isTable($table) ? $table : die(ERROR::TEAPOT);

        $table_output   =   explode(',', $output);
        $table_output   =   empty($table_output) ? $output : $table_output;
        $table_output   =   self::joinTable($table_output);

        if  ($condition)    :
            $table_condition    =   explode(' ', $condition);
            $table_condition   =   empty($table_condition) ? $condition : $table_condition;
            $table_condition   =   self::joinTable($table_condition);
        endif;
        
        $other_tables   =   array_values( array_unique( array_filter( array_merge( $table_output, $table_condition ), fn($e) => $e !== $table ) ) );

        $references =   self::references($table, $link) ?? die(ERROR::TEAPOT);
        $references =   array_values(array_filter($references, fn($e) => in_array($e['table'], $other_tables)));
        $references =   array_map(fn($e) => "LEFT JOIN `{$e['table']}` ON `$table`.`{$e['column']}` = `{$e['table']}`.`id`" ,$references);

        $join   =   '`'.$table.'` '.implode(' ',$references);

        return self::select($join, $output, $condition, $limit);
    }

    private static function joinTable(string|array $data)
    {
        if  (is_array($data)) :
            foreach ($data as &$d)  $d  =   self::joinTable($d);
            $data   =   array_values( array_filter($data, fn($e) => is_string($e) && CHECK::isTable($e)) );
        else    :
            $data   =   GET::between('`', '`', $data);
        endif;

        return $data;
    }

    static function query(string $query, object &$link, ?string $must = ERROR::UNKNOW)
    {
        return  CHECK::must(    @$link->query($query), $must    );
    }

    static function references(string &$table, object &$link)   :   null|array
    {
        $show_table =   MySQL::fetch(MySQL::FETCH_ROW, 'SHOW CREATE TABLE '.$table, $link);

        $explode    =   explode(',', $show_table);
        $explode    =   array_values( array_filter($explode, fn($e) => strstr($e, 'FOREIGN KEY') && strstr($e, 'REFERENCES')) );

        $main_column    =   array_map(fn($e) => GET::between('FOREIGN KEY ', ' REFERENCES', $e), $explode);
        $main_column    =   array_map(fn($e) => GET::between('`', '`', $e), $main_column);
        $ref_table      =   array_map(fn($e) => GET::between('REFERENCES `', '`', $e), $explode);

        for ($i = 0; $i < count($main_column); ++$i) $references[] = ['column' => $main_column[$i], 'table' => $ref_table[$i]];

        return  @$references;
    }

    /**
     * @param  int $type use fixed values:
     * 
     * MySql::FETCH_ROW - outputs as a line the result of one column of one row ( '' ).
     * 
     * MySql::FETCH_ASSOC - outputs the result of a line as an associative array ( {} ).
     * 
     * MySql::FETCH_MUL - outputs the result of a few lines as a multi-dimensional array ( [ {} ] ).
     * @param  null|int $json necessary result formats ( GET::JSON_INT, GET::JSON_ARRAY ).
     */
    static function fetch(int $type, string $query, object &$link, ?string $must = null, ?int $json = null) :   null|int|string|array
    {
        $result =   self::query($query, $link, $must);

        if ($result) :
            switch ($type) :
                case self::FETCH_ROW    :
                    $item   =   $result->fetch_row();
                    $item   =   is_array($item) ? implode($item) : null;
                    if  (   is_int($json) 
                        && is_string($item) ) $item   =   GET::json($json, $item, $must);
                    break;
                case self::FETCH_ASSOC  :   $item   =   $result->fetch_assoc();                     break;
                case self::FETCH_MUL    :   while   ($row = $result->fetch_assoc()) $item[] = $row; break;
                default                 :   die(ERROR::TEAPOT);
            endswitch;
        endif;

        return CHECK::must(@$item, $must);
    }

    static function numeric(string $query, object &$link)   :   int
    {
        return  self::fetch(self::FETCH_ROW, $query, $link, ERROR::UNKNOW, GET::JSON_INT);
    }

    static function updateSettings(object &$link)
    {
        $it =   self::numeric   (   self::select(TABLE::SETTINGS, '`update`')       , $link ) + 1;
                self::query     (   self::update(TABLE::SETTINGS, '`update` = '.$it), $link );
    }
}
