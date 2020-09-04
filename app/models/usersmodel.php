<?php

namespace PHPMVC\Models;

class UsersModel extends AbstractModel
{
    public $UserId;
    public $Username;
    public $password;
    public $Email;
    public $PhoneNumber;
    public $SubscriptionDate;
    public $lastLogin;
    public $GroupId;
    public $Status;

    protected static $tableName = 'app_users';
    protected static $tableSchema = array(
        'UserId'                 => self::DATA_TYPE_INT,
        'Username'               => self::DATA_TYPE_STR,
        'Password'               => self::DATA_TYPE_STR,
        'Email'                  => self::DATA_TYPE_STR,
        'PhoneNumber'            => self::DATA_TYPE_STR,
        'SubscriptionDate'       => self::DATA_TYPE_DATE,
        'LastLogin'              => self::DATA_TYPE_STR,
        'GroupId'                => self::DATA_TYPE_INT,
        'Status'                => self::DATA_TYPE_INT
    );

    protected  static $primaryKey = 'UserId';

    public function cryptPassword($password)
    {
        $this->Password = crypt($password, APP_SALT);
    }
    public static function getAll()
    {
        return self::get(
            'SELECT au.*, aug.GroupName GroupName FROM ' . self::$tableName . ' au INNER JOIN app_users_groups aug ON aug.GroupId = au.GroupId'
        );
    }

    // TODO:: FIX THE TABLE ALIASING
    public static function getUsers(UsersModel $user)
    {
        return self::get(
            'SELECT au.*, aug.GroupName GroupName FROM ' . self::$tableName . ' au INNER JOIN app_users_groups aug ON aug.GroupId = au.GroupId WHERE au.UserId != ' . $user->UserId
        );
    }

    public static function userExists($username)
    {
        return self::get('SELECT * FROM ' . self::$tableName . ' WHERE Username = "' . $username . '"');
    }

    public static function authenticate ($username, $password, $session)
    {
        $password = crypt($password, APP_SALT) ;
        $sql = 'SELECT *, (SELECT GroupName FROM app_users_groups WHERE app_users_groups.GroupId = ' . self::$tableName . '.GroupId) GroupName FROM ' . self::$tableName . ' WHERE Username = "' . $username . '" AND Password = "' .  $password . '"';
        $foundUser = self::getOne($sql);
        if(false !== $foundUser) {
            if($foundUser->Status == 2) {
                return 2;
            }
            $foundUser->LastLogin = date('Y-m-d H:i:s');
            $foundUser->SubscriptionDate = date();
            $foundUser->save();
            $foundUser->profile = UsersProfilesModel::getByPK($foundUser->UserId);
            $foundUser->privileges = UsersGroupsPrivilegesModel::getPrivilegesForGroup($foundUser->GroupId);
            $session->u = $foundUser;
            return 1;
        }
        return false;
    }


}