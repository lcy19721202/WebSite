<?php
/**
 * WordPress基础配置文件。
 *
 * 本文件包含以下配置选项：MySQL设置、数据库表名前缀、密钥、
 * WordPress语言设定以及ABSPATH。如需更多信息，请访问
 * {@link http://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 * 编辑wp-config.php}Codex页面。MySQL设置具体信息请咨询您的空间提供商。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以手动复制这个文件，并重命名为“wp-config.php”，然后填入相关信息。
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define('DB_NAME', 'wordpress');

/** MySQL数据库用户名 */
define('DB_USER', 'wordpress');

/** MySQL数据库密码 */
define('DB_PASSWORD', 'wordpress');

/** MySQL主机 */
define('DB_HOST', 'localhost');

/** 创建数据表时默认的文字编码 */
define('DB_CHARSET', 'utf8');

/** 数据库整理类型。如不确定请勿更改 */
define('DB_COLLATE', '');

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/
 * WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'cFthB+M{Y(S6~P%VggzmKj+FAu:Ru33ZX]sZmZt*Mb>j-X&Urly1Aga7zw2x*y+a');
define('SECURE_AUTH_KEY',  'kFac_Zvj5+WVOo|L8@mL|fM4+*m}J @}@O]X[8>K(S*tW{-vIv{d-D/S[t`.E:`s');
define('LOGGED_IN_KEY',    'Oh[eeBn?G,p- Fg/c*Va:1Ds|a99<w^5F-1X<ogo_0ZU+U:MU;?7a(P};$h@WoF*');
define('NONCE_KEY',        'eeAe-P,VFt}5Afr}ZquFgi,8ld,2WA6~<AJJ4C;~GFnhfQ#[2Q8WxDF{Ub,(-Z~<');
define('AUTH_SALT',        ']Tw?lm&bOVOcu+i|Y?6A>oBPH5+=or>*>UQy.,j7`G4UmU5X[W?7dI.BR|Un4xaa');
define('SECURE_AUTH_SALT', '9r+?kSWJQj4/?+p@+vO<x]`YM#N_hH!sKK@p-W+LQV5E?7?~s/tcY(nP-&#[[t+f');
define('LOGGED_IN_SALT',   'A /k9-B(z9Y?P  mewBL{o.mBd;.5Z[`TBpL~ktY*X..UlA#hjWAg/6-@3z*QCe]');
define('NONCE_SALT',       '-`YTprqaV*Rm?*:XW[(P7^W; HIMc|`mGbdu:O]J;avXd5t-Ua|+~;vPEK)4e4^Z');

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix  = 'wp_';

/**
 * WordPress语言设置，中文版本默认为中文。
 *
 * 本项设定能够让WordPress显示您需要的语言。
 * wp-content/languages内应放置同名的.mo语言文件。
 * 例如，要使用WordPress简体中文界面，请在wp-content/languages
 * 放入zh_CN.mo，并将WPLANG设为'zh_CN'。
 */
define('WPLANG', 'zh_CN');

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 */
define('WP_DEBUG', false);

/**
 * zh_CN本地化设置：启用ICP备案号显示
 *
 * 可在设置→常规中修改。
 * 如需禁用，请移除或注释掉本行。
 */
define('WP_ZH_CN_ICP_NUM', true);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** 设置WordPress变量和包含文件。 */
require_once(ABSPATH . 'wp-settings.php');