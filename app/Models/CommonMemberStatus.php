<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommonMemberStatus extends Model
{
    protected $table = 'pre_common_member_status';

    public function insert(array $values)
    {
        return parent::insert($values); // TODO: Change the autogenerated stub
    }
}