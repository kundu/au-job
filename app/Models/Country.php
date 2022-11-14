<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Country
 *
 * @property int  $id
 * @property string $name
 * @property int $status
 */
class Country extends Model
{
    use HasFactory;

    public const STATUS_ENABLE  = 1;
    public const STATUS_DISABLE = 0;
}
