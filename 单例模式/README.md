#### 单例模式:

> 一个类就只有一个实例，不能被外界影响。

##### 就有三私一公：
- 一私：私有的静态的保存对象的属性。
- 一私：私有的构造方法，阻止类外 new 对象。
- 一私：私有的克隆方法，阻止类外clone对象
- 一公：公共的静态的创建对象的方法。
###### 核心代码[:Heart.php](https://github.com/Guo-Hongfu/php-setting-model/blob/master/%E5%8D%95%E4%BE%8B%E6%A8%A1%E5%BC%8F/Heart.php)

> 连接数据库，连接redis，jwt等就可以设计成单例模式;

实例：[:设计 Jwt 鉴权为单例模式](https://github.com/Guo-Hongfu/php-setting-model/blob/master/%E5%8D%95%E4%BE%8B%E6%A8%A1%E5%BC%8F/Jwt.php)