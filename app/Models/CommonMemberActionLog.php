<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonMemberActionLog extends Model
{
    protected $table = 'pre_common_member_action_log';

    public function insert(array $values)
    {
        return parent::insert($values); // TODO: Change the autogenerated stub
    }
}
