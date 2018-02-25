免责声明:
本程序开源共享,
仅作为学习交流,
切勿作为盈利工具,
请遵守一切国家法律法规,
由此产生的所有法律问题由使用者承担与本程序作者无关.

程序介绍:
基于laravel和querylist框架开发完成

安装环境:

推荐使用apache2.4+php7.1

集成环境推荐使用：xampp7.1

xampp7.1:https://www.apachefriends.org/zh_cn/index.html

linux下目录权限设置：

/app/storage这个目录是laravel的一些写文件的目录，会写log、session、页面缓存等数据，所以要对这个目录设置正确的权限。

如果你为了方便设置chmod +777 app/storage也是可以的。但是我还是不推荐。

我推荐将目录的权限设置为会写文件的用户名和用户组
chmod -R 777 app/storage
#访问一下网页，看看是否有输出。
#进入到/app/storage/session的文件组是谁？我的是nobody
#这个是php的用户组，我的nginx也是这个组
chmod -R 775 app/storage
chown -R :nobody app/storage
然后配web服务器就能访问了。


