<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Employee extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $fillable = ['id','first_name','last_name','other_name','phone','email','gender',
'period_rate','pay_type','sstype_id','hourly_rate','pay_period',
'active','deduct_tax','deduct_ss','deduct_health','deduct_hdmf',
'branch_id','department_id','job_id',
'health_id','hdmf_id','bank_id','bankbranch_id','account_number','account_name',
'ss_number','health_number','hdmf_number','marital','company_id','hire_date',
'terminate_date','birth_date','retired_date','probation_date','employement_status',
'code','title_id','picture','about_employee','creator_id','created_at','updated_at'];

    protected $guarded = [];

    protected $appends = [
        "full_name"
    ];

      public function farms()
    {
        return $this->hasMany(Farm::class);
    }

    public function harvests()
    {
        return $this->hasMany(Harvest::class);
    }

    public function householdBlocks()
    {
        return $this->hasManyThrough(HouseholdBlock::class, Farm::class);
    }

    public function blocks()
    {
        return $this->hasManyThrough(Block::class, Farm::class);
    }

    public function sales()
    {
        return $this->hasMany(Purchase::class, "farmer_id");
    }

    public function address()
    {
        return $this->morphOne(Address::class, "addressable");
    }

     public function logins()
    {
        return $this->morphOne(User::class, "employee");
    }

    public function addresses()
    {
        return $this->morphMany(Address::class, "addressable");
    }

     public function pictures()
    {
        return $this->morphMany(Models\Picture::class, "pictureable");
    }

    public function batches()
    {
        return $this->belongsToMany(Batch::class, "farmer_batch")->withTimestamps();
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class, "group_member")->withTimestamps();
    }


    

    public function findHarvestByBatchId($id)
    {
        return $this->harvests()->where("batch_id", $id)->first();
    }

    public function hasHarvested(Batch $batch)
    {
        return $this->harvests()->where("batch_id", $batch->id)->exists();
    }

    public function getFullNameAttribute()
    {
        return $this->attributes["first_name"] ." ". $this->attributes["last_name"];
    }

     public function employee()
    {
        return $this->hasMany(prltransaction::class,"employee_id");
    }

       public function job()
    {
        return $this->belongsTo(Models\Job::class,"job_id");
    }


       public function branch()
    {
        return $this->belongsTo(Models\Branch::class,"branch_id");
    }


       public function department()
    {
        return $this->belongsTo(Models\Department::class,"department_id");
    }


    
}
