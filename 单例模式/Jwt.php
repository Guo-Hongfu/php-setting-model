<?php

/**
 * Created by PhpStorm.
 * User: Guo-Hongfu
 * Date: 2019/8/30
 * Time: 23:44
 */

/**
 * Class Jwt
 * 实例 Jwt加密解密
 * Jwt文档：https://github.com/lcobucci/jwt
 ** 祝祖国70周岁生日快乐。
 */

use Lcobucci\JWT\{
    Builder, Parser, Signer\Hmac\Sha256, Signer\Key, ValidationData
};


class Jwt
{
    /**
     * @var
     * jwt token
     */
    private $token;
    private $iss = 'www.guohongfu.top';
    /**
     * @var
     * uid
     */
    private $uid;
    private $aud = 'guohongfu';
    /**
     * @var string
     * $secrect
     */
    private $secrect = "1asdafiopk;lmaqdasd7812";

    /**
     * @var
     * decodeToken
     */
    private $decodeToken;
    private $jwtid = 'dasdasdasdzxasd';
    private static $instance;

    /**
     * @return JwtAuth
     * 获取 jwt单例句柄
     */
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * @return string
     * 获取token
     */
    public function getToken() :string
    {
        return $this->token;
    }

    /**
     * @param $token
     * @return $this
     * 设置token
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * 设置uid
     */
    public function setUid(string $uid='')
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @return $this
     * 编码 jwt token
     */
    public function encode()
    {
        $time = time();
        $this->token = (new Builder())
            ->issuedBy($this->iss)// 颁发者
            ->permittedFor($this->aud)// 接收者
            ->identifiedBy($this->jwtid, true)
            ->issuedAt($time)// Configures the time that the token was issue (iat claim)
//            ->canOnlyBeUsedAfter($time + 60)
            ->expiresAt($time + 3600)
            ->withClaim('uid', $this->uid)// Configures a new claim, called "uid"
            ->getToken(new Sha256(), new Key($this->secrect));
        return $this;
    }

    /**
     * @return \Lcobucci\JWT\Token
     * /**
     * 解码token
     */
    public function decode()
    {
        if (!$this->decodeToken) {
            $this->decodeToken = (new Parser())->parse((string)$this->token);
            $this->uid = $this->decodeToken->getClaim('uid');
        }
        return $this->decodeToken;
    }

    /**
     * verify token
     * 校验token是否被篡改
     */
    public function verify(){
        $result = $this->decode()->verify(new Sha256(),$this->secrect);
        return $result;
    }
    /**
     * @return bool
     * validate
     * 验证内部设置 token的 iss aud  id是否正确
     */
    public function validate(): bool
    {
        $data = new ValidationData();
        $data->setIssuer($this->iss);
        $data->setAudience($this->aud);
        $data->setId($this->jwtid);
        return $this->decode()->validate($data);
    }

    /**
     * @return $this
     * 延时token
     */
    public function delayedToken(){
        $time = time();
        $this->token = (new Builder())
            ->issuedBy($this->iss)// 颁发者
            ->permittedFor($this->aud)// 接收者
            ->identifiedBy($this->jwtid, true)
            ->issuedAt($time)// Configures the time that the token was issue (iat claim)
//            ->canOnlyBeUsedAfter($time + 60)
            ->expiresAt($time + 4200)
            ->withClaim('uid', $this->uid)// Configures a new claim, called "uid"
            ->getToken(new Sha256(), new Key($this->secrect));
        return $this;
    }

    public function getUid(){
        return $this->uid;
    }

    private function __construct(){}
    private function __clone(){}

}