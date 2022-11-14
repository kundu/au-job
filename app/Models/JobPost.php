<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JobPost
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property double $rate
 * @property int  $country_id
 * @property int  $country_id
 * @property int  $status
 */
class JobPost extends Model
{
    use HasFactory;

    public const STATUS_ENABLE  = 1;
    public const STATUS_DISABLE = 0;

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
