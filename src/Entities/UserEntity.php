<?php

namespace P0n0marev\Ispmanager6\Entities;

class UserEntity extends BaseEntity
{
    public string $name;
    public string $fullname;
    public ?string $preset = null;
    public ?string $passwd = null;
    public ?string $confirm = null;
    public ?string $comment = null;


//    public $owner;
//
//    public bool $active;
//    public int $quota_total;
//    public int $quota_used;
//
//    public bool $create_time = false;
//    public bool $backup = false;
//    public bool $limit_virusdie_autorun = false;
//    public bool $limit_virusdie = false;
//    public bool $limit_ssl = false;
//    public bool $limit_cgi = false;
//    public bool $limit_php_mode_mod = false;
//    public bool $limit_php_mode_lsapi = false;
//    public bool $limit_php_mode_cgi = false;
//    public bool $limit_php_mode_fcgi_apache = false;
//    public bool $limit_php_mode_fcgi_nginxfpm = false;
//    public ?string $limit_php_fpm_version = null;
//    public bool $limit_shell = false;
//    public int $limit_users = 0;
//    public int $limit_resellertechdomain = 0;
//    public int $limit_ipv4addrs = 0;
//    public int $limit_ipv6addrs = 0;
//    public int $limit_quota = 1;
//    public int $limit_traff = 0;
//    public int $limit_db = 0;
//    public int $limit_dbsize = 0;
//    public int $limit_db_users = 0;
//    public int $limit_ftp_users = 0;
//    public int $limit_webdomains = 0;
//    public int $limit_domains = 0;
//    public int $limit_emaildomains = 0;
//    public int $limit_emails = 0;
//    public int $limit_cpu = 0;
//    public int $limit_memory = 0;
//    public int $limit_process = 0;
//    public int $limit_email_quota = 0;
//    public int $limit_mailrate = 0;
//    public int $limit_scheduler = 0;
//    public int $limit_nginxlimitconn = 0;
//    public int $limit_maxclientsvhost = 0;
//    public int $limit_mysql_maxuserconn = 0;
//    public int $limit_mysql_maxconn = 0;
//    public int $limit_mysql_query = 0;
//    public int $limit_mysql_update = 0;
//    public int $limit_charset = 0;
//    public int $limit_php_mode = 0;
//    public int $limit_php_cgi_version = 0;
//    public int $limit_php_lsapi_version = 0;
//    public int $limit_dirindex = 0;
//    public int $limit_techdomain = 0;

    public function getBooleans(): array
    {
        return [
//            'active',
//            'limit_shell',
//            'limit_ssl',
        ];
    }
}
