<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
	use Notifiable, SoftDeletes;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name', 'email', 'password',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	public function roles()
	{
		return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }

    public function checkPermissionAccess($permissionCheck)
    {
        // B1: Lấy được tất cả các quyền của user đang login hệ thống
        $roles = Auth()->user()->roles;
        foreach ($roles as $role) {
            $permissions = $role->permission;
            if($permissions->contains('key_code', $permissionCheck)) {
                return true;
            }
            return false;
        }
        // So sánh giá trị dựa vào route hiện tại xem có tồn tại trong các quyền mà mình lấy được hay không
    }
}
