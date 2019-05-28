<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed description
 * @property bool is_done
 */
class Todo extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'id';
    protected $table = 'todo_list';

}
