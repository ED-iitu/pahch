<?php namespace App\Models\Traits;


use App\Models\Modules\Packet\PacketItem;
use App\Models\Period;
use App\Models\Progress;
use App\Models\Subscribe;
use Illuminate\Database\Eloquent\Builder;

trait Payable
{

    public function subscribes()
    {
        return $this->morphMany(Subscribe::class, 'entity');
    }

    public function subscribe()
    {
        return $this->morphOne(Subscribe::class, 'entity')->where('user_id', user()->id);
    }

    public function periods()
    {
        return $this->morphMany(Period::class, 'entity')->where(function ($query) {
            if (!settings('modules_enabled_periods')) {
                $query->whereNull('id');
            }
        });
    }

    public function packets(): \Illuminate\Database\Eloquent\Relations\Relation
    {
        return $this->morphMany(PacketItem::class, 'entity')->where(function ($query) {
            if (!settings('modules_enabled_packets')) {
                $query->whereNull('id');
            }
        });
    }

    public function payed(int $user_id = null): bool
    {
        if($this->checkPublicationApp()){
            return true;
        }
        if (auth()->guest()) {
            return false;
        }
        return (bool)$this->subscribes()->payed()->count();
    }

    public function hasSubscribed(int $user_id = null): bool
    {
        return $this->check_subscribe($user_id);
    }

    public function checkPublicationApp()
    {
        if (request()->has('publication_app')) {
            $key = request('publication_app', '');
            $domain = request()->getHost();
            return hash("sha256",$domain.env('SECRET_TOKEN', '')) === $key;
        }
        return false;
    }

    public function check_subscribe(int $user_id = null): bool
    {
        if (!authorized()) {
            return false;
        }
        if($this->checkPublicationApp()){
            return true;
        }
        if (request()->is('admin*')) {
            return (bool)($this->subscribes()->payed()->where('user_id', (is_null($user_id) ? user()->id : $user_id))->count());
        }
        return (bool)($this->subscribes()->payed()->where('user_id', (is_null($user_id) ? user()->id : $user_id))->count());
    }

    public function getSubscribe(int $user_id = null)
    {
        return $this->subscribes()->payed()->where('user_id', (is_null($user_id) ? user()->id : $user_id))->latest()->first();
    }

    public static function scopeSubscribed(Builder $builder)
    {
        $builder->with('subscribe');
        return $builder->whereHas('subscribes', function ($query) {
            $query->where('user_id', user()->id)
                ->where('payed', true);
        });
    }

    public function getHasSubscribedAttribute()
    {
        return $this->check_subscribe();
    }

    public function getBonusesAttribute()
    {
        if (!authorized()) {
            return 0;
        }
        return PacketItem::calculateBonus($this->price);
    }

    public function getName()
    {
        return self::NAME ?? '';
    }
}
