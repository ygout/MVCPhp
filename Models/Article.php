<?php

class Article
{
    private $_id;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     * @return Article
     */
    public function setId($id)
    {
        $id = (int) $id;
        if($id >0)
        {
            $this->_id = $id;
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param mixed $title
     * @return Article
     */
    public function setTitle($title)
    {
        if(is_string($title))
        {
            $this->_title = $title;
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->_content;
    }

    /**
     * @param mixed $content
     * @return Article
     */
    public function setContent($content)
    {
        if(is_string($content))
        {
            $this->_content = $content;
        }

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->_date;
    }

    /**
     * @param mixed $date
     * @return Article
     */
    public function setDate($date)
    {
        $this->_date = $date;
        return $this;
    }
    private $_title;
    private $_content;
    private $_date;

    public  function __construct(array $data)
    {
        $this->Hydrate($data);
    }

    // Hydratation
    public function Hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set' .ucfirst($key);
            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }
}