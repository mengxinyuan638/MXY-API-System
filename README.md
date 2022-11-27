# 萌新源API+API管理后台v4.4

## 介绍
前端基于layui以及pear-Admin-layui
后端基于国产ThinkPHP框架
开发的API管理后台

## 版本要求
PHP7.3以上版本
数据库

目前仅支持mysql



## 安装教程

**安装教程看这里**[安装教程](https://blog.juncikeji.xyz/2022/08/23/mxy-api-install/)

上传源码访问站点按照安装向导提示安装系统
默认api管理后台路径网址/mxyadmin
注意要给网站配置伪静态
以我的Nginx服务器为例

```
location / {
        if (!-e $request_filename) {
   		    rewrite  ^(.*)$  /index.php?s=/$1  last;
        }
    }
```
配置伪静态的目的是为了省略入口文件，请务必配置一下，数据库配置文件在config/database.php下请自行配置

## 使用截图

### 登录界面

![](D:\Blog\文章\文章图片\README\login_page.png)

### 首页

![](D:\Blog\文章\文章图片\README\home_page.png)

### 前台预览

![](D:\Blog\文章\文章图片\README\index_view.png)

### API信息管理

![](D:\Blog\文章\文章图片\README\api_msg.png)

### 前台信息管理

![](D:\Blog\文章\文章图片\README\msg_edit.png)

### 友链管理

![](D:\Blog\文章\文章图片\README\link.png)

### 首页底部信息管理

![](D:\Blog\文章\文章图片\README\foot_page.png)



## FAQ.常见问题解答

1. 安装完成后没有背景图是空白的

​		请登录后台，找到前台管理-信息管理，接着上传背景图即可

## 更新日志
2022.8.1 v1.0Beta

2022.8.4 v2.0Beta

新增前台信息管理

2022.8.6 v2.1

新增网站维护功能

2022.8.7 v2.2

新增弹窗公告功能

2022.8.17 v3.0

新增安装向导等功能

2022.8.23 v4.0

新增首页背景，网站图标自定义

2022.8.23 v4.1

新增友链站标自定义

2022.10.22 v4.2

修复数据无法分页问题，以及数据表格缓存导致显示不正常问题

2022.11.20 v4.3

增强系统安全性

2022.11.27 v4.4

新增底部信息自定义

## 参与贡献
本人是web新手，所以写的系统漏洞肯定是有的，所以还要请各位大佬一起完善系统，如果您有建议可以提交lessure

