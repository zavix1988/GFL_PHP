<?php


class ParseGoogle
{
    private $url;
    private $result;
    private $errors;


    public function __construct()
    {
        $this->url = GOOGLE;
        $this->result = "";
        $this->errors = [];
    }

    public function sendRequest(){
        $request = str_replace(' ', '+', $_GET['request']);
        $this->url .= $request;
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if(!($res = curl_exec($ch))){
            $this->errors[] = curl_error($ch);
            curl_close($ch);
            return false;
        }
        curl_close($ch);
        $this->result = $res;
        return true;

    }

    public function parseContent(){
        $doc = phpQuery::newDocument($this->result);
        foreach($doc->find('#ires .g') as $article){
            $article = pq($article);
            $header = $article->find('h3.r')->text();
            $link = $article->find('.s cite')->text();
            $text = $article->find('.s span.st')->text();
            if ($header && $link && $text){
                $myArticle[] = array('header' => $header, 'link' => $link, 'text' => $text);
            }
        }
        return $myArticle;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }
}