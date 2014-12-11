<?php
namespace Envoy\SlimStarter\Vote\Models;

use \Model;

use \Carbon\Carbon;

class Vote extends \Slim\Eloquent\Model {

    protected $fillable = ['entry_id', 'ip_address'],
              $appends = ['ip_address_formatted'];
              
    public function entry()
    {
        return $this->belongsTo('\Entry', 'entry_id', 'id');
    }
    
    public static function addVote(array $vote) {
        if(self::where('ip_address', $vote['ip_address'])->earlierThan(60*24)->first()) {
            return false;
        }
        
        return self::create($vote);
    }
    
    public function scopeEarlierThan($query, $interval)
    {
        return $query->where('created_at', '>=', Carbon::now()->subMinutes($interval)->toDateTimeString());
    }
    
    public function getIpAddressFormattedAttribute() {
        return long2ip($this->ip_address);
    }
}