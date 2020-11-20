<?php

namespace App\Traits;

use App\User;
use Illuminate\Database\Eloquent\Builder;

trait Multitenantable
{


    protected static function bootMultitenantable()
    {

        if (auth()->check()) {
            static::creating(function ($model) {
                try {
                    $table = $model->getTable();
                    if ($table == 'users') {
                        $model->ref = auth()->id();
                    } else {
                        $model->user_id = auth()->id();
                    }
                } catch (\Throwable $th) {
                    //throw $th;
                }
            });

            static::updating(function ($model) {
                try {
                    $table = $model->getTable();
                    if ($table == 'users') {
//                        $model->ref = auth()->id();
                    } else {
                        $model->user_id = auth()->id();
                    }
                } catch (\Throwable $th) {
                    //throw $th;
                }
            });

            static::addGlobalScope('ref', function (Builder $builder) {

                try {
                    $table = ($builder->getModels()[0])->table;
                    $level = auth()->user()->level;
                    if ($table == 'users') {
                        switch ($level) {
                            case 1:
                                $builder->where('ref', auth()->id())->orWhere('id', auth()->id());

                                break;
                            case 2:
                                $builder->where('id', auth()->id());

                                break;
                        }
                    } else {
                        $builder->where('user_id', auth()->id());
                    }
                } catch (\Throwable $th) {
                    //throw $th;
                }
            });
        }
    }
}
