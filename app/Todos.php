<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todos extends Model
{
	protected $table = 'todo';
	protected $guarded = array('id');

	public function getPriority()
    {
        $priority_list = [
        	'0' => '',
        	'1' => '優',
        	'2' => '最優',
    	];

    	$todo_priority = $priority_list[$this->priority];
        return $todo_priority;
    }

    public function getChoicePriority($value_num)
    {
    	if ($this->priority == $value_num)
    	{
    		return 'checked="checked"';
    	}
    }


	public function user()
	{
		 return $this->belongsTo('App\User');
	}
}
