#### 工厂模式:

> 工厂模式(Factory Pattern)这种类型的设计模式属于创建型模式，它提供了一种创建对象的最佳方式。在工厂模式中，我们在创建对象时不会对客户端暴露创建逻辑，并且是通过使用一个共同的接口来指向新创建的对象。

#### 简单的定义：
提供一个创建对象实例的功能，而无需关系其具体实现，被创建实例的类型可以是接口、抽象类，也可以是具体的类。

#### 使用实例：

> 当我们程序中需要使用到七牛云存储，OSS存储，S3存储的时候，就可以使用到工厂模式

实例：[:多中方式存储工厂模式](https://github.com/Guo-Hongfu/php-setting-model/tree/master/工厂模式/cloud_storage)