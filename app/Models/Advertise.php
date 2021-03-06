<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\HasUuid;

class Advertise extends Model
{

    use SoftDeletes, HasUuid;

    /**
     * The name of the "created at" column.
     *
     * @var string
     */
    const CREATED_AT = 'createdAt';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = 'updatedAt';

    /**
     * The name of the "deleted at" column.
     *
     * @var string
     */
    const DELETED_AT = 'deletedAt';

    protected $fillable = [
        'currencyId', 'advertiseTypeId', 'name', 'code', 'description', 'price'
    ];

    protected $keyType = 'string';

    public $incrementing = false;

    public function advertise_type()
    {
        return $this->belongsTo(AdvertiseType::class, 'advertiseTypeId', 'id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currencyId', 'id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'advertiseId', 'id');
    }
}
