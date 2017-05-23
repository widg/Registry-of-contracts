<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registry extends Model
{
	protected $fillable = [
			'category',
            'company',
            'companysigned',
            'counterparty',
            'counterpartysigned',
            'document',
            'note',
            'price',
            'status',
            'unit'
	];
            
}
