<?

if (!defined('test')){ echo "Forbidden Request"; exit; }

global $config;
$config['db']['host'] = 'localhost';
$config['db']['user'] = 'root';
$config['db']['pass'] = 'password';
$config['db']['name'] = 'x_notes';

$config['lang'] = 'fa';

$config['salt'] = '25kdeisoq3locedfDFsa487Aasesfxg4lsdfdf6ds';
$config['base'] = '/dev/workspace/web/notes-v3/';

$config['route'] = array(
    '/dev/workspace/web/login' => "dev/workspace/web/notes-v3/user/login",
    '/dev/workspace/web/profile/*' => "dev/workspace/web/notes-v3/user/profile/$1",
    '/dev/workspace/web/ورود' => "dev/workspace/web/notes-v3/user/login",
    '/dev/workspace/web/register' => "dev/workspace/web/notes-v3/user/register",
    '/dev/workspace/web/ثبت نام' => "dev/workspace/web/notes-v3/user/register",
    '/dev/workspace/web/home' => "dev/workspace/web/notes-v3/page/home",
    '/dev/workspace/web/خانه' => "dev/workspace/web/notes-v3/page/home",
);

