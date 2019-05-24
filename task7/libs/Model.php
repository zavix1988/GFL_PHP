<?php 

class Model
{

    private $name;
    private $email;
    private $subject;
    private $text;
    private $templateArray;
    private $userIp;


    public function __construct()
    {
        $this->name = '';
        $this->email = '';
        $this->subject = '';
        $this->text = '';
        $this->templateArray = array(
            '%TITLE%'       =>  'Contact Form',
            '%NAMEERROR%'   =>  '',
            '%EMAILERROR%'  =>  '',
            '%TEXTERROR%'   =>  '',
            '%NAMELABEL%'   =>  'Ваше имя',
            '%EMAILLABEL%'  =>  'Адрес почты',
            '%TEXTLABEL%'   =>  'Текст письма',
            '%NAMEVALUE%'   =>  '',
            '%EMAILVALUE%'  =>  '',
            '%TEXTVALUE%'   =>  '',
            '%OPT1%'        =>  'selected',
            '%OPT2%'        =>  '',
            '%OPT3%'        =>  '',
            '%OPT4%'        =>  '',
            '%MESSTATUS%'   =>  ''
        );
        $this->userIp = '';
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @param string $userIp
     */
    public function setUserIp($userIp)
    {
        $this->userIp = $userIp;
    }




    public function getArray()
    {
        return $this->templateArray;
    }

    public function checkForm()
    {
        if (empty($this->name)){
            $this->setTemplateArray('%NAMEERROR%','class="text-danger"');
            $this->falseForm();
        }else if(!$this->checkLength($this->name, 2, 25) || is_numeric($name)){
            $this->setTemplateArray('%NAMEERROR%', ERRSTYLE);
            $this->setTemplateArray('%NAMELABEL%','Введите валидное имя');
            $this->falseForm();
        }else{
            $nameValidate = true;
        }

        if (empty($this->email)){
            $this->setTemplateArray('%EMAILERROR%', ERRSTYLE);
            $this->falseForm();
        }else if(!$validMail = filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $this->setTemplateArray('%EMAILERROR%', ERRSTYLE);
            $this->setTemplateArray('%EMAILLABEL%','Введите валидный email');
            $this->falseForm();
        }else{
            $mailValidate = true;
        }

        if (empty($this->text)){
            $this->setTemplateArray('%TEXTERROR%', ERRSTYLE);
            $this->falseForm();
        }else if(!$this->checkLength($this->text, 2, 140)){
            $this->setTemplateArray('%TEXTERROR%', ERRSTYLE);
            $this->setTemplateArray('%TEXTLABEL%','Текст письма слишком короткий либо слишком длинный');
            $this->falseForm();
        }else{
            $messageValidate = true;
        }

        if($nameValidate && $mailValidate &&$messageValidate){
            return true;
        }
        return false;
    }

    public function sendEmail()
    {
        $email = EMAIL;
        $subject = $this->renderSubject();
        $message = $this->text."\r\n";
        $message .= "UserIP: ".$this->userIp."\r\n";
        $headers = 'From:'. $this->email . "\r\n" .
            'Reply-To: zavix@mksat.net' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
         return $this->setStatus(mail($email, $subject, $message, $headers));
    }

    private function setTemplateArray($key, $value)
    {
        if (array_key_exists($key, $this->templateArray)){
            unset($this->templateArray[$key]);
            $this->templateArray[$key] = $value;
        } else {
            $this->templateArray[$key] = $value;
        }
    }

    private function falseForm()
    {
        $this->setTemplateArray('%NAMEVALUE%', $this->name);
        $this->setTemplateArray('%EMAILVALUE%', $this->email);
        $this->setTemplateArray('%TEXTVALUE%', $this->text);
        $this->setOption();
        return true;
    }

    private function setOption()
    {
        switch ($this->subject)
        {
            case 'opt2': $this->setTemplateArray('%OPT2%', 'selected'); break;
            case 'opt3': $this->setTemplateArray('%OPT3%', 'selected'); break;
            case 'opt4': $this->setTemplateArray('%OPT4%', 'selected'); break;
            default: $this->setTemplateArray('%OPT1%', 'selected');
        }
        return true;
    }

    private function checkLength($value = "", $min, $max)
    {
        $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
        return !$result;
    }

    private function setStatus($status)
    {
        if($status){
            $this->setTemplateArray('%MESSTATUS%', 'Письмо отправлено');
        }else{
            $this->setTemplateArray('%MESSTATUS%', 'Ошибка отправки письма');
        }
        return true;
    }

    private function renderSubject()
    {
        switch ($this->subject)
        {
            case 'opt2': return 'Пожелания';
            case 'opt3': return 'Предложения';
            case 'opt4': return 'Жалоба';
            default: return 'Иное';
        }
    }
}