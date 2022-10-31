<?php


namespace App\Models\Traits;


use App\Models\Modules\Certificate\UserCertificate;

trait Certificate
{
    public function hasCertificate(int $user_id = null):bool{
        if(!authorized()){
            return false;
        }
        return (bool) $this->certificates()->where('user_id',$user_id)->count();
    }

    public function certificates(){
        return $this->morphMany(UserCertificate::class,'entity');
    }

    public function getCertificationAttribute(){
        return $this->generate_certificate && (bool) $this->certificate()->count();
    }

    public function certificate(){
        return $this->belongsTo(\App\Models\Modules\Certificate\Certificate::class);
    }
    public function user_certificate(){
        return $this->morphOne(UserCertificate::class,'entity')->where('user_id',settings('modules_enabled_certificates') && authorized() ? user()->id : -1);
    }

}