<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    /**
     * @var array|mixed|string
     */
    private $invoice_number;
    /**
     * @var int|mixed
     */
    private $amount;
    /**
     * @var int|mixed
     */
    private $status;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::Class);
    }
}
