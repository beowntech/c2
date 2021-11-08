<?php

namespace App;

use App\SEO;
use App\CityModel;
use App\StateModel;
use Illuminate\Database\Eloquent\Model;

class Hostels extends Model
{
    protected $guarded=[];

  /**
   * The roles that belong to the Hostels
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
   */
  public function seo()
  {
      return $this->belongsToMany(SEO::class, 'hostels_seo', 'hostels_id', 'seo_id');
  }

  /**
   * Get the cities associated with the Hostels
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function cities()
  {
      return $this->hasOne(CityModel::class, 'id', 'city');
  }

    /**
   * Get the states associated with the Hostels
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasOne
   */
  public function states()
  {
      return $this->hasOne(StateModel::class, 'id', 'state');
  }

}
