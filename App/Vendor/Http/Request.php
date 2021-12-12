<?php

namespace MRDEVELOPER\Vendor\Http;
use MRDEVELOPER\Models\Email;
use MRDEVELOPER\Models\Setting;
use MRDEVELOPER\Vendor\Helper\Func;
use MRDEVELOPER\Vendor\Language\Lang;
use PHPMailer;

class Request
{

    /**
     * Url
     * @var string $url
     */
    private static $url;

    /**
     * @var \phpmailerException
     */
    private static $error;

    /**
     * Base Url
     *
     * @var string baseUrl
     */
    private $baseUrl;
    /**
     * Prepare Url
     *
     * @return array
     */
    public function prepareUrl()
    {
        $script =  dirname($this->server('SCRIPT_NAME'));
        $requestUri = $this->server('REQUEST_URI');
        if (strpos($requestUri ,'?') !== false){
            list($requestUri, $queryString) = explode('?',$requestUri);
        }

        $this->url = '/'.preg_replace('#^'.$script.'#' ,'',$requestUri);
        $this->baseUrl = $this->server('REQUEST_SCHEME') . '://' . $this->server('HTTP_HOST') . $script;
    }

    /**
     * Super Global $_GET Variable
     *
     * @param $key
     * @param null $default
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        return array_get($_GET,$key,$default);
    }

    /**
     *  Super Global $_POST Variable
     *
     * @param $key
     * @param null $default
     * @return mixed
     */
    public static function post($key, $default = null)
    {
        return array_get($_POST,$key,$default);
    }


    /**
     * Super Global $_SERVER Variable
     *
     * @param $key
     * @param null $default
     * @return mixed
     */
    public static function server($key, $default =null)
    {
        $key = strtoupper($key);
        return Func::array_get($_SERVER,$key,$default);
    }

    /**
     * The Request Type [get or post]
     *
     * @return mixed
     */
    public function method()
    {
        return $this->server('REQUEST_METHOD');
    }

    /**
     * Base Url Method
     *
     * @return mixed
     */
    public function baseUrl()
    {
        return $this->baseUrl;
    }

    /**
     *
     *
     * @return mixed
     */
    public static function Url()
    {
        return static::$url;
    }


    /**
     * @param $receiver
     * @param $subject
     * @param $body
     * @param null $receiverName
     * @param null $replyTo
     * @return bool
     */
    public static function mail($receiver, $subject, $body, $receiverName =null, $replyTo =null)
    {
        $mail = new PHPMailer();

        $email = Email::where(Email::getColumn(6),1);

        $mail->CharSet = "UTF-8";
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth  = $email[Email::getColumn(1)];
        $mail->SMTPAutoTLS = false;
        $mail->SMTPSecure = $email[Email::getColumn(4)];
        $mail->isSMTP();
        $mail->Host = $email[Email::getColumn(0)];
        $mail->Port = $email[Email::getColumn(5)];
        $mail->Username = $email[Email::getColumn(2)];
        $mail->Password = $email[Email::getColumn(3)];

        if (!$replyTo)
            $replyTo = $email[Email::getColumn(2)];
        if (!$receiverName )
            $receiverName = settings()['title'] . " " . Lang::lang("user");

        $mail->setFrom($email[Email::getColumn(2)], settings()['title']);
        $mail->addAddress($receiver, $receiverName);
        $mail->addReplyTo($replyTo, settings()[Setting::getColumn(0)]);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        static::$error = $mail->ErrorInfo;

        return $mail->send();
    }


    /**
     * @return \phpmailerException
     */
    public static function getMailError()
    {
        return static::$error;
    }

}