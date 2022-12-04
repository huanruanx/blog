#### IUOCODE Blog

> 本项目运行编程语言环境要求在PHP8.0以上兼容8.1



## 主要特性
* 采用框架开发，让开发更高效，让维护更快捷
* 极简化

## 安装教程
* 下载项目包
~~~ 
git clone https://github.com/suxaiolin/blog.git
~~~
* 设置运行目录为【public】目录
* 设置伪静态规则（如果是某塔服务器面板则直接选着thinkphp）
~~~
Niginx
location / {
   if (!-e $request_filename) {
       rewrite  ^(.*)$  /index.php?s=/$1  last;
    }
}
--------------------------------------------------------------------------
iis
<rewrite>
 <rules>
 <rule name="OrgPage" stopProcessing="true">
 <match url="^(.*)$" />
 <conditions logicalGrouping="MatchAll">
 <add input="{HTTP_HOST}" pattern="^(.*)$" />
 <add input="{REQUEST_FILENAME}" matchType="IsFile" negate="true" />
 <add input="{REQUEST_FILENAME}" matchType="IsDirectory" negate="true" />
 </conditions>
 <action type="Rewrite" url="index.php/{R:1}" />
 </rule>
 </rules>
 </rewrite>
---------------------------------------------------------------------------
apache
<IfModule mod_rewrite.c>
  Options +FollowSymlinks -Multiviews
  RewriteEngine On

  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteRule ^(.*)$ index.php/$1 [QSA,PT,L]
</IfModule>
~~~
* 修改根目录下的【.env】文件中的数据库配置，字段为【USERNAME】数据库用户名，【PASSWORD】数据库密码，【DATABASE】数据库名称，【HOSTNAME】数据库地址，【HOSTPORT】数据库端口
* 打开首页跟着引导安装即可
* 首次后台登录用户为【admin/123456】

## 版权信息
IOUCODE遵循Apache2开源协议发布，并提供免费使用。
本项目包含的第三方源码和二进制文件之版权信息另行标注。版权所有Copyright © 2019-2020 by IOUCODE (https://IOUCODE.cn/)All rights reserved。