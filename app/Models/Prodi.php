<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prodi extends Model
{
    use HasFactory, HasUuids;
    
protected $fillable = ['nama','Kaprodi','singkatan','fakultas_id'];

    public function fakultas(): BelongsTo{
        return $this->belongsTo(fakultas::class, 'fakultas_id','id');
    }

    }
       

