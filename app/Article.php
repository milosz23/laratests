<?php namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Article extends Model {

	protected $fillable = [
		"title",
		"body",
		"published_at",
		"user_id"
	];

	protected $dates = ['published_at'];

	//mutator
	public function setPublishedAtAttribute($date)
	{
		$this->attributes['published_at'] = Carbon::createFromFormat('Y-m-d', $date);
	}

	//scope
	public function scopePublished($query)
	{
		$query->where('published_at', '<=', Carbon::now());
	}


	//eloquent relationship
	public function user()
	{
		$this->belongsTo('App\User');
	}

	/**
	 * get tags accosiated with given article
	 */
	public function tags()
	{
		return $this->belongsToMany('App\Tag')->withTimestamps();//work with pivot table with standard name, 
		//if not - need to provide here pivot table name and id in that table
	}



}
